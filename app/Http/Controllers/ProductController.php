<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $favorites = Auth::check()
            ? Favorite::where('user_id', Auth::id())->pluck('product_id')->toArray()
            : [];
        return view('products.index', compact('products', 'favorites'));
    }

    public function wishlist()
    {
        $favorites = Favorite::where('user_id', Auth::id())->pluck('product_id')->toArray();
        $products = Product::whereIn('id', $favorites)->get();
        return view('products.wishlist', compact('products'));
    }

    public function toggleFavorite($id)
    {
        $userId = Auth::id();
        $favorite = Favorite::where('user_id', $userId)->where('product_id', $id)->first();
        if ($favorite) {
            $favorite->delete();
            return response()->json(['status' => 'removed']);
        } else {
            Favorite::create(['user_id' => $userId, 'product_id' => $id]);
            return response()->json(['status' => 'added']);
        }
    }
}