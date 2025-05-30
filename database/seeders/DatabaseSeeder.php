<?php

namespace App\Providers;

use App\Models\Categories;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191); // fix lỗi key quá dài cho utf8mb4

        View::composer('user.layouts.app', function ($view) {
            $categories = Categories::all(); 
            $view->with('categories', $categories); 
        });

        Paginator::useBootstrap();
    }
}
