<?php

use App\Http\Controllers\ProfileController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $products = Product::all();

    foreach ($products as $product) {
        $product->image = Product::find($product->id)->images()->first()->url;

    };

    return view('home', ['products' => $products] );  
})->name('home');


Route::get('/product/{id}', function ($id) {
    $product = Product::find($id);

    return view('product-details', ['product' => $product] );  
})->name('product.details');

Route::get('/dashboard', function () {
    return view('dashboard' );
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
