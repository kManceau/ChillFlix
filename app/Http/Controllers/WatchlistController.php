<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\User;
use App\Models\Watchlist;
use App\Pagination\FavoritesMoviesPaginator;
use App\Pagination\FavoritesTvPaginator;
use App\Services\TmdbApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WatchlistController extends Controller
{
    public function addWatched($user_id, $tmdb_id, $type)
    {
        if($user_id == 'none'){
            return redirect()->route('login');
        } else {
            $user = User::find($user_id);
            $watched = new Watchlist([
                    'tmdb_id' => $tmdb_id,
                    'type' => $type,
                ]
            );
            $user->watched()->save($watched);
            return redirect()->back();
        }
    }
    public function removeWatched($user_id, $tmdb_id, $type)
    {
        if($user_id == 'none'){
            return redirect()->route('login');
        } else{
            $user = User::find($user_id);
            $watched = $user->watched()->where(['tmdb_id' => $tmdb_id, 'type' => $type]);
            $watched->delete();
            return redirect()->back();
        }
    }

    public function watchlist($moviePage, $tvPage, TmdbApiService $apiService)
    {
        $moviesWatched = Auth::user()->watched->filter(function ($like) {
            return $like->type === 'movie';
        })->toArray();
        $tvsWatched = Auth::user()->watched->filter(function ($like) {
            return $like->type === 'tv';
        })->toArray();
        usort($moviesWatched, function ($a, $b) {
            return strcmp($a['title'], $b['title']);
        });
        usort($tvsWatched, function ($a, $b) {
            return strcmp($a['title'], $b['title']);
        });

        $movieOffset = ($moviePage - 1) * 16;
        $moviesForPage = array_slice($moviesWatched, $movieOffset, 16);
        $movies = [];
        foreach ($moviesForPage as $movie) {
            array_push($movies, $apiService->getMovie($movie['tmdb_id']));
        }
        $moviePaginator = new FavoritesMoviesPaginator($movies, count($moviesWatched), 16, $moviePage);

        $tvOffset = ($tvPage - 1) * 16;
        $tvForPage = array_slice($tvsWatched, $tvOffset, 16);
        $tvs = [];
        foreach ($tvForPage as $tv) {
            array_push($tvs, $apiService->getTvShow($tv['tmdb_id']));
        }
        $tvPaginator = new FavoritesTvPaginator($tvs, count($tvsWatched), 16, $tvPage);
        return view('watchlist', compact('movies', 'tvs', 'moviePaginator', 'tvPaginator'));
    }
}
