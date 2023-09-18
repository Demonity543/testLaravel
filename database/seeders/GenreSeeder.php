<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    public function run()
    {
        try {
            if (DB::table('genres')->count() === 0) {
                DB::table('genres')->insert($this->getGenres());
            } else {
                echo "Таблиця 'genres' має записи.";
            }
        } catch (\Exception $e) {
            echo "Помилка при заповненні таблиці 'genres': " . $e->getMessage();
        }
    }

    public static function getGenres()
    {
        return [
            ['name' => 'Action'],
            ['name' => 'Drama'],
            ['name' => 'Comedy'],
            ['name' => 'Science Fiction'],
            ['name' => 'Horror'],
            ['name' => 'Adventure'],
            ['name' => 'Romance'],
            ['name' => 'Fantasy'],
            ['name' => 'Mystery'],
        ];
    }
}


