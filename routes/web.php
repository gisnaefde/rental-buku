<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\userController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\RentLogController;

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


Route::middleware(['only_guest'])->group(function () { //ketika memiliki middleware yang sama maka dibuat group
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::POST('/login', [AuthController::class, 'authenticating']);//ini akan di jalankan ketika dalam route login melakukan post
    Route::get('/register', [AuthController::class, 'register']);
    Route::POST('/register', [AuthController::class, 'registerProcess']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout',[AuthController::class, 'logout']);
    Route::get('/dashboard', [DashboardController::class , 'index'])->name('dashboard')->middleware('only_admin');
    Route::get('/profile', [userController::class , 'profile'])->middleware('only_client');
    Route::get('/books', [BooksController::class, 'index']);

    Route::get('/categories', [CategoriesController::class, 'index']);
    Route::get('categories-add',[CategoriesController::class, 'add']);

    Route::get('/users', [UserController::class, 'index']);
    Route::get('/rent-logs', [RentLogController::class, 'index']);
});

