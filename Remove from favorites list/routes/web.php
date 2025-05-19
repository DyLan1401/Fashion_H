<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\ProductReviewController;

Route::get('/product-reviews', [ProductReviewController::class, 'index'])->name('product_reviews.index');
Route::get('/product-reviews/create', [ProductReviewController::class, 'create'])->name('product_reviews.create');
Route::post('/product-reviews', [ProductReviewController::class, 'store'])->name('product_reviews.store');
use App\Http\Controllers\RemoveFavoriteController;

Route::get('/remove-favorites', [RemoveFavoriteController::class, 'index'])->name('remove_favorites.index');
Route::get('/remove-favorites/create', [RemoveFavoriteController::class, 'create'])->name('remove_favorites.create');
Route::post('/remove-favorites', [RemoveFavoriteController::class, 'store'])->name('remove_favorites.store');