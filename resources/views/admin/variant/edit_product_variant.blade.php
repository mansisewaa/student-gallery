@extends('layouts.admin.master')

@section('content')
<div class="row mb-3">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 m-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Product Variant</li>
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

                    <h4 class="card-title mb-0">Product Variants</h4>
                    <a href="{{ route('admin.variant') }}" class="btn btn-sm btn-primary">
                        Back
                    </a>
                </div>

                <form class="forms-sample" action="{{route('admin.update_product_variant',$product_variant->id)}}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="gender">Products</label>
                        <select class="form-select" id="product" name="product_id">
                            <option value="">Select Product</option>
                            @foreach($products as $product)
                            <option value="{{ $product->id }}" {{ $product_variant->product_id == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="gender">Variant</label>
                        <select class="form-select" id="variant" name="variant_option_id">
                            <option value="">Select Variant</option>
                            @forelse($variant_options as $variant)
                            <option value="{{ $variant->id }}" {{ $product_variant->variant_option_id == $variant->id ? 'selected' : '' }}>{{ $variant->label }}- {{ $variant->type }}</option>
                            @empty
                            <option value="">No variants found. Add New</option>
                            @endforelse
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
