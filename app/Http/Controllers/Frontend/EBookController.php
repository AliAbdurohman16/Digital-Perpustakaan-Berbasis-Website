<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class EBookController extends Controller
{
    public function index()
    {
        $data = [
            'books' => Book::paginate(6),
            'recent_book' => Book::orderBy('created_at', 'desc')->limit(3)->get(),
            'categories' => Category::all()
        ];

        return view('frontend.e-book.index', $data);
    }

    public function show($slug)
    {
        if (!Auth::user()) {
            return redirect('login');
        }

        $data = [
            'book' => Book::where('slug', $slug)->first(),
            'recent_book' => Book::orderBy('created_at', 'desc')->limit(3)->get(),
            'categories' => Category::all()
        ];

        return view('frontend.e-book.detail', $data);
    }
}
