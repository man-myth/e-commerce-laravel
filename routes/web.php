<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;

Route::get('/', [ProductController::class, 'getAll'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard' );
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')-> group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/product/create', [CategoryController::class, 'get'])->can('create', Product::class)->name('product.create');
    Route::post('/product/create', [ProductController::class, 'store'])->can('create', Product::class)->name('product.store');
});


Route::get('/product/{id}', [ProductController::class, 'get'])->name('product.details');

require __DIR__.'/auth.php';
