<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function books_page(){
        $books = Book::all();

        return view('Book.Show', compact('books'));
    }

    public function add_books_page(){
        return view('Book.Add');
    }

    public function add_books(Request $request){
        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'synopsis' => $request->synopsis,
            'isbn' => $request->isbn,
            'release_date' => $request->release_date,
            'page' => $request->page,
            'stocks' => $request->stocks
        ]);

        return redirect(route('show_books'));
    }

}
