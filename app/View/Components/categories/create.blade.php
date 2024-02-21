<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
</head>
<body>
    <h1>Create Category</h1>

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

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <label for="name">Category Name:</label>
        <input type="text" name="name" id="name" required>
        <button type="submit">Create Category</button>
    </form>

    <a href="{{ route('categories.index') }}">Back to Category List</a>
</body>
</html>
