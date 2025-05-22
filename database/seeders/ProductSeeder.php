<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create(['name' => 'Sản phẩm A', 'price' => 100000]);
        Product::create(['name' => 'Sản phẩm B', 'price' => 200000]);
    }
}