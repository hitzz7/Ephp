<!-- resources/views/products/categories.blade.php -->
<h3>Categories</h3>

<div class="form-group">
    <label for="categories">Categories:</label>
    <ul>
        @foreach ($categories as $category)
            @if ($category->parent_id === null)
                <li>
                    <strong>{{ $category->name }}</strong>
                    @if ($category->children->count() > 0)
                        @include('products.child-categories', ['children' => $category->children, 'selectedCategories' => $selectedCategories])
                    @endif
                </li>
            @endif
        @endforeach
    </ul>
</div>
