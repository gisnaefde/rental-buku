<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index(){
        $books = Book::all();
        return view('books',['books'=> $books]);
    }

    public function add () {
        $categories = Category::all();
        return view('book-add', ['categories'=>$categories]); //menyertakan data categories untuk di tampilkan di opton add book
    }

    public function store (Request $request){
        $validated = $request->validate([
            'book_code' => 'required|unique:books|max:255', //Code buku wajib diisi tidak boleh sama
            'title' => 'required|max:255', //Titile wajib diisi tapi boleh sama
        ]);

        $newName ="";//inisialisasi awal newName dengan string kosong 
        if($request->file('image')){ //Jika isi request itu file dengan namenya image
            $extention = $request->file('image')->getClientOriginalExtension(); //untuk mendapatkan extention image
            $newName = $request->title.'-'.now()->timestamp.'.'.$extention; //$newName berisi nama file yang akan disimpan dengan susunan title-waktu upload.extention
            $request->file('image')->storeAs('cover', $newName); //menyimpan file image ke dalam folde cover dengan nama $newName , folder cover ini akan otoamtis dibuatkan di public/storage/
        }
        $request['cover'] = $newName; //menyimpan data ke dalam database di column cover
        $book = Book::create($request->all());//menyimpan data buku ke database.
        $book->categories()->sync([$request->categories]);//ini digunakan untuk menambahkan ke function categories dalam Model/Book , sedangkan $request->categories merupakan hasil inputan categori
        return redirect('books')->with('status', 'Book Added Sucsessfully');
    }
}
