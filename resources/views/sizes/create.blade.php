<x-app-layout>
    <x-slot name="header">
        <h1>Create Size</h1>
    </x-slot>

    <div class="container mt-5">
        <form action="{{ route('sizes.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Size Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Size</button>
        </form>
    </div>
</x-app-layout>
