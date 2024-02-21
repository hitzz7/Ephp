<x-app-layout>
    <x-slot name="header">
        <h1>Create Category</h1>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </x-slot>

    <div class="container mt-5">
        @auth
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Category Name:</label>
                    <input type="text" name="name" id="name" required>
                </div>
                <div class="form-group">
                    <label for="parent_id">Parent Category:</label>
                    <select name="parent_id" id="parent_id" class="form-control">
                        <option value="">Select Parent Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select name="status" class="form-control" required>
                        <option value="1" {{ (old('status', $product->status ?? '') == '1') ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ (old('status', $product->status ?? '') == '0') ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Create</button>
            </form>
        @else
            <p>You need to be logged in to create a category.</p>
        @endauth
    </div>
</x-app-layout>
