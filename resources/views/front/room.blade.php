@extends('layouts.front')
@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url({{asset('front-assets/img/carousel-1.jpg')}});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Rooms</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Rooms</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Booking Start -->
    <div class="container-fluid booking pb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="bg-white shadow" style="padding: 35px;">
                <form action="{{route('booking')}}" method="get" enctype="multipart/form-data">
                @csrf
                    <div class="row g-2">
                        <div class="col-md-10">
                            <div class="row g-2">
                                <div class="col-md-3">
                                    <div class="date"data-target-input="nearest">
                                        <input type="text" id="checkin" name="checkin"  class="form-control datetimepicker-input" placeholder="Check in" data-target="#checkin" data-toggle="datetimepicker" /> 
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="date" data-target-input="nearest">
                                        <input type="text" id="checkout" name="checkout" class="form-control datetimepicker-input" placeholder="Check out" data-target="#checkout" data-toggle="datetimepicker"/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-select" name="adult">
                                        <option value="" selected>Adult</option>
                                        <option value="1">Adult 1</option>
                                        <option value="2">Adult 2</option>
                                        <option value="3">Adult 3</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                <select class="form-select" name="child">
                                        <option value="0" selected>Child</option>
                                        <option value="1">Child 1</option>
                                        <option value="2">Child 2</option>
                                        <option value="3">Child 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary w-100" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Booking End -->


    <!-- Room Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Our Rooms</h6>
                <h1 class="mb-5">Explore Our <span class="text-primary text-uppercase">Rooms</span></h1>
            </div>
            <div class="row g-4">
            @foreach($rooms as $room)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="room-item shadow rounded overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="{{$room->image}}" alt="">
                            <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">{{$room->price}}/Night</small>
                        </div>
                        <div class="p-4 mt-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h4 class="mb-0">{{$room->name}}</h4>
                                <div class="ps-2">
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <h6 class="mb-0">{{$room->type->name}}</h6>
                            </div>
                            <div class="d-flex mb-3">
                                <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>{{$room->bed}} Bed</small>
                                <small class="border-end me-3 pe-3"><i class="fa fa-bath text-primary me-2"></i>{{$room->bath}} Bath</small>
                                <small><i class="fa fa-wifi text-primary me-2"></i>Wifi</small>
                            </div>
                            <p class="text-body mb-3">{{ Str::limit($room->description, 100, '...') }}</p>
                            <div class="d-flex justify-content-between">
                                <a class="btn btn-sm btn-primary rounded py-2 px-4" href="{{route('room-detail', $room->id)}}">View Detail</a>
                                <form action="{{route('booking')}}" method="get" enctype="multipart/form-data">
                                    <input type="hidden" name="room" value="{{$room->id}}">
                                    <button type="submit" class="btn btn-dark">Book Now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            <div class="mt-5">
                {{$rooms->links()}}
            </div>
            
        </div>
        
    </div>
    <!-- Room End -->


    <!-- Testimonial Start -->
    <div class="container-xxl testimonial mt-5 py-5 bg-dark wow zoomIn" data-wow-delay="0.1s" style="margin-bottom: 90px;">
        <div class="container">
            <div class="owl-carousel testimonial-carousel py-5">
                <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                    <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd et erat magna eos</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded" src="{{asset('front-assets/img/testimonial-1.jpg')}}" style="width: 45px; height: 45px;">
                        <div class="ps-3">
                            <h6 class="fw-bold mb-1">Client Name</h6>
                            <small>Profession</small>
                        </div>
                    </div>
                    <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                </div>
                <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                    <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd et erat magna eos</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded" src="{{asset('front-assets/img/testimonial-2.jpg')}}" style="width: 45px; height: 45px;">
                        <div class="ps-3">
                            <h6 class="fw-bold mb-1">Client Name</h6>
                            <small>Profession</small>
                        </div>
                    </div>
                    <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                </div>
                <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                    <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd et erat magna eos</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded" src="{{asset('front-assets/img/testimonial-3.jpg')}}" style="width: 45px; height: 45px;">
                        <div class="ps-3">
                            <h6 class="fw-bold mb-1">Client Name</h6>
                            <small>Profession</small>
                        </div>
                    </div>
                    <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

        
@endsection