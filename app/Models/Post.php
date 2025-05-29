<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'ma_bai_viet';
    public $timestamps = false;

    protected $fillable = [
        'tieu_de',
        'noi_dung',
        'anh_dai_dien',
        'trang_thai_bai_viet',
        'ma_tac_gia',
        'ngay_tao',
    ];

    public function tacGia()
    {
        return $this->belongsTo(User::class, 'ma_tac_gia', 'id');
    }
}