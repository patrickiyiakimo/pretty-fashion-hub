<!-- Hero Section -->
<section class="relative min-h-screen flex items-center overflow-hidden">
    <!-- Background Video -->
    <div class="absolute inset-0 z-0">
        <video autoplay loop muted playsinline class="w-full h-full object-cover">
            <source src="{{ asset('videos/pretty-fashion-bg.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-pink-900/85 via-pink-800/75 to-pink-900/85"></div>
    </div>

    <!-- Subtle Pattern Overlay -->
    <div class="absolute inset-0 opacity-10 z-0">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23FFFFFF" fill-opacity="0.15"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E'); background-repeat: repeat;"></div>
    </div>

    <!-- Decorative Gold Elements -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-gold-500 opacity-10 rounded-full filter blur-3xl z-0"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96  filter blur-3xl z-0"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-28">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div class="text-center md:text-left animate-fade-in-up">
                <div class="inline-flex items-center gap-2 bg-pink-700/50 backdrop-blur-sm rounded-full px-4 py-2 mb-6 border border-gold-500/30">
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

                <p class="text-pink-100 text-lg mb-8 leading-relaxed max-w-lg mx-auto md:mx-0">
                    Discover the perfect blend of elegance and comfort. Premium quality women's fashion that makes you stand out.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                    <a href="/shop" class="group relative inline-flex items-center justify-center px-8 py-3 overflow-hidden font-bold text-pink-900 transition-all duration-300 ease-out bg-gradient-to-r from-gold-400 to-gold-500 ">
                        <span class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-x-full bg-pink-700 group-hover:translate-x-0 ease">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                        </span>
                        <span class="absolute flex items-center justify-center w-full h-full text-pink-900 transition-all duration-300 transform group-hover:translate-x-full">Shop Now</span>
                        <span class="relative invisible">Shop Now</span>
                    </a>

                    <a href="/collections" class="inline-flex items-center justify-center px-8 py-3 font-semibold text-gold-400 transition-all duration-300 border-2 border-gold-400  hover:bg-gold-400 hover:text-pink-900 hover:shadow-lg">
                        View Collections
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>

                <!-- Stats -->
                <div class="grid grid-cols-3 gap-4 mt-12 pt-8 border-t border-pink-500/30">
                    <div>
                        <div class="text-2xl font-bold text-gold-400">5000+</div>
                        <div class="text-pink-100 text-sm">Happy Customers</div>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-gold-400">100%</div>
                        <div class="text-pink-100 text-sm">Quality Guarantee</div>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-gold-400">24/7</div>
                        <div class="text-pink-100 text-sm">Support</div>
                    </div>
                </div>
            </div>

            <!-- Right Content - Model Image Card -->
           
        </div>
    </div>

    <!-- Bottom Wave -->
    <div class="absolute bottom-0 left-0 right-0 z-10">
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