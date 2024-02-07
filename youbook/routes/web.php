<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReservationController;
use App\Models\Reservation;
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

// view home page
Route::get('/', [BookController::class, 'index'])->name('book.index');

// view a book
Route::get('/books', [BookController::class, 'bookList'])->name('book.viewList');
Route::get('/books/{book}/view', [BookController::class, 'bookDetails'])->name('book.viewBook');

// create a book
Route::get('/books/create', [BookController::class, 'create'])->name('book.create');
Route::post('/books', [BookController::class, 'store'])->name('book.store');

// update a book
Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('book.edit');
Route::put('/books/{book}/update', [BookController::class, 'update'])->name('book.update');

// delete a book
Route::delete('/books/{book}/destroy', [BookController::class, 'destroy'])->name('book.destroy');

// reserve a book
Route::get('/book/reservation', [ReservationController::class, 'index'])->name('book.reservation');

// auth
Route::get('/login', [AuthController::class, 'index'])->name('auth.login');
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');