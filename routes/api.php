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

Route::namespace('Api')->middleware(JsonMiddleware::class)->group(function () {

    // Login routes
    Route::post('login', 'LoginController@login');

    // authenticated routes

    Route::middleware('auth:api')->group(function () {

        // Log out

        Route::post('logout', 'LoginController@logout');

        // current user info

        Route::get('me', 'LoginController@me');

        // Listings routes

        Route::get('listings', 'ListingController@index');

    });

});
