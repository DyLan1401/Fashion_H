<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductReview;

class ProductReviewSeeder extends Seeder
{
    public function run()
    {
        ProductReview::create([
            'product_name' => 'Sản phẩm A',
            'reviewer_name' => 'Nguyễn Văn A',
            'content' => 'Sản phẩm rất tốt!',
            'rating' => 5,
        ]);
        ProductReview::create([
            'product_name' => 'Sản phẩm B',
            'reviewer_name' => 'Trần Thị B',
            'content' => 'Chất lượng ổn, giao hàng nhanh.',
            'rating' => 4,
        ]);
    }
}