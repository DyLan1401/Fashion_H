<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductReview;

class ProductReviewController extends Controller
{
    public function index()
    {
        $reviews = ProductReview::orderBy('created_at', 'desc')->get();
        return view('product_reviews.index', compact('reviews'));
    }

    public function create()
    {
        return view('product_reviews.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'reviewer_name' => 'required|string|max:255',
            'content' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        ProductReview::create($request->all());
        return redirect()->route('product_reviews.index')->with('success', 'Đánh giá đã được thêm!');
    }
}