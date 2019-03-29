<?php

namespace App\Http\Controllers;

use App\Book;

class BookController extends Controller
{
    /**
     * Display the articles resource.
     *
     * @return mixed
     */
    public function index()
    {
        $books = Book::orderBy('sort', 'desc')->get();
        return view('book.index',compact('books'));
    }


}
