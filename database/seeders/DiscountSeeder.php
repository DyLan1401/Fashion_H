<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Discount;
use Faker\Factory as Faker;

class DiscountSeeder extends Seeder
{
    public function run()
    {
        Discount::truncate();
        $faker = Faker::create();
        $numberOfDiscounts = 10;
        $discountIds = range(101, 100 + $numberOfDiscounts);

        foreach ($discountIds as $id) {
            Discount::create([
                'discount_id' => $id,
                'discount_percent' => $faker->randomFloat(2, 5, 50),
                'discount_type' => $faker->randomElement(['percentage', 'fixed']),
                'min_order_value' => $faker->randomFloat(2, 50000, 500000),
                'usage_limit' => $faker->numberBetween(10, 100),
                'usage_count' => 0,
                'discount_expiry_date' => $faker->dateTimeBetween('-1 month', '+2 months'),
            ]);
        }
    }
}