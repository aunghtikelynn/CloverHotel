@extends('layouts.front')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center">
                <img src="{{asset('front-assets/img/Kpay QR.jpg')}}" alt="" width="200">
            </div>
            <div class="col-12 text-center">
                <p class="text-success">Your booking is avaliable.</p>
            </div>
            <div class="row">
                <div class="col-3 offset-3">
                    <p>Room</p>
                </div>
                <div class="col-5">
                    <p>: {{$room_name->name}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-3 offset-3">
                    <p>Qty</p>
                </div>
                <div class="col-3">
                    <p>: {{$qty}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-3 offset-3">
                    <p>Price</p>
                </div>
                <div class="col-3">
                    <p>: {{$room_name->price * $qty}} MMK</p>
                </div>
            </div>
            <form action="{{route('')}}" method="post" enctype="multipart/form-data">  
            @csrf  
                <div class="row">
                    <div class="col-md-3 mt-3 offset-3">
                        <label for="payment_slip" >Payment Slip :</label>
                        <input type="file" name="payment_slip" id="payment_slip" class="form-control">
                    </div>
                    <div class="col-md-3 mt-3">
                        <label for="payment_method">Payment Method :</label>
                        <select name="payment_method" id="payment_method" class="form-control">
                            <option value="" select>Choose Payment Method</option>
                            @foreach($payments as $payment)
                                <option value="{{$payment->id}}">{{$payment->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="col-6 offset-3 mt-3">
                    <button class="btn btn-primary w-100 py-3" id="book-now" type="submit">Book Now</button>
                </div>
            </form>
            
        </div>
    </div>
@endsection