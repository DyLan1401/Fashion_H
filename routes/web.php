<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiscountServiceController;


Route::post('/discount/check', [DiscountServiceController::class, 'checkDiscountCode'])->name('discount.check');

Route::get('/discount/check', [DiscountServiceController::class, 'showForm']);


Route::get('/', function () {
    return view('welcome');
});
