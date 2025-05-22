<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Áo thun',
            'Quần jeans',
            'Áo sơ mi',
            'Quần short',
            'Áo khoác',
            'Váy',
            'Đồ thể thao',
            'Phụ kiện',
        ];

        $data = [];
        foreach ($categories as $category_name) {
            $data[] = [
                'category_name' => $category_name,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('categories')->insert($data);
    }
}
