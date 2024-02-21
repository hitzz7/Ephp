

<x-app-layout>
    <x-slot name="header">
        <h1>Edit products</h1>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </x-slot>

    <div class="container mt-5">
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        
        <!-- Product Information Section -->
       <!-- Example of a text input for product name -->
            
            
        <div class="form-group">
                <label for="name">Name</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ $product->name }}" required autofocus>
            </div>

            <!-- Description -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" class="form-control" name="description" required>{{ $product->description }}</textarea>
            </div>

            
            

            <!-- Status -->
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" class="form-control" required>
                    <option value="1" {{ (old('status', $product->status ?? '') == '1') ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ (old('status', $product->status ?? '') == '0') ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <!-- Categories -->
            @include('products.categories', ['categories' => $categories, 'selectedCategories' => $product->category->pluck('id')->toArray() ?? []])

            <!-- Items -->
            <div class="form-group">
                <label for="items">Items</label>
                @include('products.items-edit')
            </div>

            <!-- Images -->
            <div class="form-group">
                <label for="images">Images</label>
                <!-- Display existing images for editing -->
                @foreach($product->images as $image)
                    <img src="{{ asset('storage/' . $image->image) }}" alt="Product Image">
                @endforeach
                <input type="file" class="form-control-file" name="images[]" multiple>
            </div>
            
            
       

        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
    </div>
</x-app-layout>
