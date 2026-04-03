<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    // List all categories
    public function index()
    {
        $categories = Category::latest()->get();
        return view('user.category', compact('categories'));
    }

    // Show form to create new category (optional)
    public function create()
    {
        return view('user.categories.create'); // optional separate page
    }

    // Store new category
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index')
                         ->with('success', 'Category added successfully!');
    }

    // Show edit form
    public function edit(Category $category)
    {
        if($category->status == 0){
            return redirect()->route('categories.category')->with('error', 'Cannot edit a disabled category. Please enable it first.');
        }
        return view('user.category_edit', compact('category'));
    }

    // Update category
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index')
                         ->with('success', 'Category updated successfully!');
    }

    public function toggle(Category $category)
    {
        $category->status = $category->status ? 0 : 1; // Toggle
        $category->save();

        $message = $category->status ? 'Category enabled successfully!' : 'Category disabled successfully!';
        return redirect()->route('categories.index')->with('success', $message);
    }

    // Delete category
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
                         ->with('success', 'Category deleted successfully!');
    }
}
