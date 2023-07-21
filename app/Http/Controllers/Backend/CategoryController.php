<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        // get data
        $categories = Category::all();

        return view('backend.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        // insert to table categories
        Category::create([
            'name' => $request->name,
            'slug'  => Str::slug($request->name, '-')
        ]);

        return redirect()->back()->with('message', 'Kategori berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        // get data find or fail by id
        $category = Category::findOrFail($id);

        // update to table categories
        $category->update([
            'name' => $request->name,
            'slug'  => Str::slug($request->name, '-')
        ]);

        return redirect()->back()->with('message', 'Kategori berhasil diubah!');
    }

    public function destroy($id)
    {
        // get data find or fail by id
        $category = Category::findOrFail($id);

        // delete data
        $category->delete();

        return response()->json(['message' => 'Kategori berhasil dihapus!']);
    }
}
