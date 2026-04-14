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
    Route::get('/suppliers/create', [Supplier_controller::class, 'create'])->name('suppliers.create');
    Route::post('/suppliers', [Supplier_controller::class, 'store'])->name('suppliers.store');
    Route::get('/suppliers/{supplier}/edit', [Supplier_controller::class, 'edit'])->name('suppliers.edit');
    Route::put('/suppliers/{supplier}', [Supplier_controller::class, 'update'])->name('suppliers.update');
    Route::delete('/suppliers/{supplier}', [Supplier_controller::class, 'destroy'])->name('suppliers.destroy');
});

require __DIR__ . '/auth.php';
