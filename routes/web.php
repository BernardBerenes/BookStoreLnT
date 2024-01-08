<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/book', [BookController::class, 'books_page'])->name('books_page');
Route::get('/book/add', [BookController::class, 'add_books_page'])->name('add_books_page');
Route::post('/book/add', [BookController::class, 'add_books'])->name('add_books');
