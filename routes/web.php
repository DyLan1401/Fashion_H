<?php

use App\Models\Categories;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user/home/index');
});

// Route::get('/category',[
//     Categories::class,
//     'index'
// ]);