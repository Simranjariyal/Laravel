<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product; // Make sure to import the Product model if you're saving to the database

class Admin extends Component
{
    use WithFileUploads;

    public $productImage;
    public $productName;
    public $productPrice;
    public $productDescription;

    public function saveProduct()
    {
        $this->validate([
            'productImage' => 'image|max:1024', // 1MB Max
            'productName' => 'required|string|max:255',
            'productPrice' => 'required|numeric',
            'productDescription' => 'required|string',
        ]);
    
        // Create a new Product instance
        $product = new Product();
        $product->product_name = $this->productName;
        $product->product_price = $this->productPrice;
        $product->product_description = $this->productDescription;
    
        // Handle file upload
        if ($this->productImage) {
            $product->product_image = $this->productImage->store('images', 'public');
        }
    
        // Save the product to the database
        $product->save();
    
        // Flash message to session
        session()->flash('message', 'Product successfully added.');
    }
    
    public function render()
    {
        return view('livewire.admin');
    }
}
