@extends('layouts.front')
@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url({{asset('front-assets/img/carousel-1.jpg')}});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Booking</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Booking</li>
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
                <div class="row g-2">
                    <div class="col-md-10">
                        <div class="row g-2">
                            <div class="col-md-3">
                                <div class="date" id="date1" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                        placeholder="Check in" data-target="#date1" data-toggle="datetimepicker" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="date" id="date2" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" placeholder="Check out" data-target="#date2" data-toggle="datetimepicker"/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select">
                                    <option selected>Adult</option>
                                    <option value="1">Adult 1</option>
                                    <option value="2">Adult 2</option>
                                    <option value="3">Adult 3</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select">
                                    <option selected>Child</option>
                                    <option value="1">Child 1</option>
                                    <option value="2">Child 2</option>
                                    <option value="3">Child 3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary w-100">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking End -->


    <!-- Booking Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Room Booking</h6>
                <h1 class="mb-5">Book A <span class="text-primary text-uppercase">Luxury Room</span></h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="{{asset('front-assets/img/about-1.jpg')}}" style="margin-top: 25%;">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s" src="{{asset('front-assets/img/about-2.jpg')}}">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s" src="{{asset('front-assets/img/about-3.jpg')}}">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s" src="{{asset('front-assets/img/about-4.jpg')}}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <form action="{{route('bookNow')}}" method="post" id="bookForm" enctype="multipart/form-data">
                            @csrf
                           
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" name="name"  id="name" placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message}} </div>
                                        @enderror
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control @error ('email') is-invalid @enderror" value="{{old('email')}}" name="email" id="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message}} </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error ('phone') is-invalid @enderror" value="{{old('phone')}}" name="phone" id="phone" placeholder="Your Phone">
                                        <label for="phone">Your Phone</label>
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message}} </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select @error ('person') is-invalid @enderror" name="person" id="person">
                                            <option value="" selected>Number of Room</option>
                                            <option value="1">1 Room</option>
                                            <option value="2">2 Rooms</option>
                                            <option value="3">3 Rooms</option>
                                        </select>
                                        <!-- <label for="person">Select Person</label> -->
                                        @error('person')
                                            <div class="invalid-feedback">{{ $message}} </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select">
                                            <option selected>Adult</option>
                                            <option value="1">Adult 1</option>
                                            <option value="2">Adult 2</option>
                                            <option value="3">Adult 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select">
                                            <option selected>Child</option>
                                            <option value="1">Child 1</option>
                                            <option value="2">Child 2</option>
                                            <option value="3">Child 3</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-floating date" id="date3" data-target-input="nearest">
                                        <input type="text" value="{{ $date1 }} {{old('date1')}}" name="date1" class="form-control @error ('date1') is-invalid @enderror datetimepicker-input" id="checkin" placeholder="Check In" data-target="#date3" data-toggle="datetimepicker" />
                                        <label for="checkin">Check In</label>
                                        @error('date1')
                                            <div class="invalid-feedback">{{ $message}} </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating date" id="date4" data-target-input="nearest">
                                        <input type="text" value="{{ $date2 }} {{old('date2')}}" name="date2" class="form-control @error ('date2') is-invalid @enderror datetimepicker-input" id="checkout" placeholder="Check Out" data-target="#date4" data-toggle="datetimepicker" />
                                        <label for="checkout">Check Out</label>
                                        @error('date2')
                                            <div class="invalid-feedback">{{ $message}} </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <select class="form-select @error ('room') is-invalid @enderror"  id="room" name="room">
                                            <option value="" selected>Choose Room</option>
                                            @foreach($room_names as $room_name)
                                                <option value="{{$room_name->id}} {{old('room')}}">{{$room_name->name}}</option>
                                            @endforeach   
                                        </select>
                                        <label for="room">Select A Room</label>
                                        @error('room')
                                            <div class="invalid-feedback">{{ $message}} </div>
                                        @enderror
                                        </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control @error ('message') is-invalid @enderror" value="{{old('message')}}" placeholder="Special Request" name="message" id="message" style="height: 100px"></textarea>
                                        <label for="message">Special Request</label>
                                        @error('message')
                                            <div class="invalid-feedback">{{ $message}} </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" id="book-now" type="submit">Book Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking End -->


@endsection

