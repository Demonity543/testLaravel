<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/view.css') }}">
    <title>Список жанрів</title>
</head>
<body>
    <div class="container">
        <h2>Список жанрів</h2>
        <a href="{{ route('genres.create') }}" class="btn btn-primary">Додати жанр</a>
        <a href="{{ route('seed-genres') }}" class="btn btn-primary">Запустити сідер</a>
        <h3>Увага! Щоб дані загрузились за допомогою сідера потрібно щоб у вас список жанрів був пустий</h3>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Назва жанру</th>
                    <th>Дії</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($genres as $genre)
                <tr>
                    <td>{{ $genre->id }}</td>
                    <td>{{ $genre->name }}</td>
                    <td>
                        <a href="{{ route('genres.show', $genre->id) }}" class="btn btn-info">Переглянути</a>
                        <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-warning">Редагувати</a>
                        <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Видалити</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger mt-3">
                {{ session('error') }}
            </div>
        @endif
    </div>
    <div style="text-align: center; margin-top: 20px;">
        <a href="/" class="btn btn-primary">На головну сторінку</a>
    </div>
</body>
</html>
