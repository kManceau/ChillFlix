@php
    \Carbon\Carbon::setLocale('fr');
@endphp

@extends('layouts.app')

@section('styles')
    @vite('resources/sass/item_view.scss')
@endsection

@section('content')
    <section class="item-container">
        <div class="item-image-background"
             style="background-image:url('https://image.tmdb.org/t/p/original{{ $item['backdrop_path'] }}');"></div>
        <img src="https://image.tmdb.org/t/p/w500{{ $item['poster_path'] }}"
             alt="Affiche de {{ $item['title'] ?? $item['name'] }}" class="item-poster">
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
                        <a href="{{route('unlike', ['user_id' => Auth::user()->id, 'tmdb_id' => $item['id'], 'type' => array_key_exists('original_title', $item) ? 'movie' : 'tv', 'title' => $item['title'] ?? $item['name']])}}"
                           title="Supprimer des favoris">
                            <i class="bi bi-star-fill"></i>
                        </a>
                    @else
                        <a href="{{route('like', ['user_id' => Auth::user()->id, 'tmdb_id' => $item['id'], 'type' => array_key_exists('original_title', $item) ? 'movie' : 'tv', 'title' => $item['title'] ?? $item['name']])}}"
                           title="Ajouter aux favoris">
                            <i class="bi bi-star"></i>
                        </a>
                    @endif
                @else
                    <a href="{{route('like', ['user_id' => 'none', 'tmdb_id' => $item['id'], 'type' => array_key_exists('original_title', $item) ? 'movie' : 'tv', 'title' => $item['title'] ?? $item['name']])}}"
                       title="Ajouter aux favoris">
                        <i class="bi bi-star"></i>
                    </a>
                @endauth
                @auth
                    @if(Auth::user()->hasWatched($item['id'], array_key_exists('original_title', $item) ? 'movie' : 'tv'))
                        <a href="{{route('unwatch', ['user_id' => Auth::user()->id, 'tmdb_id' => $item['id'], 'type' => array_key_exists('original_title', $item) ? 'movie' : 'tv'])}}"
                           title="Supprimer de la watchlist">
                            <i class="bi bi-stopwatch-fill"></i>
                        </a>
                    @else
                        <a href="{{route('watch', ['user_id' => Auth::user()->id, 'tmdb_id' => $item['id'], 'type' => array_key_exists('original_title', $item) ? 'movie' : 'tv'])}}"
                           title="Ajouter à la watchlist">
                            <i class="bi bi-stopwatch"></i>
                        </a>
                    @endif
                @else
                    <a href="{{route('watch', ['user_id' => 'none', 'tmdb_id' => $item['id'], 'type' => array_key_exists('original_title', $item) ? 'movie' : 'tv'])}}"
                       title="Ajouter à la watchlist">
                        <i class="bi bi-stopwatch"></i>
                    </a>
                @endauth
            </div>
            <p class="item-overview">{{ $item['overview'] }}</p>
        </div>
    </section>
    <section id="item-comments-container">
        <div class="container-fluid">
            <h2>Commentaires ({{$comments->count()}}) :</h2>
            <div class="comments-container">
                @foreach($comments as $comment)
                    <div class="comment">
                        <div class="alert alert-dark">
                            @if($comment->user->avatar)
                                <picture>
                                    <source srcset="{{ asset('storage/avatar/'.$comment->user->avatar.'.avif') }}" type="image/avif">
                                    <source srcset="{{ asset('storage/avatar/'.$comment->user->avatar.'.webp') }}" type="image/webp">
                                    <img src="{{ asset('storage/avatar/'.$comment->user->avatar.'.jpg') }}" alt="Picture of {{$comment->user->name}}" class="img-fluid avatar" loading="lazy" />
                                </picture>
                            @endif
                                {{$comment->comment}}
                        </div>
                        <div class="comment-infos">
                            <div class="comment-user-date">
                                <p>Posté par <span>{{$comment->user->name}}</span> le <span>{{$comment->created_at->translatedFormat('l d F Y')}} à {{$comment->created_at->format('H:i')}}</span></p>
                            </div>
                            <div class="comment-report">
                                @auth
                                    @if(Auth::user()->id == $comment->user->id or Auth::user()->role == 'admin')
                                        <a href="{{route('delete_comment', $comment->id)}}">Supprimer</a>
                                    @else
                                        <a href="#">Signaler</a>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @auth
                <form action="{{route('add_comment')}}">
                    <input type="hidden" name="tmdb_id" value="{{$item['id']}}">
                    <input type="hidden" name="type" value="{{array_key_exists('original_title', $item) ? 'movie' : 'tv'}}">
                    <div class="form-group">
                        <label for="comment" class="form-label">Poster un commentaire :</label>
                        <textarea name="comment" id="comment" class="form-control" placeholder="Tapez votre commentaire"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn">Poster le commentaire</button>
                    </div>

                </form>
            @else
                <p>Vous devez être connecté pour poster un commentaire.</p>
                <a href="{{route("login")}}">Se connecter.</a>
            @endauth
        </div>
    </section>
@endsection
