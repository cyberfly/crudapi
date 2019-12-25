<?php

use App\Http\Middleware\JsonMiddleware;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::name('api.')->namespace('Api')->middleware(JsonMiddleware::class)->group(function () {

    // Login routes
    Route::post('login', 'LoginController@login')->name('auth.login');

    // authenticated routes

    Route::middleware('auth:api')->group(function () {

        // Log out

        Route::post('logout', 'LoginController@logout')->name('auth.logout');

        // current user info

        Route::get('me', 'LoginController@me')->name('auth.me');

        // Listings routes

        Route::get('listings', 'ListingController@index')->name('listings.index');
//        Route::get('listings/create', 'ListingController@create')->name('listings.create');
//        Route::get('listings/{listing}', 'ListingController@show')->name('listings.show');
//        Route::get('listings/{listing}/edit', 'ListingController@edit')->name('listings.edit');
//
//        Route::post('listings', 'ListingController@store')->name('listings.store');

        Route::put('listings/{listing}', 'ListingController@update')->name('listings.update');

//        Route::delete('listings/{listing}', 'ListingController@destroy')->name('listings.destroy');

    });

});
