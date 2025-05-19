<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RemoveFavorite;

class RemoveFavoriteController extends Controller
{
    public function index()
    {
        $removed = RemoveFavorite::orderBy('removed_at', 'desc')->get();
        return view('remove_favorites.index', compact('removed'));
    }

    public function create()
    {
        return view('remove_favorites.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string|max:255',
            'product_name' => 'required|string|max:255',
        ]);

        RemoveFavorite::create([
            'user_name' => $request->user_name,
            'product_name' => $request->product_name,
            'removed_at' => now(),
        ]);
        return redirect()->route('remove_favorites.index')->with('success', 'Đã xóa khỏi danh sách yêu thích!');
    }
}