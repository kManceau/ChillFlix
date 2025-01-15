@extends('layouts.app')

@section('content')
    <section class="movie-container">
        <div class="movie-image-background" style="background-image:url('https://image.tmdb.org/t/p/original{{ $movie['backdrop_path'] }}');"></div>
        <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="Affiche de {{ $movie['title'] }}" class="movie-poster">
        <div class="movie-infos">
            <h2>{{$movie['title']}}</h2>
        </div>
    </section>
@endsection
