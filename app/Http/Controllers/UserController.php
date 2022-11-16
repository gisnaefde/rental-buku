<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function profile (){
        return view('profile');
    }
    public function index (){
        $users = User::where('roles_id', '2')->where('status', 'active')->get(); //untuk memfilter hanya user(bukan admin) dan status active saja yang tampil
        return view('users',['users'=>$users]);
    }

    public function regiteredUsers(){
        $registered = User::where('status','inactive')->where('roles_id','2')->get(); //untuk memfilter hanya user(bukan admin) dan status inactive saja yang tampil
        return view ('registered-user', ['registered'=> $registered]);
    }

    public function show ($slug) {
        $user = User::where('slug',$slug)->first();
        return view('user-detail',['user'=>$user]);
    }

    public function approve ($slug){
        $user = User::where('slug', $slug)->first();
        $user->status = "active"; //merubah status user menjadi active
        $user->save(); //menyimpan status baru user
        return redirect('/user-detail/$slug')->with('status','User Approved Sucessfully');
    }
}
