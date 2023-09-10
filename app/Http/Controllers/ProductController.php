<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use Illuminate\Database\Console\Migrations\StatusCommand;

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

    // Update Product
    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|between:0,9999999.99'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }
        else{
            $product = Product::find($id);

            if($product) {
                $product->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'price' => $request->price
                ]);

                return response()->json([
                    'status' => 201,
                    'message' => 'Product has been updated successfully'
                ], 201);
            }
            else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Product not found'
                ], 404);
            }
           
        }
    }

    // Delete Product
    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                'status' => 404,
                'message' => 'Product not found'
            ], 404);
        }
        else {
            $product->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Product deleted'
            ], 200);
        }
    }
}
