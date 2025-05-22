<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Favorite;

class FavoriteSeeder extends Seeder
{
    public function run()
    {
        Favorite::create([
            'user_name' => 'Nguyễn Văn A',
            'product_name' => 'Sản phẩm A',
        ]);
        Favorite::create([
            'user_name' => 'Trần Thị B',
            'product_name' => 'Sản phẩm B',
        ]);
    }
}