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

Route::get('/', [BookController::class, 'index'])->name('book.index');
Route::get('/books', [BookController::class, 'viewBooks'])->name('books.view');
Route::get('/books/create', [BookController::class, 'create'])->name('book.create');
Route::post('/books', [BookController::class, 'store'])->name('book.store');
Route::get('/books/{book}/view', [BookController::class, 'viewBook'])->name('book.view');
Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('book.edit');
Route::put('/books/{book}/update', [BookController::class, 'update'])->name('book.update');
Route::delete('/books/{book}/destroy', [BookController::class, 'destroy'])->name('book.destroy');
