@extends('layouts.admin.master')

@section('content')
<div class="row mb-3">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 m-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Products</li>
                <li class="breadcrumb-item active" aria-current="page">Manage</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="card-title mb-0">Products</h4>
                    <a href="{{ route('admin.product.create') }}" class="btn btn-sm btn-primary">
                        + Add New
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm text-nowrap align-middle">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 40px;">#</th>
                                <th style="width: 180px;">Name</th>
                                <th style="width: 300px;">Description</th>
                                <th style="width: 80px;">Gender</th>
                                <th style="width: 100px;">SKU</th>
                                <th style="width: 80px;">Price</th>
                                <th style="width: 150px;">Category</th>
                                <th style="width: 80px;">Status</th>
                                <th style="width: 100px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $index => $product)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ Str::limit($product->description, 50) }}</td>
                                <td>{{ ucfirst($product->gender) }}</td>
                                <td>{{ $product->sku }}</td>
                                <td>₹{{ number_format($product->price, 2) }}</td>
                                <td>{{ $product->category->name ?? 'N/A' }}</td>
                                <td>
                                    @if ($product->is_active)
                                    <span class="badge bg-success">Active</span>
                                    @else
                                    <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="{{ route('admin.product.delete', $product->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');">Delete</a>
                                    <a href="{{ route('admin.product.changeStatus', $product->id) }}" class="btn btn-sm btn-success" onclick="return confirm('Are you sure?');">Update Status</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted">No products found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $products->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
