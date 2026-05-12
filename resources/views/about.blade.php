<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>About - Pretty Fashion Hub</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,100..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-white">
    @include('components.navbar')
    
    <!-- Hero Section - Minimal Black -->
    <div class="bg-gradient-to-r from-pink-950 via-pink-900 to-pink-950 text-white py-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <h1 class="text-5xl md:text-7xl font-light tracking-tight mb-6">About</h1>
                <p class="text-xl text-gray-400 font-light leading-relaxed">
                    Redefining fashion through quality, sustainability, and purpose.
                </p>
            </div>
        </div>
    </div>

    <!-- Brand Story Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="grid md:grid-cols-2 gap-16 items-start">
            <div>
                <div class="text-sm text-gray-400 uppercase tracking-wider mb-4">Our Story</div>
                <h2 class="text-4xl md:text-5xl font-light text-black mb-8 leading-tight">
                    Fashion with<br>intention.
                </h2>
                <div class="space-y-6 text-gray-600 leading-relaxed">
                    <p>
                        Founded in 2020, Pretty Fashion Hub emerged from a singular vision: to create clothing 
                        that doesn't compromise between style and substance. We believe that what you wear 
                        should empower you, not define you.
                    </p>
                    <p>
                        Every piece in our collection is carefully considered—from fabric selection to final 
                        construction. We partner with ethical manufacturers who share our commitment to 
                        quality and fair labor practices.
                    </p>
                    <p>
                        Today, we've grown into a global community of women who value timeless design, 
                        exceptional quality, and conscious consumption. This is just the beginning.
                    </p>
                </div>
            </div>
            <div class="relative">
                <div class="bg-gray-100 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1539109136881-3be0616acf4b?w=800&q=80" 
                         alt="Brand Story" 
                         class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </div>

    <!-- Mission Statement - Full Width Black -->
    <div class="bg-black py-24">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="text-sm text-gray-500 uppercase tracking-wider mb-6">Our Mission</div>
            <h2 class="text-3xl md:text-5xl font-light text-white leading-tight mb-8">
                To create exceptional fashion that<br>
                empowers women without compromising<br>
                our responsibility to the planet.
            </h2>
            <p class="text-gray-400 text-lg font-light max-w-2xl mx-auto">
                We believe that style and sustainability can coexist beautifully.
            </p>
        </div>
    </div>

    <!-- Values Section - Clean Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="text-center mb-16">
            <div class="text-sm text-gray-400 uppercase tracking-wider mb-4">Core Values</div>
            <h2 class="text-4xl font-light text-black">What guides us</h2>
        </div>

        <div class="grid md:grid-cols-3 gap-12">
            <!-- Quality -->
            <div class="text-center">
                <div class="w-16 h-16 mx-auto border border-black flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-medium text-black mb-3">Premium Quality</h3>
                <p class="text-gray-500 text-sm leading-relaxed">
                    Uncompromising standards in materials and craftsmanship.
                </p>
            </div>

            <!-- Sustainability -->
            <div class="text-center">
                <div class="w-16 h-16 mx-auto border border-black flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.66 0 3-4 3-9s-1.34-9-3-9m0 18c-1.66 0-3-4-3-9s1.34-9 3-9"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-medium text-black mb-3">Sustainability</h3>
                <p class="text-gray-500 text-sm leading-relaxed">
                    Ethical production and eco-conscious materials.
                </p>
            </div>

            <!-- Inclusivity -->
            <div class="text-center">
                <div class="w-16 h-16 mx-auto border border-black flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-medium text-black mb-3">Inclusivity</h3>
                <p class="text-gray-500 text-sm leading-relaxed">
                    Fashion for every body, celebrating diversity in all forms.
                </p>
            </div>
        </div>
    </div>

    <!-- Timeline Section -->
    <div class="bg-gray-50 py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <div class="text-sm text-gray-400 uppercase tracking-wider mb-4">Milestones</div>
                <h2 class="text-4xl font-light text-black">Our journey</h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-8 border border-gray-100">
                    <div class="text-5xl font-light text-black mb-4">2020</div>
                    <h3 class="text-lg font-medium text-black mb-3">The Beginning</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Founded with a small collection of thoughtfully designed pieces.
                    </p>
                </div>
                <div class="bg-white p-8 border border-gray-100">
                    <div class="text-5xl font-light text-black mb-4">2022</div>
                    <h3 class="text-lg font-medium text-black mb-3">Expansion</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Launched international shipping and grew our global community.
                    </p>
                </div>
                <div class="bg-white p-8 border border-gray-100">
                    <div class="text-5xl font-light text-black mb-4">2024</div>
                    <h3 class="text-lg font-medium text-black mb-3">Sustainability Pledge</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Committed to carbon-neutral operations and ethical sourcing.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Team Section - Clean Layout -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="text-center mb-16">
            <div class="text-sm text-gray-400 uppercase tracking-wider mb-4">The Team</div>
            <h2 class="text-4xl font-light text-black">Behind the brand</h2>
            <p class="text-gray-500 mt-4 max-w-xl mx-auto">
                A collective of creatives, strategists, and visionaries.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div>
                <div class="bg-gray-100 overflow-hidden aspect-square mb-4">
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=600&q=80" 
                         alt="Sarah Johnson" 
                         class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-500">
                </div>
                <h3 class="text-lg font-medium text-black">Sarah Johnson</h3>
                <p class="text-gray-500 text-sm">Founder & Creative Director</p>
            </div>
            <div>
                <div class="bg-gray-100 overflow-hidden aspect-square mb-4">
                    <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=600&q=80" 
                         alt="Emily Chen" 
                         class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-500">
                </div>
                <h3 class="text-lg font-medium text-black">Emily Chen</h3>
                <p class="text-gray-500 text-sm">Head of Design</p>
            </div>
            <div>
                <div class="bg-gray-100 overflow-hidden aspect-square mb-4">
                    <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?w=600&q=80" 
                         alt="Maria Garcia" 
                         class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-500">
                </div>
                <h3 class="text-lg font-medium text-black">Maria Garcia</h3>
                <p class="text-gray-500 text-sm">Customer Experience Director</p>
            </div>
        </div>
    </div>

    <!-- Stats Section - Minimal Numbers -->
    <div class="border-t border-gray-100 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-12 text-center">
                <div>
                    <div class="text-5xl font-light text-black counter" data-target="5000">0</div>
                    <p class="text-gray-500 text-sm mt-2">Customers served</p>
                </div>
                <div>
                    <div class="text-5xl font-light text-black counter" data-target="50">0</div>
                    <p class="text-gray-500 text-sm mt-2">Team members</p>
                </div>
                <div>
                    <div class="text-5xl font-light text-black counter" data-target="25">0</div>
                    <p class="text-gray-500 text-sm mt-2">Countries shipped</p>
                </div>
                <div>
                    <div class="text-5xl font-light text-black counter" data-target="10000">0</div>
                    <p class="text-gray-500 text-sm mt-2">Pieces sold</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter Section -->
    <div class="bg-black py-20">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-light text-white mb-4">Join our community</h2>
            <p class="text-gray-400 mb-8 font-light">
                Subscribe for updates on new arrivals, exclusive offers, and fashion insights.
            </p>
            <form class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto" id="newsletterForm">
                <input type="email" placeholder="Email address" 
                       class="flex-1 px-4 py-3 bg-transparent border border-gray-700 text-white placeholder-gray-500 focus:outline-none focus:border-white text-sm">
                <button type="submit" class="px-8 py-3 bg-white text-black text-sm font-medium hover:bg-gray-100 transition-colors">
                    Subscribe
                </button>
            </form>
        </div>
    </div>

    @include('components.footer')

    <style>
        @keyframes fadeInUp {
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
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .animation-delay-200 {
            animation-delay: 0.2s;
            opacity: 0;
            animation-fill-mode: forwards;
        }
    </style>

    <script>
        // Counter animation
        function animateCounters() {
            const counters = document.querySelectorAll('.counter');
            
            const observerOptions = {
                threshold: 0.5,
                rootMargin: '0px'
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counter = entry.target;
                        const target = parseInt(counter.getAttribute('data-target'));
                        let current = 0;
                        const duration = 2000;
                        const increment = target / (duration / 30);
                        
                        const timer = setInterval(() => {
                            current += increment;
                            if (current >= target) {
                                counter.textContent = target.toLocaleString();
                                clearInterval(timer);
                            } else {
                                counter.textContent = Math.floor(current).toLocaleString();
                            }
                        }, 30);
                        observer.unobserve(counter);
                    }
                });
            }, observerOptions);
            
            counters.forEach(counter => observer.observe(counter));
        }
        
        // Newsletter form submission
        document.getElementById('newsletterForm')?.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('input[type="email"]').value;
            if (email) {
                alert('Thank you for subscribing! You\'ll receive our latest updates.');
                this.reset();
            }
        });
        
        // Start counter animation when page loads
        document.addEventListener('DOMContentLoaded', animateCounters);
    </script>
</body>
</html>