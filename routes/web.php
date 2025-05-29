<?php
use App\Http\Controllers\RevenueController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/revenue', [RevenueController::class, 'index'])->name('revenue.index');