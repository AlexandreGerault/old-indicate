<?php

namespace App\Models\App;

use App\Models\App\UserStructure;
use Illuminate\Database\Eloquent\Model;

class UserStructureAuthorizations extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users_structures_authorizations';

    /**
     * Return the UserStructure relationship
     * 
     * @return UserStructure
     */
    public function userStructure() {
        return $this->belongsTo(UserStructure::class, 'user_structure_id');
    }
}
