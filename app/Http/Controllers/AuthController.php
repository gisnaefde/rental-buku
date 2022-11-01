<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login ( ){
        return view('login');
    }
    public function register ( ){
        return view('register');
    }

    public function authenticating (Request $request){
        $credentials = $request->validate([
            'username' => ['required',],
            'password' => ['required'],
        ]);
        
        //cek apakah login valid
        if (Auth::attempt($credentials)) {
            //cek apakan status user = active
            if(Auth::user()->status != 'active'){
                Session::flash('status', 'failed');
                Session::flash('message', 'Yor Account is not Active, Please Contact Admin');
                return redirect('login');
            }

            // $request->session()->regenerate();
 
            // return redirect()->intended('dashboard');
        }

        //Jika username atau password tidak sesuai maka ini di jalankan
        Session::flash('status', 'failed');
        Session::flash('message', 'Login Infalid');
        return redirect('login');
    }
}
