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

Route::prefix('discounts')->group(function () {
    Route::get('/', [DiscountController::class, 'index'])->name('discounts.index'); // Danh sách

    Route::get('/create', [DiscountController::class, 'create'])->name('discounts.create'); // Form tạo mới
    Route::post('/', [DiscountController::class, 'store'])->name('discounts.store'); // Lưu mới

   Route::get('/discounts/{discount_id}/edit', [DiscountController::class, 'edit'])->name('discounts.edit');
Route::put('/discounts/{discount_id}', [DiscountController::class, 'update'])->name('discounts.update');

    Route::delete('/{id}', [DiscountController::class, 'destroy'])->name('discounts.destroy'); // Xóa
});

Route::get('/', function () {
    return view('welcome');
});
