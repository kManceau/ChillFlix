@extends('layouts.app')

@section('content')
    <section id="new-movies-container" class="container-fluid">
        <h2>Dernières sorties films :</h2>
        <div class="cards-container">
            @foreach($lastMovies as $movie)
                <a href="{{ route('movie', $movie['id']) }}" class="cards">
                    <h3 class="h5 cards-title">{{$movie['original_title']}}</h3>
                    <img src="https://image.tmdb.org/t/p/w500/{{$movie['poster_path']}}"
                         alt="Affiche de {{ $movie['original_title'] }}" class="cards-img">
                </a>
            @endforeach
        </div>
    </section>
    <section id="popular-movies-container" class="container-fluid">
        <h2>Films Populaires :</h2>
        <div class="cards-container">
            @foreach($popularMovies as $movie)
                <a href="{{ route('movie', $movie['id']) }}" class="cards">
                    <h3 class="h5 cards-title">{{$movie['original_title']}}</h3>
                    <img src="https://image.tmdb.org/t/p/w500/{{$movie['poster_path']}}"
                         alt="Affiche de {{ $movie['original_title'] }}" class="cards-img">
                </a>
            @endforeach
        </div>
    </section>
    <section id="new-tv-container" class="container-fluid">
        <h2>Nouveautés Séries :</h2>
        <div class="cards-container">
            @foreach($lastTvShows as $tv)
                <a href="{{ route('tv', $tv['id']) }}" class="cards">
                    <h3 class="h5 cards-title">{{$tv['original_name']}}</h3>
                    <img src="https://image.tmdb.org/t/p/w500/{{$tv['poster_path']}}" alt="Affiche de {{ $tv['original_name'] }}"
                         class="cards-img">
                </a>
            @endforeach
        </div>
    </section>
    <section id="popular-tv-container" class="container-fluid">
        <h2>Séries Populaires :</h2>
        <div class="cards-container">
            @foreach($popularTvShows as $tv)
                <a href="{{ route('tv', $tv['id']) }}" class="cards">
                    <h3 class="h5 cards-title">{{$tv['original_name']}}</h3>
                    <img src="https://image.tmdb.org/t/p/w500/{{$tv['poster_path']}}" alt="Affiche de {{ $tv['original_name'] }}"
                         class="cards-img">
                </a>
            @endforeach
        </div>
    </section>
@endsection
