<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getAll()
    {
        $products = Product::all();
        return view('home', ['products' => $products]);
    }

    public function get(string $id)
    {
        $product = Product::find($id);
        return view('product-details', ['product' => $product] );  
    }

    public function store(Request $request):RedirectResponse
    {   
    
       $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'tags' => 'nullable|string',
            'price' => 'required|decimal:0,3|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'images.*' => 'required|image',
       ]);
       //convert tags
       $tagsArray = explode("," , $validated['tags']);
       $trimmedTagsArray = array_map('trim', $tagsArray);
       $validated['tags'] = $trimmedTagsArray;
       //create new product
       $product = Product::create($validated);
       //save image
       if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $imageName =  $product->id . '-' .time() . '-' .$image->getClientOriginalName();
            $image->move(public_path('images\products'), $imageName);
           
            $product->images()->create([
                'url'=> $imageName
            ]);
        }
    }
       return redirect()->route('product.details', ['id' => $product->id])->with('success', 'Product created successfully!');
    }
}
