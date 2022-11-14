<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index(){
        $books = Book::all();
        return view('books',['books'=> $books]);
    }

    public function add () {
        return view('book-add');
    }

    public function store (Request $request){
        $validated = $request->validate([
            'book_code' => 'required|unique:books|max:255', //Code buku wajib diisi tidak boleh sama
            'title' => 'required|max:255', //Titile wajib diisi tapi boleh sama
        ]);

        $book = Book::create($request->all());//menyimpan data buku ke database.
        return redirect('books')->with('status', 'Book Added Sucsessfully');
    }
}
