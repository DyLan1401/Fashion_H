<?php

namespace Database\Seeders;


// use App\Models\Categories;
// use Illuminate\Support\Facades\View;
// use Illuminate\Support\Facades\Schema;
// use Illuminate\Pagination\Paginator;
use Illuminate\Database\Seeder;

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
use Database\Seeders\ProductSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        $this->call([
            CategoriesSeeder::class,
            ProductTypeSeeder::class,
            ProductSeeder::class,
            UserSeeder::class,
            ContactSeeder::class,
            AdminUserSeeder::class,
            DiscountSeeder::class,
            PostSeeder::class,
            OrderSeeder::class,
        ]);
    }

    /**
     * Bootstrap any application services.
     */
    // public function boot(): void
    // {
    //     Schema::defaultStringLength(191); // fix lỗi key quá dài cho utf8mb4

    //     View::composer('user.layouts.app', function ($view) {
    //         $categories = Categories::all(); 
    //         $view->with('categories', $categories); 
    //     });

    //     Paginator::useBootstrap();
    // }
}

 
 
    
