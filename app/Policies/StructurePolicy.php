<?php

namespace App\Policies;

use App\User;
use App\Models\App\Structure;
use Illuminate\Auth\Access\HandlesAuthorization;

class StructurePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the structure.
     *
     * @param  \App\User  $user
     * @param  \App\Models\App\Structure  $structure
     * @return mixed
     */
    public function view(User $user, Structure $structure)
    {
        //
    }

    /**
     * Determine whether the user can create structures.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the structure.
     *
     * @param  \App\User  $user
     * @param  \App\Models\App\Structure  $structure
     * @return mixed
     */
    public function update(User $user, Structure $structure)
    {
        //
    }

    /**
     * Determine whether the user can delete the structure.
     *
     * @param  \App\User  $user
     * @param  \App\Models\App\Structure  $structure
     * @return mixed
     */
    public function delete(User $user, Structure $structure)
    {
        //
    }

    /**
     * Determine whether the user can restore the structure.
     *
     * @param  \App\User  $user
     * @param  \App\Models\App\Structure  $structure
     * @return mixed
     */
    public function restore(User $user, Structure $structure)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the structure.
     *
     * @param  \App\User  $user
     * @param  \App\Models\App\Structure  $structure
     * @return mixed
     */
    public function forceDelete(User $user, Structure $structure)
    {
        //
    }

    /**
     * Determine whether the user can follows another structure.
     *
     * @param  \App\User  $user
     * @param  \App\Models\App\Structure  $structure
     * @return mixed
     */
    public function follow(User $user, Structure $structure)
    {
        return $user->authorizations->follow_structure && ! $user->structure->follows($structure) && $user->structure->id !== $structure->id;
    }
    /**
     * Determine whether the user can follows another structure.
     *
     * @param  \App\User  $user
     * @param  \App\Models\App\Structure  $structure
     * @return mixed
     */
    public function unfollow(User $user, Structure $structure)
    {
        return $user->authorizations->follow_structure && $user->structure->follows($structure) && $user->structure->id !== $structure->id;
    }
}
