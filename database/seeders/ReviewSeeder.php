<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    public function run()
    {
        Review::create([
            'name' => 'Nguyễn Văn A',
            'email' => 'a@example.com',
            'rating' => 5,
            'content' => 'Sản phẩm chất lượng, giao hàng nhanh!',
            'avatar' => 'https://randomuser.me/api/portraits/lego/1.jpg',
        ]);
        Review::create([
            'name' => 'Trần Thị B',
            'email' => 'b@example.com',
            'rating' => 4,
            'content' => 'Hài lòng, nhưng đóng gói hơi sơ sài.',
            'avatar' => 'https://randomuser.me/api/portraits/lego/2.jpg',
        ]);
    }
}