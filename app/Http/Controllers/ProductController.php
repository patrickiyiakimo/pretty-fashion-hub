<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // Display shop page with all products
    public function shop(Request $request)
    {
        $query = Product::query();
        
        // Filter by category
        if ($request->has('category') && $request->category != 'all') {
            $query->where('category', $request->category);
        }
        
        // Filter by price range
        if ($request->has('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->has('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }
        
        // Sort products
        switch ($request->sort) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            default:
                $query->orderBy('featured', 'desc')->orderBy('created_at', 'desc');
        }
        
        $products = $query->paginate(12);
        $categories = Product::distinct()->pluck('category');
        
        return view('shop', compact('products', 'categories'));
    }
    
    // Add product to cart
    public function addToCart(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Please login to add items to cart',
                'redirect' => route('login')
            ], 401);
        }
        
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'size' => 'nullable|string',
            'color' => 'nullable|string'
        ]);
        
        // Check if product already in cart
        $existingCart = Cart::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->where(function($query) use ($request) {
                if ($request->size) {
                    $query->where('size', $request->size);
                } else {
                    $query->whereNull('size');
                }
            })
            ->where(function($query) use ($request) {
                if ($request->color) {
                    $query->where('color', $request->color);
                } else {
                    $query->whereNull('color');
                }
            })
            ->first();
            
        if ($existingCart) {
            $existingCart->update([
                'quantity' => $existingCart->quantity + $request->quantity
            ]);
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'size' => $request->size,
                'color' => $request->color,
                'quantity' => $request->quantity
            ]);
        }
        
        $cartCount = Cart::where('user_id', Auth::id())->sum('quantity');
        
        return response()->json([
            'success' => true,
            'message' => 'Product added to cart successfully!',
            'cart_count' => $cartCount
        ]);
    }
    
    // Display single product details
    public function productDetail($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $relatedProducts = Product::where('category', $product->category)
            ->where('id', '!=', $product->id)
            ->limit(4)
            ->get();
            
        return view('product-detail', compact('product', 'relatedProducts'));
    }
}