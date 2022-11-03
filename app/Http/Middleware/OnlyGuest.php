<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnlyGuest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //Middleware Guest digunakan untuk user yang sudah punya masuk agar tidak bisa mengakses halaman loghin, register

        //ini mengecek jika sudah masuk dan ingin mengakses halaman login registe akan di ridirect ke halaman books
        if(Auth::user()){
            return redirect('books');
        }
        return $next($request);
    }
}
