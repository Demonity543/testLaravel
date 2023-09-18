<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\MovieSeeder;
use Database\Seeders\GenreSeeder;

class MovieGenreSeeder extends Seeder
{
    public function run()
    {
        try {
            $movies = MovieSeeder::getMovies();
            $genres = GenreSeeder::getGenres();
            foreach ($movies as $movie) {
                foreach ($genres as $genre) {
                    DB::table('movie_genre')->insert([
                        'movie_id' => 1,
                        'genre_id' => 2,
                    ]);
                }
            }
        } catch (\Exception $e) {
            echo "Помилка при заповненні таблиці 'movie_genre': " . $e->getMessage();
        }
    }
}

