<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Manage Products - Admin Panel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,100..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gradient-to-br from-pink-50 to-white">
    @include('components.navbar')
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-pink-900">Manage Products</h1>
                <p class="text-gray-600">Add, edit, or remove products from your store</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ route('admin.create-product') }}" class="px-4 py-2 bg-pink-600 text-white hover:bg-pink-700 transition-colors text-center">
                    + Add New Product
                </a>
                <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 bg-gray-200 text-gray-700 hover:bg-gray-300 transition-colors text-center">
                    Back to Dashboard
                </a>
            </div>
        </div>
        
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 mb-4">
                {{ session('success') }}
            </div>
        @endif
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($products as $product)
            @php
                $images = is_string($product->images) ? json_decode($product->images, true) : $product->images;
                $firstImage = is_array($images) && !empty($images) ? $images[0] : null;
            @endphp
            <div class="bg-white shadow-lg overflow-hidden group" data-product-id="{{ $product->id }}">
                <div class="relative h-64 bg-gray-100">
                    @if($firstImage && file_exists(storage_path('app/public/' . $firstImage)))
                        <img src="{{ asset('storage/' . $firstImage) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-pink-100 to-pink-200">
                            <div class="text-center">
                                <svg class="w-16 h-16 mx-auto text-pink-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <p class="text-pink-600 text-sm">No Image</p>
                            </div>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-4">
                        <a href="{{ route('admin.edit-product', $product->id) }}" class="px-4 py-2 bg-pink-600 text-white hover:bg-pink-700 transition-colors">
                            Edit
                        </a>
                        <button onclick="deleteProduct({{ $product->id }})" class="px-4 py-2 bg-red-600 text-white hover:bg-red-700 transition-colors">
                            Delete
                        </button>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-lg text-pink-900 mb-1">{{ $product->name }}</h3>
                    <p class="text-sm text-gray-500 mb-2">{{ ucfirst($product->category) }}</p>
                    <div class="flex items-baseline gap-2">
                        <span class="text-xl font-bold text-pink-900">${{ number_format($product->price, 2) }}</span>
                        @if($product->compare_price)
                        <span class="text-sm text-gray-400 line-through">${{ number_format($product->compare_price, 2) }}</span>
                        @endif
                    </div>
                    <div class="mt-2 flex items-center gap-2 flex-wrap">
                        <span class="text-xs text-gray-500">Stock: {{ $product->stock }}</span>
                        @if($product->on_sale)
                        <span class="px-2 py-0.5 bg-red-100 text-red-600 text-xs font-semibold">SALE</span>
                        @endif
                        @if($product->new_arrival)
                        <span class="px-2 py-0.5 bg-green-100 text-green-600 text-xs font-semibold">NEW</span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="mt-8">
            {{ $products->links() }}
        </div>
    </div>
    
    @include('components.footer')
    
    <div id="toast" class="fixed bottom-8 right-8 z-50 hidden"></div>
    
    <style>
        .toast-show {
            animation: slideInRight 0.3s ease-out;
        }
        
        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    </style>
    
    <script>
        async function deleteProduct(productId) {
            if (!confirm('Are you sure you want to delete this product? This action cannot be undone.')) return;
            
            showLoading(productId);
            
            try {
                const response = await fetch(`/admin/products/${productId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                });
                
                const data = await response.json();
                
                if (data.success) {
                    showToast(data.message, 'success');
                    setTimeout(() => location.reload(), 1500);
                } else {
                    showToast(data.message || 'Error deleting product', 'error');
                    hideLoading(productId);
                }
            } catch (error) {
                console.error('Error:', error);
                showToast('Network error. Please try again.', 'error');
                hideLoading(productId);
            }
        }
        
        function showLoading(productId) {
            const card = document.querySelector(`[data-product-id="${productId}"]`);
            if (card) {
                card.style.opacity = '0.5';
                card.style.pointerEvents = 'none';
            }
        }
        
        function hideLoading(productId) {
            const card = document.querySelector(`[data-product-id="${productId}"]`);
            if (card) {
                card.style.opacity = '1';
                card.style.pointerEvents = 'auto';
            }
        }
        
        function showToast(message, type) {
            const toast = document.getElementById('toast');
            toast.textContent = message;
            toast.className = 'fixed bottom-8 right-8 z-50 px-6 py-3 text-white font-medium shadow-lg';
            toast.style.backgroundColor = type === 'error' ? '#dc2626' : '#10b981';
            toast.style.display = 'block';
            toast.classList.add('toast-show');
            
            setTimeout(() => {
                toast.style.display = 'none';
                toast.classList.remove('toast-show');
            }, 3000);
        }
    </script>
</body>
</html>