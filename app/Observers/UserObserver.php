<?php

namespace App\Observers;

use App\Models\App\UserAuthorizations;
use App\Models\App\UserStructure;
use App\User;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  User  $user
     * @return void
     */
    public function created(User $user)
    {
        // Create the default user authorizations (crash if code is not run)
        $authorizations = new UserAuthorizations();
        $authorizations->user_id = $user->id;
        $authorizations->save();

        // Create the default user-structure relationship (crash if code not run)
        $userStructure = new UserStructure();
        $userStructure->user_id = $user->id;
        $userStructure->save();
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
