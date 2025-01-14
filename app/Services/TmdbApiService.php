<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TmdbApiService
{
    protected $apiKey;
    public function __construct()
    {
        $this->apiKey = env('TMDB_API_KEY');
    }

    public function getLastMovies()
    {

        $response = Http::get('https://api.themoviedb.org/3/discover/movie', [
          'api_key' => $this->apiKey,
          'language' => 'fr-FR',
          'region' => 'FR',
          'primary_release_date.lte' => date('Y-m-d'),
          'sort_by' => 'primary_release_date.desc',
          'vote_count.gte' => '10',
          'page' => '1'
        ]);
        return $response->json()['results'];
    }

    public function getMostPopularMovies()
    {
        $response = Http::get('https://api.themoviedb.org/3/movie/popular', [
          'api_key' => $this->apiKey,
          'language' => 'fr-FR',
          'page' => '1'
        ]);
        return $response->json()['results'];
    }

}
