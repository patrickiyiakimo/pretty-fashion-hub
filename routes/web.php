<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;

// Home page
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Collections page
Route::get('/collections', function () {
    return view('collections');
})->name('collections');

// About page
Route::get('/about', function () {
    return view('about');
})->name('about');

// Contact page
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Shop routes (public)
Route::get('/shop', [ProductController::class, 'shop'])->name('shop');
Route::get('/product/{slug}', [ProductController::class, 'productDetail'])->name('product.detail');

// Admin routes (protected)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // User management
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])->name('delete-user');
    Route::put('/users/{id}/toggle-status', [AdminController::class, 'toggleUserStatus'])->name('toggle-user-status');
    
    // Product management
    Route::get('/products', [AdminController::class, 'products'])->name('products');
    Route::get('/products/create', [AdminController::class, 'createProduct'])->name('create-product');
    Route::post('/products', [AdminController::class, 'storeProduct'])->name('store-product');
    Route::get('/products/{id}/edit', [AdminController::class, 'editProduct'])->name('edit-product');
    Route::put('/products/{id}', [AdminController::class, 'updateProduct'])->name('update-product');
    Route::delete('/products/{id}', [AdminController::class, 'deleteProduct'])->name('delete-product');
});

// Authentication Routes (guest only)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    // Password reset routes
    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
});

// Protected Routes (authenticated users only)
Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');
    
    Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');
    Route::get('/profile/orders', [ProfileController::class, 'getOrders'])->name('profile.orders');
    Route::get('/profile/addresses', [ProfileController::class, 'getAddresses'])->name('profile.addresses');
    Route::post('/profile/addresses', [ProfileController::class, 'addAddress'])->name('profile.add-address');
    Route::put('/profile/addresses/{id}/default', [ProfileController::class, 'setDefaultAddress'])->name('profile.set-default-address');
    Route::delete('/profile/addresses/{id}', [ProfileController::class, 'deleteAddress'])->name('profile.delete-address');
    
    // Cart routes
    Route::post('/cart/add', [ProductController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::put('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::get('/cart/count', [CartController::class, 'getCartCount'])->name('cart.count');
    // Get cart items for WhatsApp sharing
    Route::get('/cart/items', [CartController::class, 'getCartItems'])->name('cart.items');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});