<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/about', [AboutController::class, 'index'])->name('about');

// Route yang hanya bisa diakses admin (Gate: manage-product)
Route::middleware(['auth', 'can:manage-product'])->group(function () {
    Route::resource('products', \App\Http\Controllers\ProductController::class);
    Route::resource('categories', \App\Http\Controllers\CategoryController::class);
});

// Route khusus export yang dilindungi Gate: export-product
Route::middleware(['auth', 'can:export-product'])->group(function () {
    Route::get('products/data/export', [\App\Http\Controllers\ProductController::class, 'export'])->name('products.export');
});

require __DIR__.'/auth.php';

