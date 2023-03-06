<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Go to index page
    public function index() {

        $categories = Category::all();
        return view('category', ['categories' => $categories]);
    }

    // Go to create page
    public function add() {
        
        return view('category-add');
    }
    
    // Store data to database
    public function store(Request $request) {

        // Validation
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100',
        ]);

        // Save to database
        $category = Category::create($request->all());
        // Back to categories menu
        return redirect('categories')->with('status', 'Category Added Successfully');
    }

    // Go to edit page with brings the current data
    public function edit($slug) {

        
        $category = Category::where('slug', $slug)->first();
        return view('category-edit', ['category' => $category]);
    }

    // Query to update data
    public function update(Request $request, $slug) {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100',
        ]);

        $category = Category::where('slug', $slug)->first();
        $category->slug = null;
        $category->update($request->all());
        return redirect('categories')->with('status', 'Category updated successfully');
    } 

    // Go to delete page
    public function delete($slug) {
        $category = Category::where('slug', $slug)->first();
        return view('category-delete', ['category' => $category]);

    }

    // Delete the data
    public function destroy($slug) {
        $category = Category::where('slug', $slug)->first();
        $category->delete();
        return redirect('categories')->with('status', 'Category Deleted Successfully');
    }

    // Go to the deleted data page
    public function deletedCategoryList() {
        $deletedCategoriesList = Category::onlyTrashed()->get();
        return view('category-deleted-list', ['deletedCategoriesList' => $deletedCategoriesList]);
    }

    // Restore deteled data
    public function restore($slug) {
        $category = Category::withTrashed()->where('slug', $slug)->first();
        $category->restore();
        return redirect('categories')->with('status', 'Category Restored Successfully');
    }
}
