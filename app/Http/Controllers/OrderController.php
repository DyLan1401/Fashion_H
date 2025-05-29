<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderController extends Controller
{
    public function history()
    {
        // Lấy lịch sử mua hàng của user hiện tại (giả sử user_id = 1 nếu chưa có auth)
        $userId = Auth::id() ?? 1;
        $orders = Order::with('items')->where('user_id', $userId)->orderByDesc('order_date')->get();
        return view('orders.history', compact('orders'));
    }
}