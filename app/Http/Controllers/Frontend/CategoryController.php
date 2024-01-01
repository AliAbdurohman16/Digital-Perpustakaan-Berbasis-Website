<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index($slug)
    {
        $data = [
            'categ' => Category::where('slug', $slug)->first(),
            'books' => Book::whereHas('category', function ($query) use ($slug) {
                            $query->where('slug', $slug);
                        })->paginate(6),
            'recent_book' => Book::orderBy('created_at', 'desc')->limit(3)->get(),
            'categories' => Category::all()
        ];

        return view('frontend.category.index', $data);
    }
}
