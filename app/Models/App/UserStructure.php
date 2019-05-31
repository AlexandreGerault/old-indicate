<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\App\Structure;
use App\Models\App\UserStructureAuthorizations;

class UserStructure extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'structure_id', 'status', 'jobname',
    ];
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users_structures';

    /**
     * Return the user
     * 
     * @return User
     */
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Return the structure
     * 
     * @return Structure
     */
    public function structure() {
        return $this->belongsTo(Structure::class, 'structure_id');
    }

    /**
     * Return the authorizations for the user related to this relationship
     * 
     * @return UserStructureAuthorizations
     */
    public function authorizations() {
        return $this->hasOne(UserStructureAuthorizations::class);
    }
}
