<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('auth'); //mkasud dari middleware ini yaiytu untuk membatasi route tersebut hanya bisa di akses setelah melakukan auth

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::POST('/login', [AuthController::class, 'authenticating']);//ini akan di jalankan ketika dalam route login melakukan post
Route::get('/register', [AuthController::class, 'register']);
