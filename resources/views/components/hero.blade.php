<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-purple-900 via-purple-800 to-purple-900 overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23FFD700" fill-opacity="0.4"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E'); background-repeat: repeat;"></div>
    </div>

    <!-- Decorative Gold Elements -->
    <div class="absolute top-0 right-0 w-64 h-64 bg-gold-500 opacity-10 rounded-full filter blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-purple-600 opacity-20 rounded-full filter blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-28">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div class="text-center md:text-left animate-fade-in-up">
                <div class="inline-flex items-center gap-2 bg-purple-800/50 backdrop-blur-sm rounded-full px-4 py-2 mb-6 border border-gold-500/30">
                    <span class="relative flex h-3 w-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-gold-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-gold-500"></span>
                    </span>
                    <span class="text-gold-400 text-sm font-semibold tracking-wide">NEW COLLECTION 2026</span>
                </div>

                <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold text-white mb-6 leading-tight">
                    Elevate Your
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-gold-400 to-gold-600">
                        Fashion Game
                    </span>
                </h1>

                <p class="text-purple-200 text-lg mb-8 leading-relaxed max-w-lg mx-auto md:mx-0">
                    Discover the perfect blend of elegance and comfort. Premium quality women's fashion that makes you stand out.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                    <a href="/shop" class="group relative inline-flex items-center justify-center px-8 py-3 overflow-hidden font-bold text-purple-900 transition-all duration-300 ease-out bg-gradient-to-r from-gold-400 to-gold-500 rounded-full shadow-lg hover:shadow-gold-500/50 hover:scale-105">
                        <span class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-x-full bg-purple-800 group-hover:translate-x-0 ease">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                        </span>
                        <span class="absolute flex items-center justify-center w-full h-full text-purple-900 transition-all duration-300 transform group-hover:translate-x-full">Shop Now</span>
                        <span class="relative invisible">Shop Now</span>
                    </a>

                    <a href="/collections" class="inline-flex items-center justify-center px-8 py-3 font-semibold text-gold-400 transition-all duration-300 border-2 border-gold-400 rounded-full hover:bg-gold-400 hover:text-purple-900 hover:shadow-lg">
                        View Collections
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>

                <!-- Stats -->
                <div class="grid grid-cols-3 gap-4 mt-12 pt-8 border-t border-purple-700">
                    <div>
                        <div class="text-2xl font-bold text-gold-400">5000+</div>
                        <div class="text-purple-300 text-sm">Happy Customers</div>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-gold-400">100%</div>
                        <div class="text-purple-300 text-sm">Quality Guarantee</div>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-gold-400">24/7</div>
                        <div class="text-purple-300 text-sm">Support</div>
                    </div>
                </div>
            </div>

            <!-- Right Image -->
            <div class="relative animate-fade-in-up animation-delay-200">
                <div class="relative rounded-2xl overflow-hidden shadow-2xl shadow-purple-900/50">
                    <div class="absolute inset-0 bg-gradient-to-tr from-purple-900/30 to-gold-500/20 z-10"></div>
                    <img src="{{ asset('images/fashion-hero.jpg') }}" alt="Fashion Model" class="w-full h-auto object-cover transform hover:scale-105 transition-transform duration-700">
                </div>

                <!-- Floating Badges -->
                <div class="absolute -top-4 -right-4 bg-white/10 backdrop-blur-md rounded-2xl p-3 shadow-xl border border-gold-500/30 animate-bounce-slow">
                    <div class="flex items-center gap-2">
                        <div class="w-2 h-2 bg-gold-400 rounded-full animate-pulse"></div>
                        <span class="text-gold-400 font-bold text-sm">✨ Limited Time Offer</span>
                    </div>
                </div>

                <div class="absolute -bottom-4 -left-4 bg-purple-800/80 backdrop-blur-md rounded-2xl p-3 shadow-xl border border-gold-500/30">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-gold-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <span class="text-gold-400 text-sm font-semibold">4.9 ★ Rating</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Wave -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg class="w-full h-12 text-white" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="currentColor"></path>
        </svg>
    </div>
</section>

<!-- Custom Styles -->
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

    @keyframes bounce-slow {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    }

    .animate-bounce-slow {
        animation: bounce-slow 3s ease-in-out infinite;
    }
</style>