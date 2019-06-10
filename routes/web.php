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
    Route::middleware(['auth', 'blogger'])->group(function() {
        Route::get('/write', 'Blog\BlogController@create')->name('blog.create');
        Route::post('/store', 'Blog\BlogController@store')->name('blog.store');
        Route::get('/dashboard', 'Blog\BlogController@dashboard')->name('blog.dashboard');
        Route::get('/edit/{id}', 'Blog\BlogController@edit')->name('blog.edit');
        Route::get('/delete/{id}', 'Blog\BlogController@delete')->name('blog.delete');
        Route::post('/update/{id}', 'Blog\BlogController@update')->name('blog.update');
    });
    
});

Route::prefix('structure')->group(function () {
    Route::prefix('profile')->group(function () {
        Route::get('{id}', 'App\StructureController@showProfile')->name('structure.profile.show');
        Route::get('{id}/edit', function () {
             return;
        })->name('structure.profile.edit');
    });

    Route::get('/{id}/news', 'App\StructureController@news')->name('structure.news');
    Route::get('/{id}/newsfeed', 'App\StructureController@news')->name('structure.newsfeed');

    /**
     * Routes below are used to join or create a structure
     */
    Route::middleware(['auth', 'nostruct', 'verified'])->group(function() {
        Route::get('/list', 'App\StructureController@list')->name('structure.list');
        Route::get('/join/{id}', 'App\UserStructureController@join')->name('structure.join');
        Route::get('/create', 'App\StructureController@create')->name('structure.create');
        Route::post('/store', 'App\StructureController@store')->name('structure.store');
    });

    Route::get('/follows', 'App\StructureController@follows')->name('structure.follows');
    Route::get('/unfollows', 'App\StructureController@unfollows')->name('structure.unfollows');
    //Route::get('/caracteristics/{id}', 'Structure\ProfilController@caracteristics')->name('structure.profile.caracteristics');
});

Route::prefix('user')->group(function () {
    Route::get('/profile/{id}', 'App\UserController@showProfile')->name('user.profile.show');
    Route::get('/{id}/news', 'App\UserController@news')->name('user.news');
});

Route::prefix('news')->middleware('verified')->group(function () {
    Route::get('/', 'App\NewsController@index')->name('news.index');
    Route::post('/store', 'App\NewsController@store')->name('news.store');
    Route::patch('/update/{id}', 'App\NewsController@update')->name('news.update');
    Route::delete('/delete/{id}', 'App\NewsController@delete')->name('news.delete');
});


Route::get('/', function () {
    return view('app.home');
})->middleware('guest')->name('app.home');
Route::get('/home', function () {
    return redirect()->route('app.home');
});

Route::get('/indicate-search', function() {
    return view('app.indicate-search');
})->name('research');

Route::get('/search', 'App\SearchController@search')->name('search');

Auth::routes(['verify' => true]);