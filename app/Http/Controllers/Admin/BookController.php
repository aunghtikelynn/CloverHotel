<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::orderBy('id','DESC')->paginate(15);
        return view('admin.books.index',compact('books'));
    }

    public function bookDetail($id)
    {
        dd($id);
        // $book = Book::find($id);
        // return view('admin.books.detail',compact('book'));
    }
}
