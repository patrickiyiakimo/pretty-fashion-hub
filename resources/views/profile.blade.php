<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>My Profile - Pretty Fashion Hub</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,100..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Force square corners on all buttons */
        button, .btn, input[type="submit"], a.btn {
            border-radius: 0 !important;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gradient-to-br from-purple-50 to-white">
    @include('components.navbar')
    
    <!-- Page Header -->
    <div class="bg-gradient-to-r from-pink-950 via-pink-900 to-pink-950 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">My Profile</h1>
            <p class="text-purple-200 text-lg">Manage your account information</p>
        </div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar Navigation -->
            <div class="lg:w-1/4">
                <div class="bg-white shadow-lg p-6 sticky top-24">
                    <div class="text-center mb-6">
                        <div class="w-24 h-24 mx-auto bg-gradient-to-br from-pink-600 to-pink-800 flex items-center justify-center mb-4">
                            <span class="text-white font-bold text-3xl uppercase">{{ substr(Auth::user()->fullname, 0, 1) }}</span>
                        </div>
                        <h3 class="font-bold text-lg text-pink-900">{{ Auth::user()->fullname }}</h3>
                        <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
                    </div>
                    
                    <div class="space-y-2">
                        <button onclick="showTab('profile')" id="tabProfileBtn" class="w-full text-left px-4 py-3 bg-pink-50 text-pink-900 font-semibold transition-all duration-300">
                            <svg class="w-5 h-5 inline-block mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Personal Information
                        </button>
                        <button onclick="showTab('orders')" id="tabOrdersBtn" class="w-full text-left px-4 py-3 text-gray-600 hover:bg-pink-50 hover:text-pink-900 transition-all duration-300">
                            <svg class="w-5 h-5 inline-block mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                            My Orders
                        </button>
                        <button onclick="showTab('addresses')" id="tabAddressesBtn" class="w-full text-left px-4 py-3 text-gray-600 hover:bg-pink-50 hover:text-pink-900 transition-all duration-300">
                            <svg class="w-5 h-5 inline-block mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Addresses
                        </button>
                        <button onclick="showTab('security')" id="tabSecurityBtn" class="w-full text-left px-4 py-3 text-gray-600 hover:bg-pink-50 hover:text-pink-900 transition-all duration-300">
                            <svg class="w-5 h-5 inline-block mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            Security
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Main Content Area -->
            <div class="lg:w-3/4">
                <!-- Profile Information Tab -->
                <div id="profileTab" class="tab-content">
                    <div class="bg-white shadow-lg p-8">
                        <h2 class="text-2xl font-bold text-pink-900 mb-6">Personal Information</h2>
                        
                        <form id="profileForm" onsubmit="updateProfile(event)">
                            @csrf
                            @method('PUT')
                            
                            <div class="grid md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2">Full Name</label>
                                    <input type="text" name="fullname" id="fullname" value="{{ Auth::user()->fullname }}" 
                                           class="w-full px-4 py-2 border border-gray-300 focus:ring-2 focus:ring-pink-800 focus:border-pink-800 outline-none transition">
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2">Email Address</label>
                                    <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" 
                                           class="w-full px-4 py-2 border border-gray-300 focus:ring-2 focus:ring-pink-800 focus:border-pink-800 outline-none transition">
                                </div>
                            </div>
                            
                            <div class="grid md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2">Phone Number</label>
                                    <input type="tel" name="phone" id="phone" value="{{ Auth::user()->phone ?? '' }}" 
                                           class="w-full px-4 py-2 border border-gray-300 focus:ring-2 focus:ring-pink-800 focus:border-pink-800 outline-none transition">
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2">Date of Birth</label>
                                    <input type="date" name="dob" id="dob" value="{{ Auth::user()->dob ?? '' }}" 
                                           class="w-full px-4 py-2 border border-gray-300 focus:ring-2 focus:ring-pink-800 focus:border-pink-800 outline-none transition">
                                </div>
                            </div>
                            
                            <div class="mb-6">
                                <label class="block text-gray-700 font-semibold mb-2">Bio</label>
                                <textarea name="bio" id="bio" rows="4" 
                                          class="w-full px-4 py-2 border border-gray-300 focus:ring-2 focus:ring-pink-800 focus:border-pink-800 outline-none transition"
                                          placeholder="Tell us a little about yourself...">{{ Auth::user()->bio ?? '' }}</textarea>
                            </div>
                            
                            <div class="flex justify-end">
                                <button type="submit" class="px-6 py-3 bg-gradient-to-r from-pink-950 via-pink-900 to-pink-950 text-white hover:from-gold-500 hover:to-gold-600 hover:text-purple-900 transition-all duration-300 font-semibold">
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Orders Tab -->
                <div id="ordersTab" class="tab-content hidden">
                    <div class="bg-white shadow-lg p-8">
                        <h2 class="text-2xl font-bold text-pink-900 mb-6">My Orders</h2>
                        
                        <div id="ordersList">
                            <div class="text-center py-12">
                                <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-pink-900 mx-auto mb-4"></div>
                                <p class="text-gray-500">Loading orders...</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Addresses Tab -->
                <div id="addressesTab" class="tab-content hidden">
                    <div class="bg-white shadow-lg p-8">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-2xl font-bold text-pink-900">My Addresses</h2>
                            <button onclick="showAddAddressModal()" class="px-4 py-2 bg-pink-800 text-white hover:bg-pink-700 transition-colors">
                                Add New Address
                            </button>
                        </div>
                        
                        <div id="addressesList">
                            <div class="text-center py-12">
                                <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-pink-900 mx-auto mb-4"></div>
                                <p class="text-gray-500">Loading addresses...</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Security Tab -->
                <div id="securityTab" class="tab-content hidden">
                    <div class="bg-white shadow-lg p-8">
                        <h2 class="text-2xl font-bold text-pink-900 mb-6">Change Password</h2>
                        
                        <form id="passwordForm" onsubmit="updatePassword(event)">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-6">
                                <label class="block text-gray-700 font-semibold mb-2">Current Password</label>
                                <input type="password" name="current_password" id="current_password" required
                                       class="w-full px-4 py-2 border border-gray-300 focus:ring-2 focus:ring-pink-800 focus:border-pink-800 outline-none transition">
                            </div>
                            
                            <div class="mb-6">
                                <label class="block text-gray-700 font-semibold mb-2">New Password</label>
                                <input type="password" name="new_password" id="new_password" required
                                       class="w-full px-4 py-2 border border-gray-300 focus:ring-2 focus:ring-pink-800 focus:border-pink-800 outline-none transition">
                                <p class="text-sm text-gray-500 mt-1">Must be at least 8 characters</p>
                            </div>
                            
                            <div class="mb-6">
                                <label class="block text-gray-700 font-semibold mb-2">Confirm New Password</label>
                                <input type="password" name="new_password_confirmation" id="new_password_confirmation" required
                                       class="w-full px-4 py-2 border border-gray-300 focus:ring-2 focus:ring-pink-800 focus:border-pink-800 outline-none transition">
                            </div>
                            
                            <div class="flex justify-end">
                                <button type="submit" class="px-6 py-3 bg-gradient-to-r from-pink-950 via-pink-900 to-pink-950 text-white hover:from-gold-500 hover:to-gold-600 hover:text-purple-900 transition-all duration-300 font-semibold">
                                    Update Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @include('components.footer')
    
    <!-- Add Address Modal -->
    <div id="addressModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden items-center justify-center p-4">
        <div class="bg-white max-w-md w-full max-h-[90vh] overflow-y-auto">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-bold text-pink-900">Add New Address</h3>
                    <button onclick="closeAddressModal()" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                
                <form id="addressForm" onsubmit="addAddress(event)">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Address Line 1</label>
                        <input type="text" name="address_line1" id="address_line1" required
                               class="w-full px-4 py-2 border border-gray-300 focus:ring-2 focus:ring-pink-800 focus:border-pink-800 outline-none transition">
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Address Line 2 (Optional)</label>
                        <input type="text" name="address_line2" id="address_line2"
                               class="w-full px-4 py-2 border border-gray-300 focus:ring-2 focus:ring-pink-800 focus:border-pink-800 outline-none transition">
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">City</label>
                            <input type="text" name="city" id="city" required
                                   class="w-full px-4 py-2 border border-gray-300 focus:ring-2 focus:ring-pink-800 focus:border-pink-800 outline-none transition">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">State</label>
                            <input type="text" name="state" id="state" required
                                   class="w-full px-4 py-2 border border-gray-300 focus:ring-2 focus:ring-pink-800 focus:border-pink-800 outline-none transition">
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Zip Code</label>
                            <input type="text" name="zip_code" id="zip_code" required
                                   class="w-full px-4 py-2 border border-gray-300 focus:ring-2 focus:ring-pink-800 focus:border-pink-800 outline-none transition">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Country</label>
                            <input type="text" name="country" id="country" value="United States" required
                                   class="w-full px-4 py-2 border border-gray-300 focus:ring-2 focus:ring-pink-800 focus:border-pink-800 outline-none transition">
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_default" id="is_default" class="mr-2">
                            <span class="text-gray-700">Set as default address</span>
                        </label>
                    </div>
                    
                    <div class="flex gap-4 mt-6">
                        <button type="button" onclick="closeAddressModal()" class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 hover:bg-gray-50 transition-colors">
                            Cancel
                        </button>
                        <button type="submit" class="flex-1 px-4 py-2 bg-gradient-to-r from-pink-950 via-pink-900 to-pink-950 text-white hover:from-gold-500 hover:to-gold-600 hover:text-purple-900 transition-all duration-300 font-semibold">
                            Save Address
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Toast Notification -->
    <div id="toast" class="fixed bottom-8 right-8 z-50 hidden">
        <span id="toastMessage"></span>
    </div>
    
    <script>
        let currentTab = 'profile';
        
        // Show/Hide Tabs
        function showTab(tab) {
            currentTab = tab;
            
            // Hide all tabs
            document.getElementById('profileTab').classList.add('hidden');
            document.getElementById('ordersTab').classList.add('hidden');
            document.getElementById('addressesTab').classList.add('hidden');
            document.getElementById('securityTab').classList.add('hidden');
            
            // Show selected tab
            document.getElementById(`${tab}Tab`).classList.remove('hidden');
            
            // Update button styles
            const buttons = ['profile', 'orders', 'addresses', 'security'];
            buttons.forEach(btn => {
                const btnElement = document.getElementById(`tab${btn.charAt(0).toUpperCase() + btn.slice(1)}Btn`);
                if (btn === tab) {
                    btnElement.classList.add('bg-pink-50', 'text-pink-900', 'font-semibold');
                    btnElement.classList.remove('text-gray-600');
                } else {
                    btnElement.classList.remove('bg-pink-50', 'text-pink-900', 'font-semibold');
                    btnElement.classList.add('text-gray-600');
                }
            });
            
            // Load data if needed
            if (tab === 'orders' && !window.ordersLoaded) {
                loadOrders();
            } else if (tab === 'addresses' && !window.addressesLoaded) {
                loadAddresses();
            }
        }
        
        // Update Profile
        async function updateProfile(event) {
            event.preventDefault();
            
            const formData = new FormData(event.target);
            
            showLoading();
            
            try {
                const response = await fetch('/profile/update', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: formData
                });
                
                const data = await response.json();
                
                if (data.success) {
                    showToast(data.message, 'success');
                    setTimeout(() => {
                        location.reload();
                    }, 1500);
                } else {
                    showToast(data.message || 'Error updating profile', 'error');
                }
            } catch (error) {
                console.error('Error:', error);
                showToast('Network error. Please try again.', 'error');
            } finally {
                hideLoading();
            }
        }
        
        // Update Password
        async function updatePassword(event) {
            event.preventDefault();
            
            const currentPassword = document.getElementById('current_password').value;
            const newPassword = document.getElementById('new_password').value;
            const confirmPassword = document.getElementById('new_password_confirmation').value;
            
            if (newPassword !== confirmPassword) {
                showToast('New passwords do not match', 'error');
                return;
            }
            
            if (newPassword.length < 8) {
                showToast('Password must be at least 8 characters', 'error');
                return;
            }
            
            showLoading();
            
            try {
                const response = await fetch('/profile/change-password', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({
                        current_password: currentPassword,
                        new_password: newPassword,
                        new_password_confirmation: confirmPassword
                    })
                });
                
                const data = await response.json();
                
                if (data.success) {
                    showToast(data.message, 'success');
                    document.getElementById('passwordForm').reset();
                } else {
                    showToast(data.message || 'Error updating password', 'error');
                }
            } catch (error) {
                console.error('Error:', error);
                showToast('Network error. Please try again.', 'error');
            } finally {
                hideLoading();
            }
        }
        
        // Load Orders
        async function loadOrders() {
            try {
                const response = await fetch('/profile/orders', {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                
                if (!response.ok) {
                    throw new Error('Failed to load orders');
                }
                
                const orders = await response.json();
                window.ordersLoaded = true;
                displayOrders(orders);
            } catch (error) {
                console.error('Error:', error);
                document.getElementById('ordersList').innerHTML = `
                    <div class="text-center py-12">
                        <svg class="w-24 h-24 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        <p class="text-gray-500 text-lg">No orders yet</p>
                        <a href="{{ route('shop') }}" class="inline-block mt-4 text-pink-600 hover:text-pink-800">Start Shopping →</a>
                    </div>
                `;
            }
        }
        
        function displayOrders(orders) {
            const container = document.getElementById('ordersList');
            
            if (!orders || orders.length === 0) {
                container.innerHTML = `
                    <div class="text-center py-12">
                        <svg class="w-24 h-24 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        <p class="text-gray-500 text-lg">No orders yet</p>
                        <a href="{{ route('shop') }}" class="inline-block mt-4 text-pink-600 hover:text-pink-800">Start Shopping →</a>
                    </div>
                `;
                return;
            }
            
            container.innerHTML = orders.map(order => `
                <div class="border border-gray-200 p-6 mb-4 hover:shadow-md transition-shadow">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <span class="text-sm text-gray-500">Order #${order.id}</span>
                            <p class="text-sm text-gray-500">${new Date(order.created_at).toLocaleDateString()}</p>
                        </div>
                        <span class="px-3 py-1 text-sm font-semibold ${getOrderStatusColor(order.status)}">
                            ${order.status}
                        </span>
                    </div>
                    <div class="border-t border-gray-100 pt-4">
                        <p class="font-semibold text-gray-800">Total: $${parseFloat(order.total).toFixed(2)}</p>
                        <p class="text-sm text-gray-500 mt-1">Items: ${order.items_count || 0}</p>
                    </div>
                </div>
            `).join('');
        }
        
        function getOrderStatusColor(status) {
            const colors = {
                'pending': 'bg-yellow-100 text-yellow-800',
                'processing': 'bg-blue-100 text-blue-800',
                'shipped': 'bg-purple-100 text-purple-800',
                'delivered': 'bg-green-100 text-green-800',
                'cancelled': 'bg-red-100 text-red-800'
            };
            return colors[status.toLowerCase()] || 'bg-gray-100 text-gray-800';
        }
        
        // Load Addresses
        async function loadAddresses() {
            try {
                const response = await fetch('/profile/addresses', {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                
                if (!response.ok) {
                    throw new Error('Failed to load addresses');
                }
                
                const addresses = await response.json();
                window.addressesLoaded = true;
                displayAddresses(addresses);
            } catch (error) {
                console.error('Error:', error);
                document.getElementById('addressesList').innerHTML = `
                    <div class="text-center py-12">
                        <svg class="w-24 h-24 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <p class="text-gray-500 text-lg">Unable to load addresses. Please refresh the page.</p>
                        <button onclick="loadAddresses()" class="inline-block mt-4 text-pink-600 hover:text-pink-800">Try Again →</button>
                    </div>
                `;
            }
        }
        
        function displayAddresses(addresses) {
            const container = document.getElementById('addressesList');
            
            if (!addresses || !Array.isArray(addresses) || addresses.length === 0) {
                container.innerHTML = `
                    <div class="text-center py-12">
                        <svg class="w-24 h-24 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <p class="text-gray-500 text-lg">No addresses saved</p>
                        <button onclick="showAddAddressModal()" class="inline-block mt-4 text-pink-600 hover:text-pink-800">Add Address →</button>
                    </div>
                `;
                return;
            }
            
            container.innerHTML = addresses.map(address => {
                const isDefault = address.is_default === true || address.is_default === 1 || address.is_default === '1';
                
                return `
                    <div class="border border-gray-200 p-6 mb-4 hover:shadow-md transition-shadow">
                        <div class="flex justify-between items-start">
                            <div class="flex-1">
                                <p class="font-semibold text-gray-800">${escapeHtml(address.address_line1)}</p>
                                ${address.address_line2 ? `<p class="text-gray-600">${escapeHtml(address.address_line2)}</p>` : ''}
                                <p class="text-gray-600">${escapeHtml(address.city)}, ${escapeHtml(address.state)} ${escapeHtml(address.zip_code)}</p>
                                <p class="text-gray-600">${escapeHtml(address.country)}</p>
                                ${isDefault ? '<span class="inline-block mt-2 px-2 py-1 bg-green-100 text-green-800 text-xs font-semibold">✓ Default Address</span>' : ''}
                            </div>
                            <div class="flex gap-2 ml-4">
                                ${!isDefault ? `<button onclick="setDefaultAddress(${address.id})" class="text-blue-600 hover:text-blue-800 text-sm px-2 py-1 hover:bg-blue-50 transition-colors">Set Default</button>` : ''}
                                <button onclick="deleteAddress(${address.id})" class="text-red-600 hover:text-red-800 p-1 hover:bg-red-50 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            }).join('');
        }
        
        function escapeHtml(text) {
            if (!text) return '';
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }
        
        function showAddAddressModal() {
            document.getElementById('addressModal').classList.remove('hidden');
            document.getElementById('addressModal').classList.add('flex');
        }
        
        function closeAddressModal() {
            document.getElementById('addressModal').classList.add('hidden');
            document.getElementById('addressModal').classList.remove('flex');
            document.getElementById('addressForm').reset();
            document.getElementById('is_default').checked = false;
        }
        
        async function addAddress(event) {
            event.preventDefault();
            
            const address_line1 = document.getElementById('address_line1').value;
            const address_line2 = document.getElementById('address_line2').value;
            const city = document.getElementById('city').value;
            const state = document.getElementById('state').value;
            const zip_code = document.getElementById('zip_code').value;
            const country = document.getElementById('country').value;
            const is_default = document.getElementById('is_default').checked;
            
            if (!address_line1 || !city || !state || !zip_code || !country) {
                showToast('Please fill in all required fields', 'error');
                return;
            }
            
            showLoading();
            
            try {
                const response = await fetch('/profile/addresses', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({
                        address_line1: address_line1,
                        address_line2: address_line2,
                        city: city,
                        state: state,
                        zip_code: zip_code,
                        country: country,
                        is_default: is_default
                    })
                });
                
                const data = await response.json();
                
                if (data.success) {
                    showToast(data.message, 'success');
                    closeAddressModal();
                    window.addressesLoaded = false;
                    loadAddresses();
                } else {
                    showToast(data.message || 'Error adding address', 'error');
                }
            } catch (error) {
                console.error('Error:', error);
                showToast('Network error. Please try again.', 'error');
            } finally {
                hideLoading();
            }
        }
        
        async function setDefaultAddress(addressId) {
            showLoading();
            
            try {
                const response = await fetch(`/profile/addresses/${addressId}/default`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                
                const data = await response.json();
                
                if (data.success) {
                    showToast(data.message, 'success');
                    window.addressesLoaded = false;
                    loadAddresses();
                } else {
                    showToast(data.message || 'Error setting default address', 'error');
                }
            } catch (error) {
                console.error('Error:', error);
                showToast('Network error. Please try again.', 'error');
            } finally {
                hideLoading();
            }
        }
        
        async function deleteAddress(addressId) {
            if (!confirm('Are you sure you want to delete this address?')) return;
            
            showLoading();
            
            try {
                const response = await fetch(`/profile/addresses/${addressId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                
                const data = await response.json();
                
                if (data.success) {
                    showToast(data.message, 'success');
                    window.addressesLoaded = false;
                    loadAddresses();
                } else {
                    showToast(data.message || 'Error deleting address', 'error');
                }
            } catch (error) {
                console.error('Error:', error);
                showToast('Network error. Please try again.', 'error');
            } finally {
                hideLoading();
            }
        }
        
        // Toast notification
        function showToast(message, type = 'success') {
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toastMessage');
            
            if (!toast || !toastMessage) return;
            
            toastMessage.textContent = message;
            toast.classList.remove('hidden');
            
            toast.style.backgroundColor = type === 'error' ? '#dc2626' : '#9d174d';
            toast.style.color = 'white';
            toast.style.padding = '12px 24px';
            toast.style.fontSize = '14px';
            toast.style.fontWeight = '500';
            toast.style.boxShadow = '0 10px 15px -3px rgba(0, 0, 0, 0.1)';
            toast.style.minWidth = '200px';
            toast.style.textAlign = 'center';
            
            setTimeout(() => {
                toast.classList.add('hidden');
            }, 3000);
        }
        
        function showLoading() {
            console.log('Loading...');
        }
        
        function hideLoading() {
            console.log('Loading complete');
        }
    </script>
</body>
</html>