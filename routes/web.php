<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiscountController;

Route::get('/discount/apply', [DiscountController::class, 'showApplyForm'])->name('discounts.showForm');
Route::post('/discount/apply', [DiscountController::class, 'applyDiscount'])->name('discounts.apply');
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CrudUserController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\ContactController;

// Public Routes
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
// */

// Route::get('dashboard', [CrudUserController::class, 'dashboard']);

// Route::get('login', [CrudUserController::class, 'login'])->name('login');
// Route::post('login', [CrudUserController::class, 'authUser'])->name('user.authUser');

// Route::get('create', [CrudUserController::class, 'createUser'])->name('user.createUser');
// Route::post('create', [CrudUserController::class, 'postUser'])->name('user.postUser');

// Route::get('read', [CrudUserController::class, 'readUser'])->name('user.readUser');

// Route::get('delete', [CrudUserController::class, 'deleteUser'])->name('user.deleteUser');

// Route::get('update', [CrudUserController::class, 'updateUser'])->name('user.updateUser');
// Route::post('update', [CrudUserController::class, 'postUpdateUser'])->name('user.postUpdateUser');

// Route::get('list', [CrudUserController::class, 'listUser'])->name('user.list');
// //Roles
// Route::get('role', action: [RoleController::class, 'role'])->name('user.role');
// //profile
// Route::get('/profile/{id}', [ProfileUserController::class, 'show'])->name('profile.show');
// //order
// Route::get('/orders/user/{id}', [OrderController::class, 'ordersByUser'])->name('orders.byUser');

// Route::get('signout', [CrudUserController::class, 'signOut'])->name('signout');

Route::resource('discounts', DiscountController::class);
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('login', [CrudUserController::class, 'login'])->name('login');
    Route::post('login', [CrudUserController::class, 'authUser'])->name('user.authUser');
    Route::get('create', [CrudUserController::class, 'createUser'])->name('user.createUser');
    Route::post('create', [CrudUserController::class, 'postUser'])->name('user.postUser');
    Route::get('forgot-password', [CrudUserController::class, 'forgotPasswordForm'])->name('user.forgotPasswordForm');
    Route::post('forgot-password', [CrudUserController::class, 'forgotPassword'])->name('user.forgotPassword');
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::get('signout', [CrudUserController::class, 'signOut'])->name('signout');
    Route::get('profile', [CrudUserController::class, 'profile'])->name('user.profile');
    Route::post('profile', [CrudUserController::class, 'updateProfile'])->name('user.updateProfile');
    Route::get('list', [CrudUserController::class, 'listUser'])->name('user.list');
});

// Admin Routes
// Frontend routes
Route::get('/contact', [ContactController::class, 'create'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // User Management Routes
    Route::get('/users', [AdminController::class, 'listUser'])->name('users.list');
    Route::get('/users/create', [AdminController::class, 'createUser'])->name('users.create');
    Route::post('/users', [CrudUserController::class, 'storeUser'])->name('users.store');
    Route::get('/users/{id}', [AdminController::class, 'readUser'])->name('users.show');
    Route::get('/users/{id}/edit', [AdminController::class, 'updateUser'])->name('users.edit');
    Route::post('/users/{id}/edit', [AdminController::class, 'postUpdateUser'])->name('users.update');
    Route::get('/users/{id}/delete', [AdminController::class, 'deleteUser'])->name('users.delete');

    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');

});
// Social Authentication Routes
Route::controller(SocialiteController::class)->group(function () {
    Route::get('auth/{provider}/redirect', 'authProviderRedirect')->name('auth.redirection');
    Route::get('auth/{provider}/callback', 'socialAuthentication')->name('auth.callback');
});
