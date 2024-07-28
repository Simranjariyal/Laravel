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
            <form wire:submit.prevent="saveProduct">
                <div class="form-group">
                    <label for="productImage">Product Image</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="productImage" wire:model="productImage">
                        <label class="custom-file-label" for="productImage">{{ $productImage ? $productImage->getClientOriginalName() : 'Choose file' }}</label>
                    </div>
                    @error('productImage') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="productName">Product Name</label>
                    <input type="text" class="form-control" id="productName" placeholder="Enter product name" wire:model="productName">
                    @error('productName') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="productPrice">Price</label>
                    <input type="number" class="form-control" id="productPrice" placeholder="Enter product price" wire:model="productPrice">
                    @error('productPrice') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="productDescription">Description</label>
                    <textarea class="form-control" id="productDescription" rows="4" placeholder="Enter product description" wire:model="productDescription"></textarea>
                    @error('productDescription') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block">Add Product</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:load', function () {
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
