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
                            <div class="col-6">
                                <p>Name</p>
                            </div>
                            <div class="col-6">
                                <p>- {{$book->name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p>Phone</p>
                            </div>
                            <div class="col-6">
                                <p>- {{$book->phone}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p>Email</p>
                            </div>
                            <div class="col-6">
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
                <div class="row px-2">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-6  border">
                                <p>Adult</p>
                            </div>
                            <div class="col-6  border">
                                <p class="text-end">{{$book->adult}}</p>
                            </div>
                            <div class="col-6  border">
                                <p>Child</p>
                            </div>
                            <div class="col-6  border">
                                <p class="text-end">{{$book->child}}</p>
                            </div>
                            <div class="col-6  border">
                                <p>Payment Method</p>
                            </div>
                            <div class="col-6  border">
                                @if(isset($book->payment_id) && !empty($book->payment_id))
                                    <p class="text-end">{{$book->payment->name}}</p>
                                @else
                                    <p class="text-end"></p>
                                @endif
                            </div>
                            <div class="col-6  border">
                                <p>Message</p>
                            </div>
                            <div class="col-6  border">
                                <p class="text-end">{{$book->message}}</p>
                            </div>
                            <div class="col-6  border">
                                <p>Total</p>
                            </div>
                            <div class="col-6  border">
                                <p class="text-end">{{$book->total}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 ">
                        <div class="row border py-4">
                            <div class="col-6 ">
                                <p>Room</p>
                            </div>
                            <div class="col-6 ">
                                <p>- {{$book->room_id}}</p>
                            </div>
                            <div class="col-6 ">
                                <p>Qty</p>
                            </div>
                            <div class="col-6 ">
                                <p>- {{$book->qty}}</p>
                            </div>
                            <div class="col-6 ">
                                <p>Check In</p>
                            </div>
                            <div class="col-6 ">
                                <p>- {{$book->check_in}}</p>
                            </div>
                            <div class="col-6 ">
                                <p>Check Out</p>
                            </div>
                            <div class="col-6 ">
                                <p>- {{$book->check_out}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @if(isset($book->payment_id) && !empty($book->payment_id))
                    <div class="row px-2">
                        <div class="col-3 border">
                            <p>Account No</p>
                        </div>
                        <div class="col-9 border">
                            <p class="text-center">{{$book->payment->acc_no}}</p>
                        </div>
                    </div>
                @else
                    <div></div>
                @endif
                <div class="row px-2">
                    @if(isset($book->payment_id) && !empty($book->payment_id))
                        <div class="border">
                            <div class="offset-md-4 col-md-4 my-2">
                                    <img src="{{$book->payment_slip}}" alt="" class="img-fluid">
                            </div>
                        </div>
                    @else
                        <div></div>
                    @endif
                    
                    @if($book->status == 'Complete')
                        <a href="{{route('backend.printPdf',$book->id)}}"><button class="btn btn-warning my-5" type="submit">Download Voucher</button></a>

                    @else
                        <form action="{{route('backend.books.status',$book->id)}}" class="d-grid gap-2 my-5" method="post">
                        @csrf 
                        @method('put')
                            @if($book->status == 'Pending')
                            <input type="hidden" name="status" value="Accept">
                            <button class="btn btn-primary" type="submit">Book Accept</button>
                        @elseif($book->status == "Accept")
                            <input type="hidden" name="status" value="Complete">
                            <button class="btn btn-success" type="submit">Book Complete</button>
                        @else
                            <div></div>
                        @endif
                        </form>
                    @endif
                    
                    
                </div>
            </div>
        </div>
    </div>

@endsection