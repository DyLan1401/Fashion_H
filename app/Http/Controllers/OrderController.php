<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class OrderController extends Controller
{
    public function ordersByUser($id)
    {
        // Lấy thông tin người dùng và các đơn hàng liên quan
        $user = User::with('orders')->findOrFail($id);

        // Trả về view kèm dữ liệu user và orders
        return view('orders.user_orders', compact('user'));
    }
}
