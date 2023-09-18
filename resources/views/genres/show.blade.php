<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/view.css') }}">
    <title>Інформація про жанр</title>
</head>
<body>
    <div class="container">
        <h2>Інформація про жанр</h2>
        <table class="table">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $genre->id }}</td>
                </tr>
                <tr>
                    <th>Назва жанру</th>
                    <td>{{ $genre->name }}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <a href="{{ route('genres.index') }}" class="btn btn-secondary">Назад до списку</a>
    </div>
</body>
</html>
