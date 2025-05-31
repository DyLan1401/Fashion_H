<?php

use App\Http\Controllers\ProductsController;
use App\Models\Categories;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ApplyDiscountController;


use App\Http\Controllers\ApplyDis;
Route::get('/discount/apply', [ApplyDiscountController::class, 'showApplyForm'])->name('discounts.showForm');
Route::post('/discount/apply', [ApplyDiscountController::class, 'applyDiscount'])->name('discounts.apply');
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

Route::get('shop',[ProductsController::class, 'index'])->name('shop');
Route::get('shop/{id}',[ProductsController::class, 'show'])->name('show');
Route::get('admin',[ProductsController::class, 'getProductList'])->name('admin.get');
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/products', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('products.index');
    Route::post('/products', [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', [App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('products.destroy');});

Route::resource('discounts', DiscountController::class);
// Route::prefix('discounts')->group(function () {
//     Route::get('/', [DiscountController::class, 'index'])->name('discounts.index');
//     Route::get('/create', [DiscountController::class, 'create'])->name('discounts.create');
//     Route::post('/', [DiscountController::class, 'store'])->name('discounts.store');
//     Route::get('/{discount_id}', [DiscountController::class, 'show'])->name('discounts.show');
//     Route::get('/{discount_id}/edit', [DiscountController::class, 'edit'])->name('discounts.edit');
//     Route::put('/{discount}', [DiscountController::class, 'update'])->name('discounts.update');
//     Route::delete('/{discount}', [DiscountController::class, 'destroy'])->name('discounts.destroy');
// });

Route::resource('posts', PostController::class);
// Route::prefix('posts')->group(function () {
//     Route::get('/', [PostController::class, 'index'])->name('posts.index');
//     Route::get('/create', [PostController::class, 'create'])->name('posts.create');
//     Route::post('/', [PostController::class, 'store'])->name('posts.store');
//     Route::get('/{post}', [PostController::class, 'show'])->name('posts.show');
//     Route::get('/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
//     Route::put('/{post}', [PostController::class, 'update'])->name('posts.update');
//     Route::delete('/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
// });

