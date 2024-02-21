<!-- resources/views/products/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h1>Create Products</h1>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        
        
        
    </x-slot>
    <div class="container mt-5">
        @auth
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('products.form', ['categories' => $categories, 'product' => new App\Models\Product()])
            
            <!-- Include items form -->
            @include('products.items-form')
            


            <button type="submit" class="btn btn-success">Create Product</button>
        </form>
        @else
            <p>You need to be logged in to create a product.</p>
        @endauth
    </div>
</x-app-layout>
