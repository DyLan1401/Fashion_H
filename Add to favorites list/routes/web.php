<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\FavoriteController;

Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
Route::get('/favorites/create', [FavoriteController::class, 'create'])->name('favorites.create');
Route::post('/favorites', [FavoriteController::class, 'store'])->name('favorites.store');
