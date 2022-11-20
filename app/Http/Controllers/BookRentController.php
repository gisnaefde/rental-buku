<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookRentController extends Controller
{
    public function index() {
        $user = User::where('id','!=',1)->get();
        $books = Book::all();
        return view('book-rent',['user'=>$user, 'books'=>$books]);
    }

    public function store(Request $request) {
        //carbon now digunakan unutk mendapatkan data waktu sekarang
        $request['rent_date'] = Carbon::now()->toDateString(); //$request['rent_date'], yaitu mengisi request dengan name 'rent_date'
        $request['return_date'] = Carbon::now()->addDays(3)->toDateString();//ditambah 3 hari
        
    }
}
