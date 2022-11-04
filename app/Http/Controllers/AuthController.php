<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

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
                Session::flash('status', 'failed'); //session ini akan di panggil di from login 
                Session::flash('message', 'Yor Account is not Active, Please Contact Admin');
                return redirect('login');
            }

            //membuat session
            // $request->session()->regenerate();

            if(Auth::user()->roles_id == 1){
                return redirect ("dashboard");
            }
            
            if(Auth::user()->roles_id == 2){
                return redirect("profile");
            }
            

            // return redirect()->intended('dashboard');
        }

        //Jika username atau password tidak sesuai maka ini di jalankan
        Session::flash('status', 'failed');
        Session::flash('message', 'Login Infalid');
        return redirect('login');
    }

    public function logout (Request $request) {
        // jika ada yang authentricasi maka di logout
        Auth::logout();
        $request->session()->invalidate();//session di hapus
        $request->session()->regenerateToken();
        return redirect('login');//di ridirect ke halaman login
    }

    public function registerProcess(Request $request){
        $validated = $request->validate([
            'username' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'phone' => 'max:255',
            'address' => 'required'
        ]);
        
        // yang diinput di simpan dalam variable user
        // kemudian dalam model User melkakukan create user baru dengan mengisi data dari $request->all()
        $user = User::create($request->all());
    }
}
