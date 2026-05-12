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
    // Remove this entire __construct method
    // public function __construct()
    // {
    //     $this->middleware('admin');
    // }
    
    // Admin Dashboard
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalProducts = Product::count();
        $recentUsers = User::orderBy('created_at', 'desc')->take(5)->get();
        $recentProducts = Product::orderBy('created_at', 'desc')->take(5)->get();
        
        return view('admin.dashboard', compact('totalUsers', 'totalProducts', 'recentUsers', 'recentProducts'));
    }
    
    // Rest of your methods remain the same...
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
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'compare_price' => 'nullable|numeric|min:0',
        'category' => 'required|string|max:100',
        'stock' => 'required|integer|min:0',
        'images' => 'required|array|min:1',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'colors' => 'nullable|array',
        'sizes' => 'nullable|array',
        'on_sale' => 'nullable|boolean',
        'new_arrival' => 'nullable|boolean',
        'featured' => 'nullable|boolean'
    ]);
    
    // Handle images upload
    $imagePaths = [];
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            // Store in storage/app/public/products
            $path = $image->store('products', 'public');
            $imagePaths[] = $path;
        }
    }
    
    // Generate slug
    $slug = Str::slug($request->name) . '-' . uniqid();
    
    $product = Product::create([
        'name' => $request->name,
        'slug' => $slug,
        'description' => $request->description,
        'price' => $request->price,
        'compare_price' => $request->compare_price,
        'category' => $request->category,
        'stock' => $request->stock,
        'images' => json_encode($imagePaths),
        'colors' => json_encode($request->colors ?? []),
        'sizes' => json_encode($request->sizes ?? []),
        'on_sale' => $request->has('on_sale'),
        'new_arrival' => $request->has('new_arrival'),
        'featured' => $request->has('featured')
    ]);
    
    return redirect()->route('admin.products')->with('success', 'Product created successfully!');
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
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'colors' => 'nullable|array',
            'sizes' => 'nullable|array',
            'on_sale' => 'nullable|boolean',
            'new_arrival' => 'nullable|boolean',
            'featured' => 'nullable|boolean'
        ]);
        
        $existingImages = json_decode($product->images, true) ?? [];
        
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public');
                $existingImages[] = $path;
            }
        }
        
        if ($request->has('remove_images')) {
            $removeImages = explode(',', $request->remove_images);
            foreach ($removeImages as $imagePath) {
                if (Storage::disk('public')->exists($imagePath)) {
                    Storage::disk('public')->delete($imagePath);
                }
                $existingImages = array_values(array_diff($existingImages, [$imagePath]));
            }
        }
        
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'compare_price' => $request->compare_price,
            'category' => $request->category,
            'stock' => $request->stock,
            'images' => json_encode($existingImages),
            'colors' => json_encode($request->colors ?? []),
            'sizes' => json_encode($request->sizes ?? []),
            'on_sale' => $request->has('on_sale'),
            'new_arrival' => $request->has('new_arrival'),
            'featured' => $request->has('featured')
        ]);
        
        return redirect()->route('admin.products')->with('success', 'Product updated successfully!');
    }
    
    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        
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