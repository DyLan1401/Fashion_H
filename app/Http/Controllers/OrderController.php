<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show($order_id)
    {
        $order = Order::with('orderItems.product')->where('order_id', $order_id)->first();

        if (!$order) {
            return redirect()->route('user.cart.index')->with('error', 'Không tìm thấy đơn hàng.');
        }

        return view('user.order.show', compact('order'));
    }
}
