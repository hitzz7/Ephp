<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Categories</h1>
            <a href="{{ route('categories.create') }}" class="btn btn-success">Create Category</a>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        </div>
    </x-slot>

    <div class="container mt-5">
        @if($categories->count() > 0)
            <div class="list-group">
                @foreach($categories as $category)
                    @if ($category->parent_id === null)
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                {{ $category->name }}
                                @if ($category->status === 1)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </div>

                            <div class="button-group">
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?');">Delete</button>
                                </form>
                            </div>
                        </div>
                        <!-- Recursive call to handle child categories -->
                        @if($category->children)
                            <div class="list-group mt-3">
                                @foreach($category->children as $child)
                                    <div class="list-group-item d-flex justify-content-between align-items-center ml-5">
                                        <div>
                                            {{ $child->name }}
                                            @if ($child->status === 1)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </div>
                                        <div class="button-group">
                                            <a href="{{ route('categories.edit', $child->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('categories.destroy', $child->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?');">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @endif
                @endforeach
            </div>
        @else
            <div class="alert alert-warning" role="alert">
                No categories found. Create a new one now.
            </div>
        @endif
    </div>
</x-app-layout>
