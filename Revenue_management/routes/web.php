<?php
use App\Http\Controllers\RevenueController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/revenues', [RevenueController::class, 'index'])->name('revenues.index');
Route::get('/revenues/create', [RevenueController::class, 'create'])->name('revenues.create');
Route::post('/revenues', [RevenueController::class, 'store'])->name('revenues.store');