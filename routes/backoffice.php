<?php
/*
* Admin routes
*/

Route::get('/', function () {
    redirect()->route('backoffice.claim-demands.index');
})->middleware('auth:admin')->name('home');

Route::namespace('Auth')->group(function() {

    //Login Routes
    Route::get('/login','LoginController@showLoginForm')
        ->name('login');
    Route::post('/login','LoginController@login');
    Route::post('/logout','LoginController@logout')
        ->name('logout');

    //Forgot Password Routes
    Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')
        ->name('password.request');
    Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')
        ->name('password.email');

    //Reset Password Routes
    Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')
        ->name('password.reset');
    Route::post('/password/reset','ResetPasswordController@reset')
        ->name('password.update');
});

Route::prefix('claim')
    ->middleware('auth:admin')
    ->name('claim-demands.')
    ->group(function () {
    Route::get('/', 'ClaimDemandsController@index')
        ->name('index');
    Route::get('/validates', 'ClaimDemandsController@validates')
        ->name('validates');
    Route::get('/rejects', 'ClaimDemandsController@rejects')
        ->name('rejects');
});

Route::prefix('structure-validation')
    ->middleware('auth:admin')
    ->name('structure-validation.')
    ->group(function () {
    Route::get('/', 'StructureValidationController@index')
        ->name('index');
    Route::get('/{structure}', 'StructureValidationController@show')
        ->name('show');
    Route::get('/{structure}/validates', 'StructureValidationController@validates')
        ->name('validates');
});

