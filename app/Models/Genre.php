<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = ['name'];

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movie_genre');
    }

    public function updateGenre($data)
    {
        $this->update([
            'name' => $data['name'],
        ]);
    }

    public function deleteGenre()
    {
        $this->movies()->detach();

        $this->delete();
    }
}
