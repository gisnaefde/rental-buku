<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request){
        $categories = Category::all();

        if($request->category || $request->title){ //jika ada request dari category atau title maka jalankan perintah di bawah

            //jika kedua fitur search ini dijalankan maka akan memuncul buku berdasarkan title dan category yang di tentukan
            $books = Book::where('title','like',"%".$request->title."%")//fitur search berdasarkan title
                            //Fitur Search berdasarkan categori
                            ->orWhereHas('categories', function($q) use($request){ // karena categori itu berelasi dengan buku (bisa dilihat di model books), jadi kita menggunakan whereHas. 'categories' tersebut merupakan nama fungsi relasi yang ada di model books
                                $q->where('categories.id', $request->category); // disini kita mencari berdasarkan hasil request dengan id yang ada dalam categories.
                            })
                            ->get();
        }
        else { //jika tidak ada request maka data buku di tampilkan semua
            $books = Book::all();
        }
        return view('book-list',['books'=>$books, 'categories'=> $categories]);
    }
}
