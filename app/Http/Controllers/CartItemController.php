<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CartItemController extends Controller
{
    public function index()
    {
        $userID = Auth::id() ?? 1;
        $cartItems = CartItem::with('products', 'user')
            ->where('user_id', $userID)
            ->get();
        $total = $cartItems->sum(function ($item) {
            return $item->products && $item->products->price ? $item->quantity * $item->products->price : 0;
        });
        return view('user.cart.cart', compact(['cartItems', 'total']));
    }

    public function updateQuantity(Request $request)
    {
        $request->validate([
            'quantities' => 'required|array',
            'quantities.*' => 'required|integer|min:1',
        ]);

        $userID = Auth::id() ?? 1;
        $quantities = $request->quantities;

        foreach ($quantities as $cartItemId => $quantity) {
            $cartItem = CartItem::where('id', $cartItemId)
                ->where('user_id', $userID)
                ->first();

            if ($cartItem) {
                $cartItem->quantity = $quantity;
                $cartItem->save();
            }
        }

        // Recalculate total
        $cartItems = CartItem::with('products')
            ->where('user_id', $userID)
            ->get();

        $total = $cartItems->sum(function ($item) {
            return $item->products && $item->products->price ? $item->quantity * $item->products->price : 0;
        });

        return redirect()->route('user.cart.index')->with('success', 'Cart updated successfully');
    }

    public function remove($id)
    {
        try {
            $userID = Auth::id() ?? 1;
            
            $cartItem = CartItem::where('id', $id)
                ->where('user_id', $userID)
                ->first();

            if (!$cartItem) {
                return redirect()->route('user.cart.index')
                    ->with('error', 'Cart item not found');
            }

            $cartItem->delete();

            return redirect()->route('user.cart.index')
                ->with('success', 'Product removed from cart successfully');
        } catch (\Exception $e) {
            return redirect()->route('user.cart.index')
                ->with('error', 'Failed to remove item from cart');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'product_id' => 'required|exists:products,id',
                'quantity' => 'required|integer|min:1'
            ]);

            $userID = Auth::id() ?? 1;

            // Check if product already exists in cart
            $existingCartItem = CartItem::where('user_id', $userID)
                ->where('product_id', $request->product_id)
                ->first();

            if ($existingCartItem) {
                // Update quantity if product exists
                $existingCartItem->quantity += $request->quantity;
                $existingCartItem->save();
            } else {
                // Create new cart item if product doesn't exist
                CartItem::create([
                    'user_id' => $userID,
                    'product_id' => $request->product_id,
                    'quantity' => $request->quantity
                ]);
            }

            return redirect()->route('user.cart.index')
                ->with('success', 'Product added to cart successfully');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to add product to cart: ' . $e->getMessage());
        }
    }

    public function checkout()
    {
        $userID = Auth::id() ?? 1;
        $cartItems = CartItem::with('products', 'user')
            ->where('user_id', $userID)
            ->get();
        $total = $cartItems->sum(function ($item) {
            return $item->products && $item->products->price ? $item->quantity * $item->products->price : 0;
        });
        return view('user.checkout.checkout', compact(['cartItems', 'total']));
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postcode' => 'required|string|max:20',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        $userID = Auth::id() ?? 1;
        $cartItems = CartItem::with('products')
            ->where('user_id', $userID)
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('user.cart.index')->with('error', 'Giỏ hàng của bạn trống.');
        }

        // Calculate total amount
        $totalAmount = $cartItems->sum(function ($item) {
            return $item->products && $item->products->price ? $item->quantity * $item->products->price : 0;
        });

        // Create a new Order
        $order = Order::create([
            'order_id' => (string) Str::uuid(), // Generate a unique UUID for order_id
            'user_id' => $userID,
            'quantity' => $cartItems->sum('quantity'),
            'total_amount' => $totalAmount,
            'order_date' => now()->toDateString(),
            'payment_method' => $request->input('payment_method', 'cod'), // Default to 'cod'
            'shipping_address' => $request->address . ', ' . $request->city . ', ' . $request->postcode,
            // 'discount_id' => null, // You can add discount logic here if applicable
            'email' => $request->email,
            'customer_name' => $request->first_name . ' ' . $request->last_name,
            'phone' => $request->phone,
            'note' => $request->input('note', null),
        ]);

        // Create OrderItems for each cart item
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->order_id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'unit_price' => $item->products->price, // Price at the time of order
            ]);
        }

        // Clear the cart
        CartItem::where('user_id', $userID)->delete();

        return redirect()->route('user.orders.show', ['order_id' => $order->order_id])->with('success', 'Đơn hàng đã được đặt thành công!');
    }
}
