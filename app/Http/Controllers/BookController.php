<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function books_page(){
        $books = Book::all();
        $categories = Category::all();

        // return view('Book.Show', compact('books'));
        return view('Book.Show')->with('books', $books)->with('categories', $categories);
    }

    public function add_books_page(){
        $categories = Category::all();

        return view('Book.Add')->with('categories', $categories);
    }

    public function add_books(Request $request){
        Book::create([
            'category_id' => $request->category,
            'title' => $request->title,
            'author' => $request->author,
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
            'author' => $request->author,
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

}
