<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class PostSeeder extends Seeder
{
    public function run()
     {
        $faker = \Faker\Factory::create('vi_VN');

        foreach (range(1, 20) as $i) {
            $imageUrl = 'https://via.placeholder.com/300x200.png?text=Demo';
            $imageContents = file_get_contents($imageUrl);
            $filename = 'img/' . Str::random(10) . '.png';
            file_put_contents(public_path($filename), $imageContents);

            DB::table('posts')->insert([
                'tieu_de' => $faker->sentence,
                'noi_dung' => $faker->paragraph,
                'anh_dai_dien' => $filename,
                'trang_thai_bai_viet' => $faker->randomElement(['Đã duyệt', 'Chờ duyệt', 'Từ chối']),
                'ma_tac_gia' => $faker->numberBetween(1, 2),
                'ngay_tao' => now(),
            ]);
        }
}
}
