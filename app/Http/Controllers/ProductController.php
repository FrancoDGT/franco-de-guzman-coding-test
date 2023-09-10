<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;


class ProductController extends Controller
{
    // Products List
    public function index()
    {
        $products = Product::all();
        
        if ($products->isEmpty()) {
            return response()->json([
                'status' => '404',
                'message' => 'There is no item/s in the list yet'
            ], 404);
        } else {
            return response()->json($products, 200);
        }
    }

    // Product Detail
    public function show($id)
    {
        $product = Product::find($id);
        if ($product) {
            return response()->json($product, 200);
        }
        else{
            return response()->json([
                'status' => '404',
                'message' => 'Product not found'], 
                404);
        }
    }

    // Create Product
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|between:0,9999999.99'
        ]);

        if ($validator->fails()){
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }
        else{
            $product = Product::create($request->all());
            return response()->json($product, 201);
        }
    }

    // Edit Product
    public function edit($id)
    {
        $product = Product::find($id);
        if ($product) {
            return response()->json($product, 200);
        }
        else{
            return response()->json([
                'status' => '404',
                'message' => 'Product not found'], 
                404);
        }
    }

    // Update Product
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->save();
        return response()->json($product);
    }

    // Delete Product
    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        $product->delete();
        return response()->json(['message' => 'Product deleted'], 200);
    }
}
