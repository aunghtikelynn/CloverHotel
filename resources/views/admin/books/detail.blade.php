@extends('layouts.admin')
@section('content')

    <div class="container-fluid">
        <div class="my-5">
            <h3 class="my-4 d-inline">Order Details</h3>
            <a href="{{route('backend.books')}}" class="btn btn-sm btn-danger float-end">Cancel</a>
        </div>
        <div class="card mb-4 p-3">
            <div class="card-body">
                <h3 class="text-center">Clover Hotel</h3>
                <div class="row  px-2">
                    <div class="col-md-6 border p-2">
                        <div class="row">
                            <div class="col-3">
                                <p>Name</p>
                            </div>
                            <div class="col-9">
                                <p>- {{$book->name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <p>Phone</p>
                            </div>
                            <div class="col-9">
                                <p>- {{$book->phone}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <p>Email</p>
                            </div>
                            <div class="col-9">
                                <p>- {{$book->email}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 border p-2">
                        <div class="row">
                            <div class="col-6">
                                <p>Date</p>
                            </div>
                            <div class="col-6">
                                <p>- {{$book->created_at}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p>Booking No</p>
                            </div>
                            <div class="col-6">
                                <p>- {{$book->booking_no}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p>Payment Type</p>
                            </div>
                            <div class="col-6">
                                <p>- {{$book->payment_type}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered my-2">
                    <thead>
                        <tr>
                            <th>Adult</th>
                            <th>Child</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Room</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th>Payment Slip</th>
                            <th>Payment Method</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$book->adult}}</td>
                            <td>{{$book->child}}</td>
                            <td>{{$book->check_in}}</td>
                            <td>{{$book->check_out}}</td>
                            <td>{{$book->room_id}}</td>
                            <td>{{$book->qty}}</td>
                            <td>{{$book->total}}</td>
                            <td><img src="{{$book->payment_slip}}" alt="" class="img-fluid" width="100"></td>
                            <td>{{$book->payment_id}}</td>
                            <td>{{$book->message}}</td>
                        </tr>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>

@endsection