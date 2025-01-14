@extends('layouts.admin')
@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Rooms</h1>
        
    </div>
    <a href="{{route('backend.rooms.index')}}" class="btn btn-danger float-end p-2">Cancel</a>
    <ol class="breadcrumb mb-4 py-2">
        <li class="breadcrumb-item"><a href="{{route('backend.dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('backend.rooms.index')}}">Rooms</a></li>
        <li class="breadcrumb-item active">Edit Room</li>
    </ol>
    <div class="card mb-4 m-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Edit Room
        </div>
        <div class="card-body">
            <form action="{{route('backend.rooms.update',$room->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{$room->name}}" id="name" name="name">
                    @error('name')
                        <div class="invalid-feedback">{{ $message}} </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="true">Image</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="new_image-tab" data-bs-toggle="tab" data-bs-target="#new_image-tab-pane" type="button" role="tab" aria-controls="new_image-tab-pane" aria-selected="false">New Image</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                            <img src="{{$room->image}}" alt="" class="w-25 h-25 my-3">
                            <input type="hidden" name="old_image" id="" value="{{$room->image}}"> 
                        </div>
                        <div class="tab-pane fade" id="new_image-tab-pane" role="tabpanel" aria-labelledby="new_image-tab" tabindex="0">
                            <input type="file" class="form-control my-3 @error('image') is-invalid @enderror" accept="image/*" id="image" name="image">
                        </div>
                    </div>
                    @error('image')
                        <div class="invalid-feedback">{{ $message}} </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="image_1-tab" data-bs-toggle="tab" data-bs-target="#image_1-tab-pane" type="button" role="tab" aria-controls="image_1-tab-pane" aria-selected="true">Image 1</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="new_image_1-tab" data-bs-toggle="tab" data-bs-target="#new_image_1-tab-pane" type="button" role="tab" aria-controls="new_image_1-tab-pane" aria-selected="false">New Image 1</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="image_1-tab-pane" role="tabpanel" aria-labelledby="image_1-tab" tabindex="0">
                            <img src="{{$room->image_1}}" alt="" class="w-25 h-25 my-3">
                            <input type="hidden" name="old_image_1" id="" value="{{$room->image_1}}"> 
                        </div>
                        <div class="tab-pane fade" id="new_image_1-tab-pane" role="tabpanel" aria-labelledby="new_image_1-tab" tabindex="0">
                            <input type="file" class="form-control my-3 @error('image_1') is-invalid @enderror" accept="image/*" id="image_1" name="image_1">
                        </div>
                    </div>
                    @error('image_1')
                        <div class="invalid-feedback">{{ $message}} </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="image_2-tab" data-bs-toggle="tab" data-bs-target="#image_2-tab-pane" type="button" role="tab" aria-controls="image_2-tab-pane" aria-selected="true">Image 2</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="new_image_2-tab" data-bs-toggle="tab" data-bs-target="#new_image_2-tab-pane" type="button" role="tab" aria-controls="new_image_2-tab-pane" aria-selected="false">New Image 2</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="image_2-tab-pane" role="tabpanel" aria-labelledby="image_2-tab" tabindex="0">
                            <img src="{{$room->image_2}}" alt="" class="w-25 h-25 my-3">
                            <input type="hidden" name="old_image_2" id="" value="{{$room->image_2}}"> 
                        </div>
                        <div class="tab-pane fade" id="new_image_2-tab-pane" role="tabpanel" aria-labelledby="new_image_2-tab" tabindex="0">
                            <input type="file" class="form-control my-3 @error('image_2') is-invalid @enderror" accept="image/*" id="image_2" name="image_2">
                        </div>
                    </div>
                    @error('image_2')
                        <div class="invalid-feedback">{{ $message}} </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="image_3-tab" data-bs-toggle="tab" data-bs-target="#image_3-tab-pane" type="button" role="tab" aria-controls="image_3-tab-pane" aria-selected="true">Image 3</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="new_image_3-tab" data-bs-toggle="tab" data-bs-target="#new_image_3-tab-pane" type="button" role="tab" aria-controls="new_image_3-tab-pane" aria-selected="false">New Image 3</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="image_3-tab-pane" role="tabpanel" aria-labelledby="image32-tab" tabindex="0">
                            <img src="{{$room->image_3}}" alt="" class="w-25 h-25 my-3">
                            <input type="hidden" name="old_image_3" id="" value="{{$room->image_3}}"> 
                        </div>
                        <div class="tab-pane fade" id="new_image_3-tab-pane" role="tabpanel" aria-labelledby="new_image_3-tab" tabindex="0">
                            <input type="file" class="form-control my-3 @error('image_3') is-invalid @enderror" accept="image/*" id="image_3" name="image_3">
                        </div>
                    </div>
                    @error('image_3')
                        <div class="invalid-feedback">{{ $message}} </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="image_4-tab" data-bs-toggle="tab" data-bs-target="#image_4-tab-pane" type="button" role="tab" aria-controls="image_4-tab-pane" aria-selected="true">Image 4</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="new_image_4-tab" data-bs-toggle="tab" data-bs-target="#new_image_4-tab-pane" type="button" role="tab" aria-controls="new_image_4-tab-pane" aria-selected="false">New Image 4</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="image_4-tab-pane" role="tabpanel" aria-labelledby="image_4-tab" tabindex="0">
                            <img src="{{$room->image_4}}" alt="" class="w-25 h-25 my-3">
                            <input type="hidden" name="old_image_4" id="" value="{{$room->image_4}}"> 
                        </div>
                        <div class="tab-pane fade" id="new_image_4-tab-pane" role="tabpanel" aria-labelledby="new_image_4-tab" tabindex="0">
                            <input type="file" class="form-control my-3 @error('image_4') is-invalid @enderror" accept="image/*" id="image_4" name="image_4">
                        </div>
                    </div>
                    @error('image_4')
                        <div class="invalid-feedback">{{ $message}} </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label fw-bold">Type</label>
                    <select name="type_id" id="type_id" class="form-select @error('type_id') is-invalid @enderror">
                        <option value="" selected>Choose Type</option>
                        @foreach($types as $type)
                            <option value="{{$type->id}}" {{$room->type_id == $type->id ? 'selected':''}}>{{$type->name}}</option>
                        @endforeach
                    </select>
                    @error('type_id')
                        <div class="invalid-feedback">{{ $message}} </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Description</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" value="{{$room->description}}" id="description" name="description">
                    @error('description')
                        <div class="invalid-feedback">{{ $message}} </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label fw-bold">Price</label>
                    <input type="text" class="form-control @error('price') is-invalid @enderror" value="{{$room->price}}" id="price" name="price">
                    @error('price')
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