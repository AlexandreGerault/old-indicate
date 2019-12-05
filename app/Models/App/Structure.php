<?php

namespace App\Models\App;

use App\Traits\ModelAvatar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
 * @property-read Collection|Rating[] $ratings
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
 * @property string $avatar
 * @property int $verified
 * @property int|null $address_id
 * @property int|null $contact_id
 * @property-read \App\Models\App\ContactMeans|null $contact
 * @property-read int|null $followers_count
 * @property-read int|null $following_count
 * @property-read int|null $members_count
 * @property-read int|null $news_count
 * @property-read int|null $ratings_count
 * @property-read int|null $structure_users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\Structure unverified()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\Structure verified()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\Structure whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\Structure whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\Structure whereContactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\App\Structure whereVerified($value)
 */
class Structure extends Model
{
    use ModelAvatar;

    protected $fillable = ['name', 'comment', 'siren', 'siret'];
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
     * Scope a query to search structures with keywords in comment.
     *
     * @param Builder $query
     * @param String $keyword
     * @return mixed
     */
    public function scopeSearchInComment($query, $keyword)
    {
        return $query->where('comment', 'LIKE', '%' . $keyword . '%');
    }

    /**
     * @param Builder $query
     * @param String $keyword
     * @return Builder
     */
    public function scopeSearchWithKeywords(Builder $query, $keyword)
    {
        return $query->where('name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('comment', 'LIKE', '%' . $keyword . '%');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeVerified($query)
    {
        return $query->where('verified', 1);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeUnverified($query)
    {
        return $query->where('verified', 0);
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
        return $this->belongsToMany(User::class,
            'users_structures',
            'structure_id',
            'user_id')
            ->whereHas('UserStructure', function (Builder $q) use ($structure) {
                $q->where('status',
                    '=',
                    config('enums.structure_membership_request_status.ACCEPTED'))
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
    public function following() : BelongsToMany
    {
        return $this->belongsToMany(Structure::class,
            'followers',
            'follower_id',
            'following_id');
    }

    /**
     * @return BelongsToMany
     */
    public function followers() : BelongsToMany
    {
        return $this->belongsToMany(Structure::class,
            'followers',
            'following_id',
            'follower_id');
    }

    /**
     * Determine whether the structure is subscribed to the target timeline
     *
     * @param Structure : The target structure
     *
     * @return boolean
     */
    public function follows(Structure $structure) : bool
    {
        return $this->following->contains($structure);
    }

    /**
     * @return HasMany
     */
    public function ratings() : HasMany
    {
        return $this->hasMany(Rating::class);
    }

    /**
     * @return BelongsTo
     */
    public function address() : BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    /**
     * @return BelongsTo
     */
    public function contact() : BelongsTo
    {
        return $this->belongsTo(ContactMeans::class);
    }

    /**
     * @return float|void
     */
    public function averageRating() : float
    {
        if ($this->ratings->count() > 0) return $this->ratings->reduce(function ($acc, Rating $rating) {
            return $acc + $rating->mean();
        })/$this->ratings->count();
    }

    /**
     * @return bool
     */
    public function shouldDisplayCharacteristics() : bool
    {
        $display = false;
        foreach($this->data->makeHidden(['id', 'created_at', 'updated_at'])->toArray() as $key => $value)
        {
            if($value !== null) return true;
        }
        return false;
    }
}
