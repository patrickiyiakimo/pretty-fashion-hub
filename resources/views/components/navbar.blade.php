<nav class="bg-gradient-to-r from-pink-950 via-pink-900 to-pink-950 shadow-2xl sticky top-0 z-50 border-b border-gold-500/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16 md:h-20">
            
            <!-- Logo/Brand - Always visible -->
            <div class="flex-shrink-0">
                <a href="/" class="group flex items-center space-x-2">
                    <!-- Diamond Icon -->
                    <div class="relative">
                        <div class="absolute inset-0 bg-gold-500 blur-md opacity-50 group-hover:opacity-75 transition-opacity"></div>
                        <svg class="relative w-6 h-6 md:w-8 md:h-8 text-gold-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-sm md:text-xl font-bold bg-gradient-to-r from-gold-400 to-gold-600 text-transparent bg-clip-text group-hover:from-gold-300 group-hover:to-gold-500 transition-all">
                            Pretty Fashion Hub
                        </div>
                        <div class="hidden md:block text-xs text-gold-500/60 tracking-wider">ELEVATE YOUR STYLE</div>
                    </div>
                </a>
            </div>

            <!-- Desktop Navigation Links (Hidden on mobile) -->
            <div class="hidden lg:flex items-center space-x-1">
                <a href="/" class="nav-link px-4 py-2 text-pink-200 hover:text-gold-400 transition-all duration-300 relative group">
                    <span>Home</span>
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-gold-400 to-gold-600 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="/shop" class="nav-link px-4 py-2 text-pink-200 hover:text-gold-400 transition-all duration-300 relative group">
                    <span>Shop</span>
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-gold-400 to-gold-600 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="/collections" class="nav-link px-4 py-2 text-pink-200 hover:text-gold-400 transition-all duration-300 relative group">
                    <span>Collections</span>
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-gold-400 to-gold-600 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="/about" class="nav-link px-4 py-2 text-pink-200 hover:text-gold-400 transition-all duration-300 relative group">
                    <span>About</span>
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-gold-400 to-gold-600 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="/contact" class="nav-link px-4 py-2 text-pink-200 hover:text-gold-400 transition-all duration-300 relative group">
                    <span>Contact</span>
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-gold-400 to-gold-600 group-hover:w-full transition-all duration-300"></span>
                </a>
            </div>

            <!-- Right Side Icons -->
            <div class="flex items-center space-x-2 md:space-x-4">
                <!-- Search Button (Hidden on mobile) -->
                <button id="searchButton" class="hidden md:block relative p-2 text-pink-200 hover:text-gold-400 transition-all duration-300 hover:scale-110">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>

                <!-- Wishlist (Hidden on mobile) -->
                <a href="/wishlist" class="hidden md:block relative p-2 text-pink-200 hover:text-gold-400 transition-all duration-300 hover:scale-110">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                    <span id="wishlistCount" class="absolute -top-1 -right-1 bg-gold-500 text-pink-900 text-xs rounded-full w-4 h-4 flex items-center justify-center font-bold">0</span>
                </a>

                <!-- Cart Icon - Always visible -->
                <a href="/cart" class="relative p-2 text-pink-200 hover:text-gold-400 transition-all duration-300 hover:scale-110">
                    <svg class="w-5 h-5 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6m10-6l1.5 6m-8.5 0a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zm9 0a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"></path>
                    </svg>
                    <span id="cartCount" class="absolute -top-1 -right-1 bg-gold-500 text-pink-900 text-xs rounded-full w-5 h-5 flex items-center justify-center font-bold shadow-lg">0</span>
                </a>

                <!-- User Authentication (Desktop) -->
                @auth
                    <div class="hidden md:block relative ml-2">
                        <button id="userMenuButton" class="flex items-center space-x-2 focus:outline-none group">
                            <div class="relative">
                                <div class="absolute inset-0 bg-gold-500 rounded-full blur-sm opacity-0 group-hover:opacity-50 transition-opacity"></div>
                                <div class="relative w-10 h-10 rounded-full bg-gradient-to-br from-gold-400 to-gold-600 flex items-center justify-center shadow-lg">
                                    <span class="text-pink-900 font-bold text-sm uppercase">{{ substr(Auth::user()->fullname, 0, 1) }}</span>
                                </div>
                            </div>
                            <div class="hidden lg:block text-left">
                                <div class="text-sm font-semibold text-white">{{ Str::limit(Auth::user()->fullname, 15) }}</div>
                                <div class="text-xs text-gold-400">Member</div>
                            </div>
                            <svg class="w-4 h-4 text-pink-200 group-hover:text-gold-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <!-- Dropdown Menu -->
                        <div id="userDropdown" class="absolute right-0 w-72 mt-3 py-2 bg-white rounded-xl shadow-2xl opacity-0 invisible transition-all duration-300 z-50 border border-pink-100">
                            <div class="px-4 py-3 border-b border-pink-100">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-pink-600 to-pink-800 flex items-center justify-center">
                                        <span class="text-white font-bold text-lg uppercase">{{ substr(Auth::user()->fullname, 0, 1) }}</span>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-gray-800">{{ Auth::user()->fullname }}</div>
                                        <div class="text-sm text-gray-500">{{ Auth::user()->email }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="py-2">
                                <a href="/profile" class="flex items-center px-4 py-3 text-gray-700 hover:bg-pink-50 transition-colors group">
                                    <svg class="w-5 h-5 text-pink-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    <span class="flex-1">My Profile</span>
                                    <span class="text-xs text-gray-400">View & edit</span>
                                </a>
                                <a href="/orders" class="flex items-center px-4 py-3 text-gray-700 hover:bg-pink-50 transition-colors group">
                                    <svg class="w-5 h-5 text-pink-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                    </svg>
                                    <span class="flex-1">My Orders</span>
                                    <span class="text-xs text-gray-400">Track orders</span>
                                </a>
                                <a href="/wishlist" class="flex items-center px-4 py-3 text-gray-700 hover:bg-pink-50 transition-colors group">
                                    <svg class="w-5 h-5 text-pink-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                    <span class="flex-1">Wishlist</span>
                                    <span class="text-xs text-gray-400">Saved items</span>
                                </a>
                                <hr class="my-2">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="flex w-full items-center px-4 py-3 text-red-600 hover:bg-red-50 transition-colors">
                                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                        </svg>
                                        <span class="flex-1 text-left">Logout</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="hidden md:flex items-center space-x-2">
                        <a href="{{ route('login') }}" class="flex items-center space-x-2 px-4 py-2 bg-gradient-to-r from-gold-500 to-gold-600 text-pink-900 hover:bg-pink-900 hover:text-white transition-all duration-300 font-semibold shadow-lg hover:shadow-xl">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                            <span>Sign In</span>
                        </a>
                        <a href="{{ route('register') }}" class="flex items-center space-x-2 px-4 py-2 border border-gold-500 text-gold-400 hover:bg-gold-500 hover:text-pink-900 transition-all duration-300 font-semibold">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                            <span>Register</span>
                        </a>
                    </div>
                @endauth

                <!-- Mobile Menu Button - Only shows on mobile -->
                <button id="mobileMenuButton" class="lg:hidden p-2 rounded-lg text-pink-200 hover:text-gold-400 hover:bg-pink-800 transition-all duration-300 focus:outline-none">
                    <svg id="menuIcon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg id="closeIcon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Search Bar (Hidden by default) -->
        <div id="searchBar" class="hidden py-4 border-t border-pink-800/50">
            <div class="relative">
                <input type="text" id="searchInput" placeholder="Search for products, categories, or brands..." 
                       class="w-full px-4 py-3 pl-12 bg-pink-800/50 border border-pink-700 rounded-xl text-white placeholder-pink-300 focus:outline-none focus:border-gold-500 transition-colors">
                <svg class="absolute left-4 top-3.5 w-5 h-5 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
        </div>

        <!-- Mobile Menu (All navigation links appear here when hamburger is clicked) -->
        <div id="mobileMenu" class="hidden lg:hidden py-4 border-t border-pink-800/50">
            <div class="flex flex-col space-y-2">
                <!-- Main Navigation Links -->
                <a href="/" class="px-4 py-3 text-pink-200 hover:text-gold-400 hover:bg-pink-800/50 rounded-lg transition-all duration-300 flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Home
                </a>
                <a href="/shop" class="px-4 py-3 text-pink-200 hover:text-gold-400 hover:bg-pink-800/50 rounded-lg transition-all duration-300 flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    Shop
                </a>
                <a href="/collections" class="px-4 py-3 text-pink-200 hover:text-gold-400 hover:bg-pink-800/50 rounded-lg transition-all duration-300 flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    Collections
                </a>
                <a href="/about" class="px-4 py-3 text-pink-200 hover:text-gold-400 hover:bg-pink-800/50 rounded-lg transition-all duration-300 flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    About
                </a>
                <a href="/contact" class="px-4 py-3 text-pink-200 hover:text-gold-400 hover:bg-pink-800/50 rounded-lg transition-all duration-300 flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    Contact
                </a>
                
                <!-- Search on mobile -->
                <div class="px-4 py-2">
                    <div class="relative">
                        <input type="text" id="mobileSearchInput" placeholder="Search products..." 
                               class="w-full px-4 py-2 pl-10 bg-pink-800/50 border border-pink-700 rounded-lg text-white placeholder-pink-300 focus:outline-none focus:border-gold-500 transition-colors">
                        <svg class="absolute left-3 top-2.5 w-4 h-4 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
                
                <!-- Wishlist on mobile -->
                <a href="/wishlist" class="px-4 py-3 text-pink-200 hover:text-gold-400 hover:bg-pink-800/50 rounded-lg transition-all duration-300 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                        Wishlist
                    </div>
                    <span id="mobileWishlistCount" class="bg-gold-500 text-pink-900 text-xs rounded-full w-5 h-5 flex items-center justify-center font-bold">0</span>
                </a>
                
                @guest
                    <div class="pt-4 mt-2 border-t border-pink-800/50 space-y-2">
                        <a href="{{ route('login') }}" class="block px-4 py-3 text-center bg-gradient-to-r from-gold-500 to-gold-600 text-pink-900 font-semibold">
                            Sign In
                        </a>
                        <a href="{{ route('register') }}" class="block px-4 py-3 text-center border border-gold-500 text-gold-400 font-semibold">
                            Register
                        </a>
                    </div>
                @else
                    <div class="pt-4 mt-2 border-t border-pink-800/50">
                        <div class="px-4 py-3 bg-pink-800/30 rounded-lg mb-2">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-gold-400 to-gold-600 flex items-center justify-center">
                                    <span class="text-pink-900 font-bold text-sm uppercase">{{ substr(Auth::user()->fullname, 0, 1) }}</span>
                                </div>
                                <div>
                                    <div class="text-white font-semibold">{{ Auth::user()->fullname }}</div>
                                    <div class="text-xs text-gold-400">{{ Auth::user()->email }}</div>
                                </div>
                            </div>
                        </div>
                        <a href="/profile" class="px-4 py-3 text-pink-200 hover:text-gold-400 hover:bg-pink-800/50 rounded-lg transition-all duration-300 flex items-center gap-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            My Profile
                        </a>
                        <a href="/orders" class="px-4 py-3 text-pink-200 hover:text-gold-400 hover:bg-pink-800/50 rounded-lg transition-all duration-300 flex items-center gap-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                            My Orders
                        </a>
                        <form method="POST" action="{{ route('logout') }}" id="logout-form">
    @csrf
    <button type="submit" class="flex w-full items-center px-4 py-3 text-red-400 hover:text-red-300 hover:bg-pink-800/50 rounded-lg transition-all duration-300 gap-3">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
        </svg>
        <span class="flex-1 text-left">Logout</span>
    </button>
</form>


                    </div>
                @endguest
            </div>
        </div>
    </div>
</nav>

<style>
    /* Smooth scroll behavior */
    html {
        scroll-behavior: smooth;
    }
    
    /* Custom scrollbar - Pink theme */
    ::-webkit-scrollbar {
        width: 8px;
    }
    
    ::-webkit-scrollbar-track {
        background: #831843;
    }
    
    ::-webkit-scrollbar-thumb {
        background: #DAA520;
        border-radius: 4px;
    }
    
    ::-webkit-scrollbar-thumb:hover {
        background: #FFD700;
    }
    
    /* Animation for cart count */
    @keyframes cartPulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.2); }
    }
    
    .cart-updated {
        animation: cartPulse 0.3s ease-in-out;
    }
