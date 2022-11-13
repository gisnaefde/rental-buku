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

    public function edit ($slug){
        $categories = Category::where('slug', $slug)->first();//untuk mencari slug yang di dapat
        return view ('/categories-edit',array("categories"=>$categories));
    }

    public function update (Request $request ,$slug){
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100', //maksud dari unique agar ketika admin memasukan category yang sudah ada di DB maka tidak akan bisa
        ]);

        $categories = Category::where('slug',$slug)->first();//untuk mencari slug yang di dapat
        $categories->slug = null; //untuk meupdate slug kita kosongkan dulu
        $categories->update($request->all()); //menyimpan semua data dari request termasuk slug nya.

        return redirect('/categories');
    }

    public function delete ($slug) {
        $categories = Category::where('slug', $slug)->first();
        return view ('categories-delete', ['categories'=>$categories]);
    }

    public function destroy ($slug){
        $categories = Category::where('slug', $slug)->first();
        $categories->delete();
        return redirect('categories')->with('status','Category Deleted Successs');
    }
}
