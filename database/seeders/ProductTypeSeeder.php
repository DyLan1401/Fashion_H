<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = DB::table('categories')->select('id', 'category_name')->get()->keyBy('category_name');

        $product_types = [
            ['type_name' => 'Áo thun nam', 'category_name' => 'Áo thun'],
            ['type_name' => 'Áo thun nữ', 'category_name' => 'Áo thun'],
            ['type_name' => 'Áo thun unisex', 'category_name' => 'Áo thun'],
            ['type_name' => 'Quần jeans skinny', 'category_name' => 'Quần jeans'],
            ['type_name' => 'Quần jeans boyfriend', 'category_name' => 'Quần jeans'],
            ['type_name' => 'Quần jeans ống suông', 'category_name' => 'Quần jeans'],
            ['type_name' => 'Áo sơ mi nam công sở', 'category_name' => 'Áo sơ mi'],
            ['type_name' => 'Áo sơ mi nữ', 'category_name' => 'Áo sơ mi'],
            ['type_name' => 'Áo sơ mi flannel', 'category_name' => 'Áo sơ mi'],
            ['type_name' => 'Quần short kaki', 'category_name' => 'Quần short'],
            ['type_name' => 'Quần short thể thao', 'category_name' => 'Quần short'],
            ['type_name' => 'Quần short denim', 'category_name' => 'Quần short'],
            ['type_name' => 'Áo khoác bomber', 'category_name' => 'Áo khoác'],
            ['type_name' => 'Áo khoác parka', 'category_name' => 'Áo khoác'],
            ['type_name' => 'Áo khoác cardigan', 'category_name' => 'Áo khoác'],
            ['type_name' => 'Váy maxi', 'category_name' => 'Váy'],
            ['type_name' => 'Váy bodycon', 'category_name' => 'Váy'],
            ['type_name' => 'Váy chữ A', 'category_name' => 'Váy'],
            ['type_name' => 'Áo thể thao nam', 'category_name' => 'Đồ thể thao'],
            ['type_name' => 'Quần thể thao nữ', 'category_name' => 'Đồ thể thao'],
            ['type_name' => 'Đồ bộ thể thao', 'category_name' => 'Đồ thể thao'],
            ['type_name' => 'Mũ lưỡi trai', 'category_name' => 'Phụ kiện'],
            ['type_name' => 'Khăn choàng', 'category_name' => 'Phụ kiện'],
            ['type_name' => 'Túi tote', 'category_name' => 'Phụ kiện'],
        ];

        $data = [];
        foreach ($product_types as $product_type) {
            $data[] = [
                'type_name' => $product_type['type_name'],
                'category_id' => $categories[$product_type['category_name']]->id,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('product_types')->insert($data);
    }
}