</style>

<script>
    // Initialize cart count on page load
    document.addEventListener('DOMContentLoaded', function() {
        updateCartCountFromServer();
    });
    
    // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobileMenuButton');
    const mobileMenu = document.getElementById('mobileMenu');
    const menuIcon = document.getElementById('menuIcon');
    const closeIcon = document.getElementById('closeIcon');
    
    if (mobileMenuButton) {
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            menuIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
        });
    }
    
    // Search bar toggle
    const searchButton = document.getElementById('searchButton');
    const searchBar = document.getElementById('searchBar');
    
    if (searchButton) {
        searchButton.addEventListener('click', () => {
            searchBar.classList.toggle('hidden');
        });
    }
    
    // User dropdown toggle
    const userMenuButton = document.getElementById('userMenuButton');
    const userDropdown = document.getElementById('userDropdown');
    
    if (userMenuButton && userDropdown) {
        userMenuButton.addEventListener('click', (e) => {
            e.stopPropagation();
            userDropdown.classList.toggle('opacity-0');
            userDropdown.classList.toggle('invisible');
            userDropdown.classList.toggle('opacity-100');
            userDropdown.classList.toggle('visible');
        });
        
        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (userMenuButton && !userMenuButton.contains(e.target) && !userDropdown.contains(e.target)) {
                userDropdown.classList.add('opacity-0', 'invisible');
                userDropdown.classList.remove('opacity-100', 'visible');
            }
        });
    }
    
    // Update cart count from server
    function updateCartCountFromServer() {
        @auth
        fetch('/cart/count')
            .then(response => response.json())
            .then(data => {
                if (data.count !== undefined) {
                    updateCartCount(data.count);
                }
            })
            .catch(error => {
                console.error('Error fetching cart count:', error);
                updateCartCount(0);
            });
        @else
        updateCartCount(0);
        @endauth
    }
    
    // Update cart count display
    function updateCartCount(count) {
        const cartCountElement = document.getElementById('cartCount');
        if (cartCountElement) {
            const oldCount = parseInt(cartCountElement.textContent);
            cartCountElement.textContent = count;
            
            if (oldCount !== count && count > 0) {
                cartCountElement.classList.add('cart-updated');
                setTimeout(() => {
                    cartCountElement.classList.remove('cart-updated');
                }, 300);
            }
        }
        
        const mobileWishlistCount = document.getElementById('mobileWishlistCount');
        if (mobileWishlistCount) {
            mobileWishlistCount.textContent = count;
        }
    }
    
    // Active link highlighting
    const currentPath = window.location.pathname;
    document.querySelectorAll('.nav-link, #mobileMenu a[href]').forEach(link => {
        const linkPath = link.getAttribute('href');
        if (linkPath && currentPath === linkPath) {
            link.classList.add('text-gold-400');
            if (link.classList.contains('nav-link')) {
                const underline = link.querySelector('span:last-child');
                if (underline) {
                    underline.classList.add('w-full');
                }
            }
        }
    });
    
    // Search functionality
    function performSearch(searchTerm) {
        if (searchTerm.length > 2) {
            window.location.href = '/shop?search=' + encodeURIComponent(searchTerm);
        }
    }
    
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                performSearch(this.value);
            }
        });
    }
    
    const mobileSearchInput = document.getElementById('mobileSearchInput');
    if (mobileSearchInput) {
        mobileSearchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                performSearch(this.value);
            }
        });
    }

    // Handle logout with proper CSRF
    document.getElementById('userDropdown')?.addEventListener('click', function(e) {
        if (e.target.closest('#logout-form') || e.target.closest('button[type="submit"]')) {
            e.preventDefault();
            const form = document.getElementById('logout-form');
            if (form) {
                form.submit();
            }
        }
    });
</script>