<?php

use App\Http\Controllers\CartItemController;
use App\Http\Controllers\ProductsController;
use App\Models\Categories;
use Illuminate\Support\Facades\Route;


// Public Routes
Route::get('/', function () {
    return view('welcome');
})->name('home');




// Social Authentication Routes
Route::controller(SocialiteController::class)->group(function () {
    Route::get('auth/{provider}/redirect', 'authProviderRedirect')->name('auth.redirection');
    Route::get('auth/{provider}/callback', 'socialAuthentication')->name('auth.callback');
});

// Authenticated User Routes
Route::middleware('auth')->group(function () {
    Route::get('signout', [CrudUserController::class, 'signOut'])->name('signout');
    Route::get('profile', [CrudUserController::class, 'profile'])->name('user.profile');
    Route::post('profile', [CrudUserController::class, 'updateProfile'])->name('user.updateProfile');
    Route::get('list', [CrudUserController::class, 'listUser'])->name('user.list');

    // Cart Routes
    Route::prefix('cart')->name('user.cart.')->group(function () {
        Route::get('/', [CartItemController::class, 'index'])->name('index');
        Route::post('/store', [CartItemController::class, 'store'])->name('store');
        Route::post('/update-quantity', [CartItemController::class, 'updateQuantity'])->name('updateQuantity');
        Route::post('/remove/{id}', [CartItemController::class, 'remove'])->name('remove');
    });

    // Discount Routes
    Route::get('/discount/apply', [ApplyDiscountController::class, 'showApplyForm'])->name('discounts.showForm');
    Route::post('/discount/apply', [ApplyDiscountController::class, 'applyDiscount'])->name('discounts.apply');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // User Management
    Route::get('/users', [AdminController::class, 'listUser'])->name('users.list');
    Route::get('/users/create', [AdminController::class, 'createUser'])->name('users.create');
    Route::post('/users', [CrudUserController::class, 'storeUser'])->name('users.store');
    Route::get('/users/{id}', [AdminController::class, 'readUser'])->name('users.show');
    Route::get('/users/{id}/edit', [AdminController::class, 'updateUser'])->name('users.edit');
    Route::post('/users/{id}/edit', [AdminController::class, 'postUpdateUser'])->name('users.update');
    Route::get('/users/{id}/delete', [AdminController::class, 'deleteUser'])->name('users.delete');

    // Product Management
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

    // Contact Management
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
});

// Resource Routes
Route::resource('discounts', DiscountController::class);
Route::resource('posts', PostController::class);

