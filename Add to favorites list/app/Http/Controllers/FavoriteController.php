<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Favorite::orderBy('created_at', 'desc')->get();
        return view('favorites.index', compact('favorites'));
    }

    public function create()
    {
        return view('favorites.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string|max:255',
            'product_name' => 'required|string|max:255',
        ]);

        Favorite::create($request->all());
        return redirect()->route('favorites.index')->with('success', 'Đã thêm vào danh sách yêu thích!');
    }
}