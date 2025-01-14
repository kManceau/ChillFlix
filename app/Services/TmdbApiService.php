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
          'primary_release_date.lte' => date('Y-m-d'),
          'sort_by' => 'primary_release_date.desc',
          'vote_count.gte' => '10',
          'page' => '1'
        ]);
        return $response->json()['results'];
    }

    public function getMostPopularMovies()
    {
        $response = Http::get('https://api.themoviedb.org/3/discover/movie', [
          'api_key' => $this->apiKey,
          'language' => 'fr-FR',
          'sort_by' => 'vote_count.desc',
          'page' => '1'
        ]);
        return $response->json()['results'];
    }

    public function getLastTvShows()
    {
        $response = Http::get('https://api.themoviedb.org/3/discover/tv', [
          'api_key' => $this->apiKey,
          'language' => 'fr-FR',
          'sort_by' => 'first_air_date.desc',
          'vote_count.gte' => '10',
          'page' => '1'
        ]);
        return $response->json()['results'];
    }

    public function getMostPopularTvShows()
    {
        $response = Http::get('https://api.themoviedb.org/3/discover/tv', [
          'api_key' => $this->apiKey,
          'language' => 'fr-FR',
          'sort_by' => 'vote_count.desc',
          'page' => '1'
        ]);
        return $response->json()['results'];
    }

}
