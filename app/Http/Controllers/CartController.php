<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    public function index()
    {
        $user = auth()->id() ?? "guest";
        $cartItems = json_decode(Cookie::get($user. '-cart'), true) ?? [];
        return view('cart', compact('cartItems'));
    }

    public function add(Request $request)
    {
        $product = Product::find($request->id);
        $user = auth()->id() ?? "guest";
        
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $cart = json_decode(Cookie::get($user. '-cart'), true) ?? [];
        $cart[$product->id] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'image' => $product->images()->first()->url,
        ];

        Cookie::queue($user. '-cart', json_encode($cart), 60 * 24 * 30); // Store for 30 days

        return redirect()->route('cart')->with('success', 'Product added to cart.');
    }

    public function remove(Request $request)
    {
        $user = auth()->id() ?? "guest";
        $cart = json_decode(Cookie::get($user. '-cart'), true) ?? [];
        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
            Cookie::queue('cart', json_encode($cart), 60 * 24 * 30); // Store for 30 days
        }

        return redirect()->route('cart')->with('success', 'Product removed from cart.');
    }
}
