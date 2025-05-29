<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts = Discount::all();
        return view('discounts.index', compact('discounts'));
    }

    public function create()
    {
        return view('discounts.create');
    }

   public function store(Request $request)
{
    $request->validate([
        'phan_tram_giam_gia' => 'required|numeric|min:0|max:100',
        'gia_tri_don_hang_toi_thieu' => 'nullable|numeric|min:0',
        'so_lan_su_dung_toi_da' => 'nullable|integer|min:1',
        'ngay_het_han_giam_gia' => 'required|date|after_or_equal:now', // Thay đổi ở đây
    ]);

    Discount::create([
        'phan_tram_giam_gia' => $request->phan_tram_giam_gia,
        'loai_giam_gia' => 'percentage',
        'gia_tri_don_hang_toi_thieu' => $request->gia_tri_don_hang_toi_thieu,
        'so_lan_su_dung_toi_da' => $request->so_lan_su_dung_toi_da,
        'so_lan_da_su_dung' => 0,
        'ngay_het_han_giam_gia' => $request->ngay_het_han_giam_gia,
        'ngay_tao' => now(),
    ]);

    return redirect()->route('discounts.index')->with('success', 'Tạo mã giảm giá thành công!');
}

    public function edit(Discount $discount)
{
    return view('discounts.edit', compact('discount'));
}

    public function update(Request $request, Discount $discount)
    {
        $request->validate([
            'phan_tram_giam_gia' => 'required|numeric|min:0|max:100',
            'gia_tri_don_hang_toi_thieu' => 'nullable|numeric|min:0',
            'so_lan_su_dung_toi_da' => 'nullable|integer|min:1',
            'ngay_het_han_giam_gia' => 'required|date|after:now',
        ]);

        $discount->update([
            'phan_tram_giam_gia' => $request->phan_tram_giam_gia,
            'gia_tri_don_hang_toi_thieu' => $request->gia_tri_don_hang_toi_thieu,
            'so_lan_su_dung_toi_da' => $request->so_lan_su_dung_toi_da,
            'ngay_het_han_giam_gia' => $request->ngay_het_han_giam_gia,
        ]);

        return redirect()->route('discounts.index')->with('success', 'Cập nhật mã giảm giá thành công!');
    }

    public function destroy(Discount $discount)
    {
        $discount->delete();
        return redirect()->route('discounts.index')->with('success', 'Xóa mã giảm giá thành công!');
    }
}