<!-- resources/views/products/items-form.blade.php -->
<div class="form-group">
    <label for="items">Items:</label>

    <!-- Repeat this block for each item -->
    <div class="item-container">
        @foreach ($product->items as $item)
            <div class="item">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="sku">SKU:</label>
                            <input type="hidden" name="items[{{ $item->id }}][id]" class="form-control" value="{{ $item->id }}">
                            <input type="text" name="items[{{ $item->id }}][sku]" class="form-control" value="{{ $item->sku }}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="inventory">Inventory:</label>
                            <input type="hidden" name="items[{{ $item->id }}][id]" class="form-control" value="{{ $item->id }}">
                            <input type="text" name="items[{{ $item->id }}][inventory]" class="form-control" value="{{ $item->inventory }}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="weight">Price:</label>
                            <input type="hidden" name="items[{{ $item->id }}][id]" class="form-control" value="{{ $item->id }}">
                            <input type="text" name="items[{{ $item->id }}][price]" class="form-control" value="{{ $item->price }}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="size">Size:</label>
                            <input type="hidden" name="items[{{ $item->id }}][size_id]" value="{{ $item->id }}">
                            <select name="items[{{ $item->id }}][size_id]" class="form-control" required>
                                <!-- Include dropdown options for sizes -->
                                @foreach ($sizes as $size)
                                    <option value="{{ $size->id }}" {{ $item->size_id == $size->id ? 'selected' : '' }}>{{ $size->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                                <label for="status">Status:</label>
                                <input type="hidden" name="items[{{ $item->id }}][color_id]" value="{{ $item->id }}">
                                <select name="status" class="form-control" required>
                                    <option value="1" {{ (old('status', $item->status ?? '') == '1') ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ (old('status', $item->status ?? '') == '0') ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="color">Color:</label>
                            <input type="hidden" name="items[{{ $item->id }}][color_id]" value="{{ $item->id }}">
                            <select name="items[{{ $item->id }}][color_id]" class="form-control" required>
                                <!-- Include dropdown options for colors -->
                                @foreach ($colors as $color)
                                    <option value="{{ $color->id }}" {{ $item->color_id == $color->id ? 'selected' : '' }}>{{ $color->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                
                
            </div>
        @endforeach
    </div>

    <!-- Add a button to dynamically add more items -->
    <button type="button" class="btn btn-primary mt-3 add-item">Add Item</button>
    
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const addItemButton = document.querySelector('.add-item');
    const itemContainer = document.querySelector('.item-container');
    let itemIndex = {{$product->items->count() }};
    
    
    addItemButton.addEventListener('click', function() {
        itemIndex++; // Increment item index counter

        const newItem = document.createElement('div');
        newItem.classList.add('item');
        
        newItem.innerHTML = `
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="sku">SKU:</label>
                        <input type="hidden" name="items[${itemIndex}][id]" class="form-control" value="">
                        <input type="text" name="items[${itemIndex}][sku]" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inventory">Inventory:</label>
                        <input type="hidden" name="items[${itemIndex}][id]" class="form-control" value="">
                        <input type="text" name="items[${itemIndex}][inventory]" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="hidden" name="items[${itemIndex}][id]" class="form-control" value="">
                        <input type="text" name="items[${itemIndex}][price]" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="size">Size:</label>
                        <select name="items[${itemIndex}][size_id]" class="form-control" required>
                            <!-- Include dropdown options for sizes -->
                            @foreach ($sizes as $size)
                                <option value="{{ $size->id }}">{{ $size->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select name="status" class="form-control" required>
                            <option value="1" {{ (old('status', $product->status ?? '') == '1') ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ (old('status', $product->status ?? '') == '0') ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="color">Color:</label>
                        <select name="items[${itemIndex}][color_id]" class="form-control" required>
                            <!-- Include dropdown options for colors -->
                            @foreach ($colors as $color)
                                <option value="{{ $color->id }}">{{ $color->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            
        `;
        
        itemContainer.appendChild(newItem);
    });
});
</script>




