<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        # code...
    }

    public function store(Request $request)
    {
        return $request->all();
    }

    public function show($id)
    {
        # code...
    }

    public function edit($id)
    {
        # code...
    }

    public function update(Request $request,$id)
    {
        return $request->all();
    }

    public function destroy($id)
    {
        # code...
    }
}
