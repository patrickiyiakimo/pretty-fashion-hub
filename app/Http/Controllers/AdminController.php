<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    // Admin Dashboard
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalProducts = Product::count();
        $recentUsers = User::orderBy('created_at', 'desc')->take(5)->get();
        $recentProducts = Product::orderBy('created_at', 'desc')->take(5)->get();
        
        return view('admin.dashboard', compact('totalUsers', 'totalProducts', 'recentUsers', 'recentProducts'));
    }
    
    // User Management
    public function users()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.users', compact('users'));
    }
    
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        
        if ($user->id == auth()->id()) {
            return response()->json([
                'success' => false,
                'message' => 'You cannot delete your own account'
            ]);
        }
        
        $user->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'User deleted successfully'
        ]);
    }
    
    public function toggleUserStatus($id)
    {
        $user = User::findOrFail($id);
        $user->is_active = !$user->is_active;
        $user->save();
        
        return response()->json([
            'success' => true,
            'message' => 'User status updated',
            'is_active' => $user->is_active
        ]);
    }
    
    // Product Management
    public function products()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(12);
        return view('admin.products', compact('products'));
    }
    
    public function createProduct()
    {
        return view('admin.create-product');
    }
    
    public function storeProduct(Request $request)
    {
        // Log the request to debug
        \Log::info('Store product request received', $request->all());
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'compare_price' => 'nullable|numeric|min:0',
            'category' => 'required|string|max:100',
            'stock' => 'required|integer|min:0',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'colors' => 'nullable|string',
            'sizes' => 'nullable|string',
            'on_sale' => 'nullable|boolean',
            'new_arrival' => 'nullable|boolean',
            'featured' => 'nullable|boolean'
        ]);
        
        // Handle images upload
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if ($image->isValid()) {
                    $path = $image->store('products', 'public');
                    $imagePaths[] = $path;
                }
            }
        }
        
        // If no images were uploaded, return error
        if (empty($imagePaths)) {
            return back()->with('error', 'Please upload at least one valid image.');
        }
        
        // Generate unique SKU
        $sku = 'PRD-' . strtoupper(Str::random(8));
        
        // Generate slug
        $slug = Str::slug($request->name) . '-' . Str::random(6);
        
        // Process colors and sizes (they come as JSON strings)
        $colors = $request->colors ? json_decode($request->colors, true) : [];
        $sizes = $request->sizes ? json_decode($request->sizes, true) : [];
        
        // Create product
        $product = Product::create([
            'name' => $request->name,
            'slug' => $slug,
            'sku' => $sku,  // SKU is now included here
            'description' => $request->description,
            'price' => $request->price,
            'compare_price' => $request->compare_price,
            'category' => $request->category,
            'stock' => $request->stock,
            'images' => json_encode($imagePaths),
            'colors' => json_encode($colors),
            'sizes' => json_encode($sizes),
            'on_sale' => $request->has('on_sale'),
            'new_arrival' => $request->has('new_arrival'),
            'featured' => $request->has('featured')
        ]);
        
        if ($product) {
            return redirect()->route('admin.products')->with('success', 'Product created successfully!');
        } else {
            return back()->with('error', 'Failed to create product. Please try again.');
        }
    }
    
    public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.edit-product', compact('product'));
    }
    
    public function updateProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'compare_price' => 'nullable|numeric|min:0',
            'category' => 'required|string|max:100',
            'stock' => 'required|integer|min:0',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'colors' => 'nullable|string',
            'sizes' => 'nullable|string',
            'on_sale' => 'nullable|boolean',
            'new_arrival' => 'nullable|boolean',
            'featured' => 'nullable|boolean'
        ]);
        
        // Handle images upload
        $existingImages = json_decode($product->images, true) ?? [];
        
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if ($image->isValid()) {
                    $path = $image->store('products', 'public');
                    $existingImages[] = $path;
                }
            }
        }
        
        // Remove images if requested
        if ($request->has('remove_images') && !empty($request->remove_images)) {
            $removeImages = explode(',', $request->remove_images);
            foreach ($removeImages as $imagePath) {
                if (Storage::disk('public')->exists($imagePath)) {
                    Storage::disk('public')->delete($imagePath);
                }
                $existingImages = array_values(array_diff($existingImages, [$imagePath]));
            }
        }
        
        // Process colors and sizes
        $colors = $request->colors ? json_decode($request->colors, true) : [];
        $sizes = $request->sizes ? json_decode($request->sizes, true) : [];
        
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'compare_price' => $request->compare_price,
            'category' => $request->category,
            'stock' => $request->stock,
            'images' => json_encode($existingImages),
            'colors' => json_encode($colors),
            'sizes' => json_encode($sizes),
            'on_sale' => $request->has('on_sale'),
            'new_arrival' => $request->has('new_arrival'),
            'featured' => $request->has('featured')
        ]);
        
        return redirect()->route('admin.products')->with('success', 'Product updated successfully!');
    }
    
    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        
        // Delete images from storage
        $images = json_decode($product->images, true) ?? [];
        foreach ($images as $image) {
            if (Storage::disk('public')->exists($image)) {
                Storage::disk('public')->delete($image);
            }
        }
        
        $product->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully'
        ]);
    }
}