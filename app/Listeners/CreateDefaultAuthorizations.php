<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use DB;

class CreateDefaultAuthorizations
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
    public function handle(Registered $event)
    {
        DB::table('users_structures_authorizations')->insert([
            'user_structure_id' => $event->user->userStructure->id,
            'created_at' => new \Datetime(),
            'updated_at' => new \Datetime(),
        ]);
    }
}
