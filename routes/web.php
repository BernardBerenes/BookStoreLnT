<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Models\Book;
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
Route::get('/book/edit/{id}', [BookController::class, 'edit_books_page'])->name('edit_books_page');
Route::patch('/book/update/{id}', [BookController::class, 'update_books'])->name('update_books');
Route::delete('/book/delete/{id}', [BookController::class, 'delete_books'])->name('delete_books');

Route::get('/book/add-author/{id}', [BookController::class, 'add_author_page'])->name('add_author_page');
Route::post('/book/add-author/{id}', [BookController::class, 'add_author'])->name('add_author');

Route::get('/category', [CategoryController::class, 'category_page'])->name('category_page');
Route::get('/category/add', [CategoryController::class, 'add_category_page'])->name('add_category_page');
Route::post('/category/add', [CategoryController::class, 'add_category'])->name('add_category');
Route::delete('/category/delete/{id}', [CategoryController::class, 'delete_category'])->name('delete_category');
