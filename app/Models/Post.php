<?php
// app/Models/Post.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    public $timestamps = false; // Vì bạn dùng `ngay_tao` thủ công

    protected $fillable = [
        'tieu_de',
        'noi_dung',
        'anh_dai_dien',
        'trang_thai',
        'ma_tac_gia',
    ];

    public function tacGia()
    {
        return $this->belongsTo(User::class, 'ma_tac_gia');
    }
}

