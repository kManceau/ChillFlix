<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('home');
Route::get('/movie/{id}', [App\Http\Controllers\MainController::class, 'movie'])->name('movie');
Auth::routes();
