{{-- resources/views/categories/children.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Child Categories of {{ $category->name }}</h1>
            <!-- Optionally, add a back link to categories list -->
            <a href="{{ route('categories.index') }}" class="btn btn-light">Back to Categories</a>
        </div>
    </x-slot>

    <div class="container mt-5">
        @if($children->count() > 0)
            <div class="list-group">
                @foreach($children as $child)
                    <div class="list-group-item">
                        {{ $child->name }}
                        @if ($child->status === 1)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Inactive</span>
                        @endif
                        <!-- You can also include Edit and Delete buttons here -->
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-warning" role="alert">
                No child categories found for this category.
            </div>
        @endif
    </div>
</x-app-layout>
