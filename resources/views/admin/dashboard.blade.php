<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard - Pretty Fashion Hub</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,100..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        html { scroll-behavior: smooth; }
        body { background: linear-gradient(135deg, #fce7f3 0%, #fbcfe8 100%); }
        .stats-card { transition: transform 0.3s ease; }
        .stats-card:hover { transform: translateY(-5px); }
    </style>
</head>
<body class="font-sans antialiased">
    @include('components.navbar')
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-pink-900">Admin Dashboard</h1>
            <p class="text-gray-600">Welcome back, {{ Auth::user()->fullname }}!</p>
        </div>
        
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="stats-card bg-white shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-pink-100 p-3">
                        <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <span class="text-3xl font-bold text-pink-900">{{ $totalUsers }}</span>
                </div>
                <p class="text-gray-600 font-semibold">Total Users</p>
            </div>
            
            <div class="stats-card bg-white shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-pink-100 p-3">
                        <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <span class="text-3xl font-bold text-pink-900">{{ $totalProducts }}</span>
                </div>
                <p class="text-gray-600 font-semibold">Total Products</p>
            </div>
        </div>
        
        <!-- Recent Users & Products -->
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Recent Users -->
            <div class="bg-white shadow-lg">
                <div class="p-6 border-b border-pink-100">
                    <h2 class="text-xl font-bold text-pink-900">Recent Users</h2>
                </div>
                <div class="p-6">
                    @foreach($recentUsers as $user)
                    <div class="flex items-center justify-between py-3 border-b border-gray-100 last:border-0">
                        <div>
                            <p class="font-semibold text-gray-800">{{ $user->fullname }}</p>
                            <p class="text-sm text-gray-500">{{ $user->email }}</p>
                        </div>
                        <span class="text-xs text-gray-400">{{ $user->created_at->diffForHumans() }}</span>
                    </div>
                    @endforeach
                    <a href="{{ route('admin.users') }}" class="inline-block mt-4 text-pink-600 hover:text-pink-700">View All Users →</a>
                </div>
            </div>
            
            <!-- Recent Products -->
            <div class="bg-white shadow-lg">
                <div class="p-6 border-b border-pink-100">
                    <h2 class="text-xl font-bold text-pink-900">Recent Products</h2>
                </div>
                <div class="p-6">
                    @foreach($recentProducts as $product)
                    <div class="flex items-center justify-between py-3 border-b border-gray-100 last:border-0">
                        <div>
                            <p class="font-semibold text-gray-800">{{ $product->name }}</p>
                            <p class="text-sm text-pink-600">${{ number_format($product->price, 2) }}</p>
                        </div>
                        <span class="text-xs text-gray-400">{{ $product->created_at->diffForHumans() }}</span>
                    </div>
                    @endforeach
                    <a href="{{ route('admin.products') }}" class="inline-block mt-4 text-pink-600 hover:text-pink-700">Manage Products →</a>
                </div>
            </div>
        </div>
    </div>
    
    @include('components.footer')
</body>
</html>