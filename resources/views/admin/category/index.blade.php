@extends('layouts.admin.master')

@section('content')
   <div class="row mb-3">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 m-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Category</li>
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
                    <h4 class="card-title mb-0">Category</h4>
                    <a href="{{ route('admin.category.create') }}" class="btn btn-sm btn-primary">
                        + Add New
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm text-nowrap align-middle">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 40px;">#</th>
                                <th style="width: 150px;">Name</th>
                                <th style="width: 80px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categorys as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="{{ route('admin.category.delete', $category->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure ?');">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">No Category found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $categorys->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
