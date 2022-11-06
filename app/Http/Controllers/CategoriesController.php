<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(){

        $categories = Category::all();
        return view('categories',['categories_'=>$categories]);
    }

    public function add(){
        return view('categories-add');
    }

    public function store (Request $request){

        //unutk memvalidasi inputan
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100', //maksud dari unique agar ketika admin memasukan category yang sudah ada di DB maka tidak akan bisa
        ]);

        $catgory = Category::create($request->all());
        return redirect('categories')->with('status', 'Category Added Sucsessfully');
    }
}
