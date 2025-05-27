<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiscountController;

Route::get('/discount/apply', [DiscountController::class, 'showApplyForm'])->name('discounts.showForm');
Route::post('/discount/apply', [DiscountController::class, 'applyDiscount'])->name('discounts.apply');

Route::get('/', function () {
    return view('welcome');
});
