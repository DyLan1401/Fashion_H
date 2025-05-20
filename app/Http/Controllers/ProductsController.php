<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $query = Products::with('category', 'type');

        // Tìm kiếm theo từ khóa (tên sản phẩm)
        if ($request->has('keyword') && $request->keyword !== '') {
            $query->where('product_name', 'like', '%' . $request->keyword . '%');
        }

        // Lọc theo danh mục
        if ($request->has('categories')) {
            $categories = $request->categories;

            // Nếu là chuỗi, ví dụ '1,2,3', thì chuyển thành mảng
            if (is_string($categories)) {
                $categories = explode(',', $categories);
            }

            $query->whereIn('category_id', $categories);
        }

        // 💰 Lọc theo giá
        if ($request->has('min_price') && $request->has('max_price')) {
            $query->whereBetween('price', [
                (int) $request->min_price,
                (int) $request->max_price,
            ]);
        }

        // Xử lý sắp xếp theo giá nếu có tham số sort
        if ($request->has('sort')) {
            if ($request->sort === 'asc') {
                $query->orderBy('price', 'asc');
            } elseif ($request->sort === 'desc') {
                $query->orderBy('price', 'desc');
            } else {
                // Mặc định nếu không hợp lệ thì sort theo created_at mới nhất
                $query->orderBy('created_at', 'desc');
            }
        } else {
            // Nếu không có tham số sort, sort mặc định theo created_at mới nhất
            $query->orderBy('created_at', 'desc');
        }
        
        $products = $query->paginate(12);
        $categories = Categories::all();
        // dd($products);
        return view('user.product.product_shop', compact('products', 'categories'));
    }

    public function show($id)
    {
        $products = Products::with('category')->find($id);
        dd($products);
        return view('user.product.product_shop', compact('products'));
    }
}
