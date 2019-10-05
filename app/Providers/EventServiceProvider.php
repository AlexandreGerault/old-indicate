<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

/* Events imports */
use App\Events\StructureCreated;
use App\Events\UserJoinStructure;
use App\Events\NewsDeleted;

/* Listeners import */
use App\Listeners\SendEmailConfirmation;
use App\Listeners\SendEmailJoinDemand;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        StructureCreated::class => [
            SendEmailConfirmation::class,
        ],
        UserJoinStructure::class => [
            SendEmailJoinDemand::class,
        ],
        NewsDeleted::class => [
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
