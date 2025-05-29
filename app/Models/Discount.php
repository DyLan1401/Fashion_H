<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = 'discounts';
    public $timestamps = false; // Tắt timestamps mặc định
    protected $dates = ['ngay_tao', 'ngay_het_han_giam_gia'];
    protected $fillable = [
        'phan_tram_giam_gia',
        'loai_giam_gia',
        'gia_tri_don_hang_toi_thieu',
        'so_lan_su_dung_toi_da',
        'so_lan_da_su_dung',
        'ngay_het_han_giam_gia',
        'ngay_tao',
    ];
}