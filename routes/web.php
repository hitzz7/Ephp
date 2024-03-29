<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
// routes/web.php

use App\Http\Controllers\ColorController;
use App\Http\Controllers\SizeController;

// Color resource routes

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

Route::get('/', function () {
    return view('welcome');
});



// Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// // Show a specific product
// Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// // Create a new product (show form)
// Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

// // Store a new product (process form submission)
// Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// // Edit an existing product (show form)
// Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');

// // Update an existing product (process form submission)
// Route::patch('/products/{product}', [ProductController::class, 'update'])->name('products.update');

// // Delete an existing product
// Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('colors', ColorController::class);
    Route::resource('sizes', SizeController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    
});

require __DIR__.'/auth.php';
