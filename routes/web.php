<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Route;
Route::get('/', [HomeController::class, 'home']);
Route::resource('books', BookController::class);
Route::get('/books/{id}/checkout', [BookController::class, 'checkout'])->name('books.checkout');
Route::post('/books/{id}/process-payment', [BookController::class, 'processPayment'])->name('books.processPayment');

Route::get('/register', [AuthController::class, 'formRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'formLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route ::get('/home', [HomeController::class, 'home'])->name('home');


Route::middleware([CheckAdmin::class.':admin'])->group(function (){
   
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
    Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
    
});

Route::middleware([CheckAdmin::class.':client'])->group(function(){
   
   Route::get('/books/{book}/checkout', [BookController::class, 'checkout'])->name('books.checkout');
   Route::post('/books/{book}/process-payment', [BookController::class, 'processPayment'])->name('books.processPayment');
   
});

