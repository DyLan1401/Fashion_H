<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = 'discounts'; // Tên bảng trong DB

    protected $primaryKey = 'ma_giam_gia'; // Khóa chính

    public $incrementing = false; // Nếu ID không phải auto-increment

   protected $fillable = [
    'ma_giam_gia',
    'phan_tram_giam_gia',
    'loai_giam_gia',
    'gia_tri_don_hang_toi_thieu',
    'so_lan_su_dung_toi_da',
    'ngay_het_han_giam_gia',
];

// protected $casts = [
//     'ngay_het_han_giam_gia' => 'datetime',
// ];


//     public $timestamps = false; // Nếu không có created_at, updated_at
 }
