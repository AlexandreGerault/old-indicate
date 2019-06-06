<?php

namespace App\Listeners;

use App\Events\UserJoinStructure;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailJoinDemand
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
     * @param  UserJoinStructure  $event
     * @return void
     */
    public function handle(UserJoinStructure $event)
    {
        //
    }
}
