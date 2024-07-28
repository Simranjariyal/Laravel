@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
<div class="container mt-4">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header bg-primary text-white">
            <h2 class="card-title mb-0">Edit Product</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="productName">Product Name</label>
                    <input type="text" name="product_name" class="form-control" id="productName" value="{{ old('product_name', $product->product_name) }}" required>
                    @error('product_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="productPrice">Product Price</label>
                    <input type="number" name="product_price" class="form-control" id="productPrice" value="{{ old('product_price', $product->product_price) }}" step="0.01" required>
                    @error('product_price') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="productDescription">Product Description</label>
                    <textarea name="product_description" class="form-control" id="productDescription" rows="4" required>{{ old('product_description', $product->product_description) }}</textarea>
                    @error('product_description') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="productImage">Product Image</label>
                    <input type="file" name="product_image" class="form-control-file" id="productImage">
                    @if ($product->product_image)
                        <img src="{{ asset('storage/product_images/' . $product->product_image) }}" alt="{{ $product->product_name }}" style="width: 150px; margin-top: 10px;">
                    @endif
                    @error('product_image') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update Product</button>
            </form>
        </div>
    </div>
</div>
@endsection
