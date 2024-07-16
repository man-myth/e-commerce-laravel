<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')-> group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::view('/product/store', 'product.create')->can('create', Product::class)->name('product.index');
    Route::post('/product/store', [ProductController::class, 'store'])->can('create', Product::class)->name('product.store');
    Route::delete('/product/{id}/delete', [ProductController::class, 'delete'])->can('create', Product::class)->name('product.delete');

    Route::get('/product/{id}/edit', function(string $id){
        $product = Product::where('id', $id)->first();
        $product->images = ProductImage::where('product_id', $id)->get();
        return view('product.edit', ['product' =>$product]);
    })->can('create', Product::class)->name('product.edit.index');

    Route::post('/product/{id}/edit', [ProductController::class, 'edit'])->can('create', Product::class)->name('product.edit');

});

Route::get('/products', [ProductController::class, 'getAll'])->name('home');
Route::get('/product/{id}', [ProductController::class, 'get'])->name('product.details');

Route::get('/products/category/{id}', [ProductController::class, 'getWithCategory'])->name('product.category');

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/dashboard', function () {
    return view('dashboard' );
})->middleware(['auth', 'verified'])->name('dashboard');


Route::redirect('/', '/products');
Route::redirect('/dashboard', '/products');
require __DIR__.'/auth.php';
