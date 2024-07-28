<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class ProductApiController extends Controller
{
    // Display a listing of the products
    public function index()
    {
        $products = Product::paginate(10);
        return response()->json($products);
    }

    // Store a newly created product in storage
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_price' => 'required|numeric',
            'product_description' => 'required|string',
            'product_image' => 'nullable|image|max:1024', // 1MB Max
        ]);

        $product = new Product();
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_description = $request->product_description;

        if ($request->hasFile('product_image')) {
            $product->product_image = $request->file('product_image')->store('product_images');
        }

        $product->save();

        return response()->json($product, Response::HTTP_CREATED);
    }

    // Display the specified product
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    // Update the specified product in storage
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_price' => 'required|numeric',
            'product_description' => 'required|string',
            'product_image' => 'nullable|image|max:1024', // 1MB Max
        ]);

        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_description = $request->product_description;

        if ($request->hasFile('product_image')) {
            // Delete old image if exists
            if ($product->product_image) {
                Storage::delete($product->product_image);
            }
            $product->product_image = $request->file('product_image')->store('product_images');
        }

        $product->save();

        return response()->json($product);
    }

    // Remove the specified product from storage
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Delete the product image from storage if exists
        if ($product->product_image) {
            Storage::delete($product->product_image);
        }

        $product->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
