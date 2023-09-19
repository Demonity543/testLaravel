<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Support\Facades\DB;
use Database\Seeders\MovieSeeder;
use App\Models\Genre;
use App\Http\Requests\MovieRequest;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index', compact('movies'));
    }

    public function watch()
    {
        $movies = Movie::paginate(10);
        return response()->json($movies);
    }

    public function showAll(Movie $movie)
    {
        return response()->json($movie);
    }

    public function create()
    {
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }

    public function store(MovieRequest $request)
    {
        $genres = $request->input('genres');
        if (!$genres) {
            return redirect()->back()->with('error', 'Будь ласка, виберіть хоча б один жанр для фільму.');
        }

        $movie = Movie::create([
            'title' => $request->input('title'),
            'published' => $request->input('published'),
            'poster_url' => $request->input('poster_url'),
        ]);

        $movie->genres()->sync($genres);

        return redirect()->route('movies.index')->with('success', 'Фільм успішно створено.');
    }

    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        return view('movies.show', compact('movie'));
    }

    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        $genres = Genre::all();
        return view('movies.edit', compact('movie', 'genres'));
    }

    public function seedMovies()
    {
        try {
            $seededMovies = MovieSeeder::getMovies();

            $existingMovies = DB::table('movies')->pluck('title')->toArray();

            $moviesToAdd = array_filter($seededMovies, function ($movie) use ($existingMovies) {
                return !in_array($movie['title'], $existingMovies);
            });

            if (!empty($moviesToAdd)) {
                DB::table('movies')->insert($moviesToAdd);
                session()->flash('success', 'Сід MovieSeeder успішно виконано. Додано нові фільми.');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Дані в таблиці "movies" вже існують.');
        }

        return redirect()->back();
    }

    public function update(MovieRequest $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->update([
            'title' => $request->input('title'),
            'published' => $request->input('published'),
            'poster_url' => $request->input('poster_url'),
        ]);

        $selectedGenres = $request->input('genres') ?? [];
        $movie->genres()->sync($selectedGenres);

        return redirect()->route('movies.index')->with('success', 'Фільм успішно оновлено.');
    }

    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);

        if ($movie->published == 1) {
            return redirect()->route('movies.index')->with('error', 'Цей фільм опублікований і не може бути видалений.');
        }

        if ($movie->genres()->count() > 0) {
            $movie->genres()->detach();
        }

        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Фільм успішно видалено.');
    }
}
