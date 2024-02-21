<!-- Inside your main template -->
<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Categories</h1>
            <a href="{{ route('categories.create') }}" class="btn btn-success">Create Category</a>
        </div>
    </x-slot>

    <div class="container mt-5">
        @if($categories->count() > 0)
            <div class="list-group">
                @foreach($categories as $category)
                    @include('category', ['category' => $category])
                @endforeach
            </div>
        @else
            <div class="alert alert-warning" role="alert">
                No categories found. Create a new one now.
            </div>
        @endif
    </div>
</x-app-layout>
