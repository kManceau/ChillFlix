<?php

namespace App\Http\Controllers;

use App\Services\TmdbApiService;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(TmdbApiService $apiService)
    {
        $upcomingMovies = $apiService->getUpcomingMovies();
        $popularMovies = $apiService->getMostPopularMovies();
        return view('home', compact('upcomingMovies', 'popularMovies'));
    }
}
