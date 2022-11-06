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

        $catgory = Category::create($request->all());
        return redirect('categories');
    }
}
