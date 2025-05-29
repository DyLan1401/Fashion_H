<?php
use App\Http\Controllers\OrderController;

Route::get('/order-history', [OrderController::class, 'history'])->name('orders.history');