@extends('layouts.front')
@section('content')
<div class="container mt-5">
    <div class="row ">
        <div class="col-8 offset-2">
            <p class="fw-bold fs-5">Booking Confirmation</p>
            <p class="fw-bold text-success">Your Booking has been Confirmed</p>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-4 offset-2">
                <p class="fw-bold fs-5">Guest Name</p>
            </div>
            <div class="col-4">
                <p class=" fs-5">: {{$books->name}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-4 offset-2">
                <p>Number of Adults (>13 Yrs)</p>
            </div>
            <div class="col-4">
                <p>: {{$books->adult}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-4 offset-2">
                <p>Number of Childs</p>
            </div>
            <div class="col-4">
                <p>: {{$books->child}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-4 offset-2">
                <p>Check-in Date</p>
            </div>
            <div class="col-4">
                <p>: {{$books->check_in}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-4 offset-2">
                <p>Check-out Date</p>
            </div>
            <div class="col-4">
                <p>: {{$books->check_out}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-4 offset-2">
                <p class="fs-5">Hotel Name</p>
            </div>
            <div class="col-4">
                <p class=" fs-5 fw-bold">Colver Hotel</p>
            </div>
        </div>
        <div class="row">
            <div class="col-4 offset-2">
                <p>Hotel Address</p>
            </div>
            <div class="col-4">
                <p class="fs-sm">: 123 Street, New York, USA</p>
            </div>
        </div>
        <div class="row">
            <div class="col-4 offset-2">
                <p>Room</p>
            </div>
            <div class="col-4">
                <p>: {{$rooms->name}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-4 offset-2">
                <p>Room Type</p>
            </div>
            <div class="col-4">
                <p>: {{$type->name}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-4 offset-2">
                <p>Check-in Time</p>
            </div>
            <div class="col-4">
                <p>: After 14:00 on the check-in date</p>
            </div>
        </div>
        <div class="row">
            <div class="col-4 offset-2">
                <p>Check-out Time</p>
            </div>
            <div class="col-4">
                <p>: Before 12:00 on the check-out date</p>
            </div>
        </div>
        <div class="row">
            <div class="col-4 offset-2">
                <p>Services</p>
            </div>
            <div class="col-4">
                <p>: {{$type->service}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-4 offset-2">
                <p>Meals</p>
            </div>
            <div class="col-4">
                <p>: Breakfast Included</p>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-1 offset-2">
                <a href="/index"><button type="button" class="btn btn-outline-warning">OK</button></a>
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-outline-warning">Print Preview</button>
            </div>
        </div>
        
    </div>
</div>

@endsection