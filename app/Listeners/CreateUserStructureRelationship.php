<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\App\UserStructure;
use App\Events\StructureCreated;

class CreateUserStructureRelationship
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
     * @param  StructureCreated  $event
     * @return void
     */
    public function handle(StructureCreated $event)
    {
        UserStructure::create([
            'user_id' => $event->user->id,
            'structure_id' => $event->structure->id,
            'status' => config('enums.structure_membership_request_status.ACCEPTED')
        ]);
    }
}