<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

// Routes cho User
use App\Http\Controllers\CrudUserController;
use App\Http\Controllers\SocialiteController;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::controller(SocialiteController::class)->group(function () {
    Route::get('auth/{provider}/redirect', 'authProviderRedirect')->name('auth.redirection');
    Route::get('auth/{provider}/callback', 'socialAuthentication')->name('auth.callback');
});


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
Route::get('login', [CrudUserController::class, 'login'])->name('login');
Route::post('login', [CrudUserController::class, 'authUser'])->name('user.authUser');

Route::get('create', [CrudUserController::class, 'createUser'])->name('user.createUser');
Route::post('create', [CrudUserController::class, 'postUser'])->name('user.postUser');


Route::get('read', [CrudUserController::class, 'readUser'])->name('user.readUser');

Route::get('delete', [CrudUserController::class, 'deleteUser'])->name('user.deleteUser');

Route::get('update', [CrudUserController::class, 'updateUser'])->name('user.updateUser');
Route::post('update', [CrudUserController::class, 'postUpdateUser'])->name('user.postUpdateUser');

Route::get('list', [CrudUserController::class, 'listUser'])->name('user.list');

Route::get('signout', [CrudUserController::class, 'signOut'])->name('signout');

Route::get('admin', function () {
    return view('admin');
})->name('admin.dashboard');

Route::get('profile', [CrudUserController::class, 'profile'])->name('user.profile');
Route::post('profile', [CrudUserController::class, 'updateProfile'])->name('user.updateProfile');



