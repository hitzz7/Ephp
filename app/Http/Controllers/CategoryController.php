<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $categories = Category::all();

        return view('categories.index',compact('categories'));
        
    }
    public function toggleStatus(Category $category)
    {
        $category->status = !$category->status;
        $category->save();

        return back()->with('success', 'Category status updated successfully.');
    }
    // CategoryController.php
    public function showChildren(Category $category)
    {
        $children = $category->children; // Assuming you have a 'children' relationship defined in your Category model

        return view('categories.children', compact('children', 'category')); // Pass the child categories and parent category to the view
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {

        $categories = Category::all();

        return view('categories.create', compact('categories'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request):RedirectResponse
    {
        
        Category::create($request->validated());
        
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'category not found'], 404);
        }

        return response()->json($category, 200);
        

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        
        $categories = Category::all(); // Fetch all categories
        return view('categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category):RedirectResponse
    {
        //
        $category->update($request->validated());
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category):RedirectResponse
    {
        //
        $category->delete();
        return redirect()->route('categories.index');
    }
}
