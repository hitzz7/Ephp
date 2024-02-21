<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h3>Images</h3>

<div class="image-form-container">
    <div class="form-group">
        <label for="images">Images:</label>
        <input type="file" name="images[]" accept="image/*">
    </div>

    @if(isset($images) && count($images) > 0)
        <div class="image-preview">
            <h4>Current Images:</h4>
            @foreach($product->images as $image)
                <img src="{{ asset('storage/' . $image->path) }}" alt="Product Image">
            @endforeach
        </div>
    @endif
</div>
<div class="uu">

</div>

<button type="button" id="add-image-form" class="btn btn-primary">Add Another Image</button>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const container = document.querySelector('.uu');
            const addButton = document.getElementById('add-image-form');

            addButton.addEventListener('click', function () {
                const newForm = document.createElement('div');
                newForm.innerHTML = `
                    <div class="form-group">
                        <label for="images">Images:</label>
                        <input type="file" name="images[]" accept="image/*">
                    </div>
                `;

                container.append(newForm);
            });
        });
    </script>



</body>
</html>