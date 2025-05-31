<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory;


class PostSeeder extends Seeder
{
    public function run()
     {
       $faker = Factory::create('vi_VN');

        foreach (range(1, 20) as $i) {
            // Dùng ảnh mặc định có sẵn trong /public/images/default.jpg
            $filename = 'images/default.jpg';

            DB::table('posts')->insert([
                'tieu_de' => $faker->sentence,
                'noi_dung' => $faker->paragraph,
                'anh_dai_dien' => $filename,
               'trang_thai_bai_viet' => $faker->randomElement(['Chờ duyệt', 'Đã duyệt', 'Từ chối']),
                'ma_tac_gia' => rand(1,5),
                'ngay_tao' => now(),
            ]);
        }
}
}
