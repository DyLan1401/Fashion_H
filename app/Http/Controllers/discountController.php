<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function showApplyForm()
    {
        return view('discounts.apply');
    }

    public function applyDiscount(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'total' => 'required|numeric|min:1',
        ]);

        $code = $request->input('code');
        $total = $request->input('total');

        // Tìm mã giảm giá theo ID (ở đây ID được dùng làm mã)
        $discount = Discount::find($code);

        if (!$discount) {
            return back()->with('error', 'Mã giảm giá không tồn tại.');
        }

        // Kiểm tra ngày hết hạn
        if (Carbon::now()->greaterThan($discount->ngay_het_han_giam_gia)) {
            return back()->with('error', 'Mã giảm giá đã hết hạn.');
        }

        // Kiểm tra số lần sử dụng tối đa
        if ($discount->so_lan_su_dung_toi_da && $discount->so_lan_da_su_dung >= $discount->so_lan_su_dung_toi_da) {
            return back()->with('error', 'Mã giảm giá đã được sử dụng tối đa.');
        }

        // Kiểm tra điều kiện tổng đơn hàng
        if ($discount->gia_tri_don_hang_toi_thieu && $total < $discount->gia_tri_don_hang_toi_thieu) {
            return back()->with('error', 'Đơn hàng chưa đủ điều kiện để áp mã.');
        }

        // Tính số tiền giảm
        $discountAmount = $discount->loai_giam_gia === 'percentage'
            ? ($total * $discount->phan_tram_giam_gia / 100)
            : $discount->phan_tram_giam_gia;

        $discountAmount = min($discountAmount, $total); // Không giảm quá tổng đơn hàng

        return back()->with([
            'success' => 'Áp mã thành công!',
            'discount' => $discountAmount,
            'total_after_discount' => $total - $discountAmount,
        ]);
    }
}
