<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Details') }}
        </h2>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-2">{{ $product->name }}</h3>
                    <p class="text-gray-600 mb-4">{{ $product->description }}</p>
                    
                    <p class="text-gray-700">Status: 
                        @if($product->status==1)
                            Active
                        @else
                            Inactive
                        @endif

                    </p>
                    <p class="text-gray-700">Categories:</p>
                    <ul class="list-disc pl-5">
                        @foreach($product->category as $category)
                            <li>{{ $category->name }}</li>
                        @endforeach
                    </ul>
                    <p class="text-gray-700">Images:</p>
                    <div class="grid grid-cols-3 gap-4">
                        @foreach($product->images as $image)
                            <img src="{{ asset('storage/' . $image->image) }}" alt="Product Image">
                        @endforeach
                    </div>

                    <hr class="my-6">

                    <h3 class="text-lg font-semibold mb-2">Items:</h3>
                    <ul>
                    @foreach($product->items as $item)
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->size->name }}</h5>
                                
                                <p class="card-text">SKU: {{ $item->sku }}</p>
                                <p class="card-text">Inventory: {{ $item->inventory }}</p>
                                <p class="card-text">Prices: {{ $item->price }}</p>
                                <p class="card-text">Color: {{ $item->color->name }}</p>
                                <p class="card-text">Size: {{ $item->size->name }}</p>
                                <p class="card-text">Status: {{ $item->status == 1 ? 'Active' : 'Inactive' }}</p>

                                
                                <ul class="list-group">
                                    
                                </ul>
                            </div>
                        </div>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
