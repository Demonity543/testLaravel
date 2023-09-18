<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('genres', GenreController::class);
Route::resource('movies', MovieController::class);
Route::get('/seed-genres', 'GenreController@seedGenres')->name('seed-genres');
Route::get('/seed-movies', 'MovieController@seedMovies')->name('seed-movies');
