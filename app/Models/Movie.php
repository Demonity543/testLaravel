<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['title', 'published', 'poster_url'];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'movie_genre', 'movie_id', 'genre_id');
    }

    public function updateMovie($data)
    {
        $this->update([
            'title' => $data['title'],
            'published' => $data['published'],
            'poster_url' => $data['poster_url'],
        ]);
    }

    public function deleteMovie()
    {
        $this->genres()->detach();
        
        $this->delete();
    }
}
