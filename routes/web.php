<?php
use App\Http\Controllers\RevenueController;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ProductsController;
use App\Models\Categories;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudUserController;
use App\Http\Controllers\SocialiteController;

Route::get('/', function () {

    return view('user/home/index');
})->name('/');
Route::get('shop',[ProductsController::class, 'index'])->name('shop');
Route::get('shop/{id}',[ProductsController::class, 'show'])->name('show');
Route::get('admin',[ProductsController::class, 'getProductList'])->name('admin.get');

// Route::get('/category',[
//     Categories::class,
//     'index'
// ]);


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/products', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('products.index');
    Route::post('/products', [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', [App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('products.destroy');
});

    return view('welcome');
})->name('home');


Route::controller(SocialiteController::class)->group(function () {
    Route::get('auth/{provider}/redirect', 'authProviderRedirect')->name('auth.redirection');
    Route::get('auth/{provider}/callback', 'socialAuthentication')->name('auth.callback');
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


Route::get('/revenues', [RevenueController::class, 'index'])->name('revenues.index');
Route::get('/revenues/create', [RevenueController::class, 'create'])->name('revenues.create');
Route::post('/revenues', [RevenueController::class, 'store'])->name('revenues.store');
