<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

// Routes cho User
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'authUser'])->name('user.authUser');
Route::get('signout', [UserController::class, 'signOut'])->name('signout');
Route::get('forgot-password', [UserController::class, 'forgotPasswordForm'])->name('user.forgotPasswordForm');
Route::post('forgot-password', [UserController::class, 'forgotPassword'])->name('user.forgotPassword');

Route::get('create', [UserController::class, 'createUser'])->name('user.createUser');
Route::post('create', [UserController::class, 'postUser'])->name('user.postUser');
Route::get('read', [UserController::class, 'readUser'])->name('user.readUser');
Route::get('update', [UserController::class, 'updateUser'])->name('user.updateUser');
Route::post('update', [UserController::class, 'postUpdateUser'])->name('user.postUpdateUser');


// Routes cho Admin
Route::group(['middleware' => ['web', 'auth', 'admin']], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/manageUser', [AdminController::class, 'listUser'])->name('admin.users.list');
    Route::get('/admin/users/create', [AdminController::class, 'createUser'])->name('admin.users.create');
    Route::post('/admin/users/create', [AdminController::class, 'postUser'])->name('admin.users.store');
    Route::get('/admin/users/{id}', [AdminController::class, 'readUser'])->name('admin.users.show');
    Route::get('/admin/users/{id}/edit', [AdminController::class, 'updateUser'])->name('admin.users.edit');
    Route::post('/admin/users/{id}/edit', [AdminController::class, 'postUpdateUser'])->name('admin.users.update');
    Route::get('/admin/users/{id}/delete', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
});



