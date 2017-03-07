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

Route::resource('blogs', 'BlogController');

Route::get('/weather', function () {
    return view('weather');
});

Route::post('/exercise', 'ExercisesController@index');

Route::get('/exercise', function () {
    return view('exercise');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login/{service}', 'Auth\SocialLoginController@redirect');
Route::get('/login/{service}/callback', 'Auth\SocialLoginController@callback');

$router->resource('tasks', 'TasksController');
