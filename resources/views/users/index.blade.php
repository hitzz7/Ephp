<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Users</h1>
            <a href="{{ route('users.create') }}" class="btn btn-primary">Add User</a>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
            <!-- Include any necessary CSS and JavaScript here -->
        </div>
    </x-slot>

    <div class="container mt-5">
        <!-- Bootstrap List Group for Users -->
        <div class="list-group">
            @forelse($users as $user)
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $user->name }}
                    <div>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <!-- Include a delete form here if needed -->
                    </div>
                </div>
            @empty
                <div class="list-group-item">No users found.</div>
            @endforelse
        </div>
    </div>
</x-app-layout>
