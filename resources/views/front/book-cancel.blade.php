@extends('layouts.front')
@section('content')
    <div class="container mt-5">
        <div class="row ">
            <div class="col-6 offset-3">
                <p class="text-danger fs-5">Sorry, {{$room_names->name}} is out of Booking.</p>
                <p>You can choose another room.</p>
                
                <form action="{{route('booking')}}" method="get" enctype="multipart/form-data">  
                @csrf  
                    <div>
                        <input type="hidden" name="name" value="{{$name}}">
                        <input type="hidden" name="phone" value="{{$phone}}">
                        <input type="hidden" name="email" value="{{$email}}">
                        <input type="hidden" name="adult" value="{{$adult}}">
                        <input type="hidden" name="child" value="{{$child}}">
                        <input type="hidden" name="room" value="{{$room}}">
                        <input type="hidden" name="qty" value="{{$qty}}">
                        <input type="hidden" name="checkin" value="{{$checkin}}">
                        <input type="hidden" name="checkout" value="{{$checkout}}">
                        <input type="hidden" name="message" value="{{$message}}">
                    </div>
                    <div class="col-6 offset-3 mt-3">
                        <button class="btn btn-primary w-100 py-3" type="submit">OK</button>
                    </div>
                </form>

                
                
            </div>
            
            
                        
        </div>
    </div>
@endsection
