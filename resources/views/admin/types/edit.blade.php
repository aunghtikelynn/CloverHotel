@extends('layouts.admin')
@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Types</h1>
        
    </div>
    <a href="{{route('backend.types.index')}}" class="btn btn-danger float-end p-2">Cancel</a>
    <ol class="breadcrumb mb-4 py-2">
        <li class="breadcrumb-item"><a href="{{route('backend.dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('backend.types.index')}}">Types</a></li>
        <li class="breadcrumb-item active">Edit Type</li>
    </ol>
    <div class="card mb-4 m-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Edit Type
        </div>
        <div class="card-body">
            <form action="{{route('backend.types.update',$type->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{$type->name}}" id="name" name="name">
                    @error('name')
                        <div class="invalid-feedback">{{ $message}} </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="service" class="form-label fw-bold">Service</label>
                    <input type="text" class="form-control @error('service') is-invalid @enderror" value="{{$type->service}}" id="service" name="service">
                    @error('service')
                        <div class="invalid-feedback">{{ $message}} </div>
                    @enderror
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>

@endsection