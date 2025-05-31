<?php

namespace App\Providers;


use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;

   




namespace Database\Seeders;

use App\Models\Categories;
use Database\Seeders\AdminUserSeeder;
use Database\Seeders\ContactSeeder;
use Database\Seeders\DiscountSeeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\UserSeeder;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
     'phone' => '0123456789',
            'address' => 'Thanh pho ho chi minh',
        
        ]);

          
          $this->call([
            UserSeeder::class,
         ContactSeeder::class,
        AdminUserSeeder::class,
        // PostSeeder::class,
        DiscountSeeder::class
        ]);
 
 
 }
}
