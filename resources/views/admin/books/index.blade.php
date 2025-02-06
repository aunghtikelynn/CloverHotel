@extends('layouts.admin')
@section('content')
    <div class="container-fluid px-4">
        <div class="my-3">
            <h1 class="mt-4">Books</h1>
            
        </div>
        <ol class="breadcrumb mb-4 py-2">
            <li class="breadcrumb-item"><a href="{{route('backend.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Books</li>
        </ol>
        
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Books List
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Booking No</th>
                            <th>Name</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Room</th>
                            <th>Status</th>
                            <th>Payment Type</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Booking No</th>
                            <th>Name</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Room</th>
                            <th>Status</th>
                            <th>Payment Type</th>
                            <th>#</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php 
                            $i = 1;
                        @endphp
                        @foreach($books as $book)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$book->booking_no}}</td>
                                <td>{{$book->name}}</td>
                                <td>{{$book->check_in}}</td>
                                <td>{{$book->check_out}}</td>
                                <td>{{$book->room->name}}</td>
                                <td>
                                    <span class="badge
                                    @if($book->status == 'Pending')
                                        {{'text-bg-secondary'}}
                                    @elseif($book->status == 'Accept')
                                        {{'text-bg-primary'}}
                                    @else
                                        {{'text-bg-success'}}
                                    @endif
                                    ">{{$book->status}}</span>
                                </td>
                                <td>{{$book->payment_type}}</td>
                                <td>
                                    <a href="{{route('backend.books.detail', $book->id)}}" class="btn btn-sm btn-info">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection