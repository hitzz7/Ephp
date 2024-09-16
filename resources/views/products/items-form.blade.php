<!-- resources/views/products/items-form.blade.php -->
<div class="form-group">
    <label for="items">Items:</label>

    <!-- Repeat this block for each item -->
    <div class="item-container">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="sku">SKU:</label>
                    <input type="text" name="items[0][sku]" class="form-control" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="inventory">inventory:</label>
                    <input type="text" name="items[0][inventory]" class="form-control" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="weight">price:</label>
                    <input type="text" name="items[0][price]" class="form-control" required>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="size">Size:</label>
                    <select name="items[0][size_id]" class="form-control" required>
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
                    <select name="items[0][color_id]" class="form-control" required>
                        <!-- Include dropdown options for colors -->
                        @foreach ($colors as $color)
                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <!-- <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="text" name="items[0][prices][0][price]" class="form-control" required>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="text" name="items[0][prices][0][quantity]" class="form-control">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="weight">Weight:</label>
                    <input type="text" name="items[0][prices][0][weight]" class="form-control">
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-info mt-3 add-price">Add Price</button> -->
    </div>

    <!-- Add a button to dynamically add more items -->
    <button type="button" class="btn btn-primary mt-3 add-item">Add Item</button>
</div>

<!-- Include JavaScript to handle dynamically adding items and prices -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const addItemButton = document.querySelector('.add-item');
    // const addPriceButton = document.querySelector('.add-price');
    const itemContainer = document.querySelector('.item-container');
    const item = document.querySelector('.ok');
    let itemIndex = 1;
    let priceIndex = 1;
    // addPriceButton.addEventListener('click', function() {
    //     priceIndex++;
    //     const priceFields = document.createElement('div');
    //     priceFields.classList.add('price-fields');
    //     priceFields.innerHTML = `
    //         <div class="price-container row">
    //         <div class="col-md-4">
    //             <div class="form-group">
    //                 <label for="price">Price:</label>
    //                 <input type="text" name="items[0][prices][${priceIndex}][price]" class="form-control" required>
    //             </div>
    //         </div>
    //         <div class="col-md-4">
    //             <div class="form-group">
    //                 <label for="quantity">Quantity:</label>
    //                 <input type="text" name="items[0][prices][${priceIndex}][quantity]" class="form-control">
    //             </div>
    //         </div>
    //         <div class="col-md-4">
    //             <div class="form-group">
    //                 <label for="weight">Weight:</label>
    //                 <input type="text" name="items[0][prices][${priceIndex}][weight]" class="form-control">
    //             </div>
    //         </div>
    //     </div>

    //         `;
    //     itemContainer.insertBefore(priceFields, addPriceButton);
    // });

    addItemButton.addEventListener('click', function() {
        itemIndex++;
        const newItem = itemContainer.cloneNode(true);
        itemContainer.parentNode.insertBefore(newItem, addItemButton);

        // Clear the content of the new item
        newItem.querySelector('.row').innerHTML = '';

        // Add the item fields
        newItem.innerHTML = `
        <div class="item-container">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="sku">SKU:</label>
                    <input type="text" name="items[${itemIndex}][sku]" class="form-control" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="inventory">inventory:</label>
                    <input type="text" name="items[${itemIndex}][inventory]" class="form-control" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="weight">price:</label>
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

        // Add the "Add Price" button to the newly added item
        // const addPriceButton = document.createElement('button');
        // addPriceButton.classList.add('btn', 'btn-info', 'add-price', 'mt-4');
        // addPriceButton.textContent = 'Add Price';
        // newItem.appendChild(addPriceButton);

        // // Add event listener for the newly added "Add Price" button
        // addPriceButton.addEventListener('click', function() {
        //     const priceFields = newItem.querySelector('.price-fields');
        //     const newPriceContainer = document.createElement('div');
        //     newPriceContainer.classList.add('price-container');
        //     const priceIndex = priceFields.querySelectorAll('.price-container')
        //         .length; // Get the index for the new price entry

        //     newPriceContainer.innerHTML = `
        //         <div class="price-container row">
        //             <div class="col-md-4">
        //                 <div class="form-group">
        //                     <label for="price">Price:</label>
        //                     <input type="text" name="items[${itemIndex}][prices][${priceIndex}][price]" class="form-control" required>
        //                 </div>
        //             </div>
        //             <div class="col-md-4">
        //                 <div class="form-group">
        //                     <label for="quantity">Quantity:</label>
        //                     <input type="text" name="items[${itemIndex}][prices][${priceIndex}][quantity]" class="form-control">
        //                 </div>
        //             </div>
        //             <div class="col-md-4">
        //                 <div class="form-group">
        //                     <label for="weight">Weight:</label>
        //                     <input type="text" name="items[${itemIndex}][prices][${priceIndex}][weight]" class="form-control">
        //                 </div>
        //             </div>
        //         </div>
        //         `;
        //     priceFields.appendChild(newPriceContainer);
        // });

    });




});
</script>