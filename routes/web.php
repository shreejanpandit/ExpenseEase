<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(TransactionController::class)->group(function () {

    Route::get('/', 'index')->name('transaction.index');
    Route::get('/transactions/create', 'create')->name('transaction.create');
    Route::post('/transactions', 'store')->name('transaction.store');
    Route::get('/transactions/{transaction}/edit', 'edit')->name('transaction.edit');
    Route::put('/transactions/{transaction}', 'update')->name('transaction.update');
    Route::delete('/transactions/{transaction}', 'destroy')->name('transaction.delete');
});

Route::get('/login',[AuthController::class, 'login']);