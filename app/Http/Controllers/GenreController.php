<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Support\Facades\DB;
use Database\Seeders\GenreSeeder;
use App\Http\Requests\GenreRequest;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return view('genres.index', compact('genres'));
    }

    public function create()
    {
        return view('genres.create');
    }

    public function store(GenreRequest $request)
    {
        $genre = new Genre([
            'name' => $request->input('name'),
        ]);

        $genre->save();

        return redirect()->route('genres.index')->with('success', 'Жанр успішно створено.');
    }

    public function show($id)
    {
        $genre = Genre::findOrFail($id);
        return view('genres.show', compact('genre'));
    }

    public function edit($id)
    {
        $genre = Genre::findOrFail($id);
        return view('genres.edit', compact('genre'));
    }

    public function seedGenres()
    {
        try {
            $seededGenres = GenreSeeder::getGenres();

            $existingGenres = DB::table('genres')->pluck('name')->toArray();

            $genresToAdd = array_diff($seededGenres, $existingGenres);

            if (!empty($genresToAdd)) {
                DB::table('genres')->insert(
                    array_map(function ($genre) {
                        return ['name' => $genre];
                    }, $genresToAdd)
                );
                session()->flash('success', 'Сід GenreSeeder успішно виконано. Додано нові жанри.');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Дані в таблиці "genres" вже існують.');
        }

        return redirect()->back();
    }

    public function update(GenreRequest $request, $id)
    {
        $genre = Genre::findOrFail($id);
        $genre->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('genres.index')->with('success', 'Жанр успішно оновлено.');
    }

    public function destroy($id)
    {
        $genre = Genre::findOrFail($id);

        if ($genre->movies()->count() > 0) {
            return redirect()->route('genres.index')->with('error', 'Цей жанр має зв\'язані фільми і не може бути видалений.');
        }

        if ($genre->delete()) {
            return redirect()->route('genres.index')->with('success', 'Жанр успішно видалено.');
        } else {
            return redirect()->route('genres.index')->with('error', 'Не вдалося видалити жанр.');
        }
    }
}