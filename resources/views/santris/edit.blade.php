<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple Laravel 11 CRUD</title>
    <!-- TailwindCSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Flowbite CDN -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@1.7.0/dist/flowbite.min.css" rel="stylesheet" />
  </head>
  <body class="bg-gray-100">

    <div class="bg-gray-800 py-3">
        <h3 class="text-white text-center text-xl font-semibold">Simple Laravel 11 CRUD</h3>
    </div>

    <div class="container mx-auto mt-4">
        <div class="flex justify-end">
            <a href="{{ route('santris.index') }}" class="bg-gray-800 text-white px-4 py-2 rounded-lg">Back</a>
        </div>

        <div class="flex justify-center mt-8">
            <div class="w-full md:w-2/3">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="border-b-2 mb-4">
                        <h3 class="text-xl font-semibold text-gray-800">Edit Product</h3>
                    </div>

                    <form enctype="multipart/form-data" action="{{ route('products.update',$product->id) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="space-y-4">

                            <div>
                                <label for="name" class="block text-lg font-medium">Name</label>
                                <input value="{{ old('name',$product->name) }}" type="text" class="w-full mt-2 p-3 border border-gray-300 rounded-lg @error('name') border-red-500 @enderror" placeholder="Name" name="name">
                                @error('name')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="sku" class="block text-lg font-medium">Sku</label>
                                <input value="{{ old('sku',$product->sku) }}" type="text" class="w-full mt-2 p-3 border border-gray-300 rounded-lg @error('sku') border-red-500 @enderror" placeholder="Sku" name="sku">
                                @error('sku')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="price" class="block text-lg font-medium">Price</label>
                                <input value="{{ old('price',$product->price) }}" type="text" class="w-full mt-2 p-3 border border-gray-300 rounded-lg @error('price') border-red-500 @enderror" placeholder="Price" name="price">
                                @error('price')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="description" class="block text-lg font-medium">Description</label>
                                <textarea placeholder="Description" class="w-full mt-2 p-3 border border-gray-300 rounded-lg" name="description" rows="5">{{ old('description',$product->description) }}</textarea>
                            </div>

                            <div>
                                <label for="image" class="block text-lg font-medium">Image</label>
                                <input type="file" class="w-full mt-2 p-3 border border-gray-300 rounded-lg" name="image">
                                @if ($product->image != "")
                                    <img class="w-1/2 my-3" src="{{ asset('storage/' . $product->image) }}" alt="">
                                @endif
                            </div>

                            <!-- Image2 -->
                            <div>
                                <label for="image2" class="block text-lg font-medium">Image2</label>
                                <input type="file" class="w-full mt-2 p-3 border border-gray-300 rounded-lg" name="image2">
                                @if ($product->image2 != "")
                                    <img class="w-1/2 my-3" src="{{ asset('storage/' . $product->image2) }}" alt="">
                                @endif
                            </div>

                            <div class="mt-6">
                                <button class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700">Update</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Flowbite JS -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.7.0/dist/flowbite.min.js"></script>
  </body>
</html>
