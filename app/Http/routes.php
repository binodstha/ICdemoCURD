
<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});
Route::get('/info', 'ICdemoController@index');
Route::get('/info/{name}', 'ICdemoController@info');
Route::get('/list/{count?}', 'ICdemoController@index');
Route::post('/search', 'ICdemoController@search');
Route::get('addinfo/{error?}', 'ICdemoController@create');
Route::post('addinfo', 'ICdemoController@store');
