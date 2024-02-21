<ul>
    @foreach ($children as $child)
        <li>
            <input type="checkbox" name="categories[]" value="{{ $child->id }}" {{ in_array($child->id, $selectedCategories) ? 'checked' : '' }}>
            <label>{{ $child->name }}</label>
            @if ($child->children->count() > 0)
                @include('products.child-categories', ['children' => $child->children, 'selectedCategories' => $selectedCategories])
            @endif
        </li>
    @endforeach
</ul>
