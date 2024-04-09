<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBrandRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands= Brand::all();
        return response()->json(
            [
                'status' => 'success',
                'data' => $brands,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {

        $brand = Brand::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $brand,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return response()->json(
            [
                'status'=>'success',
                'brand'=>$brand
            ]
            );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $brand->update(
            [
                'name' => $request->name,
            ]
        );

        return response()->json(
            [
                'status'=>'success',
                'brand' => $brand
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return response()->json(
         [
            'status'=>'success'
         ]
        );
    }
}
