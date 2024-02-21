<x-app-layout>
    <x-slot name="header">
        <h1>Edit color</h1>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </x-slot>

    <div class="container mt-5">
        <form action="{{ route('colors.update', $color->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="name">color Name:</label>
            <input type="text" name="name" id="name" value="{{ $color->name }}" required>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</x-app-layout>

</body>
</html>


    