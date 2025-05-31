<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // DiscountSeeder::class, 
        $this->call([
         ContactSeeder::class,
        AdminUserSeeder::class,
        PostSeeder::class,
        DiscountSeeder::class
        ]);
    }
}

 