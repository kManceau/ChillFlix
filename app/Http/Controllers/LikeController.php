<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\User;
use App\Pagination\FavoritesMoviesPaginator;
use App\Pagination\FavoritesTvPaginator;
use App\Services\TmdbApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function addLike($user_id, $tmdb_id, $type, $title)
    {
        if($user_id == 'none'){
            return redirect()->route('login');
        } else {
            $user = User::find($user_id);
            $like = new Like([
                    'tmdb_id' => $tmdb_id,
                    'type' => $type,
                    'title' => $title,
                ]
            );
            $user->likes()->save($like);
            return redirect()->back();
        }
    }
    public function removeLike($user_id, $tmdb_id, $type)
    {
        if($user_id == 'none'){
            return redirect()->route('login');
        } else{
            $user = User::find($user_id);
            $like = $user->likes()->where(['tmdb_id' => $tmdb_id, 'type' => $type]);
            $like->delete();
            return redirect()->back();
        }
    }

    public function favorites($moviePage, $tvPage, TmdbApiService $apiService)
    {
        $moviesLiked = Auth::user()->likes->filter(function ($like) {
            return $like->type === 'movie';
        })->toArray();
        $tvsLiked = Auth::user()->likes->filter(function ($like) {
            return $like->type === 'tv';
        })->toArray();
        usort($moviesLiked, function ($a, $b) {
            return strcmp($a['title'], $b['title']);
        });
        usort($tvsLiked, function ($a, $b) {
            return strcmp($a['title'], $b['title']);
        });

        $movieOffset = ($moviePage - 1) * 16;
        $moviesForPage = array_slice($moviesLiked, $movieOffset, 16);
        $movies = [];
        foreach ($moviesForPage as $movie) {
            array_push($movies, $apiService->getMovie($movie['tmdb_id']));
        }
        $moviePaginator = new FavoritesMoviesPaginator($movies, count($moviesLiked), 16, $moviePage);

        $tvOffset = ($tvPage - 1) * 16;
        $tvForPage = array_slice($tvsLiked, $tvOffset, 16);
        $tvs = [];
        foreach ($tvForPage as $tv) {
            array_push($tvs, $apiService->getTvShow($tv['tmdb_id']));
        }
        $tvPaginator = new FavoritesTvPaginator($tvs, count($tvsLiked), 16, $tvPage);
        return view('favorites', compact('movies', 'tvs', 'moviePaginator', 'tvPaginator'));
    }
}
