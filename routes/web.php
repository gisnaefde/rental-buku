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
    Route::get('/book-add', [BooksController::class , 'add']);
    Route::post('/book-add' , [BooksController::class, 'store']);
    Route::get('/book-edit/{slug}', [BooksController::class, 'edit']);
    Route::put('/book-edit/{slug}', [BooksController::class, 'update']);
    Route::get('/book-delete/{slug}', [BooksController::class, 'delete']);
    Route::get('/book-destroy/{slug}', [BooksController::class, 'destroy']);
    Route::get('/book-deleted', [BooksController::class, 'bookDeleted']);
    Route::get('/book-restore/{slug}', [BooksController::class, 'restore']);

    Route::get('/categories', [CategoriesController::class, 'index']);
    Route::get('categories-add',[CategoriesController::class, 'add']);
    Route::POST('categories-add', [CategoriesController::class, 'store']);
    Route::get('/categories-edit/{slug}',[CategoriesController::class, 'edit']);
    Route::put('/categories-edit/{slug}',[CategoriesController::class, 'update']);
    Route::get('/categories-delete/{slug}', [CategoriesController::class , 'delete']);
    Route::get('/categories-destroy/{slug}', [CategoriesController::class, 'destroy']);
    Route::get('/categories-deleted',[CategoriesController::class, 'deletedCategory']);
    Route::get('/categories-restore/{slug}', [CategoriesController::class, 'restrore']);

    Route::get('/users', [UserController::class, 'index']); //untuk user active
    Route::get('/registered-users', [userController::class, 'regiteredUsers']);//untuk user yang tidak active

    Route::get('/rent-logs', [RentLogController::class, 'index']);
});

