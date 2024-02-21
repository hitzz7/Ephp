<x-app-layout>
    <x-slot name="header">
        <h1>Add Color</h1>
    </x-slot>

    <div class="container mt-5">
        @auth
            <form action="{{ route('colors.store') }}" method="POST">
                @csrf
                <label for="name">Color Name:</label>
                <input type="text" name="name" id="name" required>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        @else
            <p>You need to be logged in to create a category.</p>
        @endauth
    </div>
</x-app-layout>
