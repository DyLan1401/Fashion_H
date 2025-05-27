<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discount;
use Carbon\Carbon;

class DiscountServiceController extends Controller{
public function checkDiscountCode(Request $request)
{
    $request->validate([
        'code' => 'required|string',
        'order_value' => 'required|numeric',
    ]);

    $discount = Discount::where('id', $request->code)->first();

    if (!$discount) {
        return back()->with('error', 'Mã giảm giá không tồn tại.');
    }

    if ($discount->discount_expiry_date && Carbon::now()->gt(Carbon::parse($discount->discount_expiry_date))) {
        return back()->with('error', 'Mã giảm giá đã hết hạn.');
    }

    if ($discount->usage_limit !== null && $discount->usage_count >= $discount->usage_limit) {
        return back()->with('error', 'Mã giảm giá đã đạt giới hạn sử dụng.');
    }

    if ($request->order_value < $discount->min_order_value) {
        return back()->with('error', 'Đơn hàng chưa đạt giá trị tối thiểu.');
    }

    return back()->with('success', 'Mã giảm giá hợp lệ!');
}


public function showForm()
{
    return view('discount.check');
}

}