<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h1>Welcome to Test Application</h1>
    <p>Created by Vadim Teslitskiy</p>

    <a href="{{ route('genres.index') }}" class="btn btn-primary">Перейти до жанрів</a>
    <a href="{{ route('movies.index') }}" class="btn btn-success">Перейти до фільмів</a>
</body>
</html>
