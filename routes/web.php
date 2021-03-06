<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/info', function () {
    if (config('app.debug')) return phpinfo();
    else return 'Not in debug mode';
});

Route::get('/code', 'CodeController@show');
Route::post('/code', 'CodeController@code');

Auth::routes();

Route::get('/home', 'HomeController@index');
