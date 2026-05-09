<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Shop - Pretty Fashion Hub</title>
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
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Our Collection</h1>
            <p class="text-purple-200 text-lg">Discover elegance in every piece</p>
        </div>
    </div>
    
    <!-- Shop Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar Filters -->
            <div class="lg:w-1/4">
                <div class="bg-white rounded-2xl shadow-lg p-6 sticky top-24">
                    <h3 class="text-lg font-bold text-purple-900 mb-4">Filters</h3>
                    
                    <!-- Category Filter -->
                    <div class="mb-6">
                        <h4 class="font-semibold text-purple-800 mb-3">Categories</h4>
                        <div class="space-y-2">
                            <label class="flex items-center">
                                <input type="radio" name="category" value="all" class="form-radio text-gold-500 focus:ring-gold-400" checked>
                                <span class="ml-2 text-gray-700">All Products</span>
                            </label>
                            @foreach($categories as $category)
                            <label class="flex items-center">
                                <input type="radio" name="category" value="{{ $category }}" class="form-radio text-gold-500 focus:ring-gold-400">
                                <span class="ml-2 text-gray-700">{{ ucfirst($category) }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                    
                    <!-- Price Filter -->
                    <div class="mb-6">
                        <h4 class="font-semibold text-purple-800 mb-3">Price Range</h4>
                        <div class="space-y-2">
                            <input type="range" id="priceRange" min="0" max="500" step="10" class="w-full">
                            <div class="flex justify-between text-sm text-gray-600">
                                <span>$<span id="minPrice">0</span></span>
                                <span>$<span id="maxPrice">500</span></span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Sort -->
                    <div class="mb-6">
                        <h4 class="font-semibold text-purple-800 mb-3">Sort By</h4>
                        <select id="sortBy" class="w-full px-4 py-2 border border-purple-200 rounded-lg focus:outline-none focus:border-gold-400">
                            <option value="default">Default</option>
                            <option value="newest">Newest First</option>
                            <option value="price_low">Price: Low to High</option>
                            <option value="price_high">Price: High to Low</option>
                        </select>
                    </div>
                    
                    <button id="resetFilters" class="w-full px-4 py-2 bg-purple-100 text-purple-700 rounded-lg hover:bg-purple-200 transition-colors">
                        Reset Filters
                    </button>
                </div>
            </div>
            
            <!-- Products Grid -->
            <div class="lg:w-3/4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="productsGrid">
                    @foreach($products as $product)
                    @php
                        // Decode JSON arrays
                        $productImages = is_string($product->images) ? json_decode($product->images, true) : $product->images;
                        $productColors = is_string($product->colors) ? json_decode($product->colors, true) : $product->colors;
                        $firstImage = is_array($productImages) && !empty($productImages) ? $productImages[0] : 'https://via.placeholder.com/400x500?text=No+Image';
                    @endphp
                    <div class="product-card group" data-price="{{ $product->price }}" data-category="{{ $product->category }}" data-date="{{ $product->created_at }}" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-description="{{ $product->description }}" data-compare-price="{{ $product->compare_price }}" data-images="{{ json_encode($productImages) }}" data-colors="{{ json_encode($productColors) }}" data-sizes="{{ json_encode(is_string($product->sizes) ? json_decode($product->sizes, true) : $product->sizes) }}" data-stock="{{ $product->stock }}">
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                            <!-- Product Image -->
                            <div class="relative overflow-hidden bg-purple-100 h-80">
                                <img src="{{ $firstImage }}" 
                                     alt="{{ $product->name }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                
                                <!-- Badges -->
                                @if($product->on_sale)
                                <div class="absolute top-4 left-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                                    SALE
                                </div>
                                @endif
                                
                                @if($product->new_arrival)
                                <div class="absolute top-4 right-4 bg-gold-500 text-purple-900 px-3 py-1 rounded-full text-sm font-bold">
                                    NEW
                                </div>
                                @endif
                                
                                @if($product->compare_price && $product->compare_price > $product->price)
                                <div class="absolute bottom-4 left-4 bg-purple-900 text-white px-3 py-1 rounded-full text-sm font-bold">
                                    -{{ $product->discounted_percentage }}%
                                </div>
                                @endif
                                
                                <!-- Quick Actions -->
                                <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-4">
                                    <button onclick="quickView({{ $product->id }})" class="bg-white text-purple-900 p-3 rounded-full hover:bg-gold-400 transition-colors transform translate-y-4 group-hover:translate-y-0 transition-transform">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </button>
                                    <button onclick="showProductModal({{ $product->id }})" class="bg-gold-500 text-purple-900 p-3 rounded-full hover:bg-gold-400 transition-colors transform translate-y-4 group-hover:translate-y-0 transition-transform">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6m10-6l1.5 6m-8.5 0a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zm9 0a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Product Info -->
                            <div class="p-5">
                                <div class="text-sm text-gold-600 mb-1">{{ ucfirst($product->category) }}</div>
                                <h3 class="font-bold text-xl text-purple-900 mb-2">{{ $product->name }}</h3>
                                <div class="flex items-baseline gap-2 mb-3">
                                    <span class="text-2xl font-bold text-purple-900">${{ number_format($product->price, 2) }}</span>
                                    @if($product->compare_price && $product->compare_price > $product->price)
                                    <span class="text-gray-400 line-through">${{ number_format($product->compare_price, 2) }}</span>
                                    @endif
                                </div>
                                
                                <!-- Colors -->
                                @if($productColors && is_array($productColors) && count($productColors) > 0)
                                <div class="flex gap-2 mb-4">
                                    @foreach(array_slice($productColors, 0, 3) as $color)
                                    <div class="w-5 h-5 rounded-full border border-gray-300" style="background-color: {{ $color }};"></div>
                                    @endforeach
                                    @if(count($productColors) > 3)
                                    <span class="text-xs text-gray-500">+{{ count($productColors) - 3 }}</span>
                                    @endif
                                </div>
                                @endif
                                
                                <button onclick="addToCart({{ $product->id }})" class="w-full bg-gradient-to-r from-purple-900 to-purple-800 text-white py-3 rounded-xl hover:from-gold-500 hover:to-gold-600 hover:text-purple-900 transition-all duration-300 font-semibold">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <!-- Pagination -->
                <div class="mt-12">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
    
    @include('components.footer')
    
    <!-- Product Modal -->
    <div id="productModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <div id="modalContent"></div>
        </div>
    </div>
    
    <!-- Toast Notification -->
    <div id="toast" class="fixed bottom-8 right-8 bg-purple-900 text-white px-6 py-3 rounded-lg shadow-lg hidden z-50">
        <span id="toastMessage"></span>
    </div>
    
    <script>
        // Build products data from DOM elements
        const productsData = {};
        document.querySelectorAll('.product-card').forEach(card => {
            const id = parseInt(card.dataset.id);
            productsData[id] = {
                id: id,
                name: card.dataset.name,
                description: card.dataset.description,
                price: parseFloat(card.dataset.price),
                compare_price: card.dataset.comparePrice ? parseFloat(card.dataset.comparePrice) : null,
                images: JSON.parse(card.dataset.images || '[]'),
                sizes: JSON.parse(card.dataset.sizes || '[]'),
                colors: JSON.parse(card.dataset.colors || '[]'),
                stock: parseInt(card.dataset.stock),
                category: card.dataset.category
            };
        });
        
        let currentProductData = null;
        let selectedSize = null;
        let selectedColor = null;
        
        // Add to Cart function with auth check
       function addToCart(productId, size = null, color = null, quantity = 1) {
    fetch('{{ route("cart.add") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            product_id: productId,
            size: size,
            color: color,
            quantity: quantity
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showToast(data.message, 'success');
            updateCartCount(data.cart_count);
            closeModal();
        } else if (data.redirect) {
            window.location.href = data.redirect;
        } else {
            showToast(data.message, 'error');
        }
    })
    .catch(error => {
        showToast('Error adding to cart', 'error');
    });
}
        
        function showProductModal(productId) {
            currentProductData = productsData[productId];
            if (!currentProductData) return;
            
            const modal = document.getElementById('productModal');
            const modalContent = document.getElementById('modalContent');
            
            let sizesHtml = '';
            if (currentProductData.sizes && currentProductData.sizes.length > 0) {
                sizesHtml = `
                    <div class="mb-6">
                        <label class="block text-purple-900 font-semibold mb-2">Select Size</label>
                        <div class="flex gap-2 flex-wrap">
                            ${currentProductData.sizes.map(size => `
                                <button onclick="selectSize('${size}')" class="size-option px-4 py-2 border border-purple-200 rounded-lg hover:border-gold-400 transition-colors">
                                    ${size}
                                </button>
                            `).join('')}
                        </div>
                    </div>
                `;
            }
            
            let colorsHtml = '';
            if (currentProductData.colors && currentProductData.colors.length > 0) {
                colorsHtml = `
                    <div class="mb-6">
                        <label class="block text-purple-900 font-semibold mb-2">Select Color</label>
                        <div class="flex gap-3 flex-wrap">
                            ${currentProductData.colors.map(color => `
                                <button onclick="selectColor('${color}')" class="color-option w-8 h-8 rounded-full border-2 border-gray-300 hover:border-gold-400" style="background-color: ${color};"></button>
                            `).join('')}
                        </div>
                    </div>
                `;
            }
            
            const productImage = currentProductData.images && currentProductData.images.length > 0 
                ? currentProductData.images[0] 
                : 'https://via.placeholder.com/400x500?text=No+Image';
            
            modalContent.innerHTML = `
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <h2 class="text-2xl font-bold text-purple-900">${currentProductData.name}</h2>
                        <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <img src="${productImage}" alt="${currentProductData.name}" class="w-full rounded-lg">
                        </div>
                        <div>
                            <div class="mb-4">
                                <div class="text-3xl font-bold text-purple-900">$${currentProductData.price}</div>
                                ${currentProductData.compare_price ? `<div class="text-gray-400 line-through">$${currentProductData.compare_price}</div>` : ''}
                            </div>
                            
                            <p class="text-gray-600 mb-6">${currentProductData.description}</p>
                            
                            ${sizesHtml}
                            ${colorsHtml}
                            
                            <div class="mb-6">
                                <label class="block text-purple-900 font-semibold mb-2">Quantity</label>
                                <input type="number" id="quantity" value="1" min="1" max="${currentProductData.stock}" class="w-24 px-3 py-2 border border-purple-200 rounded-lg">
                            </div>
                            
                            <button onclick="addToCartFromModal()" class="w-full bg-gradient-to-r from-purple-900 to-purple-800 text-white py-3 rounded-xl hover:from-gold-500 hover:to-gold-600 transition-all duration-300 font-semibold">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            `;
            
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }
        
        function selectSize(size) {
            selectedSize = size;
            document.querySelectorAll('.size-option').forEach(btn => {
                btn.classList.remove('border-gold-400', 'bg-gold-50');
                if (btn.innerText === size) {
                    btn.classList.add('border-gold-400', 'bg-gold-50');
                }
            });
        }
        
        function selectColor(color) {
            selectedColor = color;
            document.querySelectorAll('.color-option').forEach(btn => {
                btn.classList.remove('ring-2', 'ring-gold-400');
                if (btn.style.backgroundColor === color) {
                    btn.classList.add('ring-2', 'ring-gold-400');
                }
            });
        }
        
        function addToCartFromModal() {
            const quantity = document.getElementById('quantity').value;
            addToCart(currentProductData.id, selectedSize, selectedColor, parseInt(quantity));
        }
        
        function closeModal() {
            const modal = document.getElementById('productModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            selectedSize = null;
            selectedColor = null;
        }
        
        function showToast(message, type = 'success') {
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toastMessage');
            
            toastMessage.textContent = message;
            toast.classList.remove('hidden');
            
            if (type === 'error') {
                toast.classList.add('bg-red-500');
                toast.classList.remove('bg-purple-900');
            } else {
                toast.classList.add('bg-purple-900');
                toast.classList.remove('bg-red-500');
            }
            
            setTimeout(() => {
                toast.classList.add('hidden');
            }, 3000);
        }
        
        function updateCartCount(count) {
            const cartCountElement = document.getElementById('cartCount');
            if (cartCountElement) {
                cartCountElement.textContent = count;
            }
        }
        
        function quickView(productId) {
            showProductModal(productId);
        }
        
        // Filter functionality
        document.querySelectorAll('input[name="category"]').forEach(radio => {
            radio.addEventListener('change', filterProducts);
        });
        
        document.getElementById('sortBy').addEventListener('change', filterProducts);
        
        let currentMinPrice = 0;
        let currentMaxPrice = 500;
        
        const priceRange = document.getElementById('priceRange');
        if (priceRange) {
            priceRange.addEventListener('input', function(e) {
                currentMaxPrice = parseInt(e.target.value);
                document.getElementById('maxPrice').textContent = currentMaxPrice;
                filterProducts();
            });
        }
        
        const resetBtn = document.getElementById('resetFilters');
        if (resetBtn) {
            resetBtn.addEventListener('click', function() {
                const allRadio = document.querySelector('input[value="all"]');
                if (allRadio) allRadio.checked = true;
                const sortSelect = document.getElementById('sortBy');
                if (sortSelect) sortSelect.value = 'default';
                if (priceRange) priceRange.value = 500;
                currentMaxPrice = 500;
                document.getElementById('maxPrice').textContent = '500';
                filterProducts();
            });
        }
        
        function filterProducts() {
            const selectedCategory = document.querySelector('input[name="category"]:checked')?.value || 'all';
            const sortBy = document.getElementById('sortBy')?.value || 'default';
            
            let products = Array.from(document.querySelectorAll('.product-card'));
            
            // Filter by category
            if (selectedCategory !== 'all') {
                products = products.filter(product => 
                    product.dataset.category === selectedCategory
                );
            }
            
            // Filter by price
            products = products.filter(product => {
                const price = parseFloat(product.dataset.price);
                return price >= currentMinPrice && price <= currentMaxPrice;
            });
            
            // Sort products
            if (sortBy === 'price_low') {
                products.sort((a, b) => parseFloat(a.dataset.price) - parseFloat(b.dataset.price));
            } else if (sortBy === 'price_high') {
                products.sort((a, b) => parseFloat(b.dataset.price) - parseFloat(a.dataset.price));
            } else if (sortBy === 'newest') {
                products.sort((a, b) => new Date(b.dataset.date) - new Date(a.dataset.date));
            }
            
            // Update display
            const grid = document.getElementById('productsGrid');
            if (grid) {
                grid.innerHTML = '';
                products.forEach(product => grid.appendChild(product));
            }
        }
        
        // Close modal on outside click
        const modal = document.getElementById('productModal');
        if (modal) {
            modal.addEventListener('click', function(e) {
                if (e.target === this) {
                    closeModal();
                }
            });
        }
    </script>
</body>
</html>