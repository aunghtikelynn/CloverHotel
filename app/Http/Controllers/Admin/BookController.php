<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;


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
}
