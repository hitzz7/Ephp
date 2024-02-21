<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
// use App\Http\Controllers\CategoryController;
// use App\Http\Controllers\ProductController;
// use App\Http\Controllers\ImageController;
// use App\Http\Controllers\SizeController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// Route::resource('category', CategoryController::class);
// Route::resource('product', ProductController::class);
// Route::resource('image', ImageController::class);
// Route::resource('size', SizeController::class);
// Route::get('/categoryes', [CategoryController::class, 'index'])->name('categories.index');
// Route::get('/categoryes/create', [CategoryController::class, 'create'])->name('categories.create');
// Route::post('/categoryes', [CategoryController::class, 'store'])->name('categories.store');
// Route::get('/categoryes/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
// Route::patch('/categoryes/{category}', [CategoryController::class, 'update'])->name('categories.update');
// Route::delete('/categoryes/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::get('/products/{id}/items', [ProductController::class, 'getProductItems']);
Route::get('/products/by-sku', [ProductController::class, 'getProductBySKU']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
