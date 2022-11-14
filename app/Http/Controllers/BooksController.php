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
        $book = Book::create($request->all());//menyimpan data buku ke database.
        return redirect('books');
    }
}
