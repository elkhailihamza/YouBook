<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    //
    public function index()
    {
        return view('book.index');
    }
    public function Create()
    {
        return view('book.create');
    }
    public function store(Request $request)
    {
        $info = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'book_cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('book_cover')) {
            $imagePath = $request->file('book_cover')->store('uploads', 'public');
            $info['book_cover'] = $imagePath;
        }

        $newBook = Book::create($info);
        return redirect(route('books.view'))->withSuccess("Book '$newBook->title' was created successfully!");
    }
    public function bookList()
    {
        $books = Book::all();
        return view('book.booklist', compact('books'));
    }
    public function bookDetails(Book $book)
    {
        return view('book.bookdetails', ['book' => $book]);
    }
    public function edit(Book $book)
    {
        return view('book.edit', ['book' => $book]);
    }
    public function update(Book $book, Request $request)
    {
        $info = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'book_cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('book_cover')) {
            if ($book->book_cover && file_exists(storage_path('app/public/' . $book->book_cover))) {
                unlink(storage_path('app/public/' . $book->book_cover));
            }
            $imagePath = $request->file('book_cover')->store('uploads', 'public');
            $info['book_cover'] = $imagePath;
        }
        $book->update($info);
        return redirect(route('book.viewList'))->withSuccess("Updated successfully!");
    }
    public function destroy(Book $book)
    {
        $found = Book::find($book);
        if (!$found) {
            return redirect(route('book.viewList'))->with('error', 'Entry cannot be deleted for a reason I know, but wont tell you.');
        }
        if ($found && file_exists(storage_path('app/public/' . $book->book_cover))) {
            unlink(storage_path('app/public/' . $book->book_cover));
        }
        $book->delete();
        return redirect(route('book.viewList'))->withSuccess("Deleted '$book->title' with success!");
    }
}
