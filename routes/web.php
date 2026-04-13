<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Product_controller;
use App\Http\Controllers\Stock_controller;
use App\Http\Controllers\Supplier_controller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/products', [Product_controller::class, 'index'])->name('products.index');
    Route::get('/products/create', [Product_controller::class, 'create'])->name('products.create');
    Route::post('/products', [Product_controller::class, 'store'])->name('products.store');
    Route::get('/stocks', [Stock_controller::class, 'index'])->name('stocks.index');
    Route::get('/suppliers', [Supplier_controller::class, 'index'])->name('suppliers.index');
});

require __DIR__ . '/auth.php';
