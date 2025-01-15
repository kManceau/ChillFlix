@extends('layouts.app')

@section('content')
    <section class="item-container">
        <div class="item-image-background" style="background-image:url('https://image.tmdb.org/t/p/original{{ $item['backdrop_path'] }}');"></div>
        <img src="https://image.tmdb.org/t/p/w500{{ $item['poster_path'] }}" alt="Affiche de {{ $item['title'] }}" class="item-poster">
        <div class="item-infos">
            <h2>{{$item['title']}}</h2>
            <div class="item-genre">
                @foreach ($item['genres'] as $genre)
                    <p class="genre">{{ $genre['name'] }}</p>
                @endforeach
            </div>
            <div class="item-icons">
                <a href="#" title="Ajouter aux favoris"><i class="bi bi-star"></i></a>
                <a href="#" title="Ajouter à la watchlist"><i class="bi bi-stopwatch"></i></a>
            </div>
            <p class="item-overview">{{ $item['overview'] }}</p>
        </div>
    </section>
@endsection
