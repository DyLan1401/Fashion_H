<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = 'discounts'; // Tên bảng trong database

    protected $fillable = [
        'loai_giam_gia',               // 'percentage' hoặc 'fixed'
        'phan_tram_giam_gia',          // số % hoặc số tiền giảm
        'gia_tri_don_hang_toi_thieu',  // giá trị đơn hàng tối thiểu
        'so_lan_su_dung_toi_da',       // giới hạn số lần dùng
        'so_lan_da_su_dung',           // đã dùng bao nhiêu lần
        'ngay_het_han_giam_gia',       // ngày hết hạn
    ];

    protected $dates = ['ngay_het_han_giam_gia']; // hỗ trợ so sánh ngày bằng Carbon
}
