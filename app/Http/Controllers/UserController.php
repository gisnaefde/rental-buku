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
        $users = User::where('roles_id', '2')->get(); //untuk memfilter hanya user saja yang tampil
        return view('users',['users'=>$users]);
    }
}
