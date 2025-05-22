<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RemoveFavorite;

class RemoveFavoriteSeeder extends Seeder
{
    public function run()
    {
        RemoveFavorite::create([
            'user_name' => 'Nguyễn Văn A',
            'product_name' => 'Sản phẩm A',
            'removed_at' => now(),
        ]);
        RemoveFavorite::create([
            'user_name' => 'Trần Thị B',
            'product_name' => 'Sản phẩm B',
            'removed_at' => now(),
        ]);
    }
}