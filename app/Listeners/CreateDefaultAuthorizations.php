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
        DB::table('users_authorizations')->insert([
            'user_id' => $event->user->id,
            'created_at' => new \Datetime(),
            'updated_at' => new \Datetime(),
        ]);
    }
}