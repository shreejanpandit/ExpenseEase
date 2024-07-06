<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [TransactionController::class,'index'])->name('transaction.index');
Route::get('/transactions/create', [TransactionController::class,'create'])->name('transaction.create');
Route::post('/transactions', [TransactionController::class,'store'])->name('transaction.store');
