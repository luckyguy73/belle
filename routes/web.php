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

Route::get('/games', function () {
    return view('games.index');
})->name('games.index');

Route::get('/games/ask', function () {
    return view('games.ask');
})->name('games.ask');

Route::get('/games/codebreaker', function () {
    return view('games.codebreaker');
})->name('games.codebreaker');

Route::get('/games/typing', function () {
    return view('games.typing');
})->name('games.typing');

Route::get('/games/rock-paper-scissors', function () {
    return view('games.rock-paper-scissors');
})->name('games.rock-paper-scissors');

Route::post('/exercise', 'ExercisesController@index');

Route::get('/exercise', function () {
    return view('exercise');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login/{service}', 'Auth\SocialLoginController@redirect');
Route::get('/login/{service}/callback', 'Auth\SocialLoginController@callback');

$router->resource('tasks', 'TasksController');
