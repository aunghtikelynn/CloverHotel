@extends('layouts.admin')
@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Rooms</h1>
        
    </div>
    <a href="{{route('backend.rooms.index')}}" class="btn btn-danger float-end p-2">Cancel</a>
    <ol class="breadcrumb mb-4 py-2">
        <li class="breadcrumb-item"><a href="{{route('backend.dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('backend.types.index')}}">Rooms</a></li>
        <li class="breadcrumb-item active">Create Room</li>
    </ol>
    <div class="card mb-4 m-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Create Room
        </div>
        <div class="card-body">
            <form action="{{route('backend.rooms.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" id="name" name="name">
                    @error('name')
                        <div class="invalid-feedback">{{ $message}} </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label fw-bold">Image</label>
                    <input type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror" value="{{old('image')}}" id="image" name="image">
                    @error('image')
                        <div class="invalid-feedback">{{ $message}} </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image_1" class="form-label fw-bold">Image 1</label>
                    <input type="file" accept="image/*" class="form-control @error('image_1') is-invalid @enderror" value="{{old('image_1')}}" id="image_1" name="image_1">
                    @error('image_1')
                        <div class="invalid-feedback">{{ $message}} </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image_2" class="form-label fw-bold">Image 2</label>
                    <input type="file" accept="image/*" class="form-control @error('image_2') is-invalid @enderror" value="{{old('image_2')}}" id="image_2" name="image_2">
                    @error('image_2')
                        <div class="invalid-feedback">{{ $message}} </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image_3" class="form-label fw-bold">Image 3</label>
                    <input type="file" accept="image/*" class="form-control @error('image_3') is-invalid @enderror" value="{{old('image_3')}}" id="image_3" name="image_3">
                    @error('image_3')
                        <div class="invalid-feedback">{{ $message}} </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image_4" class="form-label fw-bold">Image 4</label>
                    <input type="file" accept="image/*" class="form-control @error('image_4') is-invalid @enderror" value="{{old('image_4')}}" id="image_4" name="image_4">
                    @error('image_4')
                        <div class="invalid-feedback">{{ $message}} </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label fw-bold">Type</label>
                    <select name="type_id" id="type_id" class="form-select @error('type_id') is-invalid @enderror">
                        <option value="" selected>Choose Type</option>
                        @foreach($types as $type)
                            <option value="{{$type->id}}" {{old('type_id') == $type->id ? 'selected':''}}>{{$type->name}}</option>
                        @endforeach
                    </select>
                    @error('type_id')
                        <div class="invalid-feedback">{{ $message}} </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Description</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" value="{{old('description')}}" id="description" name="description">
                    @error('description')
                        <div class="invalid-feedback">{{ $message}} </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label fw-bold">Price</label>
                    <input type="text" class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}" id="price" name="price">
                    @error('price')
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