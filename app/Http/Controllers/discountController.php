<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts = Discount::all();
        return view('discounts.index', compact('discounts'));
    }

    public function create()
    {
        return view('discounts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'discount_id' => 'required|unique:discounts,discount_id',
            'discount_percent' => 'required|numeric|min:0',
            'discount_type' => 'required|in:percentage,fixed',
            'min_order_value' => 'nullable|numeric|min:0',
            'usage_limit' => 'nullable|integer|min:1',
            'discount_expiry_date' => 'required|date',
        ]);

        Discount::create([
            'discount_id' => $request->discount_id,
            'discount_percent' => $request->discount_percent,
            'discount_type' => $request->discount_type,
            'min_order_value' => $request->min_order_value,
            'usage_limit' => $request->usage_limit,
            'usage_count' => 0,
            'discount_expiry_date' => $request->discount_expiry_date,
        ]);

        return redirect()->route('discounts.index')->with('success', 'Discount created successfully.');
    }

    public function edit($id)
    {
        $discount = Discount::findOrFail($id);
        return view('discounts.update', compact('discount'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'discount_percent' => 'required|numeric|min:0',
            'discount_type' => 'required|in:percentage,fixed',
            'min_order_value' => 'nullable|numeric|min:0',
            'usage_limit' => 'nullable|integer|min:1',
            'discount_expiry_date' => 'required|date',
        ]);

        $discount = Discount::findOrFail($id);
        $discount->update([
            'discount_percent' => $request->discount_percent,
            'discount_type' => $request->discount_type,
            'min_order_value' => $request->min_order_value,
            'usage_limit' => $request->usage_limit,
            'discount_expiry_date' => $request->discount_expiry_date,
        ]);

        return redirect()->route('discounts.index')->with('success', 'Discount updated successfully.');
    }

    public function destroy($id)
    {
        $discount = Discount::findOrFail($id);
        $discount->delete();

        return redirect()->route('discounts.index')->with('success', 'Discount deleted successfully.');
    }
}