<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - Pretty Fashion Hub</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,100..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gradient-to-br from-purple-50 to-white overflow-hidden">
    
    <div class="min-h-screen w-full flex items-center justify-center">
        <div class="w-full h-screen bg-white overflow-hidden">
            <div class="grid md:grid-cols-2 h-full">
                <!-- Left Side: Form - No padding -->
                <div class="flex items-center justify-center bg-gradient-to-br from-purple-50 to-white">
                    <div class="w-full">
                        <div class="text-center mb-8">
                            <a href="/" class="text-3xl font-bold bg-gradient-to-r from-purple-900 to-purple-700 text-transparent bg-clip-text">
                                Pretty Fashion Hub
                            </a>
                            <h2 class="text-2xl font-bold text-purple-900 mt-6">Welcome Back!</h2>
                            <p class="text-gray-600 mt-2">Sign in to your account</p>
                        </div>

                        @if(session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}" class="space-y-6">
                            @csrf

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
                                        class="w-full pl-10 pr-4 py-3 border border-purple-200 rounded-lg focus:outline-none focus:border-gold-400 focus:ring-2 focus:ring-gold-200 transition @error('email') border-red-500 @enderror"
                                        placeholder="you@example.com">
                                </div>
                                @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
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
                                        class="w-full pl-10 pr-4 py-3 border border-purple-200 rounded-lg focus:outline-none focus:border-gold-400 focus:ring-2 focus:ring-gold-200 transition @error('password') border-red-500 @enderror"
                                        placeholder="••••••••">
                                </div>
                                @error('password')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Remember Me -->
                            <div class="flex items-center justify-between">
                                <label class="flex items-center">
                                    <input type="checkbox" name="remember" class="form-checkbox text-gold-500 rounded border-purple-300 focus:ring-gold-400">
                                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                                </label>
                                <a href="#" class="text-sm text-gold-600 hover:text-gold-700 font-semibold">Forgot Password?</a>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="w-full bg-gradient-to-r from-purple-900 to-purple-800 text-white py-3 rounded-lg hover:from-gold-500 hover:to-gold-600 hover:text-purple-900 transition-all duration-300 font-semibold text-lg">
                                Sign In
                            </button>

                            <!-- Register Link -->
                            <div class="text-center pt-4">
                                <p class="text-gray-600">
                                    Don't have an account? 
                                    <a href="{{ route('register') }}" class="text-gold-600 hover:text-gold-700 font-semibold">Create Account</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Right Side: Image - Full height, no padding -->
                <div class="hidden md:block relative bg-gradient-to-br from-purple-900 to-purple-800 h-full">
                    <div class="absolute inset-0 bg-black/20 z-10"></div>
                    <img src="https://images.unsplash.com/photo-1445205170230-053b83016050?w=800" 
                         alt="Fashion Model" 
                         class="w-full h-full object-cover">
                    <div class="absolute bottom-0 left-0 right-0 p-8 text-white z-20 bg-gradient-to-t from-black/60 to-transparent">
                        <div class="flex items-center gap-2 mb-2">
                            <div class="w-12 h-0.5 bg-gold-400"></div>
                            <span class="text-gold-400 font-semibold">Pretty Fashion Hub</span>
                        </div>
                        <h3 class="text-2xl font-bold mb-2">Welcome to Elegance</h3>
                        <p class="text-purple-100">Discover the latest trends in women's fashion</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add redirect after login
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            if (form) {
                form.addEventListener('submit', function(e) {
                    // The form will submit normally, the redirect happens in the controller
                    // This is just to show that it will go to shop page
                    console.log('Redirecting to shop after login...');
                });
            }
        });
    </script>
</body>
</html>