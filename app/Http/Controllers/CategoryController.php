<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function get(){
        $categories = Category::all();
        return view('product.create', ['categories'=>$categories]);
    }
}
