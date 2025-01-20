<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Pagination\FavoritesMoviesPaginator;
use App\Pagination\FavoritesTvPaginator;
use App\Pagination\MovieListPaginator;
use App\Pagination\TvListPaginator;
use App\Services\TmdbApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(TmdbApiService $apiService)
    {
        $lastMovies = $apiService->getLastMovies();
        $popularMovies = $apiService->getMostPopularMovies();
        $lastTvShows = $apiService->getLastTvShows();
        $popularTvShows = $apiService->getMostPopularTvShows();
        return view('home', compact('lastMovies', 'popularMovies', 'lastTvShows', 'popularTvShows'));
    }

    public function movie($id, TmdbApiService $apiService)
    {
        $comments = Comment::where('tmdb_id', $id)->where('type', 'movie')->get();
        $item = $apiService->getMovie($id);
        return view('item', compact('item', 'comments'));
    }

    public function tv($id, TmdbApiService $apiService)
    {
        $comments = Comment::where('tmdb_id', $id)->where('type', 'tv')->get();
        $item = $apiService->getTvShow($id);
        return view('item', compact('item', 'comments'));
    }

    public function movieList($page, TmdbApiService $apiService)
    {
        $items = $apiService->getMovieList($page)['results'];
        $movieCount = $apiService->getMovieList($page)['total_results'];
        $paginator = new MovieListPaginator($items, $movieCount, 20, $page);
        return view('item_list', compact('items', 'paginator'));
    }

    public function tvList($page, TmdbApiService $apiService)
    {
        $items = $apiService->getTvList($page)['results'];
        $tvCount = $apiService->getTvList($page)['total_results'];
        $paginator = new TvListPaginator($items, $tvCount, 20, $page);
        return view('item_list', compact('items', 'paginator'));
    }

    public function account()
    {
        return view('account');
    }
}
