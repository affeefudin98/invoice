<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductApi extends Controller
{
    public function getData() 
    {
        $products = Product::all();
        return response()->json($products);
    }
}
