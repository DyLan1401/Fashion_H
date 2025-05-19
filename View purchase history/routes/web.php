<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\PurchaseHistoryController;

Route::get('/purchase-histories', [PurchaseHistoryController::class, 'index'])->name('purchase_histories.index');
