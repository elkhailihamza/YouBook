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

// Auth
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index')->name('auth.login');
    Route::post('/login/verify', 'authenticate')->name('auth.login.verify');
    Route::get('/register', 'register')->name('auth.register');
    Route::post('/register/store', 'store')->name('auth.register.store');
});

Route::controller(BookController::class)->group(function () {
    //view main page
    Route::get('/', 'index')->name('book.index');
    Route::get('/home', 'index')->name('book.index');

    // view a book
    Route::get('/books', 'bookList')->name('book.viewList');
    Route::get('/books/{book}/view', 'bookDetails')->name('book.viewBook');
});

Route::middleware('auth')->group(function() {
    // logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    // reserve a book
    Route::get('/book/reservation', [ReservationController::class, 'index'])->name('book.reservation');

    Route::middleware(['admin'])->group(function () {
        Route::controller(BookController::class)->group(function () {
            // create a book
            Route::get('/books/create', 'create')->name('book.create');
            Route::post('/books', 'store')->name('book.store');

            // update a book
            Route::get('/books/{book}/edit', 'edit')->name('book.edit');
            Route::put('/books/{book}/update', 'update')->name('book.update');

            // delete a book
            Route::delete('/books/{book}/destroy', 'destroy')->name('book.destroy');
        });
    });
});