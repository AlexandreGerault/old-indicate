<?php

namespace App\Listeners;

use App\Events\ValidatedClaimDemand;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OnValidatedClaimDemand
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ValidatedClaimDemand $event)
    {
        $user = $event->user;

        $userStructure = $user->userStructure;
        $userStructure->structure()->associate($event->structure);
        $userStructure->status = config('enums.structure_membership_request_status.ACCEPTED');
        $userStructure->save();

        foreach ($user->authorizations->makeHidden(['id', 'created_at', 'updated_at'])->toArray() as $key => $value) {
            $event->user->authorizations->$key = true;
        }
        $event->user->authorizations->save();
    }
}
