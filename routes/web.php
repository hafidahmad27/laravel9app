<?php

use App\Http\Controllers\SalesController;
use App\Models\Sales;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [SalesController::class, 'index'])->name('sales.index');
Route::get('create', [SalesController::class, 'create'])->name('sales.create');
Route::post('sales', [SalesController::class, 'store'])->name('sales.store');
Route::get('edit/{id}', [SalesController::class, 'edit'])->name('sales.edit');
Route::post('update/{sales}', [SalesController::class, 'update'])->name('sales.update');
Route::get('destroy/{id}', [SalesController::class, 'destroy'])->name('sales.destroy');
