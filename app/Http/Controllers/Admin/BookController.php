<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Room;
use App\Models\Type;
use Barryvdh\DomPDF\Facade\Pdf;


class BookController extends Controller
{
    public function books()
    {
        $book_data = Book::where('status','Pending')->get();
        return view('admin.books.index',compact('book_data'));
    }

    public function bookAccept()
    {
        $book_data = Book::where('status','Accept')->get();
        return view('admin.books.index',compact('book_data'));
    }

    public function bookComplete()
    {
        $book_data = Book::where('status','Complete')->get();
        return view('admin.books.index',compact('book_data'));
    }

    public function status(Request $request, $id)
    {
        // dd($request);
        $book = Book::find($id);
        $book->status = $request->status;
        $book->save();
        return redirect()->route('backend.books');
    }

    public function bookDetail($id)
    {
        // dd($id);
        $book = Book::find($id);
        return view('admin.books.detail',compact('book'));
    }

    public function printPdf($id)
    {
    // echo "PDF";die();
    // dd($booking);
    $book = Book::find($id);

    $rooms = $book->room_id;
    $room = Room::find($rooms);
    $types = $room->type_id;
    $type = Type::find($types);

    $data = [
        'name' => $book->name,
        'booking_no' => $book->booking_no,
        'adult' => $book->adult,
        'child' => $book->child,
        'check_in' => $book->check_in,
        'check_out' => $book->check_out,
        'qty' => $book->qty,
        'total' => $book->total,
        'payment_type' => $book->payment_type,
        'room' => $room,
        'type' => $type,

    ];
    $pdf = PDF::loadView('admin.books.print-pdf', $data);
    return $pdf->download('Clover Hotel Voucher.pdf');
    }
}
