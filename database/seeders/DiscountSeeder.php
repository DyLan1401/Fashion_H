<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class DiscountSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 20; $i++) {
            $type = $faker->randomElement(['percentage', 'fixed']);

            DB::table('discounts')->insert([
                'ma_giam_gia' => $i, // nếu là INT làm PK
                'phan_tram_giam_gia' => $type === 'percentage' ? $faker->randomFloat(2, 5, 50) : 0,
                'loai_giam_gia' => $type,
                'gia_tri_don_hang_toi_thieu' => $faker->randomFloat(2, 100, 1000),
                'so_lan_su_dung_toi_da' => $faker->numberBetween(1, 20),
                'ngay_het_han_giam_gia' => Carbon::now()->addDays($faker->numberBetween(5, 90))->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
