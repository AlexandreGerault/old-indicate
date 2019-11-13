<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| Blog routes
|--------------------------------------------------------------------------
|
| Here are the routes of the blog, contained by a subdomain
| */

Route::domain('blog.' . parse_url(config('app.url'), PHP_URL_HOST))->group(function () {
    Route::get('/', 'Blog\BlogController@index')->name('blog.index');
    Route::get('/read/{id}/{slug}', 'Blog\BlogController@show')->name('blog.read');
    Route::get('/search', 'Blog\BlogController@search')->name('blog.search');
    Route::middleware(['auth', 'blogger'])->group(function () {
        Route::get('/write', 'Blog\BlogController@create')->name('blog.create');
        Route::post('/store', 'Blog\BlogController@store')->name('blog.store');
        Route::get('/dashboard', 'Blog\BlogController@dashboard')->name('blog.dashboard');
        Route::get('/edit/{id}', 'Blog\BlogController@edit')->name('blog.edit');
        Route::get('/delete/{id}', 'Blog\BlogController@delete')->name('blog.delete');
        Route::post('/update/{id}', 'Blog\BlogController@update')->name('blog.update');
    });
});

Route::get('/', function () {
    if (auth()->check())
        return redirect()->route('user.show', auth()->user());
    else
        return view('app.home');
})->name('app.home');


/*
 * Admin routes
 */
Route::prefix('backoffice')->middleware('admin')->group(function () {
    Route::prefix('claim')->group(function () {
        Route::get('/', 'Backoffice\ClaimDemandsController@index')
            ->name('claimdemand.index');
        Route::get('/validates', 'Backoffice\ClaimDemandsController@validates')
            ->name('claimdemand.validates');
        Route::get('/rejects', 'Backoffice\ClaimDemandsController@rejects')
            ->name('claimdemand.rejects');
        ;
    });
});

/*
 |--------------------------------------------------------------------------
 | Application routes
 |--------------------------------------------------------------------------
 |
 | Here are the routes of the application, grouped by caterogy
 | */

Route::resource('structure', 'App\StructureController')->middleware('auth');

Route::prefix('structure/{structure}')->middleware('auth')->group(function () {
        Route::resource('rating', 'App\RatingsController');
        Route::get('written-news', 'App\StructureController@news')->name('structure.news');
        Route::get('timeline', 'App\StructureController@timeline')->name('structure.timeline');
        Route::get('claim', 'App\UserStructureController@claim')->name('structure.claim');
        Route::get('/join', 'App\UserStructureController@join')
            ->middleware(['nostruct', 'verified'])
            ->name('structure.join');
        Route::get('/follows', 'App\FollowersController@follows')->name('structure.follows');
        Route::get('/unfollows', 'App\FollowersController@unfollows')->name('structure.unfollows');

        Route::resource('news', 'App\NewsController')->middleware(['auth', 'verified']);
});

Route::prefix('dashboard/{structure}')
    ->middleware(['auth', 'verified', 'can:access-dashboard,structure'])
    ->group(function () {
        Route::get('/', 'App\DashboardController@index')->name('structure.dashboard.index');
        Route::prefix('/members')->group(function () {
            Route::get('/list', 'App\DashboardController@listMembers')
            ->name('structure.dashboard.members.list');
            Route::get('/demands', 'App\DashboardController@demands')
            ->name('structure.dashboard.members.demands');
            Route::get('/demands/{id}/accepts', 'App\UserStructureController@accepts')
            ->name('demands.accepts');
            Route::get('/demands/{id}/refuses', 'App\UserStructureController@refuses')
            ->name('demands.refuses');
            Route::get('/permissions', 'App\DashboardController@permissionsMembers')
            ->name('structure.dashboard.members.authorizations.list');
            Route::get('/edit/{id}', 'App\DashboardController@editMember')
            ->name('structure.dashboard.members.edit');
            Route::post('/update/{id}', 'App\UserStructureController@update')
            ->name('structure.dashboard.members.update');
            Route::post('/update/authorizations/{id}', 'App\UserAuthorizationsController@update')
            ->name('structure.dashboard.members.authorizations.update');
        });
        Route::get('/news', 'App\DashboardController@news')->name('structure.dashboard.news');
        Route::prefix('profile')->group(function () {
            Route::get('/', 'App\DashboardController@profile')->name('structure.dashboard.profile');
            Route::post('/update/contact', 'App\StructureController@updateContactMeans')
            ->name('structure.dashboard.profile.update.contact');
            Route::post('/update/company', 'App\StructureDataController@updateCompanyData')
            ->name('structure.dashboard.profile.update.company');
            Route::post('/update/investor', 'App\StructureDataController@updateInvestorData')
            ->name('structure.dashboard.profile.update.investor');
            Route::post('/update/consulting', 'App\StructureDataController@updateConsultingData')
            ->name('structure.dashboard.profile.update.consulting');
        });
    });

Route::resource('user', 'App\UserController');
Route::get('/user/{user}/news', 'App\UserController@news')->name('user.news');


Route::prefix('search')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/ajax', 'App\SearchController@ajaxSearch')->name('search.ajax');
    Route::get('/', 'App\SearchController@search')->name('search');
});

/*********************
 * INDICATE RESEARCH *
 *********************/
Route::get('/indicate-search', 'App\IndicateResearchController@form')
    ->name('research.form');
Route::get('/indicate-search-results', 'App\IndicateResearchController@results')
    ->name('research.results');

/************************
 * SEARCH PROFESSIONALS *
 ************************/
Route::get('/search-professional', function () {
    return view('search.forms.professional');
})->name('search.professional');
Route::get('/search-professional/results', function () {
    return view('search.results.professional');
})->name('search.professional.results');

Auth::routes(['verify' => true]);
