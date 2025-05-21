<?php

use App\Http\Controllers\ProductsController;
use App\Models\Categories;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user/home/index');
})->name('/');
Route::get('shop',[ProductsController::class, 'index'])->name('shop');
Route::get('shop/{id}',[ProductsController::class, 'show'])->name('show');
Route::get('admin',[ProductsController::class, 'getProductList'])->name('admin.get');

// Route::get('/category',[
//     Categories::class,
//     'index'
// ]);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/products', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('products.index');
    Route::post('/products', [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', [App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('products.destroy');
});