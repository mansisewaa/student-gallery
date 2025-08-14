@extends('layouts.admin.master')

@section('content')
<div class="row mb-3">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 m-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Product Variant</li>
                <li class="breadcrumb-item active" aria-current="page">Manage</li>
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
                    <a href="{{ route('admin.variant.create') }}" class="btn btn-sm btn-primary">
                        + Add New Variant
                    </a>
                </div>

                <form class="forms-sample" action="{{ route('admin.product-variant.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="gender">Products</label>
                        <select class="form-select" id="product" name="product_id">
                            <option value="">Select Product</option>
                            @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="gender">Variant</label>
                        <select class="form-select" id="variant" name="variant_option_id">
                            <option value="">Select Variant</option>
                            @forelse($variant_options as $variant)
                            <option value="{{ $variant->id }}">{{ $variant->label }}- {{ $variant->type }}</option>
                            @empty
                            <option value="">No variants found. Add New</option>
                            @endforelse
                        </select>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>



<div class="row">
    <div class="col-lg-8 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">

                    <h4 class="card-title mb-0">List</h4>

                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm text-nowrap align-middle">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 40px;">#</th>
                                <th style="width: 180px;">Product</th>
                                <th style="width: 300px;">Variant</th>
                                <th style="width: 100px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($product_variants as $index => $variant)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{$variant->product->name}}</td>
                                <td>{{$variant->VariantOption->label}}</td>

                                <td>
                                    <a href="{{route('admin.product-variant.edit',$variant->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="{{route('admin.product-variant.destroy', $variant->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');">Delete</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted">No products found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $product_variants->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
