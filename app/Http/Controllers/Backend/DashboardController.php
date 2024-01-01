<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'category' => Category::count(),
            'book' => Book::count(),
            'user' => User::count(),
        ];

        return view('backend.dashboard.index', $data);
    }
}
