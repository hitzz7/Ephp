<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Multiple Sets of Price Fields Dynamically</title>
<!-- Add Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <div class="price-fields">
        <!-- Single set of price fields -->
        <div class="price-container"> 
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" name="items[0][prices][0][price]" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="text" name="items[0][prices][0][quantity]" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="weight">Weight:</label>
                <input type="text" name="items[0][prices][0][weight]" class="form-control">
            </div>
        </div>
    </div>

    <!-- Button to add more price fields -->
    <button type="button" class="btn btn-primary mt-3 add-price">Add Another Set of Prices</button>
</div>

<!-- Include JavaScript to handle dynamically adding price fields -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const addButton = document.querySelector('.add-price');
    const priceContainer = document.querySelector('.price-container');

    addButton.addEventListener('click', function () {
        const newPriceContainer = priceContainer.cloneNode(true); // Clone the price container
        document.querySelector('.price-fields').appendChild(newPriceContainer); // Append the cloned container to the price-fields
    });
});
</script>

</body>
</html>
