<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('blogger', function () {
            return auth()->check() && auth()->user()->blogger();
        });
        Blade::component('components.ui.buttons.follow', 'follow');
        Blade::component('components.ui.buttons.unfollow', 'unfollow');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
