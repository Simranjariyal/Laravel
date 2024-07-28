
{{-- resources/views/products/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Product</h2>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="productName">Product Name</label>
            <input type="text" name="product_name" class="form-control" id="productName" value="{{ $product->product_name }}" required>
        </div>

        <div class="form-group">
            <label for="productPrice">Product Price</label>
            <input type="number" name="product_price" class="form-control" id="productPrice" value="{{ $product->product_price }}" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="productDescription">Product Description</label>
            <textarea name="product_description" class="form-control" id="productDescription" rows="4" required>{{ $product->product_description }}</textarea>
        </div>

        <div class="form-group">
            <label for="productImage">Product Image</label>
            <input type="file" name="product_image" class="form-control-file" id="productImage">
            @if($product->product_image)
                <img src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->product_name }}" width="100">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>
@endsection
