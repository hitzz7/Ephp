<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        if (!auth()->user()->can('list colors')) {
            abort(403, 'Unauthorized');
        }

        $colors = Color::all();

        return view('colors.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        if (!auth()->user()->can('create colors')) {
            abort(403, 'Unauthorized');
        }
        return view('colors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        if (!auth()->user()->can('store colors')) {
            abort(403, 'Unauthorized');
        }
        // Validate and store the color
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:colors',
            // Add any other validation rules as needed
        ]);

        Color::create($validatedData);

        return redirect()->route('colors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color): View
    {
        if (!auth()->user()->can('show colors')) {
            abort(403, 'Unauthorized');
        }
        return view('colors.show', compact('color'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color): View
    {
        if (!auth()->user()->can('edit color')) {
            abort(403, 'Unauthorized');
        }
        return view('colors.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Color $color): RedirectResponse
    {
        if (!auth()->user()->can('update colors')) {
            abort(403, 'Unauthorized');
        }
        // Validate and update the color
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:colors,name,' . $color->id,
            // Add any other validation rules as needed
        ]);

        $color->update($validatedData);

        return redirect()->route('colors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color): RedirectResponse
    {
        if (!auth()->user()->can('delete colors')) {
            abort(403, 'Unauthorized');
        }
        $color->delete();

        return redirect()->route('colors.index');
    }
}
