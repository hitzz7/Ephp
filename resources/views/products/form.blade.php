@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    <label for="name">Name:</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $product->name ?? '') }}" required>
</div>

<div class="form-group">
    <label for="description">Description:</label>
    <textarea name="description" class="form-control" required>{{ old('description', $product->description ?? '') }}</textarea>
</div>


<div class="form-group">
    <label for="status">Status:</label>
    <select name="status" class="form-control" required>
        <option value="1" {{ (old('status', $product->status ?? '') == '1') ? 'selected' : '' }}>Active</option>
        <option value="0" {{ (old('status', $product->status ?? '') == '0') ? 'selected' : '' }}>Inactive</option>
    </select>
</div>






<!-- <div class="form-group">
    <label for="items">Items:</label>
    
</div> -->

<!-- Add more form fields for Categories, Images, etc. -->



@include('products.categories', ['categories' => $categories, 'selectedCategories' => $product->category->pluck('id')->toArray() ?? []])

@include('products.images', ['images' => $product->images ?? []])


