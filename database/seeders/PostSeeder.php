<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        // Đảm bảo có ít nhất 1 user để gán làm tác giả
        $user = User::first() ?? User::factory()->create();

        // Tạo 10 bài viết mẫu
        for ($i = 1; $i <= 100; $i++) {
            Post::create([
                'tieu_de' => "$i",
                'noi_dung' => Str::random(100),
                'anh_dai_dien' => 'https://via.placeholder.com/150',
                'trang_thai' => ['draft', 'published', 'archived'][rand(0, 2)],
                'ma_tac_gia' => $user->id,
                'ngay_tao' => now()
            ]);
        }
        
    }
    
}
