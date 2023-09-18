<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/view.css') }}">
    <title>Список фільмів</title>
</head>
<body>
    <div class="container">
        <h2>Список фільмів</h2>
        <a href="{{ route('movies.create') }}" class="btn btn-primary">Додати фільм</a>
        <a href="{{ route('seed-movies') }}" class="btn btn-primary">Запустити сідер</a>
        <h3>Увага! Щоб дані загрузились за допомогою сідера потрібно щоб у вас список фільмів був пустий</h3>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Назва фільму</th>
                    <th>Опублікований</th>
                    <th>Посилання на постер</th>
                    <th>Жанр</th>
                    <th>Дії</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                <tr>
                    <td>{{ $movie->id }}</td>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->published ? 'Так' : 'Ні' }}</td>
                    <td>
                        @if ($movie->poster_url)
                            <img src="{{ $movie->poster_url }}" alt="Не вдалось знайти фото для: {{ $movie->title }}" width="100">
                        @else
                            <img src="{{ asset('img/back.jpg') }}" alt="Стандартне фото" width="100">
                        @endif
                    </td>
                    <td>
                        @if ($movie->genres->isEmpty())
                            Не вибраний
                        @else
                            @foreach ($movie->genres as $genre)
                                {{ $genre->name }}
                                @if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-info">Переглянути</a>
                        <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning">Редагувати</a>
                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" style="display: inline;">
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
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <br>
        <a href="/" class="btn btn-secondary">На головну сторінку</a>
    </div>
</body>
</html>
