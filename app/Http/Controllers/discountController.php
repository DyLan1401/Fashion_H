<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    // Hiển thị danh sách mã giảm giá
    public function index()
    {
        $discounts = Discount::all();
        return view('discounts.index', compact('discounts'));
    }

    // Hiển thị form tạo mã giảm giá mới
    public function create()
    {
        return view('discounts.create');
    }

    // Lưu mã giảm giá mới vào CSDL
    public function store(Request $request)
    {
        $request->validate([
            'ma_giam_gia' => 'required|unique:discounts,ma_giam_gia',
            'phan_tram_giam_gia' => 'required|numeric|min:0|max:100',
            'loai_giam_gia' => 'required|in:percentage,fixed',
            'gia_tri_don_hang_toi_thieu' => 'nullable|numeric|min:0',
            'so_lan_su_dung_toi_da' => 'nullable|integer|min:0',
            'ngay_het_han_giam_gia' => 'required|date',
        ]);

        Discount::create($request->all());

        return redirect()->route('discounts.index')->with('thong_bao', 'Thêm mã giảm giá thành công!');
    }

    // Hiển thị form chỉnh sửa mã giảm giá
    public function edit($id)
    {
        $giamgia = Discount::findOrFail($id);
        return view('discounts.edit', compact('giamgia'));
    }

    // Cập nhật mã giảm giá
    public function update(Request $request, $id)
    {
        $request->validate([
            'ma_giam_gia' => 'required|unique:discounts,ma_giam_gia,' . $id,
            'phan_tram_giam_gia' => 'required|numeric|min:0|max:100',
            'loai_giam_gia' => 'required|in:percentage,fixed',
            'gia_tri_don_hang_toi_thieu' => 'nullable|numeric|min:0',
            'so_lan_su_dung_toi_da' => 'nullable|integer|min:0',
            'ngay_het_han_giam_gia' => 'required|date',
        ]);

        $giamgia = Discount::findOrFail($id);
        $giamgia->update($request->all());

        return redirect()->route('discounts.index')->with('thong_bao', 'Cập nhật thành công!');
    }

    // Xóa mã giảm giá
    public function destroy($id)
    {
        $giamgia = Discount::findOrFail($id);
        $giamgia->delete();

        return redirect()->route('discounts.index')->with('thong_bao', 'Xóa mã giảm giá thành công!');
    }
    public function show($id)
{
    $giamgia = Discount::findOrFail($id);
    return view('discounts.show', compact('giamgia'));
}

}
