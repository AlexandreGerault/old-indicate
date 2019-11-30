<?php

namespace App\Providers;

use App\Models\App\CompanyData;
use App\Models\App\CompanyRating;
use App\Models\App\ConsultingData;
use App\Models\App\ConsultingRating;
use App\Models\App\InvestorData;
use App\Models\App\InvestorRating;
use App\Models\App\Structure;
use App\Observers\StructureObserver;
use App\Observers\UserObserver;
use App\User;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Schema;
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
        Blade::directive('uclang', function ($s) {
            return "<?php echo ucfirst(trans($s)); ?>";
        });

        /* Blade instructions */
        Blade::if('blogger', function () {
            return auth()->check() && User::find(auth()->id())->blogger();
        });

        Blade::component('components.ui.buttons.follow', 'follow');
        Blade::component('components.ui.buttons.unfollow', 'unfollow');
        Blade::component('components.rating_card', 'ratingcard');

        /* Polymorphic relation setup  */
        Relation::morphMap([
            'company_data' => CompanyData::class,
            'investor_data' => InvestorData::class,
            'consulting_data' => ConsultingData::class,
            'company_rating' => CompanyRating::class,
            'investor_rating' => InvestorRating::class,
            'consulting_rating' => ConsultingRating::class
        ]);

        /* Observers registration */
        Structure::observe(StructureObserver::class);
        User::observe(UserObserver::class);
        Schema::defaultStringLength(191);
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
