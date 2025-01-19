@extends('layouts.app')

@section('styles')
    @vite('resources/sass/item_view.scss')
@endsection

@section('content')
    <section class="item-container">
        <div class="item-image-background" style="background-image:url('https://image.tmdb.org/t/p/original{{ $item['backdrop_path'] }}');"></div>
        <img src="https://image.tmdb.org/t/p/w500{{ $item['poster_path'] }}" alt="Affiche de {{ $item['title'] ?? $item['name'] }}" class="item-poster">
        <div class="item-infos container-fluid">
            <h2>{{ $item['title'] ?? $item['name'] }}</h2>
            <div class="item-genre">
                @foreach ($item['genres'] as $genre)
                    <p class="genre">{{ $genre['name'] }}</p>
                @endforeach
            </div>
            <div class="item-icons">
                @auth
                    @if(Auth::user()->hasLiked($item['id'], array_key_exists('original_title', $item) ? 'movie' : 'tv'))
                        <a href="{{route('unlike', ['user_id' => Auth::user()->id, 'tmdb_id' => $item['id'], 'type' => array_key_exists('original_title', $item) ? 'movie' : 'tv'])}}" title="Supprimer des favoris">
                            <i class="bi bi-star-fill"></i>
                        </a>
                    @else
                        <a href="{{route('like', ['user_id' => Auth::user()->id, 'tmdb_id' => $item['id'], 'type' => array_key_exists('original_title', $item) ? 'movie' : 'tv'])}}" title="Ajouter aux favoris">
                            <i class="bi bi-star"></i>
                        </a>
                    @endif
                @else
                    <a href="{{route('like', ['user_id' => 'none', 'tmdb_id' => $item['id'], 'type' => array_key_exists('original_title', $item) ? 'movie' : 'tv'])}}" title="Ajouter aux favoris">
                        <i class="bi bi-star"></i>
                    </a>
                @endauth
                    @auth
                        @if(Auth::user()->hasWatched($item['id'], array_key_exists('original_title', $item) ? 'movie' : 'tv'))
                            <a href="{{route('unwatch', ['user_id' => Auth::user()->id, 'tmdb_id' => $item['id'], 'type' => array_key_exists('original_title', $item) ? 'movie' : 'tv'])}}" title="Supprimer de la watchlist">
                                <i class="bi bi-stopwatch-fill"></i>
                            </a>
                        @else
                            <a href="{{route('watch', ['user_id' => Auth::user()->id, 'tmdb_id' => $item['id'], 'type' => array_key_exists('original_title', $item) ? 'movie' : 'tv'])}}" title="Ajouter à la watchlist">
                                <i class="bi bi-stopwatch"></i>
                            </a>
                        @endif
                    @else
                        <a href="{{route('watch', ['user_id' => 'none', 'tmdb_id' => $item['id'], 'type' => array_key_exists('original_title', $item) ? 'movie' : 'tv'])}}" title="Ajouter à la watchlist">
                            <i class="bi bi-stopwatch"></i>
                        </a>
                    @endauth
            </div>
            <p class="item-overview">{{ $item['overview'] }}</p>
        </div>
    </section>
@endsection
