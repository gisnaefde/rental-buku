<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\userController;
use App\Http\Controllers\BooksController;

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

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('only_guest');
Route::POST('/login', [AuthController::class, 'authenticating'])->middleware('only_guest');//ini akan di jalankan ketika dalam route login melakukan post
Route::get('/register', [AuthController::class, 'register'])->middleware('only_guest');

Route::get('/dashboard', [DashboardController::class , 'index'])->name('dashboard')->middleware(['auth','only_admin']);;
Route::get('/profile', [userController::class , 'profile'])->middleware(['auth','only_client']);;
Route::get('/books', [BooksController::class, 'index'])->middleware('auth');

