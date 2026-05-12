<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register - Pretty Fashion Hub</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,100..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-white overflow-hidden ">
    
    <div class="min-h-screen w-full flex items-center justify-center">
        <div class="w-full h-screen bg-white overflow-hidden">
            <div class="grid md:grid-cols-2 h-full">
                <!-- Left Side: Form - Centered with limited width but no outer padding -->
                <div class="flex items-center justify-center bg-gradient-to-br from-purple-50 to-white">
                    <div class="w-full px-8">
                        <div class="text-center mb-8">
                            <a href="/" class="text-3xl font-bold bg-gradient-to-r from-purple-900 to-purple-700 text-transparent bg-clip-text">
                                Pretty Fashion Hub
                            </a>
                            <h2 class="text-2xl font-bold text-purple-900 mt-6">Create Account</h2>
                            <p class="text-gray-600 mt-2">Join our fashion community</p>
                        </div>

                        @if(session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">
                                <ul class="list-disc list-inside">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('register') }}" class="space-y-5">
                            @csrf

                            <!-- Full Name -->
                            <div>
                                <label for="fullname" class="block text-purple-900 font-semibold mb-2">Full Name</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                    <input type="text" name="fullname" id="fullname" value="{{ old('fullname') }}" required 
                                        class="w-full pl-10 pr-4 py-3 border border-purple-200 rounded-lg focus:outline-none focus:border-gold-400 focus:ring-2 focus:ring-gold-200 transition"
                                        placeholder="Sarah Johnson">
                                </div>
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-purple-900 font-semibold mb-2">Email Address</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                        </svg>
                                    </div>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" required 
                                        class="w-full pl-10 pr-4 py-3 border border-purple-200 rounded-lg focus:outline-none focus:border-gold-400 focus:ring-2 focus:ring-gold-200 transition"
                                        placeholder="sarah@example.com">
                                </div>
                            </div>

                            <!-- Phone Number -->
                            <div>
                                <label for="phone_number" class="block text-purple-900 font-semibold mb-2">Phone Number (Optional)</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                        </svg>
                                    </div>
                                    <input type="tel" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" 
                                        class="w-full pl-10 pr-4 py-3 border border-purple-200 rounded-lg focus:outline-none focus:border-gold-400 focus:ring-2 focus:ring-gold-200 transition"
                                        placeholder="+1 234 567 8900">
                                </div>
                            </div>

                            <!-- Password -->
                            <div>
                                <label for="password" class="block text-purple-900 font-semibold mb-2">Password</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                        </svg>
                                    </div>
                                    <input type="password" name="password" id="password" required 
                                        class="w-full pl-10 pr-4 py-3 border border-purple-200 rounded-lg focus:outline-none focus:border-gold-400 focus:ring-2 focus:ring-gold-200 transition"
                                        placeholder="••••••••">
                                </div>
                                <p class="text-xs text-gray-500 mt-1">Minimum 6 characters</p>
                            </div>

                            <!-- Confirm Password -->
                            <div>
                                <label for="password_confirmation" class="block text-purple-900 font-semibold mb-2">Confirm Password</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                        </svg>
                                    </div>
                                    <input type="password" name="password_confirmation" id="password_confirmation" required 
                                        class="w-full pl-10 pr-4 py-3 border border-purple-200 rounded-lg focus:outline-none focus:border-gold-400 focus:ring-2 focus:ring-gold-200 transition"
                                        placeholder="••••••••">
                                </div>
                            </div>

                            <!-- Terms and Conditions -->
                            <div class="flex items-start">
                                <input type="checkbox" name="terms" id="terms" required class="form-checkbox text-gold-500 rounded border-purple-300 focus:ring-gold-400 mt-1">
                                <label for="terms" class="ml-2 text-sm text-gray-600">
                                    I agree to the <a href="#" class="text-gold-600 hover:text-gold-700">Terms of Service</a> and <a href="#" class="text-gold-600 hover:text-gold-700">Privacy Policy</a>
                                </label>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="w-full bg-gradient-to-r from-purple-900 to-purple-800 text-white py-3 rounded-lg hover:from-gold-500 hover:to-gold-600 hover:text-purple-900 transition-all duration-300 font-semibold text-lg">
                                Create Account
                            </button>

                            <!-- Login Link -->
                            <div class="text-center pt-4">
                                <p class="text-gray-600">
                                    Already have an account? 
                                    <a href="{{ route('login') }}" class="text-gold-600 hover:text-gold-700 font-semibold">Sign In</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Right Side: Image - Full height, no padding -->
                <div class="hidden md:block relative bg-gradient-to-br from-purple-900 to-purple-800 h-full">
                    <div class="absolute inset-0 bg-black/20 z-10"></div>
                    <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?w=800" 
                         alt="Fashion Shopping" 
                         class="w-full h-full object-cover">
                    <div class="absolute bottom-0 left-0 right-0 p-8 text-white z-20 bg-gradient-to-t from-black/60 to-transparent">
                        <div class="flex items-center gap-2 mb-2">
                            <div class="w-12 h-0.5 bg-gold-400"></div>
                            <span class="text-gold-400 font-semibold">Join Us Today</span>
                        </div>
                        <h3 class="text-2xl font-bold mb-2">Start Your Fashion Journey</h3>
                        <p class="text-purple-100">Get exclusive offers and early access to new collections</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add redirect after registration
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            if (form) {
                form.addEventListener('submit', function(e) {
                    // The form will submit normally, the redirect happens in the controller
                    console.log('Redirecting to shop after registration...');
                });
            }
        });
    </script>
</body>
</html>