<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
        DiscountSeeder::class, 
        AdminUserSeeder::class,
        ]);
    }
}

 