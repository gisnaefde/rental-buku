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

            $books = Book::where('title','like',"%".$request->title."%")->get();//fitur search berdasarkan title
            
        }
        else { //jika tidak ada request maka data buku di tampilkan semua
            $books = Book::all();
        }
        return view('book-list',['books'=>$books, 'categories'=> $categories]);
    }
}
