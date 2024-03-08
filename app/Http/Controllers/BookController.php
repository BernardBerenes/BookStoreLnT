<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function books_page(){
        $books = Book::all();
        $categories = Category::all();
        $authors = Author::all();

        // return view('Book.Show', compact('books'));
        return view('Book.Show')->with('books', $books)->with('categories', $categories)->with('authors', $authors);
    }

    public function add_books_page(){
        $categories = Category::all();

        return view('Book.Add')->with('categories', $categories);
    }

    public function add_books(Request $request){
        Book::create([
            'category_id' => $request->category,
            'title' => $request->title,
            'publisher' => $request->publisher,
            'synopsis' => $request->synopsis,
            'isbn' => $request->isbn,
            'release_date' => $request->release_date,
            'page' => $request->page,
            'stocks' => $request->stocks
        ]);

        return redirect(route('books_page'));
    }

    public function edit_books_page($id){
        $books = Book::findOrFail($id);

        return view('Book.Edit')->with('book', $books);
    }

    public function update_books(Request $request, $id){
        Book::findOrFail($id)->update([
            'title' => $request->title,
            'publisher' => $request->publisher,
            'synopsis' => $request->synopsis,
            'isbn' => $request->isbn,
            'release_date' => $request->release_date,
            'page' => $request->page,
            'stocks' => $request->stocks
        ]);

        return redirect(route('books_page'));
    }

    public function delete_books($id){
        Book::destroy($id);

        return redirect(route('books_page'));
    }

    public function add_author_page($id){
        $book = Book::findOrFail($id);
        $authors = Author::all();

        return view('Book.AddAuthor')->with('authors', $authors)->with('book', $book);
    }

    public function add_author(Request $request, $id){
        $book = Book::with('author')->findOrFail($id);
        $book->author()->attach($request->author);

        return redirect(route('books_page'));
    }
}
