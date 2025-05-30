<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
