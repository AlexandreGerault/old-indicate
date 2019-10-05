<?php

namespace App\Providers;

use App\Models\App\CompanyData;
use App\Models\App\ConsultingData;
use App\Models\App\InvestorData;
use App\Models\App\Structure;
use App\Observers\StructureObserver;
use App\Observers\UserObserver;
use App\User;
use Illuminate\Database\Eloquent\Relations\Relation;
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
        /* Blade instructions */
        Blade::if('blogger', function () {
            return auth()->check() && User::find(auth()->id())->blogger();
        });
        Blade::component('components.ui.buttons.follow', 'follow');
        Blade::component('components.ui.buttons.unfollow', 'unfollow');

        /* Polymorphic relation setup  */
        Relation::morphMap([
            'company' => CompanyData::class,
            'investor' => InvestorData::class,
            'consulting' => ConsultingData::class,
        ]);

        /* Observers registration */
        Structure::observe(StructureObserver::class);
        User::observe(UserObserver::class);
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
