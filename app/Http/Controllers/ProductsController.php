<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\RedirectResponse;
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
        
        // Lọc theo màu
        if ($request->has('color')) {
            $colors = $request->color;
            if (is_string($colors)) {
                $colors = explode(',', $colors);
            }
            $query->whereIn('color', $colors);
        }
        
        // Lọc theo giá
        if ($request->has('min_price') && $request->has('max_price')) {
            $query->whereBetween('price', [
                (int) $request->min_price,
                (int) $request->max_price,
            ]);
        }

        // Xử lý sắp xếp
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'desc':
                    $query->orderBy('price', 'desc');
                    break;
                default:
                    $query->orderBy('created_at', 'desc');
                    break;
            }
        } else {
            // Mặc định sắp xếp theo created_at mới nhất
            $query->orderBy('created_at', 'desc');
        }

        $products = $query->paginate(12)->withQueryString();
        $categories = Categories::all();
        
        return view('user.product.product_shop', compact('products', 'categories'));
    }

    public function show($id)
    {
        $product = Products::with('category')->find($id);
        //dd($products);
        return view('user.product.product_detail', compact('product'));
    }

    public function getProductList(){
        return view('admin.product.index');
    }

    
}
