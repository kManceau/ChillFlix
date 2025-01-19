<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/movie/{id}', [App\Http\Controllers\HomeController::class, 'movie'])->name('movie');
Route::get('/tv/{id}', [App\Http\Controllers\HomeController::class, 'tv'])->name('tv');
Route::get('/movies/{page}', [App\Http\Controllers\HomeController::class, 'movieList'])->name('movieList');
Route::get('/tvs/{page}', [App\Http\Controllers\HomeController::class, 'tvList'])->name('tvList');
Route::get('/search', [App\Http\Controllers\SearchController::class, 'search'])->name('search');
Route::get('/like/{user_id}/{tmdb_id}/{type}', [App\Http\Controllers\LikeController::class, 'addLike'])->name('like');
Route::get('/unlike/{user_id}/{tmdb_id}/{type}', [App\Http\Controllers\LikeController::class, 'removeLike'])->name('unlike');
Route::get('/watch/{user_id}/{tmdb_id}/{type}', [App\Http\Controllers\WatchListController::class, 'addWatched'])->name('watch');
Route::get('/unwatch/{user_id}/{tmdb_id}/{type}', [App\Http\Controllers\WatchListController::class, 'removeWatched'])->name('unwatch');
Route::get('/fav/', [\App\Http\Controllers\HomeController::class, 'favorites'])
    ->name('favorites')
    ->middleware('auth');
Route::get('/account', [App\Http\Controllers\HomeController::class, 'account'])
    ->name('account')
    ->middleware('auth');
Route::post('/account/edit', [App\Http\Controllers\UserController::class, 'editUser'])->name('edit_account');
Route::get('/account/delete_avatar', [App\Http\Controllers\UserController::class, 'deleteAvatar'])->name('delete_avatar');

Route::get('/get/moviesearch/{query}', [App\Http\Controllers\SearchController::class, 'getMovieSearch']);
Route::get('/get/tvsearch/{query}', [App\Http\Controllers\SearchController::class, 'getTvSearch']);
Auth::routes();
