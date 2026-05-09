<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Display cart page
    public function index()
    {
        $cartItems = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();
        
        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
        
        $tax = $subtotal * 0.08; // 8% tax
        $total = $subtotal + $tax;
        
        return view('cart', compact('cartItems', 'subtotal', 'tax', 'total'));
    }
    
    // Update cart item quantity
    public function update(Request $request, $id)
    {
        $cartItem = Cart::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();
        
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $cartItem->product->stock
        ]);
        
        $cartItem->update([
            'quantity' => $request->quantity
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'Cart updated successfully',
            'item_total' => $cartItem->product->price * $cartItem->quantity
        ]);
    }
    
    // Remove item from cart
   public function remove($id)
{
    $cartItem = Cart::where('id', $id)
        ->where('user_id', Auth::id())
        ->firstOrFail();
    
    $cartItem->delete();
    
    return response()->json([
        'success' => true,
        'message' => 'Item removed from cart'
    ]);
}
    
    // Clear entire cart
    public function clear()
{
    Cart::where('user_id', Auth::id())->delete();
    
    return response()->json([
        'success' => true,
        'message' => 'Cart cleared successfully'
    ]);
}
    
    // Get cart count (for navbar)
    public function getCartCount()
    {
        $count = Cart::where('user_id', Auth::id())->sum('quantity');
        return response()->json(['count' => $count]);
    }
}