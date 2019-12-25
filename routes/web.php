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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/minionids', function () {

    $minion_id_generator = new \App\Jobs\MinionIdGenerator();

    $key_indexes = [
        0, 1, 2, 3, 100, 139, 10000, 15000
    ];

    for ($i = 0; $i < sizeof($key_indexes); $i++) {

        $key_index = $key_indexes[$i];


        echo 'Inputs: (int) n = ' . $key_index . '<br> Output: (string) = ' .$minion_id_generator->handle($key_index);
        echo '<br>';
        echo '--';
        echo '<br>';
    }

});
