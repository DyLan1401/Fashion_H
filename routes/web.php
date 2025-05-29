<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CrudUserController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\ContactController;

// Routes cho Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // User Management Routes
    Route::get('/users', [AdminController::class, 'listUser'])->name('users.list');
    Route::get('/users/create', [AdminController::class, 'createUser'])->name('users.create');
    Route::post('/users/create', [AdminController::class, 'postUser'])->name('users.store');
    Route::get('/users/{id}', [AdminController::class, 'readUser'])->name('users.show');
    Route::get('/users/{id}/edit', [AdminController::class, 'updateUser'])->name('users.edit');
    Route::post('/users/{id}/edit', [AdminController::class, 'postUpdateUser'])->name('users.update');
    Route::get('/users/{id}/delete', [AdminController::class, 'deleteUser'])->name('users.delete');

    // Contact Management Routes
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
});

// Public Contact Routes
Route::get('/contact', [ContactController::class, 'create'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Authentication Routes
Route::get('login', [CrudUserController::class, 'login'])->name('login');
Route::post('login', [CrudUserController::class, 'authUser'])->name('user.authUser');
Route::get('signout', [CrudUserController::class, 'signOut'])->name('signout');
Route::get('forgot-password', [CrudUserController::class, 'forgotPasswordForm'])->name('user.forgotPasswordForm');
Route::post('forgot-password', [CrudUserController::class, 'forgotPassword'])->name('user.forgotPassword');

// User Registration Routes
Route::get('create', [CrudUserController::class, 'createUser'])->name('user.createUser');
Route::post('create', [CrudUserController::class, 'postUser'])->name('user.postUser');

// User Profile Routes
Route::get('profile', [CrudUserController::class, 'profile'])->name('user.profile');
Route::post('profile', [CrudUserController::class, 'updateProfile'])->name('user.updateProfile');

// Social Authentication Routes
Route::controller(SocialiteController::class)->group(function () {
    Route::get('auth/{provider}/redirect', 'authProviderRedirect')->name('auth.redirection');
    Route::get('auth/{provider}/callback', 'socialAuthentication')->name('auth.callback');
});

Route::get('list', [CrudUserController::class, 'listUser'])->name('user.list');

Route::get('admin', function () {
    return view('admin');
})->name('admin.dashboard');

Route::get('/', function () {
    return view('welcome');
})->name('home');




// Route::controller(SocialiteController::class)->group(function () {
//     Route::get('auth/{provider}/redirect', 'authProviderRedirect')->name('auth.redirection');
//     Route::get('auth/{provider}/callback', 'socialAuthentication')->name('auth.callback');
// });


// Route::get('login', [CrudUserController::class, 'login'])->name('login');
// Route::post('login', [CrudUserController::class, 'authUser'])->name('user.authUser');

// Route::get('create', [CrudUserController::class, 'createUser'])->name('user.createUser');
// Route::post('create', [CrudUserController::class, 'postUser'])->name('user.postUser');


// Route::get('read', [CrudUserController::class, 'readUser'])->name('user.readUser');

// Route::get('delete', [CrudUserController::class, 'deleteUser'])->name('user.deleteUser');

// Route::get('update', [CrudUserController::class, 'updateUser'])->name('user.updateUser');
// Route::post('update', [CrudUserController::class, 'postUpdateUser'])->name('user.postUpdateUser');

// Route::get('list', [CrudUserController::class, 'listUser'])->name('user.list');

// Route::get('signout', [CrudUserController::class, 'signOut'])->name('signout');

// Route::get('admin', function () {
//     return view('admin');
// })->name('admin.dashboard');

// Route::get('profile', [CrudUserController::class, 'profile'])->name('user.profile');
// Route::post('profile', [CrudUserController::class, 'updateProfile'])->name('user.updateProfile');


// Route::middleware(['auth'])->group(function () {
//     Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
//     Route::post('/profile/change-password', [UserController::class, 'changePassword'])->name('user.changePassword');
// });
