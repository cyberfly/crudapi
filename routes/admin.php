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

Route::name('admin.')->group(function () {

    Route::prefix('admin')->group(function () {

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

    });
    
});
