<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Collections - Pretty Fashion Hub</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,100..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gradient-to-br from-purple-50 to-white">
    @include('components.navbar')
    
    <!-- Page Header -->
    <div class="bg-gradient-to-r from-pink-950 via-pink-900 to-pink-950 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 animate-fade-in-up">Our Collections</h1>
            <p class="text-purple-200 text-lg md:text-xl max-w-2xl mx-auto animate-fade-in-up animation-delay-200">
                Discover curated collections designed to elevate your style
            </p>
        </div>
    </div>

    <!-- Featured Collection Banner -->
    <div class="relative overflow-hidden bg-gradient-to-r from-purple-900 to-purple-800 mx-4 sm:mx-6 lg:mx-8 mt-8 rounded-2xl shadow-2xl">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23FFD700\" fill-opacity=\"0.4\"%3E%3Cpath d=\"M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E'); background-repeat: repeat;"></div>
        </div>
        <div class="relative max-w-7xl mx-auto py-16 px-8 text-center">
            <div class="inline-block px-4 py-1 bg-gold-500/20 rounded-full mb-4">
                <span class="text-gold-400 text-sm font-semibold tracking-wide">LIMITED TIME OFFER</span>
            </div>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4">Summer Essentials Collection</h2>
            <p class="text-purple-200 text-lg mb-8 max-w-2xl mx-auto">
                Up to 40% off on selected items. Free shipping on orders over $100
            </p>
            <a href="/shop?collection=summer" class="inline-flex items-center px-8 py-3 bg-gold-500 text-purple-900 rounded-full font-semibold hover:bg-gold-600 transition-all duration-300 transform hover:scale-105 shadow-lg">
                Shop Now
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>
    </div>

    <!-- Collections Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-purple-900 mb-4">Shop by Category</h2>
            <div class="w-24 h-1 bg-gold-500 mx-auto"></div>
            <p class="text-gray-600 mt-4">Find exactly what you're looking for</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Gowns Collection -->
            <div class="group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-purple-900 via-purple-900/50 to-transparent z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <img src="https://images.unsplash.com/photo-1566174053879-31528523f8ae?w=800" 
                     alt="Gowns Collection" 
                     class="w-full h-96 object-cover group-hover:scale-110 transition-transform duration-700">
                <div class="absolute bottom-0 left-0 right-0 p-6 z-20 transform translate-y-0 group-hover:translate-y-[-10px] transition-transform duration-500">
                    <h3 class="text-2xl font-bold text-white mb-2">Gowns & Evening</h3>
                    <p class="text-purple-200 mb-4 opacity-0 group-hover:opacity-100 transition-opacity duration-500">Elegant gowns for special occasions</p>
                    <a href="/shop?category=gowns" class="inline-flex items-center text-gold-400 font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        Explore Collection
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
                <div class="absolute top-4 right-4 bg-gold-500 text-purple-900 px-3 py-1 rounded-full text-sm font-bold z-20">
                    Best Sellers
                </div>
            </div>

            <!-- Dresses Collection -->
            <div class="group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-purple-900 via-purple-900/50 to-transparent z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <img src="https://images.unsplash.com/photo-1515372039744-b8f02a3ae446?w=800" 
                     alt="Dresses Collection" 
                     class="w-full h-96 object-cover group-hover:scale-110 transition-transform duration-700">
                <div class="absolute bottom-0 left-0 right-0 p-6 z-20 transform translate-y-0 group-hover:translate-y-[-10px] transition-transform duration-500">
                    <h3 class="text-2xl font-bold text-white mb-2">Casual Dresses</h3>
                    <p class="text-purple-200 mb-4 opacity-0 group-hover:opacity-100 transition-opacity duration-500">Comfortable and stylish everyday wear</p>
                    <a href="/shop?category=dresses" class="inline-flex items-center text-gold-400 font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        Explore Collection
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Bags Collection -->
            <div class="group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-purple-900 via-purple-900/50 to-transparent z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <img src="https://images.unsplash.com/photo-1584917865442-de89df76afd3?w=800" 
                     alt="Bags Collection" 
                     class="w-full h-96 object-cover group-hover:scale-110 transition-transform duration-700">
                <div class="absolute bottom-0 left-0 right-0 p-6 z-20 transform translate-y-0 group-hover:translate-y-[-10px] transition-transform duration-500">
                    <h3 class="text-2xl font-bold text-white mb-2">Luxury Bags</h3>
                    <p class="text-purple-200 mb-4 opacity-0 group-hover:opacity-100 transition-opacity duration-500">Designer handbags and accessories</p>
                    <a href="/shop?category=bags" class="inline-flex items-center text-gold-400 font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        Explore Collection
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
                <div class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-bold z-20">
                    Sale
                </div>
            </div>

            <!-- Shoes Collection -->
            <div class="group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-purple-900 via-purple-900/50 to-transparent z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <img src="https://images.unsplash.com/photo-1543163521-1bf539c55dd2?w=800" 
                     alt="Shoes Collection" 
                     class="w-full h-96 object-cover group-hover:scale-110 transition-transform duration-700">
                <div class="absolute bottom-0 left-0 right-0 p-6 z-20 transform translate-y-0 group-hover:translate-y-[-10px] transition-transform duration-500">
                    <h3 class="text-2xl font-bold text-white mb-2">Footwear</h3>
                    <p class="text-purple-200 mb-4 opacity-0 group-hover:opacity-100 transition-opacity duration-500">Stylish heels, boots, and sandals</p>
                    <a href="/shop?category=shoes" class="inline-flex items-center text-gold-400 font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        Explore Collection
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Jewelry Collection -->
            <div class="group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-purple-900 via-purple-900/50 to-transparent z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <img src="https://images.unsplash.com/photo-1535632066927-ab7c9ab60908?w=800" 
                     alt="Jewelry Collection" 
                     class="w-full h-96 object-cover group-hover:scale-110 transition-transform duration-700">
                <div class="absolute bottom-0 left-0 right-0 p-6 z-20 transform translate-y-0 group-hover:translate-y-[-10px] transition-transform duration-500">
                    <h3 class="text-2xl font-bold text-white mb-2">Jewelry</h3>
                    <p class="text-purple-200 mb-4 opacity-0 group-hover:opacity-100 transition-opacity duration-500">Elegant earrings, necklaces, and rings</p>
                    <a href="/shop?category=earrings" class="inline-flex items-center text-gold-400 font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        Explore Collection
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
                <div class="absolute top-4 right-4 bg-purple-500 text-white px-3 py-1 rounded-full text-sm font-bold z-20">
                    New Arrivals
                </div>
            </div>

            <!-- Outerwear Collection -->
            <div class="group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-purple-900 via-purple-900/50 to-transparent z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <img src="https://images.unsplash.com/photo-1539533113208-f6df8cc8b543?w=800" 
                     alt="Outerwear Collection" 
                     class="w-full h-96 object-cover group-hover:scale-110 transition-transform duration-700">
                <div class="absolute bottom-0 left-0 right-0 p-6 z-20 transform translate-y-0 group-hover:translate-y-[-10px] transition-transform duration-500">
                    <h3 class="text-2xl font-bold text-white mb-2">Outerwear</h3>
                    <p class="text-purple-200 mb-4 opacity-0 group-hover:opacity-100 transition-opacity duration-500">Coats, jackets, and blazers</p>
                    <a href="/shop?category=outerwear" class="inline-flex items-center text-gold-400 font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        Explore Collection
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Trending Products Section -->
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-purple-900 mb-4">Trending Now</h2>
                <div class="w-24 h-1 bg-gold-500 mx-auto"></div>
                <p class="text-gray-600 mt-4">Most popular items this week</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Product 1 -->
                <div class="group bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300">
                    <div class="relative overflow-hidden h-64">
                        <img src="https://images.unsplash.com/photo-1595777457583-95e059d581b8?w=400" 
                             alt="Product" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <button class="bg-gold-500 text-purple-900 px-4 py-2 rounded-lg font-semibold hover:bg-gold-600 transition-colors">
                                Quick View
                            </button>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-purple-900 mb-1">Royal Purple Gown</h3>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-purple-900">$299</span>
                            <span class="text-gray-400 line-through">$499</span>
                        </div>
                        <div class="flex items-center mt-2">
                            <div class="flex text-gold-500">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">...</svg>
                            </div>
                            <span class="text-sm text-gray-500 ml-2">(45 reviews)</span>
                        </div>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="group bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300">
                    <div class="relative overflow-hidden h-64">
                        <img src="https://images.unsplash.com/photo-1495385794356-15371f348c31?w=400" 
                             alt="Product" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <button class="bg-gold-500 text-purple-900 px-4 py-2 rounded-lg font-semibold hover:bg-gold-600 transition-colors">
                                Quick View
                            </button>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-purple-900 mb-1">Floral Maxi Dress</h3>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-purple-900">$129</span>
                        </div>
                        <div class="flex items-center mt-2">
                            <div class="flex text-gold-500">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">...</svg>
                            </div>
                            <span class="text-sm text-gray-500 ml-2">(128 reviews)</span>
                        </div>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="group bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300">
                    <div class="relative overflow-hidden h-64">
                        <img src="https://images.unsplash.com/photo-1548036328-c9fa89d128fa?w=400" 
                             alt="Product" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <button class="bg-gold-500 text-purple-900 px-4 py-2 rounded-lg font-semibold hover:bg-gold-600 transition-colors">
                                Quick View
                            </button>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-purple-900 mb-1">Leather Tote Bag</h3>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-purple-900">$249</span>
                            <span class="text-gray-400 line-through">$399</span>
                        </div>
                        <div class="flex items-center mt-2">
                            <div class="flex text-gold-500">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">...</svg>
                            </div>
                            <span class="text-sm text-gray-500 ml-2">(89 reviews)</span>
                        </div>
                    </div>
                </div>

                <!-- Product 4 -->
                <div class="group bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300">
                    <div class="relative overflow-hidden h-64">
                        <img src="https://images.unsplash.com/photo-1543163521-1bf539c55dd2?w=400" 
                             alt="Product" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <button class="bg-gold-500 text-purple-900 px-4 py-2 rounded-lg font-semibold hover:bg-gold-600 transition-colors">
                                Quick View
                            </button>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-purple-900 mb-1">Gold Heeled Sandals</h3>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-purple-900">$99</span>
                        </div>
                        <div class="flex items-center mt-2">
                            <div class="flex text-gold-500">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">...</svg>
                            </div>
                            <span class="text-sm text-gray-500 ml-2">(67 reviews)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.footer')

    <style>
        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fade-in-up 0.8s ease-out forwards;
        }

        .animation-delay-200 {
            animation-delay: 0.2s;
            opacity: 0;
            animation-fill-mode: forwards;
        }
    </style>

    <script>
        // Add quick view functionality
        document.querySelectorAll('.group .absolute button').forEach(button => {
            button.addEventListener('click', function() {
                // Implement quick view modal here
                alert('Quick view coming soon!');
            });
        });
        
    </script>
</body>
</html>