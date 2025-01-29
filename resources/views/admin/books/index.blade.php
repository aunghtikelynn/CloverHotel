@extends('layouts.admin')
@section('content')
    <div class="container-fluid px-4">
        <div class="my-3">
            <h1 class="mt-4">Books</h1>
            
        </div>
        <a href="" class="btn btn-primary float-end p-2">Create Book</a>
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
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th>Payment Slip</th>
                            <th>Room</th>
                            <th>Payment</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th>Payment Slip</th>
                            <th>Room</th>
                            <th>Payment</th>
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
                                <td>{{$book->name}}</td>
                                <td>{{$book->phone}}</td>
                                <td>{{$book->check_in}}</td>
                                <td>{{$book->check_out}}</td>
                                <td>{{$book->qty}}</td>
                                <td>{{$book->total}}</td>
                                <td><img src="{{$book->payment_slip}}" alt="" width="50"></td>
                                <td>{{$book->room->name}}</td>
                                <td><img src="{{$book->payment->logo}}" alt="" width="50"></td>
                                <td>
                                    <a href="" class="btn btn-sm btn-warning">Edit</a>
                                    <button class="btn btn-sm btn-danger delete" data-id="{{$book->id}}">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$books->links()}}
            </div>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-light">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3>Are you sure delete?</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <form action="" method="post" id="deleteForm">
                    @csrf 
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('tbody').on('click','.delete',function(){
                // alert('hello');
                let id = $(this).data('id');
                // console.log(id);
                $('#deleteForm').attr('action',`books/${id}`);
                $('#deleteModal').modal('show');
            })
        })
    </script>
@endsection