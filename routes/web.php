<?php

use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('home');
//});

Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('home');
