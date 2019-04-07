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

Route::get('/teams/new', 'TeamController@create')->middleware('auth');
Route::post('/teams', 'TeamController@store')->middleware('auth');
Route::get('/teams', 'TeamController@index')->name('teams.index');
Route::get('/teams/{team}', 'TeamController@show');
Route::delete('/teams/{id}', 'TeamController@destroy')->middleware('auth')->name('teams.delete');

Route::get('/players/new', 'PlayerController@create')->middleware('auth');
Route::post('/players', 'PlayerController@store')->middleware('auth');

Route::get('/games/new', 'GameController@create')->middleware('auth');
Route::post('/games', 'GameController@store')->middleware('auth');
Route::get('/games/{game}', 'GameController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
