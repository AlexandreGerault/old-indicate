<?php

namespace App\Listeners;

use App\Events\StructureCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailConfirmation
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
        //
    }
}
