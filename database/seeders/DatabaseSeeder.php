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
use App\Models\Product;
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
        User::factory(10)->create();

        $this->call([
            CategoriesSeeder::class,
            ProductTypeSeeder::class,
           UserSeeder::class,
         ContactSeeder::class,
        AdminUserSeeder::class,
        // PostSeeder::class,
        DiscountSeeder::class,
        ProductSeeder::class,

       
          
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

 
 
    
