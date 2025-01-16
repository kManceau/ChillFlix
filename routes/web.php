<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('home');
Route::get('/movie/{id}', [App\Http\Controllers\MainController::class, 'movie'])->name('movie');
Route::get('/tv/{id}', [App\Http\Controllers\MainController::class, 'tv'])->name('tv');
Route::get('movies/{page}', [App\Http\Controllers\MainController::class, 'movieList'])->name('movieList');
Route::get('tvs/{page}', [App\Http\Controllers\MainController::class, 'tvList'])->name('tvList');
//Route::get('')
Auth::routes();
