<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/view.css') }}">
    <title>Редагувати жанр: {{ $genre->name }}</title>
</head>
<body>
    <div class="container">
        <h2>Редагувати жанр: {{ $genre->name }}</h2>
        <form action="{{ route('genres.update', $genre->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Назва жанру</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $genre->name }}">
            </div>
            <button type="submit" class="btn btn-primary">Зберегти зміни</button>
        </form>
        <br>
        <a href="{{ route('genres.index') }}" class="btn btn-secondary">Назад до списку</a>
    </div>
</body>
</html>
