<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('created_at', 'desc')->limit(6)->get();

        return view('frontend.home.index', compact('books'));
    }
}
