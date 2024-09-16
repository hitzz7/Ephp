<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!auth()->user()->can('list sizes')) {
            abort(403, 'Unauthorized');
        }
        $sizes = Size::all();

        return view('sizes.index', compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->user()->can('create sizes')) {
            abort(403, 'Unauthorized');
        }
        return view('sizes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('store sizes')) {
            abort(403, 'Unauthorized');
        }
        $request->validate([
            'name' => 'required|unique:sizes|max:255',
        ]);

        Size::create($request->all());

        return redirect()->route('sizes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Size $size)
    {
        if (!auth()->user()->can('show sizes')) {
            abort(403, 'Unauthorized');
        }
        return view('sizes.show', compact('size'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Size $size)
    {
        if (!auth()->user()->can('edit sizes')) {
            abort(403, 'Unauthorized');
        }
        return view('sizes.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Size $size)
    {
        if (!auth()->user()->can('update sizes')) {
            abort(403, 'Unauthorized');
        }
        $request->validate([
            'name' => 'required|unique:sizes|max:255',
        ]);

        $size->update($request->all());

        return redirect()->route('sizes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size)
    {
        if (!auth()->user()->can('delete sizes')) {
            abort(403, 'Unauthorized');
        }
        $size->delete();

        return redirect()->route('sizes.index');
    }
}
