<?php
use App\Http\Controllers\ProductController;

Route::middleware('auth')->group(function() {
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/wishlist', [ProductController::class, 'wishlist'])->name('products.wishlist');
    Route::post('/favorite/{id}', [ProductController::class, 'toggleFavorite'])->name('products.favorite');
});