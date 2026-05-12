<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Reset Password - Pretty Fashion Hub</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,100..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        html {
            scroll-behavior: smooth;
            overflow-y: auto;
        }
        
        body {
            overflow-y: auto;
        }
        
        .reset-container {
            min-height: 100vh;
            overflow-y: auto;
        }
    </style>
</head>
<body class="font-sans antialiased bg-white">
    
    <div class="min-h-screen w-full flex items-center justify-center reset-container">
        <div class="w-full min-h-screen bg-white">
            <div class="grid md:grid-cols-2 min-h-screen">
                <!-- Left Side: Form -->
                <div class="flex items-center justify-center bg-gradient-to-br from-pink-50 to-white py-12">
                    <div class="w-full max-w-md px-8">
                        <div class="text-center mb-8">
                            <a href="/" class="text-3xl font-bold bg-gradient-to-r from-pink-900 to-pink-700 text-transparent bg-clip-text">
                                Pretty Fashion Hub
                            </a>
                            <h2 class="text-2xl font-bold text-pink-900 mt-6">Reset Password</h2>
                            <p class="text-gray-600 mt-2">Create a new password for your account</p>
                        </div>

                        @if(session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 mb-4">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mb-4">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mb-4">
                                <ul class="list-disc list-inside">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-pink-900 font-semibold mb-2">Email Address</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                        </svg>
                                    </div>
                                    <input type="email" name="email" id="email" value="{{ $email ?? old('email') }}" required 
                                        class="w-full pl-10 pr-4 py-3 border border-pink-200 focus:outline-none focus:border-pink-500 focus:ring-2 focus:ring-pink-200 transition"
                                        placeholder="you@example.com">
                                </div>
                            </div>

                            <!-- New Password -->
                            <div>
                                <label for="password" class="block text-pink-900 font-semibold mb-2">New Password</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                        </svg>
                                    </div>
                                    <input type="password" name="password" id="password" required 
                                        class="w-full pl-10 pr-4 py-3 border border-pink-200 focus:outline-none focus:border-pink-500 focus:ring-2 focus:ring-pink-200 transition"
                                        placeholder="••••••••">
                                </div>
                                <p class="text-xs text-gray-500 mt-1">Minimum 8 characters</p>
                            </div>

                            <!-- Confirm Password -->
                            <div>
                                <label for="password_confirmation" class="block text-pink-900 font-semibold mb-2">Confirm Password</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                        </svg>
                                    </div>
                                    <input type="password" name="password_confirmation" id="password_confirmation" required 
                                        class="w-full pl-10 pr-4 py-3 border border-pink-200 focus:outline-none focus:border-pink-500 focus:ring-2 focus:ring-pink-200 transition"
                                        placeholder="••••••••">
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="w-full bg-gradient-to-r from-pink-900 to-pink-700 text-white py-3 hover:from-pink-600 hover:to-pink-500 transition-all duration-300 font-semibold text-lg">
                                Reset Password
                            </button>

                            <!-- Back to Login Link -->
                            <div class="text-center pt-4">
                                <a href="{{ route('login') }}" class="text-pink-600 hover:text-pink-700 font-semibold inline-flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                    </svg>
                                    Back to Sign In
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Right Side: Image -->
                <div class="hidden md:block relative bg-gradient-to-br from-pink-900 to-pink-800 min-h-screen">
                    <div class="absolute inset-0 bg-black/20 z-10"></div>
                    <img src="https://images.unsplash.com/photo-1534126511673-b6899657816a?w=800" 
                         alt="Reset Password" 
                         class="w-full h-full object-cover">
                    <div class="absolute bottom-0 left-0 right-0 p-8 text-white z-20 bg-gradient-to-t from-black/60 to-transparent">
                        <div class="flex items-center gap-2 mb-2">
                            <div class="w-12 h-0.5 bg-pink-400"></div>
                            <span class="text-pink-400 font-semibold">Secure Account</span>
                        </div>
                        <h3 class="text-2xl font-bold mb-2">Create New Password</h3>
                        <p class="text-pink-100">Choose a strong password to keep your account secure</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            if (form) {
                form.addEventListener('submit', function(e) {
                    const password = document.getElementById('password').value;
                    const confirm = document.getElementById('password_confirmation').value;
                    
                    if (password !== confirm) {
                        e.preventDefault();
                        alert('Passwords do not match!');
                    }
                });
            }
        });
    </script>
</body>
</html>