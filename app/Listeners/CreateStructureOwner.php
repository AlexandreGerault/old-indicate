<?php

namespace App\Listeners;

use App\Events\StructureCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Auth;
use DB;

class CreateStructureOwner
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
        DB::table('structures_owners')->insert([
            'user_id' => $event->user->id,
            'structure_id' => $event->structure->id,
            "created_at" =>  new \Datetime(),
            "updated_at" => new \Datetime(),
        ]);
    }
}
