@extends('layouts.admin.master')

@section('content')
<div class="row mb-3">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 m-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('admin.product') }}">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="card-title mb-0">Edit</h4>
                    <a href="{{ route('admin.product') }}" class="btn btn-sm btn-primary">
                        Back
                    </a>
                </div>
                <form class="forms-sample" action="{{ route('admin.product.update', $product->id) }}" method="POST">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" placeholder="Product name" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Product description">{{ old('description', $product->description) }}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="gender">Gender</label>
                        <select class="form-select" id="gender" name="gender">
                            <option value="UNISEX" {{ $product->gender == 'UNISEX' ? 'selected' : '' }}>Unisex</option>
                            <option value="BOYS" {{ $product->gender == 'BOYS' ? 'selected' : '' }}>Boys</option>
                            <option value="GIRLS" {{ $product->gender == 'GIRLS' ? 'selected' : '' }}>Girls</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="sku">SKU</label>
                        <input type="text" class="form-control" id="sku" name="sku" value="{{ old('sku', $product->sku) }}" placeholder="SKU (e.g. SHIRT-1001)" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="price">Price (₹)</label>
                        <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{ old('price', $product->price) }}" placeholder="Price" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="category_id">Category</label>
                        <select class="form-select" id="category_id" name="category_id" required>
                            <option value="">-- Select Category --</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>
@endsection
