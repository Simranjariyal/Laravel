@extends('layouts.app')

@section('content')
<div class="container admin-container mt-4">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="card border-primary">
        <div class="card-header bg-primary text-white">
            <h2 class="card-title mb-0">Add Product</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="productName">Product Name</label>
                    <input type="text" name="product_name" class="form-control" id="productName" placeholder="Enter product name" required>
                    @error('product_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="productPrice">Product Price</label>
                    <input type="number" name="product_price" class="form-control" id="productPrice" placeholder="Enter product price" step="0.01" required>
                    @error('product_price') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="productDescription">Product Description</label>
                    <textarea name="product_description" class="form-control" id="productDescription" rows="4" placeholder="Enter product description" required></textarea>
                    @error('product_description') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="productImage">Product Image</label>
                    <div class="custom-file">
                        <input type="file" name="product_image" class="custom-file-input" id="productImage" required>
                        <label class="custom-file-label" for="productImage">Choose file</label>
                    </div>
                    @error('product_image') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="btn btn-primary btn-block">Save Product</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.custom-file-input').forEach(input => {
                input.addEventListener('change', function (event) {
                    let fileName = event.target.value.split('\\').pop();
                    event.target.nextElementSibling.innerHTML = fileName;
                });
            });
        });
    </script>

    <style>
        .admin-container {
            max-width: 600px;
        }
        .card-header {
            background: linear-gradient(to right, #0062E6, #33AEFF);
        }
        .btn-primary {
            background-color: #0062E6;
            border-color: #0062E6;
        }
        .btn-primary:hover {
            background-color: #0056cc;
            border-color: #0056cc;
        }
        .custom-file-label::after {
            content: "Browse";
        }
    </style>
</div>
@endsection
