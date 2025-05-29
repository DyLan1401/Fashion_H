<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'Áo khoác mùa đông Limonda',
                'price' => 1190000,
                'image' => 'https://via.placeholder.com/300x300'
            ],
            [
                'name' => 'Áo khoác mùa thu Limonda',
                'price' => 2190000,
                'image' => 'https://via.placeholder.com/300x300'
            ],
            [
                'name' => 'Áo khoác mùa xuân Limonda',
                'price' => 3190000,
                'image' => 'https://via.placeholder.com/300x300'
            ],
            [
                'name' => 'Áo khoác mùa hè Limonda',
                'price' => 4190000,
                'image' => 'https://via.placeholder.com/300x300'
            ],
            [
                'name' => 'Áo sơ mi thời trang',
                'price' => 890000,
                'image' => 'https://via.placeholder.com/300x300'
            ],
        ];

        foreach ($products as $p) {
            Product::create($p);
        }
    }
}