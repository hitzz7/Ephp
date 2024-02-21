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
                            <label for="weight">Weight:</label>
                            <input type="hidden" name="items[{{ $item->id }}][id]" class="form-control" value="{{ $item->id }}">
                            <input type="text" name="items[{{ $item->id }}][weight]" class="form-control" value="{{ $item->weight }}" required>
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
                <div class="price-container">
                    <!-- Repeat this block for each price -->
                    @foreach ($item->prices as $price)
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="hidden" name="items[{{ $item->id }}][prices][{{ $price->id }}][id]" class="form-control" value="{{ $price->id }}">
                                <input type="text" name="items[{{ $item->id }}][prices][{{ $price->id }}][price]" class="form-control" value="{{ $price->price }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="quantity">Quantity:</label>
                                
                                <input type="text" name="items[{{ $item->id }}][prices][{{ $price->id }}][quantity]" class="form-control" value="{{ $price->quantity }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="weight">Weight:</label>
                                
                                <input type="text" name="items[{{ $item->id }}][prices][{{ $price->id }}][weight]" class="form-control" value="{{ $price->weight }}">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <button type="button" class="btn btn-info mt-3 add-price">Add Price</button>
            </div>
        @endforeach
    </div>

    <!-- Add a button to dynamically add more items -->
    <button type="button" class="btn btn-primary mt-3 add-item">Add Item</button>
</div>

<!-- Include JavaScript to handle dynamically adding items and prices -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add event listener for adding prices
        document.querySelectorAll('.add-price').forEach(function(button) {
            button.addEventListener('click', function() {
                // Find the container for this item's prices
                var priceContainer = this.closest('.item').querySelector('.price-container');
                
                // Create a new row for the price
                var newRow = document.createElement('div');
                newRow.classList.add('row', 'price-row');
                newRow.innerHTML = `
                    <!-- Price details -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="text" name="items[${item->id}][prices][new][price]" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="quantity">Quantity:</label>
                            <input type="text" name="items[${item->id}][prices][new][quantity]" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="weight">Weight:</label>
                            <input type="text" name="items[${item->id}][prices][new][weight]" class="form-control">
                        </div>
                    </div>
                `;
                
                // Append the new row to the price container
                priceContainer.appendChild(newRow);
            });
        });
    });
</script>
