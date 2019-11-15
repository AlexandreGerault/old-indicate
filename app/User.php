<?php

namespace App;

use App\Models\App\News;
use App\Models\App\Structure;
use App\Models\App\UserAuthorizations;
use App\Models\App\UserStructure;
use App\Traits\ModelAvatar;
use Carbon\Carbon;
use DB;
use Eloquent;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\UploadedFile;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;

/**
 * App\User
 *
 * @property-read UserAuthorizations $authorizations
 * @property-read Collection|News[] $news
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read UserStructure $userStructure
 * @property-read Structure $structure
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User searchByName($name)
 * @mixin Eloquent
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string $avatar
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|User whereAvatar($value)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereFirstname($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereLastname($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereUpdatedAt($value)
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, ModelAvatar;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Scope a query to search users by name.
     *
     * @param Builder $query
     * @param string $name
     * @return Builder
     */
    public function scopeSearchByName($query, $name)
    {
        return $query
            ->where('firstname', 'LIKE', '%' . $name . '%')
            ->orWhere('lastname', 'LIKE', '%' . $name . '%');
    }

    public function scopeAdmin($query)
    {
        return $query->where('is_admin', '=', '1');
    }

    /**
     * Check if user is a blogger
     *
     * @return bool
     */
    public function blogger(): bool
    {
        return !DB::table('bloggers')->where('user_id', '=', $this->id)->get()->isEmpty();
    }


    /**
     * @return HasOne
     */
    public function userStructure()
    {
        return $this->hasOne(UserStructure::class, 'user_id');
    }

    /**
     * Check if the user is related to a structure
     *
     * @return bool
     */
    public function hasStructure(): bool
    {
        return $this->userStructure->structure_id !== null;
    }

    /**
     * Return true if the user is related the structure
     *
     * @param Structure $structure
     * @return bool
     */
    public function structureIs(Structure $structure)
    {
        return $this->userStructure->structure->id === $structure->id;
    }

    /**
     * Return the authorizations of the user
     *
     * @return HasOne
     */
    public function authorizations()
    {
        return $this->hasOne(UserAuthorizations::class);
    }

    /**
     * Check if the user is the structure owner
     * @param Structure $structure : The structure we want to know if the user owns
     * @return bool
     */
    public function isStructureOwner(Structure $structure)
    {
        return !(DB::table('structures_owners')
            ->where('user_id', '=', $this->id)
            ->where('structure_id', '=', $structure->id)
            ->get()
            ->isEmpty()
        );
    }

    /**
     * Get user's news
     * @return HasMany news
     */
    public function news()
    {
        return $this->hasMany(News::class, 'author_id');
    }

    /**
     * Determines whether a user is blacklisted from a structure
     * @param Structure $structure
     * @return bool
     */
    public function blacklisted(Structure $structure)
    {
        return DB::table('demands_blacklist')
            ->where('user_id', '=', $this->id)
            ->where('structure_id', '=', $structure->id)
            ->exists();
    }
}
