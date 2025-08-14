@extends('layouts.admin.master')

@section('content')
   <div class="row mb-3">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 m-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Institutes</li>
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
                    <h4 class="card-title mb-0">Institutes</h4>
                    <a href="{{ route('admin.institute.create') }}" class="btn btn-sm btn-primary">
                        + Add New
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm text-nowrap align-middle">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 40px;">#</th>
                                <th style="width: 150px;">Name</th>
                                <th style="width: 250px;">Address</th>
                                <th style="width: 120px;">Phone</th>
                                <th style="width: 80px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($institutes as $institute)
                                <tr>
                                    <td>{{ $institute->id }}</td>
                                    <td>{{ $institute->name }}</td>
                                    <td>{{ $institute->address }}</td>
                                    <td>{{ $institute->phone }}</td>
                                    <td>
                                        <a href="{{ route('admin.institute.edit', $institute->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="{{ route('admin.institute.delete', $institute->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure ?');">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">No institutes found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $institutes->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
