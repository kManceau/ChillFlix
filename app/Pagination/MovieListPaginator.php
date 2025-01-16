<?php

namespace App\Pagination;

use Illuminate\Pagination\LengthAwarePaginator;

class MovieListPaginator extends LengthAwarePaginator
{
    public function url($page)
    {
        return url("movies/{$page}");
    }
}
