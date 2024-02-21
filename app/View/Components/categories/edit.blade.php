<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
</head>
<body>
    <h1>Edit Category</h1>

    @if ($errors->any())
        <div>
            <strong>Validation Errors:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Category Name:</label>
        <input type="text" name="name" id="name" value="{{ $category->name }}" required>
        <button type="submit">Update Category</button>
    </form>

    <a href="{{ route('categories.index') }}">Back to Category List</a>
</body>
</html>
