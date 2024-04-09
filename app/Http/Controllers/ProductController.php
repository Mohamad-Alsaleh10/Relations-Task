<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::all();
        return response()->json(
            [
                'status' => 'success',
                'data' => $products
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $product,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return  response()->json(
            [
                'status'=>'success',
                'data'=>$product,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductRequest $request, Product $product)
    {
        $product = Product::update([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $product,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
         return response()->json(
            [
                'status'=>'success'
            ]
         );
    }
}
