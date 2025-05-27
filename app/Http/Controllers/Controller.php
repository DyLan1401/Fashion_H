<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


abstract class Controller
{
    //
    public function applyDiscount(Request $request)
{
    $code = $request->input('discount_code');

    if (!$this->isDiscountValid($code)) {
        return back()->with('error', 'Mã giảm giá không hợp lệ hoặc đã hết hạn.');
    }

    // Tiếp tục xử lý đơn hàng...
}

}

