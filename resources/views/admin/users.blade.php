<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Manage Users - Admin Panel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,100..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gradient-to-br from-pink-50 to-white">
    @include('components.navbar')
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-pink-900">Manage Users</h1>
                <p class="text-gray-600">View and manage all registered users</p>
            </div>
            <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 bg-pink-100 text-pink-700 hover:bg-pink-200 transition-colors">
                Back to Dashboard
            </a>
        </div>
        
        <div class="bg-white shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-pink-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-pink-900 font-semibold">ID</th>
                            <th class="px-6 py-3 text-left text-pink-900 font-semibold">Name</th>
                            <th class="px-6 py-3 text-left text-pink-900 font-semibold">Email</th>
                            <th class="px-6 py-3 text-left text-pink-900 font-semibold">Phone</th>
                            <th class="px-6 py-3 text-left text-pink-900 font-semibold">Joined</th>
                            <th class="px-6 py-3 text-left text-pink-900 font-semibold">Status</th>
                            <th class="px-6 py-3 text-left text-pink-900 font-semibold">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($users as $user)
                        <tr>
                            <td class="px-6 py-4 text-gray-700">#{{ $user->id }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 bg-pink-600 flex items-center justify-center">
                                        <span class="text-white text-sm font-bold uppercase">{{ substr($user->fullname, 0, 1) }}</span>
                                    </div>
                                    <span class="font-semibold text-gray-800">{{ $user->fullname }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-600">{{ $user->email }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $user->phone ?? 'Not provided' }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $user->created_at->format('M d, Y') }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs font-semibold {{ $user->is_admin ? 'bg-purple-100 text-purple-800' : 'bg-green-100 text-green-800' }}">
                                    {{ $user->is_admin ? 'Admin' : 'User' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                @if($user->id != auth()->id())
                                <button onclick="deleteUser({{ $user->id }})" class="text-red-600 hover:text-red-800">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                                @else
                                <span class="text-gray-400 text-sm">Current</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="p-6">
                {{ $users->links() }}
            </div>
        </div>
    </div>
    
    @include('components.footer')
    
    <div id="toast" class="fixed bottom-8 right-8 z-50 hidden"></div>
    
    <script>
        async function deleteUser(userId) {
            if (!confirm('Are you sure you want to delete this user?')) return;
            
            try {
                const response = await fetch(`/admin/users/${userId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    }
                });
                
                const data = await response.json();
                
                if (data.success) {
                    showToast(data.message, 'success');
                    setTimeout(() => location.reload(), 1500);
                } else {
                    showToast(data.message, 'error');
                }
            } catch (error) {
                showToast('Error deleting user', 'error');
            }
        }
        
        function showToast(message, type) {
            const toast = document.getElementById('toast');
            toast.textContent = message;
            toast.style.backgroundColor = type === 'error' ? '#dc2626' : '#10b981';
            toast.style.color = 'white';
            toast.style.padding = '12px 24px';
            toast.style.position = 'fixed';
            toast.style.bottom = '20px';
            toast.style.right = '20px';
            toast.style.zIndex = '50';
            toast.style.display = 'block';
            
            setTimeout(() => {
                toast.style.display = 'none';
            }, 3000);
        }
    </script>
</body>
</html>