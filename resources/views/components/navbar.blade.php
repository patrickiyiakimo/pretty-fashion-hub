<nav class="bg-purple-900 shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="/" class="text-2xl font-bold bg-gradient-to-r from-gold-400 to-gold-600 text-transparent bg-clip-text">
                    Pretty Fashion Hub
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-8">
                <a href="/" class="text-purple-200 hover:text-gold-400 transition-colors duration-300">Home</a>
                <a href="/shop" class="text-purple-200 hover:text-gold-400 transition-colors duration-300">Shop</a>
                <a href="/collections" class="text-purple-200 hover:text-gold-400 transition-colors duration-300">Collections</a>
                <a href="/about" class="text-purple-200 hover:text-gold-400 transition-colors duration-300">About</a>
                <a href="/contact" class="text-purple-200 hover:text-gold-400 transition-colors duration-300">Contact</a>
            </div>

            <!-- Icons -->
            <div class="flex items-center space-x-4">
                <a href="/search" class="text-purple-200 hover:text-gold-400 transition-colors duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </a>
                <a href="/wishlist" class="text-purple-200 hover:text-gold-400 transition-colors duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </a>
                <a href="/cart" class="text-purple-200 hover:text-gold-400 transition-colors duration-300 relative">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6m10-6l1.5 6m-8.5 0a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zm9 0a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"></path>
                    </svg>
                    <span class="absolute -top-2 -right-2 bg-gold-500 text-purple-900 text-xs rounded-full w-4 h-4 flex items-center justify-center font-bold">0</span>
                </a>
                <a href="/account" class="text-purple-200 hover:text-gold-400 transition-colors duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-purple-200 hover:text-gold-400 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-purple-800">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="/" class="block px-3 py-2 text-purple-200 hover:text-gold-400 hover:bg-purple-700 rounded-md">Home</a>
            <a href="/shop" class="block px-3 py-2 text-purple-200 hover:text-gold-400 hover:bg-purple-700 rounded-md">Shop</a>
            <a href="/collections" class="block px-3 py-2 text-purple-200 hover:text-gold-400 hover:bg-purple-700 rounded-md">Collections</a>
            <a href="/about" class="block px-3 py-2 text-purple-200 hover:text-gold-400 hover:bg-purple-700 rounded-md">About</a>
            <a href="/contact" class="block px-3 py-2 text-purple-200 hover:text-gold-400 hover:bg-purple-700 rounded-md">Contact</a>
        </div>
    </div>
</nav>

<script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-button')?.addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>