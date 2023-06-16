<?php

 namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index')->with('products', $products);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Product::create($input);
        return redirect('product')->with('flash_message', 'Product Added!');
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show')->with('product', $product);
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit')->with('product', $product);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $input = $request->all();
        $product->update($input);
        return redirect('product')->with('flash_message', 'Product Updated!');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('product')->with('flash_message', 'Product deleted!');
    }
}
