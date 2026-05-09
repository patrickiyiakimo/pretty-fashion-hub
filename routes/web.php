<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

// Home page
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Collections page
Route::get('/collections', function () {
    return view('collections');
})->name('collections');

// Shop routes (public)
Route::get('/shop', [ProductController::class, 'shop'])->name('shop');
Route::get('/product/{slug}', [ProductController::class, 'productDetail'])->name('product.detail');

// Authentication Routes (guest only)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Protected Routes (authenticated users only)
Route::middleware('auth')->group(function () {
    Route::post('/cart/add', [ProductController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::put('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::get('/cart/count', [CartController::class, 'getCartCount'])->name('cart.count');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});