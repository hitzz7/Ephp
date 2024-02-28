<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }

    public function edit(User $user)
    {
        // Load the roles associated with the user
        $roles = $user->roles()->pluck('name')->toArray();

        // Pass the roles data to the view
        return view('users.edit', ['user' => $user, 'roles' => $roles]);
    }

    public function update(Request $request, User $user)
    {
        $roles = $request->input('roles', []);

        // Sync the roles for the user
        $user->syncRoles($roles);
        return back()->with('success', 'User updated successfully');
    }
}
