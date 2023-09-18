<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/view.css') }}">
    <title>Редагування фільму: {{ $movie->title }}</title>
</head>
<body>
    <div class="container">
        <h2>Редагування фільму: {{ $movie->title }}</h2>
        <form action="{{ route('movies.update', $movie->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Назва фільму:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $movie->title }}" required>
            </div>
            <div class="form-group">
                <label for="genres">Виберіть жанр:</label>
                <select class="form-control" id="genres" name="genres[]" multiple required>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}" {{ in_array($genre->id, $movie->genres->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="published">Опублікований:</label>
                <select class="form-control" id="published" name="published" required>
                    <option value="1" {{ $movie->published ? 'selected' : '' }}>Так</option>
                    <option value="0" {{ !$movie->published ? 'selected' : '' }}>Ні</option>
                </select>
            </div>
            <div class="form-group">
                <label for="poster_url">Посилання на постер:</label>
                <input type="url" class="form-control" id="poster_url" name="poster_url" value="{{ $movie->poster_url }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Зберегти зміни</button>
        </form>
        <br>
        <a href="{{ route('movies.index') }}" class="btn btn-secondary mt-2">Скасувати</a>
    </div>
</body>
</html>
