{{-- resources/views/products/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Product Details</h2>

    <div class="card">
        <div class="card-header">
            {{ $product->product_name }}
        </div>
        <div class="card-body">
            <p><strong>Price:</strong> ${{ $product->product_price }}</p>
            <p><strong>Description:</strong> {{ $product->product_description }}</p>
            @if($product->product_image)
                <p><strong>Image:</strong></p>
                <img src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->product_name }}" class="img-fluid">
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
