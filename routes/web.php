<?php

use App\Http\Controllers\CustomerController;
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

Route::get('/', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/store', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/{customer}', [CustomerController::class, 'show'])->name('customers.show');
Route::get('/edit/{customer}', [CustomerController::class, 'edit'])->name('customers.edit');
Route::put('/update/{customer}', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');
