<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Edit Product - Admin Panel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,100..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gradient-to-br from-pink-50 to-white">
    @include('components.navbar')
    
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-pink-900">Edit Product</h1>
                <p class="text-gray-600">Update product information</p>
            </div>
            <a href="{{ route('admin.products') }}" class="px-4 py-2 bg-gray-200 text-gray-700 hover:bg-gray-300 transition-colors">
                Back to Products
            </a>
        </div>
        
        <div class="bg-white shadow-lg p-8">
            <form method="POST" action="{{ route('admin.update-product', $product->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="grid md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-pink-900 font-semibold mb-2">Product Name *</label>
                        <input type="text" name="name" value="{{ $product->name }}" required class="w-full px-4 py-2 border border-pink-200 focus:outline-none focus:border-pink-500">
                    </div>
                    <div>
                        <label class="block text-pink-900 font-semibold mb-2">Category *</label>
                        <select name="category" required class="w-full px-4 py-2 border border-pink-200 focus:outline-none focus:border-pink-500">
                            <option value="dresses" {{ $product->category == 'dresses' ? 'selected' : '' }}>Dresses</option>
                            <option value="tops" {{ $product->category == 'tops' ? 'selected' : '' }}>Tops</option>
                            <option value="bottoms" {{ $product->category == 'bottoms' ? 'selected' : '' }}>Bottoms</option>
                            <option value="outerwear" {{ $product->category == 'outerwear' ? 'selected' : '' }}>Outerwear</option>
                            <option value="accessories" {{ $product->category == 'accessories' ? 'selected' : '' }}>Accessories</option>
                        </select>
                    </div>
                </div>
                
                <div class="mb-6">
                    <label class="block text-pink-900 font-semibold mb-2">Description *</label>
                    <textarea name="description" rows="5" required class="w-full px-4 py-2 border border-pink-200 focus:outline-none focus:border-pink-500">{{ $product->description }}</textarea>
                </div>
                
                <div class="grid md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-pink-900 font-semibold mb-2">Price *</label>
                        <input type="number" name="price" step="0.01" value="{{ $product->price }}" required class="w-full px-4 py-2 border border-pink-200 focus:outline-none focus:border-pink-500">
                    </div>
                    <div>
                        <label class="block text-pink-900 font-semibold mb-2">Compare Price (Optional)</label>
                        <input type="number" name="compare_price" step="0.01" value="{{ $product->compare_price }}" class="w-full px-4 py-2 border border-pink-200 focus:outline-none focus:border-pink-500">
                    </div>
                </div>
                
                <div class="grid md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-pink-900 font-semibold mb-2">Stock Quantity *</label>
                        <input type="number" name="stock" value="{{ $product->stock }}" required class="w-full px-4 py-2 border border-pink-200 focus:outline-none focus:border-pink-500">
                    </div>
                    <div>
                        <label class="block text-pink-900 font-semibold mb-2">Add New Images</label>
                        <input type="file" name="images[]" multiple accept="image/*" class="w-full px-4 py-2 border border-pink-200 focus:outline-none focus:border-pink-500">
                    </div>
                </div>
                
                @php $images = json_decode($product->images, true) ?? []; @endphp
                @if(count($images) > 0)
                <div class="mb-6">
                    <label class="block text-pink-900 font-semibold mb-2">Current Images</label>
                    <div class="flex flex-wrap gap-4">
                        @foreach($images as $index => $image)
                        <div class="relative group">
                            <img src="{{ Storage::url($image) }}" class="w-24 h-24 object-cover border border-pink-200">
                            <button type="button" onclick="markForRemoval({{ $index }}, '{{ $image }}')" class="absolute top-0 right-0 bg-red-500 text-white w-5 h-5 flex items-center justify-center text-xs hover:bg-red-600">
                                ×
                            </button>
                        </div>
                        @endforeach
                    </div>
                    <input type="hidden" name="remove_images" id="remove_images" value="">
                </div>
                @endif
                
                <div class="grid md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-pink-900 font-semibold mb-2">Colors (JSON format)</label>
                        <input type="text" name="colors" value="{{ json_encode(json_decode($product->colors ?? '[]')) }}" class="w-full px-4 py-2 border border-pink-200 focus:outline-none focus:border-pink-500">
                    </div>
                    <div>
                        <label class="block text-pink-900 font-semibold mb-2">Sizes (JSON format)</label>
                        <input type="text" name="sizes" value="{{ json_encode(json_decode($product->sizes ?? '[]')) }}" class="w-full px-4 py-2 border border-pink-200 focus:outline-none focus:border-pink-500">
                    </div>
                </div>
                
                <div class="flex flex-wrap gap-6 mb-6">
                    <label class="flex items-center">
                        <input type="checkbox" name="on_sale" value="1" {{ $product->on_sale ? 'checked' : '' }} class="mr-2">
                        <span class="text-gray-700">On Sale</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="new_arrival" value="1" {{ $product->new_arrival ? 'checked' : '' }} class="mr-2">
                        <span class="text-gray-700">New Arrival</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="featured" value="1" {{ $product->featured ? 'checked' : '' }} class="mr-2">
                        <span class="text-gray-700">Featured Product</span>
                    </label>
                </div>
                
                <div class="flex justify-end gap-4">
                    <a href="{{ route('admin.products') }}" class="px-6 py-3 border border-gray-300 text-gray-700 hover:bg-gray-50 transition-colors font-semibold">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-3 bg-gradient-to-r from-pink-900 to-pink-700 text-white hover:from-pink-600 hover:to-pink-500 transition-all duration-300 font-semibold">
                        Update Product
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    @include('components.footer')
    
    <script>
        let imagesToRemove = [];
        
        function markForRemoval(index, imagePath) {
            imagesToRemove.push(imagePath);
            document.getElementById('remove_images').value = imagesToRemove.join(',');
            event.target.closest('.relative').style.opacity = '0.5';
            event.target.closest('.relative').style.pointerEvents = 'none';
        }
    </script>
</body>
</html>