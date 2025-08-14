@extends('layouts.admin.master')

@section('content')
<div class="row mb-3">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 m-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('admin.product') }}">Variant</a></li>
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
                    <a href="{{ route('admin.variant') }}" class="btn btn-sm btn-primary">
                        Back
                    </a>
                </div>
                 <form class="forms-sample" action="{{ route('admin.variant.update',$variant->id) }}" method="POST">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="name">Label</label>
                        <input type="text" class="form-control" id="name" name="label" placeholder="Label" value="{{$variant->label}}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Type</label>
                        <input type="text" class="form-control" id="name" name="type" placeholder="Type" value="{{$variant->type}}">
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
