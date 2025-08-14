@extends('layouts.admin.master')

@section('content')
<div class="row mb-3">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 m-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('admin.institute') }}">Institutes</a></li>
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
                    <a href="{{ route('admin.institute') }}" class="btn btn-sm btn-primary">
                        Back
                    </a>
                </div>
                <form class="forms-sample" action="{{route('admin.institute.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Name</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Address" name="address">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Phone</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Phone" name="phone">
                    </div>
                    <div class="offset-5">
                        <button type="submit" class="btn btn-primary btn-sm me-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
