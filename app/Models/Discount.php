<?php


// use Illuminate\Database\Eloquent\Model;

// class Discount extends Model
// {
//     protected $table = 'discounts';
//     public $timestamps = false; // Tắt timestamps mặc định
//     protected $dates = ['ngay_tao', 'ngay_het_han_giam_gia'];
//     protected $fillable = [
//         'phan_tram_giam_gia',
//         'loai_giam_gia',
//         'gia_tri_don_hang_toi_thieu',
//         'so_lan_su_dung_toi_da',
//         'so_lan_da_su_dung',
//         'ngay_het_han_giam_gia',
//         'ngay_tao',
//     ];
// }


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
