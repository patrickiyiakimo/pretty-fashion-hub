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
        'item_total' => $cartItem->product->price * $cartItem->quantity,
        'quantity' => $cartItem->quantity // Return the updated quantity
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

    public function getCartItems()
{
    try {
        $cartItems = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();
        
        $items = [];
        $subtotal = 0;
        
        foreach ($cartItems as $item) {
            $productPrice = $item->product->price;
            $itemTotal = $productPrice * $item->quantity;
            $subtotal += $itemTotal;
            
            // Get product image
            $images = json_decode($item->product->images, true);
            $firstImage = is_array($images) && !empty($images) ? $images[0] : null;
            
            $items[] = [
                'id' => $item->id,
                'name' => $item->product->name,
                'price' => $productPrice,
                'quantity' => $item->quantity,
                'size' => $item->size,
                'color' => $item->color,
                'image' => $firstImage ? asset('storage/' . $firstImage) : null
            ];
        }
        
        $tax = $subtotal * 0.08;
        $shipping = $subtotal > 50 ? 0 : 10;
        $total = $subtotal + $tax + $shipping;
        
        return response()->json([
            'success' => true,
            'items' => $items,
            'totals' => [
                'subtotal' => $subtotal,
                'tax' => $tax,
                'shipping' => $shipping,
                'total' => $total
            ]
        ]);
        
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error fetching cart items',
            'items' => [],
            'totals' => [
                'subtotal' => 0,
                'tax' => 0,
                'shipping' => 0,
                'total' => 0
            ]
        ]);
    }
}
}