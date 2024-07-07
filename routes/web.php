<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

// Route::get('/', function () {
//     return view('welcome');
// });




Route::middleware('auth')->group(function () {
    Route::controller(TransactionController::class)->group(function () {
        Route::get('/', 'index')->name('transaction.index');
        Route::get('/transactions/create', 'create')->name('transaction.create');
        Route::post('/transactions', 'store')->name('transaction.store');
        Route::get('/transactions/{transaction}/edit', 'edit')->name('transaction.edit');
        Route::put('/transactions/{transaction}', 'update')->name('transaction.update');
        Route::delete('/transactions/{transaction}', 'destroy')->name('transaction.delete');
    });
});

Route::get('/login',[AuthController::class, 'login'])->name('login');
Route::post('/login',[AuthController::class, 'loginPost'])->name('auth.login.post');

Route::get('/register',[AuthController::class, 'register'])->name('auth.register');
Route::post('/register',[AuthController::class, 'registerPost'])->name('auth.register.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');