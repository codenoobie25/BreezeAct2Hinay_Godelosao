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

    public function create()
    {
        return view('ADDproduct_view');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'string', 'max:255'],
        ]);

        Product::create([
            'product_name' => $validated['product_name'],
            'price' => $validated['price'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('products.index');
    }
}
