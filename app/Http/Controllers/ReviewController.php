<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::latest()->get();
        return view('reviews.index', compact('reviews'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'rating'  => 'required|integer|min:1|max:5',
            'content' => 'required|string',
        ]);
        $data['avatar'] = 'https://randomuser.me/api/portraits/lego/' . rand(0, 9) . '.jpg';
        Review::create($data);
        return redirect()->route('reviews.index')->with('success', 'Cảm ơn bạn đã gửi đánh giá!');
    }
}