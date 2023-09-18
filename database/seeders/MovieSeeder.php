<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    public function run()
    {
        try {
            if (DB::table('movies')->count() === 0) {
                DB::table('movies')->insert($this->getMovies());
            } else {
                echo "Таблиця 'movies' має записи.";
            }
        } catch (\Exception $e) {
            echo "Помилка при заповненні таблиці 'movies': " . $e->getMessage();
        }
    }

    public static function getMovies()
    {
        return [
            ['title' => 'Фільм 1', 'published' => false, 'poster_url' => 'https://cdn.pixabay.com/photo/2018/01/24/18/05/background-3104413_1280.jpg'],
            ['title' => 'Фільм 2', 'published' => false, 'poster_url' => 'https://t3.ftcdn.net/jpg/01/91/78/32/240_F_191783282_0TVrx5VrvrkpDHSKdjjI87HkbXJy5TMw.jpg'],
            ['title' => 'Фільм 3', 'published' => false, 'poster_url' => 'https://t4.ftcdn.net/jpg/05/49/86/39/240_F_549863991_6yPKI08MG7JiZX83tMHlhDtd6XLFAMce.jpg'],
        ];        
    }
}
