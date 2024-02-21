<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category List</title>
</head>
<body>
    <h1>Category List</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <ul>
        @foreach($categories as $category)
            <li>{{ $category->name }} - <a href="{{ route('categories.edit', $category->id) }}">Edit</a> | 
            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('categories.create') }}">Create New Category</a>
</body>
</html>
