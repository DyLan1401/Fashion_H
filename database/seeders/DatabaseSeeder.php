<?php

namespace Database\Seeders;

// use App\Models\Categories;
// use Illuminate\Support\Facades\View;
// use Illuminate\Support\Facades\Schema;
// use Illuminate\Pagination\Paginator;
use Illuminate\Database\Seeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Register any application services.
     */
    public function run(): void
    {

        // DiscountSeeder::class, 
        $this->call([
            UserSeeder::class,
         ContactSeeder::class,
        AdminUserSeeder::class,
        PostSeeder::class,
        DiscountSeeder::class
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
