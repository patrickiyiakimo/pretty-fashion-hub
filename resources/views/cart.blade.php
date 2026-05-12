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
    <div class="bg-gradient-to-r from-pink-950 via-pink-900 to-pink-950 text-white py-16">
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
                <a href="{{ route('shop') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-pink-950 via-pink-900 to-pink-950 text-white hover:from-gold-500 hover:to-gold-600 hover:text-purple-900 transition-all duration-300 font-semibold">
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
                    <div class="bg-white shadow-lg overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-pink-50 border-b border-purple-200">
                                    <tr>
                                        <th class="px-6 py-4 text-left text-pink-900 font-semibold">Product</th>
                                        <th class="px-6 py-4 text-center text-pink-900 font-semibold">Price</th>
                                        <th class="px-6 py-4 text-center text-pink-900 font-semibold">Quantity</th>
                                        <th class="px-6 py-4 text-center text-pink-900 font-semibold">Total</th>
                                        <th class="px-6 py-4 text-center text-pink-900 font-semibold">Action</th>
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
                                                    <h3 class="font-semibold text-pink-900 mb-1">{{ $item->product->name }}</h3>
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
                                                <button onclick="updateQuantity({{ $item->id }}, {{ $item->quantity - 1 }})" class="quantity-btn w-8 h-8 rounded-full bg-purple-100 text-pink-600 hover:bg-purple-200 transition-colors flex items-center justify-center">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                                    </svg>
                                                </button>
                                                <span class="quantity-display w-12 text-center font-semibold text-gray-800" id="quantity-{{ $item->id }}">{{ $item->quantity }}</span>
                                                <button onclick="updateQuantity({{ $item->id }}, {{ $item->quantity + 1 }})" class="quantity-btn w-8 h-8 rounded-full bg-purple-100 text-pink-600 hover:bg-purple-200 transition-colors flex items-center justify-center">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-center font-semibold text-pink-900 item-total" id="total-{{ $item->id }}">
                                            ${{ number_format($item->product->price * $item->quantity, 2) }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <button onclick="showRemoveConfirmation({{ $item->id }})" class="text-red-500 hover:text-red-700 transition-colors">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </table>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="p-6 bg-pink-50 flex justify-between items-center">
                            <a href="{{ route('shop') }}" class="flex items-center text-pink-600 hover:text-pink-800 transition-colors">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                                Continue Shopping
                            </a>
                            <button onclick="showClearCartConfirmation()" class="text-red-500 hover:text-red-700 transition-colors">
                                Clear Cart
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Order Summary -->
                <div class="lg:w-1/3">
                    <div class="bg-white shadow-lg p-6 sticky top-24">
                        <h3 class="text-xl font-bold text-pink-900 mb-6">Order Summary</h3>
                        
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
                            <div class="border-t border-pink-200 pt-3 mt-3">
                                <div class="flex justify-between text-xl font-bold text-pink-900">
                                    <span>Total</span>
                                    <span id="total">${{ number_format($total, 2) }}</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Checkout Button -->
                        <button onclick="proceedToCheckout()" class="w-full bg-gradient-to-r from-pink-950 via-pink-900 to-pink-950 text-white py-3 hover:from-gold-500 hover:to-gold-600 hover:text-pink-900 transition-all duration-300 font-semibold">
                            Proceed to Checkout
                        </button>
                    </div>
                </div>
            </div>
        @endif
    </div>
    
    @include('components.footer')
    
    <!-- Confirmation Modal for Remove Item -->
    <div id="confirmModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden items-center justify-center">
        <div class="bg-white rounded-2xl max-w-md w-full mx-4 transform transition-all">
            <div class="p-6">
                <div class="text-center mb-6">
                    <div class="w-16 h-16 mx-auto bg-red-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Remove Item?</h3>
                    <p class="text-gray-600">Are you sure you want to remove this item from your cart?</p>
                </div>
                <div class="flex gap-4">
                    <button onclick="closeConfirmModal()" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        Cancel
                    </button>
                    <button id="confirmRemoveBtn" class="flex-1 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">
                        Remove
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        let itemToRemove = null;
        let pendingRequests = new Map(); // Track pending requests per item
        let updateTimeouts = new Map(); // Track debounce timeouts
        
        // Show remove confirmation modal
        function showRemoveConfirmation(itemId) {
            itemToRemove = itemId;
            const modal = document.getElementById('confirmModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }
        
        // Show clear cart confirmation
        function showClearCartConfirmation() {
            if (confirm('Are you sure you want to clear your entire cart? This action cannot be undone.')) {
                clearCart();
            }
        }
        
        function closeConfirmModal() {
            const modal = document.getElementById('confirmModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            itemToRemove = null;
        }
        
        document.getElementById('confirmRemoveBtn')?.addEventListener('click', function() {
            if (itemToRemove) {
                removeItem(itemToRemove);
                closeConfirmModal();
            }
        });
        
        // Improved updateQuantity with debounce and request queue
        function updateQuantity(itemId, newQuantity) {
            if (newQuantity < 1) return;
            
            // Get the row elements
            const row = document.querySelector(`tr[data-item-id="${itemId}"]`);
            const quantityDisplay = document.getElementById(`quantity-${itemId}`);
            const itemTotalElement = document.getElementById(`total-${itemId}`);
            
            // Update UI immediately for better UX
            if (quantityDisplay) {
                quantityDisplay.textContent = newQuantity;
            }
            
            // Calculate and update item total immediately
            const price = parseFloat(row?.dataset.price || 0);
            const newItemTotal = price * newQuantity;
            if (itemTotalElement) {
                itemTotalElement.textContent = '$' + newItemTotal.toFixed(2);
            }
            
            // Update totals immediately
            recalculateTotals();
            
            // Clear any pending timeout for this item (debounce)
            if (updateTimeouts.has(itemId)) {
                clearTimeout(updateTimeouts.get(itemId));
            }
            
            // Check if there's a pending request for this item
            if (pendingRequests.has(itemId)) {
                // Cancel the previous request by not waiting for it
                // We'll just queue the latest request
                updateTimeouts.set(itemId, setTimeout(() => {
                    sendUpdateRequest(itemId, newQuantity);
                }, 300)); // Wait 300ms after last click before sending request
            } else {
                // Send request after a short delay to batch rapid clicks
                updateTimeouts.set(itemId, setTimeout(() => {
                    sendUpdateRequest(itemId, newQuantity);
                }, 300));
            }
        }
        
        function sendUpdateRequest(itemId, newQuantity) {
            // Mark that we have a pending request for this item
            pendingRequests.set(itemId, true);
            
            fetch(`/cart/update/${itemId}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ quantity: newQuantity })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update the quantity display to match server value
                    const quantityDisplay = document.getElementById(`quantity-${itemId}`);
                    if (quantityDisplay && data.quantity) {
                        quantityDisplay.textContent = data.quantity;
                    }
                    
                    // Update item total if server returned different value
                    if (data.item_total) {
                        const itemTotalElement = document.getElementById(`total-${itemId}`);
                        if (itemTotalElement) {
                            itemTotalElement.textContent = '$' + data.item_total.toFixed(2);
                        }
                    }
                    
                    // Recalculate totals to ensure accuracy
                    recalculateTotals();
                    updateNavbarCartCount();
                    
                    // Show success toast only occasionally (not on every click)
                    if (!updateTimeouts.has(itemId + 'toast')) {
                        showToast(data.message, 'success');
                        updateTimeouts.set(itemId + 'toast', setTimeout(() => {
                            updateTimeouts.delete(itemId + 'toast');
                        }, 1000));
                    }
                } else {
                    // If error, revert to server value by reloading totals
                    recalculateTotals();
                    showToast(data.message || 'Error updating cart', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                // Revert UI by recalculating from server
                recalculateTotals();
                showToast('Network error. Please try again.', 'error');
            })
            .finally(() => {
                pendingRequests.delete(itemId);
                updateTimeouts.delete(itemId);
            });
        }
        
        function removeItem(itemId) {
            fetch(`/cart/remove/${itemId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Remove row with animation
                    const row = document.querySelector(`tr[data-item-id="${itemId}"]`);
                    if (row) {
                        row.style.transition = 'opacity 0.3s';
                        row.style.opacity = '0';
                        setTimeout(() => {
                            row.remove();
                            
                            // Check if cart is empty
                            const remainingItems = document.querySelectorAll('.cart-item').length;
                            if (remainingItems === 0) {
                                window.location.reload();
                            } else {
                                recalculateTotals();
                                updateNavbarCartCount();
                            }
                        }, 300);
                    }
                    
                    showToast(data.message, 'success');
                } else {
                    showToast(data.message || 'Error removing item', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('Network error. Please try again.', 'error');
            });
        }
        
        function clearCart() {
            if (!confirm('Are you sure you want to clear your entire cart?')) {
                return;
            }
            
            fetch(`/cart/clear`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showToast(data.message, 'success');
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                } else {
                    showToast(data.message || 'Error clearing cart', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('Network error. Please try again.', 'error');
            });
        }
        
        function recalculateTotals() {
            let subtotal = 0;
            document.querySelectorAll('.cart-item').forEach(row => {
                const price = parseFloat(row.dataset.price);
                const quantityDisplay = row.querySelector('.quantity-display');
                const quantity = quantityDisplay ? parseInt(quantityDisplay.textContent) : 0;
                subtotal += price * quantity;
            });
            
            const tax = subtotal * 0.08;
            const total = subtotal + tax;
            
            const subtotalElement = document.getElementById('subtotal');
            const taxElement = document.getElementById('tax');
            const totalElement = document.getElementById('total');
            
            if (subtotalElement) subtotalElement.textContent = '$' + subtotal.toFixed(2);
            if (taxElement) taxElement.textContent = '$' + tax.toFixed(2);
            if (totalElement) totalElement.textContent = '$' + total.toFixed(2);
        }
        
        function updateNavbarCartCount() {
            fetch('/cart/count', {
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                const cartCountElement = document.getElementById('cartCount');
                if (cartCountElement && data.count !== undefined) {
                    cartCountElement.textContent = data.count;
                }
            })
            .catch(error => console.error('Error fetching cart count:', error));
        }
        
        function proceedToCheckout() {
            showToast('Checkout page coming soon!', 'success');
        }
        
        function showToast(message, type = 'success') {
            let toast = document.getElementById('toast');
            if (!toast) {
                toast = document.createElement('div');
                toast.id = 'toast';
                toast.className = 'fixed bottom-8 right-8 px-6 py-3 rounded-lg shadow-lg hidden z-50 transition-all';
                document.body.appendChild(toast);
            }
            
            toast.textContent = message;
            toast.classList.remove('hidden', 'bg-red-500', 'bg-green-500', 'bg-purple-900');
            
            if (type === 'error') {
                toast.classList.add('bg-red-500', 'text-white');
            } else {
                toast.classList.add('bg-purple-900', 'text-white');
            }
            
            setTimeout(() => {
                toast.classList.add('hidden');
            }, 2000); // Shorter duration for better UX
        }
        
        // Close modal when clicking outside
        document.getElementById('confirmModal')?.addEventListener('click', function(e) {
            if (e.target === this) {
                closeConfirmModal();
            }
        });
    </script>
    
    <style>
        .quantity-btn {
            transition: all 0.2s ease;
        }
        
        .quantity-btn:hover {
            transform: scale(1.1);
        }
        
        .quantity-btn:active {
            transform: scale(0.95);
        }
        
        .cart-item {
            transition: opacity 0.3s ease;
        }
        
        /* Remove loading overlay since we want instant feedback */
        #loadingOverlay {
            display: none !important;
        }
    </style>
</body>
</html>