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

Route::prefix('api')->group(function () {
    //GET http://localhost:8000/api/genres
    Route::get('genres', 'GenreController@watch');

    //GET http://localhost:8000/api/genres/{genre_id}/movies
    Route::get('genres/{genre}/movies', 'GenreController@showMovies');

    //GET http://localhost:8000/api/movies
    Route::get('movies', 'MovieController@watch');

    //GET http://localhost:8000/api/movies/{movie_id}
    Route::get('movies/{movie}', 'MovieController@showAll');
});