<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ChillFlix</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="container mx-auto film-container">
        <h2 class="text-white">Films :</h2>
        <div class="movie-card-container">
        @foreach($popularMovies as $movie)
            <div class="movie-card">
                <img src="https://image.tmdb.org/t/p/w200/{{$movie['poster_path']}}" alt="">
                <p class="text-white">{{$movie['title']}}</p>
            </div>
        @endforeach
        </div>
    </div>
</body>
</html>
