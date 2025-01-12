<?php

namespace App\Http\Controllers;

use App\Services\TmdbApiService;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(TmdbApiService $apiService)
    {
        $popularMovies = $apiService->getMostPopularMovies();
        return view('home', compact('popularMovies'));
    }
}
