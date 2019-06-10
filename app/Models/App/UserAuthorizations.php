<?php

namespace App\Models\App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserAuthorizations extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users_authorizations';

    /**
     * Return the UserStructure relationship
     * 
     * @return UserStructure
     */
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
