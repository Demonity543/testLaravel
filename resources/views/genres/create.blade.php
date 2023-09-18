<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/view.css') }}">
    <title>Створити новий жанр</title>
</head>
<body>
    <div class="container">
        <h2>Створити новий жанр</h2>
        <form action="{{ route('genres.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Назва жанру</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <button type="submit" class="btn btn-primary">Створити</button>
        </form>
        <br>
        <a href="{{ route('genres.index') }}" class="btn btn-secondary">Назад до списку</a>
    </div>
</body>
</html>
