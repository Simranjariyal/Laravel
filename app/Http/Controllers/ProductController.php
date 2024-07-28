<?php

// app/Http/Controllers/ProductController.php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Display a listing of the products
    public function index()
    {
        $products = Product::paginate(10);
        return view('products.index', compact('products'));
    }

    // Show the form for creating a new product
    public function create()
    {
        return view('products.create');
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

        return redirect()->route('products.index')->with('message', 'Product successfully added.');
    }

    // Display the specified product
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // Show the form for editing the specified product
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Update the specified product in storage
    public function update(Request $request, Product $product)
    {
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

        return redirect()->route('products.index')->with('message', 'Product successfully updated.');
    }

    // Remove the specified product from storage
    public function destroy(Product $product)
    {
        // Delete the product image from storage if exists
        if ($product->product_image) {
            Storage::delete($product->product_image);
        }

        $product->delete();

        return redirect()->route('products.index')->with('message', 'Product successfully deleted.');
    }
}
