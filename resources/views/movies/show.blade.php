<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/view.css') }}">
    <title>Фільм: {{ $movie->title }}</title>
</head>
<body>
    <div class="container">
        <h2>Фільм: {{ $movie->title }}</h2>
        <p><strong>Назва фільму:</strong> {{ $movie->title }}</p>
        <p><strong>Опублікований:</strong> {{ $movie->published ? 'Так' : 'Ні' }}</p>
        <p><strong>Посилання на постер:</strong> {{ $movie->poster_url }}</p>
        <br>
        <a href="{{ route('movies.index') }}" class="btn btn-primary">Повернутися до списку фільмів</a>
    </div>
</body>
</html>
