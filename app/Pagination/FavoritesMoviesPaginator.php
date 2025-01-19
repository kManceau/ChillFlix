<?php

namespace App\Pagination;

use Illuminate\Pagination\LengthAwarePaginator;

class FavoritesMoviesPaginator extends LengthAwarePaginator
{
    public function url($moviePage)
    {
        $url = $_SERVER['PHP_SELF'];
        $url = explode('/', $url);
        $tvPage = end($url);
        return url("fav/{$moviePage}/{$tvPage}");
    }
}
