<?php

namespace App\Providers;

use App\Models\App\Rating;
use App\Policies\RatingPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\App\News;
use App\Policies\NewsPolicy;
use App\Models\App\Structure;
use App\Policies\StructurePolicy;
use App\User;
use App\Policies\UserPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        News::class => NewsPolicy::class,
        Structure::class => StructurePolicy::class,
        User::class => UserPolicy::class,
        Rating::class => RatingPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
