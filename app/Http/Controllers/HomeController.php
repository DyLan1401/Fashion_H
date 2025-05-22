<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Post;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $posts = Post::all();
        $categories = Category::all();
        return view('home', compact('products', 'posts', 'categories'));
    }
}