<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class Product_controller extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('Product_view', compact('products'));
    }

    public function create(Request $request)
    {
        Product::create([
            'product_name' => $request->productname,
            'price' => $request->productprice,
            'status' => $request->status
        ]);
        return redirect('/products');
    }
}
