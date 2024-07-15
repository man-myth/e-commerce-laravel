<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Types\Relations\Role;
use PHPUnit\Framework\Attributes\Group;

Route::get('/products', [ProductController::class, 'getAll'])->name('home');

Route::get('/products/category/{id}', [ProductController::class, 'getWithCategory'])->name('product.category');

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/dashboard', function () {
    return view('dashboard' );
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')-> group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/product/create', [CategoryController::class, 'index'])->can('create', Product::class)->name('product.index');
    Route::post('/product/create', [ProductController::class, 'add'])->can('create', Product::class)->name('product.add');
});


Route::get('/product/{id}', [ProductController::class, 'get'])->name('product.details');

require __DIR__.'/auth.php';
