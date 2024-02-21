<x-app-layout>
    <x-slot name="header">
        <h1>Edit Size</h1>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </x-slot>

    <div class="container mt-5">
        <form action="{{ route('sizes.update', $size->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Size Name:</label>
                <input type="text" name="name" class="form-control" value="{{ $size->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Size</button>
        </form>
    </div>
</x-app-layout>


    