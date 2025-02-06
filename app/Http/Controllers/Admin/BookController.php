<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function books()
    {
        $books = Book::all();
        return view('admin.books.index',compact('books'));
    }

    public function bookDetail($id)
    {
        // dd($id);
        $book = Book::find($id);
        return view('admin.books.detail',compact('book'));
    }
}
