<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Product_types;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Products::with(['Category', 'Type'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $categories = Categories::all();
        $productTypes = Product_types::all();
        
        return view('admin.product.index', compact('products', 'categories', 'productTypes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'product_description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'type_id' => 'required|exists:product_types,id',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'color' => 'required|string|in:Blue,Green,Orange,Navy,Pinkish,Vista',
            'size' => 'required|string|in:S,M,L,XL,XXL'
        ]);

        if ($request->hasFile('product_image')) {
            $path = $request->file('product_image')->store('products', 'public');
            $validated['product_image'] = $path;
        }

        Products::create($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Sản phẩm đã được thêm thành công.');
    }

    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Sản phẩm đã được xóa thành công.');
    }

    public function edit($id)
    {
        $product = Products::findOrFail($id);
        $categories = Categories::all();
        $productTypes = Product_types::all();
        
        return view('admin.product.edit', compact('product', 'categories', 'productTypes'));
    }

    public function update(Request $request, $id)
    {
        $product = Products::findOrFail($id);

        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'product_description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'type_id' => 'required|exists:product_types,id',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'color' => 'required|string|in:Blue,Green,Orange,Navy,Pinkish,Vista',
            'size' => 'required|string|in:S,M,L,XL,XXL'
        ]);

        // Handle image upload if a new image is provided
        if ($request->hasFile('product_image')) {
            // Delete old image
            if ($product->product_image) {
                Storage::disk('public')->delete($product->product_image);
            }
            // Store new image
            $path = $request->file('product_image')->store('products', 'public');
            $validated['product_image'] = $path;
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Sản phẩm đã được cập nhật thành công.');
    }
} 