<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use App\User;
use Eloquent;

/**
 * App\Models\App\Structure
 *
 * @property-read Collection|Structure[] $followers
 * @property-read Collection|Structure[] $following
 * @property-read Collection|User[] $members
 * @property-read Collection|News[] $news
 * @property-read Collection|UserStructure[] $structureUsers
 * @method static Builder|Structure newModelQuery()
 * @method static Builder|Structure newQuery()
 * @method static Builder|Structure query()
 * @method static Builder|Structure searchByName($name)
 * @mixin Eloquent
 * @property int $id
 * @property string $name
 * @property string $comment
 * @property int $siren
 * @property int $siret
 * @property int $validated
 * @property int $data_id
 * @property string $data_type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Structure whereComment($value)
 * @method static Builder|Structure whereCreatedAt($value)
 * @method static Builder|Structure whereId($value)
 * @method static Builder|Structure whereName($value)
 * @method static Builder|Structure whereSiren($value)
 * @method static Builder|Structure whereSiret($value)
 * @method static Builder|Structure whereType($value)
 * @method static Builder|Structure whereUpdatedAt($value)
 * @method static Builder|Structure whereValidated($value)
 * @property string $phone_number
 * @property string $address
 * @property-read Collection|Structure[] $data
 * @method static Builder|Structure whereAddress($value)
 * @method static Builder|Structure whereDataId($value)
 * @method static Builder|Structure whereDataType($value)
 * @method static Builder|Structure wherePhoneNumber($value)
 */
class Structure extends Model
{
    protected $guarded = [];


    /**
     * Scope a query to search structures by name.
     *
     * @param Builder $query
     * @param String $name
     * @return mixed
     */
    public function scopeSearchByName($query, $name)
    {
        return $query->where('name', 'LIKE', '%' . $name . '%');
    }

    /**
     * @return HasMany
     */
    public function structureUsers()
    {
        return $this->hasMany(UserStructure::class, 'structure_id');
    }

    /**
     * @return Builder|BelongsToMany
     */
    public function members()
    {
        $structure = $this;
        return $this->belongsToMany(User::class, 'users_structures', 'structure_id', 'user_id')
            ->whereHas('UserStructure', function (Builder $q) use ($structure) {
                $q->where('status', '=', config('enums.structure_membership_request_status.ACCEPTED'))
                    ->where('structure_id', '=', $structure->id);
            });
    }

    /**
     * Returns an array of data depending on the structure type
     *
     * @return MorphTo
     */
    public function data()
    {
        return $this->morphTo();
    }

    /**
     * @return HasMany
     */
    public function news()
    {
        return $this->hasMany(News::class, 'structure_id');
    }

    /**
     * @return News|Builder
     */
    public function timeline()
    {
        return News::byFollowersOf(auth()->user()->userStructure->structure);
    }

    /**
     * @return BelongsToMany
     */
    public function following()
    {
        return $this->belongsToMany(Structure::class, 'followers', 'follower_id', 'following_id');
    }

    /**
     * @return BelongsToMany
     */
    public function followers()
    {
        return $this->belongsToMany(Structure::class, 'followers', 'following_id', 'follower_id');
    }

    /**
     * Determine whether the structure is subscribed to the target timeline
     *
     * @param Structure : The target structure
     *
     * @return boolean
     */
    public function follows(Structure $structure)
    {
        return $this->following->contains($structure);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function averageRating()
    {
        $average = 0;
        $ratings = $this->ratings;
        foreach ($ratings as $rating)
        {
            $average += $rating->rating;
        }
        if ($ratings->count() !== 0)
            return $average/$ratings->count();
        else
            return 0;
    }
}
