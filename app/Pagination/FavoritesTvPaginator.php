<?php

namespace App\Pagination;

use Illuminate\Pagination\LengthAwarePaginator;

class FavoritesTvPaginator extends LengthAwarePaginator
{
    public function url($tvPage)
    {
        $url = $_SERVER['PHP_SELF'];
        $url = explode('/', $url);
        $moviePage = end($url);
        return url("fav/{$moviePage}/{$tvPage}");
    }
}
