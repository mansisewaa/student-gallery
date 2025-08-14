@extends('layouts.admin.master')

@section('content')
<div class="row mb-3">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 m-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('admin.product') }}">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="card-title mb-0">Create</h4>
                    <a href="{{ route('admin.variant') }}" class="btn btn-sm btn-primary">
                      Back
                    </a>
                </div>
                <form class="forms-sample" action="{{ route('admin.variant.store') }}" method="POST">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="name">Label</label>
                        <input type="text" class="form-control" id="name" name="label" placeholder="Label" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Type</label>
                        <input type="text" class="form-control" id="name" name="type" placeholder="Type" required>
                    </div>

                    <!-- <div class="form-group mb-3">
                        <label for="category_id">Category</label>
                        <select class="form-select" id="category_id" name="category_id" required>
                            <option value="">-- Select Category --</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div> -->

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="card-title mb-0">Variant List</h4>
                </div>


                <div class="table-responsive">
                    <table class="table table-bordered table-sm text-nowrap align-middle">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 40px;">#</th>
                                <th style="width: 180px;">Label</th>
                                <th style="width: 300px;">Type</th>
                                <th style="width: 100px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($variants as $index => $variant)
                                <tr>
                                    <td>{{ $index + $variants->firstItem() }}</td>
                                    <td>{{ $variant->label }}</td>
                                    <td>{{ $variant->type }}</td>
                                    <td>
                                        <a href="{{ route('admin.variant.edit', $variant->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="{{ route('admin.variant.delete', $variant->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this variant?');">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">No variants found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- Pagination --}}
                    <div class="mt-3">
                        {{ $variants->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
