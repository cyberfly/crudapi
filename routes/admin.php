<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Middleware\CheckAdmin;

Route::name('admin.')->group(function () {

    Route::prefix('admin')->middleware('auth', CheckAdmin::class)->group(function () {

        /*
         * Laravel Passport custom routes
         * */

        Route::get('passports', 'PassportController@index')->name('passport.index');


        /*
         * User routes
         * */

        Route::get('users', 'UserController@index')->name('users.index');
        Route::get('users/create', 'UserController@create')->name('users.create');
        Route::get('users/{user}', 'UserController@show')->name('users.show');
        Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');

        Route::post('users', 'UserController@store')->name('users.store');

        Route::put('users/{user}', 'UserController@update')->name('users.update');

        Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');

        /*
         * Listing routes
         * */

        Route::get('listings', 'ListingController@index')->name('listings.index');
        Route::get('listings/create', 'ListingController@create')->name('listings.create');
        Route::get('listings/{listing}', 'ListingController@show')->name('listings.show');
        Route::get('listings/{listing}/edit', 'ListingController@edit')->name('listings.edit');

        Route::post('listings', 'ListingController@store')->name('listings.store');

        Route::put('listings/{listing}', 'ListingController@update')->name('listings.update');

        Route::delete('listings/{listing}', 'ListingController@destroy')->name('listings.destroy');

    });
    
});
