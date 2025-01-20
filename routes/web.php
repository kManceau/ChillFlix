<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/movie/{id}', [App\Http\Controllers\HomeController::class, 'movie'])->name('movie');
Route::get('/tv/{id}', [App\Http\Controllers\HomeController::class, 'tv'])->name('tv');
Route::get('/movies/{page}', [App\Http\Controllers\HomeController::class, 'movieList'])->name('movieList');
Route::get('/tvs/{page}', [App\Http\Controllers\HomeController::class, 'tvList'])->name('tvList');
Route::get('/search', [App\Http\Controllers\SearchController::class, 'search'])->name('search');
Route::get('/like/{user_id}/{tmdb_id}/{type}/{title}', [App\Http\Controllers\LikeController::class, 'addLike'])->name('like');
Route::get('/unlike/{user_id}/{tmdb_id}/{type}/{title}', [App\Http\Controllers\LikeController::class, 'removeLike'])->name('unlike');
Route::get('/fav/{moviePage}/{tvPage}', [\App\Http\Controllers\LikeController::class, 'favorites'])
    ->name('favorites')
    ->middleware('auth');
Route::get('/watch/{user_id}/{tmdb_id}/{type}', [App\Http\Controllers\WatchlistController::class, 'addWatched'])->name('watch');
Route::get('/unwatch/{user_id}/{tmdb_id}/{type}', [App\Http\Controllers\WatchlistController::class, 'removeWatched'])->name('unwatch');
Route::get('/watchlist/{moviePage}/{tvPage}', [App\Http\Controllers\WatchlistController::class, 'watchlist'])
    ->name('watchlist')
    ->middleware('auth');
Route::get('/account', [App\Http\Controllers\HomeController::class, 'account'])
    ->name('account')
    ->middleware('auth');
Route::post('/account/edit', [App\Http\Controllers\UserController::class, 'editUser'])->name('edit_account');
Route::get('/account/delete_avatar', [App\Http\Controllers\UserController::class, 'deleteAvatar'])->name('delete_avatar');

Route::get('/get/moviesearch/{query}', [App\Http\Controllers\SearchController::class, 'getMovieSearch']);
Route::get('/get/tvsearch/{query}', [App\Http\Controllers\SearchController::class, 'getTvSearch']);
Route::get('/comment/add', [App\Http\Controllers\CommentController::class, 'addComment'])->name('add_comment');
Route::get('/comment/delete/{commentId}', [App\Http\Controllers\CommentController::class, 'deleteComment'])->name('delete_comment');

Route::get('/admin/', [App\Http\Controllers\AdminController::class, 'home'])
    ->name('admin_home')
    ->middleware('auth');

Route::get('/admin/users', [App\Http\Controllers\AdminController::class, 'user'])
    ->name('admin_users')
    ->middleware('auth');
Route::get('/admin/user/{userId}', [App\Http\Controllers\AdminController::class, 'editUser'])
    ->name('admin_user_edit')
    ->middleware('auth');
Route::post('/admin/user/update/{userId}', [App\Http\Controllers\AdminController::class, 'updateUser'])
    ->name('admin_update_user')
    ->middleware('auth');
Route::get('/admin/user/avatar/{userId}', [App\Http\Controllers\AdminController::class, 'adminDeleteAvatar'])
    ->name('admin_delete_avatar')
    ->middleware('auth');
Route::get('/admin/user/delete/{userId}', [App\Http\Controllers\AdminController::class, 'adminDeleteUser'])
    ->name('admin_delete_user')
    ->middleware('auth');
Auth::routes();
