<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupportController;

Route::get('/', function () {
    return view('welcome');
});
// 1. Support Online


Route::resource('supports', SupportController::class);
