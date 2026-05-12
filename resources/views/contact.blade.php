<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Contact Us - Pretty Fashion Hub</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,100..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gradient-to-br from-purple-50 to-white">
    @include('components.navbar')
    
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-r from-pink-950 via-pink-900 to-pink-950 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23FFD700\" fill-opacity=\"0.4\"%3E%3Cpath d=\"M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E'); background-repeat: repeat;"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-fade-in-up">Contact Us</h1>
            <p class="text-xl text-purple-200 max-w-3xl mx-auto animate-fade-in-up animation-delay-200">
                We'd love to hear from you. Reach out with any questions or feedback
            </p>
        </div>
    </div>

    <!-- Contact Information Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid md:grid-cols-2 gap-12">
            <!-- Contact Info Cards -->
            <div class="space-y-6">
                <!-- Address Card -->
                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-purple-900 mb-2">Visit Our Store</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Shop 18, RVS Plaza, 3rd Ave,<br>
                                Opposite LG Office, Gwarinpa,<br>
                                AMAC 900108, Federal Capital Territory
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Phone Card -->
                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-purple-900 mb-2">Phone Number</h3>
                            <p class="text-gray-600">
                                <a href="tel:09166049481" class="hover:text-gold-600 transition-colors">0916 604 9481</a>
                            </p>
                            <p class="text-sm text-gray-500 mt-1">Available during business hours</p>
                        </div>
                    </div>
                </div>

                <!-- Email Card -->
                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-purple-900 mb-2">Email Us</h3>
                            <p class="text-gray-600">
                                <a href="mailto:info@prettyfashionhub.com" class="hover:text-gold-600 transition-colors">info@prettyfashionhub.com</a>
                            </p>
                            <p class="text-sm text-gray-500 mt-1">We'll respond within 24 hours</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Business Hours Card -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-gold-500 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-purple-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-purple-900">Business Hours</h3>
                </div>
                
                <div class="space-y-3">
                    <div class="flex justify-between items-center py-2 border-b border-purple-100">
                        <span class="font-semibold text-gray-700">Sunday</span>
                        <span class="text-red-500 font-semibold">Closed</span>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b border-purple-100">
                        <span class="font-semibold text-gray-700">Monday</span>
                        <span class="text-gray-600">10:00 AM - 8:00 PM</span>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b border-purple-100">
                        <span class="font-semibold text-gray-700">Tuesday</span>
                        <span class="text-gray-600">10:00 AM - 8:00 PM</span>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b border-purple-100">
                        <span class="font-semibold text-gray-700">Wednesday</span>
                        <span class="text-gray-600">10:00 AM - 8:00 PM</span>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b border-purple-100">
                        <span class="font-semibold text-gray-700">Thursday</span>
                        <span class="text-gray-600">10:00 AM - 8:00 PM</span>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b border-purple-100">
                        <span class="font-semibold text-gray-700">Friday</span>
                        <span class="text-gray-600">10:00 AM - 8:00 PM</span>
                    </div>
                    <div class="flex justify-between items-center py-2">
                        <span class="font-semibold text-gray-700">Saturday</span>
                        <span class="text-gray-600">10:00 AM - 8:00 PM</span>
                    </div>
                </div>

                <!-- Current Status Indicator -->
                <div class="mt-6 pt-6 border-t border-purple-200">
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Current Status:</span>
                        <span id="storeStatus" class="px-3 py-1 rounded-full text-sm font-semibold"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Map Section -->
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-purple-900 mb-4">Find Us Here</h2>
                <div class="w-24 h-1 bg-gold-500 mx-auto"></div>
            </div>
            <div class="rounded-2xl overflow-hidden shadow-xl">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3939.123456789012!2d7.416300!3d9.115200!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104e0b7b7b7b7b7b%3A0x7b7b7b7b7b7b7b7b!2sRVS%20Plaza%2C%20Gwarinpa%2C%20Abuja!5e0!3m2!1sen!2sng!4v1234567890123!5m2!1sen!2sng" 
                    width="100%" 
                    height="400" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
            <p class="text-center text-gray-500 text-sm mt-4">
                Shop 18, RVS Plaza, 3rd Ave, opposite LG office, Gwarinpa, AMAC 900108, Federal Capital Territory
            </p>
        </div>
    </div>

    <!-- Contact Form Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="grid md:grid-cols-2">
                <!-- Form Side -->
                <div class="p-8 md:p-12">
                    <h2 class="text-2xl font-bold text-purple-900 mb-2">Send Us a Message</h2>
                    <p class="text-gray-600 mb-6">Have questions? We're here to help!</p>
                    
                    <form id="contactForm" class="space-y-5">
                        @csrf
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="block text-purple-900 font-semibold mb-2">Full Name *</label>
                                <input type="text" id="name" name="name" required 
                                    class="w-full px-4 py-2 border border-purple-200 rounded-lg focus:outline-none focus:border-gold-400 transition">
                            </div>
                            <div>
                                <label for="email" class="block text-purple-900 font-semibold mb-2">Email Address *</label>
                                <input type="email" id="email" name="email" required 
                                    class="w-full px-4 py-2 border border-purple-200 rounded-lg focus:outline-none focus:border-gold-400 transition">
                            </div>
                        </div>
                        <div>
                            <label for="phone" class="block text-purple-900 font-semibold mb-2">Phone Number</label>
                            <input type="tel" id="phone" name="phone" 
                                class="w-full px-4 py-2 border border-purple-200 rounded-lg focus:outline-none focus:border-gold-400 transition">
                        </div>
                        <div>
                            <label for="subject" class="block text-purple-900 font-semibold mb-2">Subject *</label>
                            <select id="subject" name="subject" required 
                                class="w-full px-4 py-2 border border-purple-200 rounded-lg focus:outline-none focus:border-gold-400 transition">
                                <option value="">Select a subject</option>
                                <option value="general">General Inquiry</option>
                                <option value="orders">Order Status</option>
                                <option value="returns">Returns & Exchanges</option>
                                <option value="products">Product Information</option>
                                <option value="feedback">Feedback</option>
                            </select>
                        </div>
                        <div>
                            <label for="message" class="block text-purple-900 font-semibold mb-2">Message *</label>
                            <textarea id="message" name="message" rows="5" required 
                                class="w-full px-4 py-2 border border-purple-200 rounded-lg focus:outline-none focus:border-gold-400 transition"
                                placeholder="How can we help you?"></textarea>
                        </div>
                        <button type="submit" 
                            class="w-full bg-gradient-to-r from-purple-900 to-purple-800 text-white py-3 rounded-lg hover:from-gold-500 hover:to-gold-600 hover:text-purple-900 transition-all duration-300 font-semibold">
                            Send Message
                        </button>
                    </form>
                </div>
                
                <!-- Decorative Side -->
                <div class="hidden md:block relative bg-gradient-to-br from-purple-900 to-purple-800 p-8 text-white">
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23FFD700\" fill-opacity=\"0.4\"%3E%3Cpath d=\"M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E'); background-repeat: repeat;"></div>
                    </div>
                    <div class="relative h-full flex flex-col justify-center">
                        <div class="text-center">
                            <svg class="w-20 h-20 mx-auto mb-6 text-gold-400" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                            </svg>
                            <h3 class="text-2xl font-bold mb-4">We Value Your Feedback</h3>
                            <p class="text-purple-200 leading-relaxed">
                                Your questions, comments, and feedback help us serve you better. 
                                We look forward to hearing from you and will respond as quickly as possible.
                            </p>
                            <div class="mt-8 pt-8 border-t border-purple-700">
                                <p class="text-sm text-purple-300">
                                    <span class="font-semibold">Response Time:</span> Within 24 hours
                                </p>
                                <p class="text-sm text-purple-300 mt-2">
                                    <span class="font-semibold">Support:</span> Mon-Sat, 10AM - 8PM
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-purple-900 mb-4">Frequently Asked Questions</h2>
                <div class="w-24 h-1 bg-gold-500 mx-auto"></div>
                <p class="text-gray-600 mt-4">Quick answers to common questions</p>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div class="bg-purple-50 rounded-lg p-4">
                        <h3 class="font-semibold text-purple-900 mb-2">What are your shipping options?</h3>
                        <p class="text-gray-600 text-sm">We offer standard and express shipping nationwide. Free shipping on orders over $100.</p>
                    </div>
                    <div class="bg-purple-50 rounded-lg p-4">
                        <h3 class="font-semibold text-purple-900 mb-2">What is your return policy?</h3>
                        <p class="text-gray-600 text-sm">We accept returns within 30 days of purchase. Items must be unused with original tags.</p>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="bg-purple-50 rounded-lg p-4">
                        <h3 class="font-semibold text-purple-900 mb-2">Do you offer international shipping?</h3>
                        <p class="text-gray-600 text-sm">Currently, we ship within Nigeria only. International shipping coming soon!</p>
                    </div>
                    <div class="bg-purple-50 rounded-lg p-4">
                        <h3 class="font-semibold text-purple-900 mb-2">How can I track my order?</h3>
                        <p class="text-gray-600 text-sm">Once your order ships, you'll receive a tracking number via email and SMS.</p>
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
        // Store Status Check
        function updateStoreStatus() {
            const now = new Date();
            const day = now.getDay(); // 0 = Sunday, 1 = Monday, etc.
            const hour = now.getHours();
            
            const statusElement = document.getElementById('storeStatus');
            
            if (day === 0) {
                statusElement.textContent = 'Closed';
                statusElement.classList.add('bg-red-100', 'text-red-600');
                statusElement.classList.remove('bg-green-100', 'text-green-600');
            } else if (hour >= 10 && hour < 20) {
                statusElement.textContent = 'Open Now';
                statusElement.classList.add('bg-green-100', 'text-green-600');
                statusElement.classList.remove('bg-red-100', 'text-red-600');
            } else {
                statusElement.textContent = 'Closed';
                statusElement.classList.add('bg-red-100', 'text-red-600');
                statusElement.classList.remove('bg-green-100', 'text-green-600');
            }
        }
        
        updateStoreStatus();
        setInterval(updateStoreStatus, 60000); // Update every minute
        
        // Contact Form Submission
        document.getElementById('contactForm')?.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form values
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const subject = document.getElementById('subject').value;
            
            // Show success message (in production, you'd send this to your backend)
            alert(`Thank you ${name}! Your message has been sent. We'll get back to you within 24 hours.`);
            this.reset();
        });
        
        // Add input focus effects
        const inputs = document.querySelectorAll('input, select, textarea');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement?.classList.add('ring-2', 'ring-gold-200');
            });
            input.addEventListener('blur', function() {
                this.parentElement?.classList.remove('ring-2', 'ring-gold-200');
            });
        });
    </script>
</body>
</html>