<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiscountController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('dashboard', [CrudUserController::class, 'dashboard']);

Route::get('login', [CrudUserController::class, 'login'])->name('login');
Route::post('login', [CrudUserController::class, 'authUser'])->name('user.authUser');

Route::get('create', [CrudUserController::class, 'createUser'])->name('user.createUser');
Route::post('create', [CrudUserController::class, 'postUser'])->name('user.postUser');

Route::get('read', [CrudUserController::class, 'readUser'])->name('user.readUser');

Route::get('delete', [CrudUserController::class, 'deleteUser'])->name('user.deleteUser');

Route::get('update', [CrudUserController::class, 'updateUser'])->name('user.updateUser');
Route::post('update', [CrudUserController::class, 'postUpdateUser'])->name('user.postUpdateUser');

Route::get('list', [CrudUserController::class, 'listUser'])->name('user.list');
//Roles
Route::get('role', [RoleController::class, 'role'])->name('user.role');
//profile
Route::get('/profile/{id}', [ProfileUserController::class, 'show'])->name('profile.show');
//order
Route::get('/orders/user/{id}', [OrderController::class, 'ordersByUser'])->name('orders.byUser');

Route::get('signout', [CrudUserController::class, 'signOut'])->name('signout');

Route::resource('discounts', DiscountController::class);
Route::get('/', function () {
    return view('welcome');
});
