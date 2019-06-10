<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
use App\Models\App\News;
use App\Models\App\Structure;
use App\Models\App\UserStructure;
use App\Models\App\UserAuthorizations;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

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
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string $name
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearchByName($query, $name) {
        return $query->where('firstname', 'LIKE', '%'.$name.'%')->orWhere('lastname', 'LIKE', '%'.$name.'%');
    }

    /**
     * Check in the `bloggers` table if user has rights to post on blog
     * 
     * @return boolean
     */
    public function blogger() {
        return ! DB::table('bloggers')->where('user_id', '=', $this->id)->get()->isEmpty();
    }

    /**
     * Get the UserStructure relationship
     * 
     */
    public function userStructure() {
        return $this->hasOne(UserStructure::class, 'user_id');
    }

    public function structure() {
        return $this->userStructure->structure();
    }

    /**
     * Check if the user is related to a structure
     * 
     * @return boolean
     */
    public function isRelatedToStructure () {
        return ($this->userStructure->structure_id === null) ? false : true;
    }

    /**
     * Return true if the user is related the structure
     * 
     * @return boolean
     */
    public function isRelatedTo($struct) {
        return optional($this->userStructure)->structure_id === $struct->id;
    }

    /**
     * Return the authorizations of the user
     * 
     * @return UserStructureAuthorizations
     */
    public function authorizations() {
        return $this->hasOne(UserAuthorizations::class);
    }

    /**
     * Check if the user is the structure owner
     */
    public function isStructureOwner($structure) {
        return ! (DB::table('structures_owners')
                    ->where('user_id', '=', $this->id)
                    ->where('structure_id', '=', $structure->id)
                    ->get()
                    ->isEmpty()
                );
    }

    /**
     * Get user's news
     */
    public function news() {
        return $this->hasMany(News::class, 'author_id');
    }
}
