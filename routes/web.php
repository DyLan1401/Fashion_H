<?php

use App\Http\Controllers\ProductsController;
use App\Models\Categories;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user/home/index');
})->name('/');
Route::get('shop',[ProductsController::class, 'index'])->name('shop');
Route::get('shop/{id}',[ProductsController::class, 'show'])->name('show');
// Route::get('/category',[
//     Categories::class,
//     'index'
// ]);