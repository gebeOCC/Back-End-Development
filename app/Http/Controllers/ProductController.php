<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    public function create() {
        return view('products.create');
    }
    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,9999',
            'description' => 'nullable'
        ]);
        $newProduct = Product::create($data);

        return redirect(route('product.index'));
    }

    public function edit(Product $product) {
        $products = Product::all();
        return view('products.edit', ['product' => $product],  ['products' => $products]);
    }

    public function update(Product $product, Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,9999',
            'description' => 'nullable'
        ]);
        
        $product->update($data);
        return redirect(route('product.index'))->with('success', 'Product Updated successfully');
    }

    public function delete(Product $product){
        $product->delete();
        return redirect(route('product.index'))->with('success', 'Product Deleted successfully');
    }
}