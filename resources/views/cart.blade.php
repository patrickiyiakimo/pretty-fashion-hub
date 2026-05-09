<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Shopping Cart - Pretty Fashion Hub</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,100..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gradient-to-br from-purple-50 to-white">
    @include('components.navbar')
    
    <!-- Page Header -->
    <div class="bg-gradient-to-r from-purple-900 to-purple-800 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Shopping Cart</h1>
            <p class="text-purple-200 text-lg">Review and manage your items</p>
        </div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif
        
        @if($cartItems->isEmpty())
            <!-- Empty Cart -->
            <div class="bg-white rounded-2xl shadow-lg p-12 text-center">
                <div class="mb-6">
                    <svg class="w-32 h-32 mx-auto text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6m10-6l1.5 6m-8.5 0a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zm9 0a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-purple-900 mb-4">Your cart is empty</h2>
                <p class="text-gray-600 mb-8">Looks like you haven't added any items to your cart yet.</p>
                <a href="{{ route('shop') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-900 to-purple-800 text-white rounded-lg hover:from-gold-500 hover:to-gold-600 hover:text-purple-900 transition-all duration-300 font-semibold">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    Continue Shopping
                </a>
            </div>
        @else
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Cart Items -->
                <div class="lg:w-2/3">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-purple-50 border-b border-purple-200">
                                    <tr>
                                        <th class="px-6 py-4 text-left text-purple-900 font-semibold">Product</th>
                                        <th class="px-6 py-4 text-center text-purple-900 font-semibold">Price</th>
                                        <th class="px-6 py-4 text-center text-purple-900 font-semibold">Quantity</th>
                                        <th class="px-6 py-4 text-center text-purple-900 font-semibold">Total</th>
                                        <th class="px-6 py-4 text-center text-purple-900 font-semibold">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="cartItemsContainer">
                                    @foreach($cartItems as $item)
                                    @php
                                        $productImages = is_string($item->product->images) ? json_decode($item->product->images, true) : $item->product->images;
                                        $productImage = is_array($productImages) && !empty($productImages) ? $productImages[0] : 'https://via.placeholder.com/100x100?text=No+Image';
                                    @endphp
                                    <tr class="cart-item border-b border-purple-100 hover:bg-purple-50/30 transition-colors" data-item-id="{{ $item->id }}" data-price="{{ $item->product->price }}">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-4">
                                                <img src="{{ $productImage }}" alt="{{ $item->product->name }}" class="w-20 h-20 object-cover rounded-lg">
                                                <div>
                                                    <h3 class="font-semibold text-purple-900 mb-1">{{ $item->product->name }}</h3>
                                                    @if($item->size)
                                                    <p class="text-sm text-gray-500">Size: {{ $item->size }}</p>
                                                    @endif
                                                    @if($item->color)
                                                    <div class="flex items-center gap-2 mt-1">
                                                        <span class="text-sm text-gray-500">Color:</span>
                                                        <div class="w-4 h-4 rounded-full border border-gray-300" style="background-color: {{ $item->color }};"></div>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-center text-gray-700">
                                            ${{ number_format($item->product->price, 2) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center justify-center gap-2">
                                                <button onclick="updateQuantity({{ $item->id }}, {{ $item->quantity - 1 }})" class="quantity-btn w-8 h-8 rounded-full bg-purple-100 text-purple-600 hover:bg-purple-200 transition-colors flex items-center justify-center">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                                    </svg>
                                                </button>
                                                <span class="quantity-display w-12 text-center font-semibold text-gray-800">{{ $item->quantity }}</span>
                                                <button onclick="updateQuantity({{ $item->id }}, {{ $item->quantity + 1 }})" class="quantity-btn w-8 h-8 rounded-full bg-purple-100 text-purple-600 hover:bg-purple-200 transition-colors flex items-center justify-center">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-center font-semibold text-purple-900 item-total">
                                            ${{ number_format($item->product->price * $item->quantity, 2) }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <button onclick="removeItem({{ $item->id }})" class="text-red-500 hover:text-red-700 transition-colors">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="p-6 bg-purple-50 flex justify-between items-center">
                            <a href="{{ route('shop') }}" class="flex items-center text-purple-600 hover:text-purple-800 transition-colors">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                                Continue Shopping
                            </a>
                            <form action="{{ route('cart.clear') }}" method="POST" onsubmit="return confirm('Are you sure you want to clear your entire cart?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 transition-colors">
                                    Clear Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <!-- Order Summary -->
                <div class="lg:w-1/3">
                    <div class="bg-white rounded-2xl shadow-lg p-6 sticky top-24">
                        <h3 class="text-xl font-bold text-purple-900 mb-6">Order Summary</h3>
                        
                        <div class="space-y-3 mb-6">
                            <div class="flex justify-between text-gray-600">
                                <span>Subtotal</span>
                                <span id="subtotal">${{ number_format($subtotal, 2) }}</span>
                            </div>
                            <div class="flex justify-between text-gray-600">
                                <span>Shipping</span>
                                <span>Free</span>
                            </div>
                            <div class="flex justify-between text-gray-600">
                                <span>Tax (8%)</span>
                                <span id="tax">${{ number_format($tax, 2) }}</span>
                            </div>
                            <div class="border-t border-purple-200 pt-3 mt-3">
                                <div class="flex justify-between text-xl font-bold text-purple-900">
                                    <span>Total</span>
                                    <span id="total">${{ number_format($total, 2) }}</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Promo Code -->
                        <div class="mb-6">
                            <label class="block text-purple-900 font-semibold mb-2">Promo Code</label>
                            <div class="flex gap-2">
                                <input type="text" id="promoCode" placeholder="Enter code" class="flex-1 px-4 py-2 border border-purple-200 rounded-lg focus:outline-none focus:border-gold-400">
                                <button onclick="applyPromo()" class="px-4 py-2 bg-purple-100 text-purple-600 rounded-lg hover:bg-purple-200 transition-colors">
                                    Apply
                                </button>
                            </div>
                        </div>
                        
                        <!-- Checkout Button -->
                        <button onclick="proceedToCheckout()" class="w-full bg-gradient-to-r from-purple-900 to-purple-800 text-white py-3 rounded-lg hover:from-gold-500 hover:to-gold-600 hover:text-purple-900 transition-all duration-300 font-semibold">
                            Proceed to Checkout
                        </button>
                        
                        <!-- Payment Methods -->
                        <div class="mt-6 pt-6 border-t border-purple-200">
                            <p class="text-sm text-gray-500 text-center mb-3">We accept</p>
                            <div class="flex justify-center gap-4">
                                <svg class="w-10 h-6" viewBox="0 0 38 24" fill="none">
                                    <rect width="38" height="24" rx="2" fill="#1A1F71"/>
                                    <path d="M15 8h8v8h-8z" fill="#F5B800"/>
                                    <path d="M23 8h8v8h-8z" fill="#D3D3D3"/>
                                </svg>
                                <svg class="w-10 h-6" viewBox="0 0 38 24" fill="none">
                                    <rect width="38" height="24" rx="2" fill="#0066B3"/>
                                    <text x="19" y="16" text-anchor="middle" fill="white" font-size="12" font-weight="bold">VISA</text>
                                </svg>
                                <svg class="w-10 h-6" viewBox="0 0 38 24" fill="none">
                                    <rect width="38" height="24" rx="2" fill="#EB001B"/>
                                    <text x="19" y="16" text-anchor="middle" fill="white" font-size="10" font-weight="bold">Master</text>
                                </svg>
                                <svg class="w-10 h-6" viewBox="0 0 38 24" fill="none">
                                    <rect width="38" height="24" rx="2" fill="#3C3A3E"/>
                                    <text x="19" y="16" text-anchor="middle" fill="white" font-size="9" font-weight="bold">PayPal</text>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    
    @include('components.footer')
    
    <!-- Loading Overlay -->
    <div id="loadingOverlay" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden items-center justify-center">
        <div class="bg-white rounded-xl p-8 flex items-center gap-3">
            <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-purple-900"></div>
            <span class="text-purple-900 font-semibold">Updating...</span>
        </div>
    </div>
    
    <script>
        function updateQuantity(itemId, newQuantity) {
            if (newQuantity < 1) return;
            
            showLoading();
            
            fetch(`/cart/update/${itemId}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ quantity: newQuantity })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update UI
                    const row = document.querySelector(`tr[data-item-id="${itemId}"]`);
                    const quantityDisplay = row.querySelector('.quantity-display');
                    const itemTotal = row.querySelector('.item-total');
                    
                    quantityDisplay.textContent = newQuantity;
                    itemTotal.textContent = '$' + data.item_total.toFixed(2);
                    
                    // Recalculate totals
                    recalculateTotals();
                    showToast(data.message, 'success');
                }
            })
            .catch(error => {
                showToast('Error updating cart', 'error');
            })
            .finally(() => {
                hideLoading();
            });
        }
        
        function removeItem(itemId) {
            if (!confirm('Are you sure you want to remove this item?')) return;
            
            showLoading();
            
            fetch(`/cart/remove/${itemId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Remove row
                    const row = document.querySelector(`tr[data-item-id="${itemId}"]`);
                    row.remove();
                    
                    // Check if cart is empty
                    const remainingItems = document.querySelectorAll('.cart-item').length;
                    if (remainingItems === 0) {
                        window.location.reload();
                    } else {
                        recalculateTotals();
                        updateNavbarCartCount();
                    }
                    showToast(data.message, 'success');
                }
            })
            .catch(error => {
                showToast('Error removing item', 'error');
            })
            .finally(() => {
                hideLoading();
            });
        }
        
        function recalculateTotals() {
            let subtotal = 0;
            document.querySelectorAll('.cart-item').forEach(row => {
                const price = parseFloat(row.dataset.price);
                const quantity = parseInt(row.querySelector('.quantity-display').textContent);
                subtotal += price * quantity;
            });
            
            const tax = subtotal * 0.08;
            const total = subtotal + tax;
            
            document.getElementById('subtotal').textContent = '$' + subtotal.toFixed(2);
            document.getElementById('tax').textContent = '$' + tax.toFixed(2);
            document.getElementById('total').textContent = '$' + total.toFixed(2);
        }
        
        function updateNavbarCartCount() {
            fetch('{{ route("cart.count") }}')
                .then(response => response.json())
                .then(data => {
                    const cartBadge = document.getElementById('cartCount');
                    if (cartBadge) {
                        cartBadge.textContent = data.count;
                    }
                });
        }
        
        function applyPromo() {
            const promoCode = document.getElementById('promoCode').value;
            if (!promoCode) {
                showToast('Please enter a promo code', 'error');
                return;
            }
            
            // This is a placeholder - implement actual promo logic
            if (promoCode.toUpperCase() === 'WELCOME10') {
                showToast('10% discount applied!', 'success');
                // Update totals with discount
            } else {
                showToast('Invalid promo code', 'error');
            }
        }
        
        function proceedToCheckout() {
            // This will be implemented when creating the checkout page
            showToast('Checkout page coming soon!', 'success');
        }
        
        function showLoading() {
            document.getElementById('loadingOverlay').classList.remove('hidden');
            document.getElementById('loadingOverlay').classList.add('flex');
        }
        
        function hideLoading() {
            document.getElementById('loadingOverlay').classList.add('hidden');
            document.getElementById('loadingOverlay').classList.remove('flex');
        }
        
        function showToast(message, type = 'success') {
            // Create toast element if it doesn't exist
            let toast = document.getElementById('toast');
            if (!toast) {
                toast = document.createElement('div');
                toast.id = 'toast';
                toast.className = 'fixed bottom-8 right-8 px-6 py-3 rounded-lg shadow-lg hidden z-50 transition-all';
                document.body.appendChild(toast);
            }
            
            toast.textContent = message;
            toast.classList.remove('hidden', 'bg-red-500', 'bg-purple-900');
            
            if (type === 'error') {
                toast.classList.add('bg-red-500', 'text-white');
            } else {
                toast.classList.add('bg-purple-900', 'text-white');
            }
            
            setTimeout(() => {
                toast.classList.add('hidden');
            }, 3000);
        }
    </script>
    
    <style>
        .quantity-btn {
            transition: all 0.2s ease;
        }
        
        .quantity-btn:hover {
            transform: scale(1.1);
        }
        
        .cart-item {
            transition: background-color 0.3s ease;
        }
    </style>
</body>
</html>