<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Go to index page
    public function index() {
        $books = Book::all();
        return view('book', ['books' => $books]);
    }
    
    // Go to create page
    public function add() {
        $categories = Category::all();
        return view('book-add', ['categories' => $categories]);
    }

    // Store data
    public function store(Request $request) {
        
        // Validation
        $validated = $request->validate([
            'book_code' => 'required|unique:books|max:255',
            'title' => 'required|max:255'
        ]);
        
        // For image file
        $newName = '';
        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName);
        }
        $request['cover'] = $newName;

        $book = Book::create($request->all());
        $book->categories()->sync($request->categories);
        return redirect('books')->with('status', 'Book Added Successfully');
    }
    
    // Go to edit page with current data
    public function edit($slug) {

        $book = Book::where('slug', $slug)->first();
        $categories = Category::all();
        return view('book-edit', ['categories' => $categories, 'book' => $book]);
    }

    // Update data
    public function update(Request $request, $slug) {
        
        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName);
            $request['cover'] = $newName;
        }

        $book = Book::where('slug', $slug)->first();
        $book->update($request->all());

        if ($request->categories) {
            $book->categories()->sync($request->categories);
        }

        return redirect('books')->with('status', 'Book updated successfully');

    }

    // Go to delete page
    public function delete($slug) {

        $book = Book::where('slug', $slug)->first();
        return view('book-delete', ['book' => $book]);
    }

    // Delete the data
    public function destroy($slug) {

        $book = Book::where('slug', $slug)->first();
        $book->delete();
        return redirect('books')->with('status', 'Book deleted successfully');
    }

    // View and go to the deleted data page
    public function deletedBookList() {
        $deletedBooksList = Book::onlyTrashed()->get();
        return view('book-deleted-list', ['deletedBooksList' => $deletedBooksList]);
    }

    // Restore the deleted data
    public function restore($slug) {
        $book = Book::withTrashed()->where('slug', $slug)->first();
        $book->restore();
        return redirect('books')->with('status', 'Book Restored Successfully');
    }
}