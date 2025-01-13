@extends('layouts.admin')
@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Payments</h1>
        
    </div>
    <a href="{{route('backend.payments.index')}}" class="btn btn-danger float-end p-2">Cancel</a>
    <ol class="breadcrumb mb-4 py-2">
        <li class="breadcrumb-item"><a href="{{route('backend.dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('backend.payments.index')}}">Payments</a></li>
        <li class="breadcrumb-item active">Create Payment</li>
    </ol>
    <div class="card mb-4 m-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Create Payment
        </div>
        <div class="card-body">
            <form action="{{route('backend.payments.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" id="name" name="name">
                    @error('name')
                        <div class="invalid-feedback">{{ $message}} </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="logo" class="form-label fw-bold">Logo</label>
                    <input type="file" accept="image/*" class="form-control @error('logo') is-invalid @enderror" value="{{old('logo')}}" id="logo" name="logo">
                    @error('logo')
                        <div class="invalid-feedback">{{ $message}} </div>
                    @enderror
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">Create</button>
                </div>
            </form>
        </div>
    </div>

@endsection