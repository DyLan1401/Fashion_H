<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 100) as $index) {
            DB::table('orders')->insert([
                'user_id' => rand(1, 100), 
                'order_code' => 'ORD' . $faker->unique()->numberBetween(1000, 9999),
                'total' => $faker->numberBetween(100000, 1000000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}