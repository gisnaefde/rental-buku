<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\RentLogs;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\DB;

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
        
        //logika , tidak bisa meminjam buku yang sedang di pinjam
        $books = Book::find($request->book_id); //mencari buku dengan id sesuai request
    
        if($books->status != 'in stock'){
            Session::flash('message', 'Book is being borrowed'); //unutk mengirimkan pesan ke book-rent
            Session::flash('alert-class', 'alert-danger'); 
            return redirect('book-rent');
        }
        else{
            try{
                //disini menggunakan DB transaction karena ada dua table yang sekaligus di ubah yaitu menambhakan data ke rent-logs dan mengupdate status buku di table books
                DB::beginTransaction();
                
                RentLogs::create($request->all()); //menambahkan semua data hasil request ke dalam table rent-logs

                $book = Book::find($request->book_id);
                $book->status = "not available"; //mengganti book status menjadi not available
                $book->save();

                DB::commit();

                Session::flash('message', 'The book was successfully borrowed'); //unutk mengirimkan pesan ke book-rent
                Session::flash('alert-class', 'alert-success'); 
                return redirect('book-rent');
            }
            catch (\Throwable $th){
                DB::rollBack();
                dd('kesalahan');
            }
        }
    }
}
