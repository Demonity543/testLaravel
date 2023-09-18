<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/view.css') }}">
    <title>Створення нового фільму</title>
</head>
<body>
<div class="container">
    <h2>Створення нового фільму</h2>
    <form action="{{ route('movies.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Назва фільму:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="published">Опублікований:</label>
            <select class="form-control" id="published" name="published" required>
                <option value="1">Так</option>
                <option value="0">Ні</option>
            </select>
        </div>
        <div class="form-group">
            <label for="poster_url">Посилання на постер:</label>
            <input type="url" class="form-control" id="poster_url" name="poster_url" required>
        </div>
        <div class="form-group">
            <label for="genres">Виберіть жанр:</label>
            <select class="form-control" id="genres" name="genres[]" multiple required>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Створити фільм</button>
    </form>
    <br>
    <a href="{{ route('movies.index') }}" class="btn btn-secondary mt-2">Скасувати</a>
</div>
</body>
</html>
