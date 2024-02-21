<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Colors</h1>
            <a href="{{ route('colors.create') }}" class="btn btn-primary">Add Color</a>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        </div>
    </x-slot>

    <div class="container mt-5">
        <!-- Bootstrap List Group for Colors -->
        <div class="list-group">
            @forelse($colors as $color)
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $color->name }}
                    <div>
                        <a href="{{ route('colors.edit', $color->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('colors.destroy', $color->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="list-group-item">No colors found.</div>
            @endforelse
        </div>
    </div>
</x-app-layout>
