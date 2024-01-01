<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BooksExportExcel;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use PDF;

class BookController extends Controller
{
    public function index()
    {
        // get user
        $user = Auth::user();

        // get data
        $books = ($user->hasRole('admin')) ? Book::all() : Book::where('user_id', Auth::id())->get();

        // get data categories
        $categories = Category::all();

        return view('backend.books.index', compact('books', 'categories'));
    }

    public function create()
    {
        // get data
        $categories = Category::all();

        return view('backend.books.add', compact('categories'));
    }

    public function store(Request $request)
    {
        // validation
        $request->validate([
            'cover' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'required|max:255',
            'category' => 'required',
            'amount' => 'required|max:11',
            'file_book' => 'required|file|mimes:pdf|max:5048',
            'description' => 'required',
        ]);

        // process upload cover
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('public/covers');
            $coverName = basename($coverPath);
        } else {
            $coverName = '';
        }

        // process upload file book
        if ($request->hasFile('file_book')) {
            $filePath = $request->file('file_book')->store('public/files');
            $fileName = basename($filePath);
        } else {
            $fileName = '';
        }

        // insert to table books
        Book::create([
            'cover' => $coverName,
            'title' => $request->title,
            'slug'  => Str::slug($request->title, '-'),
            'category_id' => $request->category,
            'user_id' => Auth::user()->id,
            'amount' => $request->amount,
            'file_book' => $fileName,
            'description' => $request->description,
        ]);

        return redirect('books')->with('message', 'Buku berhasil ditambahkan!');
    }

    public function show($id)
    {
        // get data by id
        $book = Book::findOrFail($id);

        return view('backend.books.detail', compact('book'));
    }

    public function edit($id)
    {
        // get data by id
        $book = Book::findOrFail($id);

        // get all data categories
        $categories = Category::all();

        return view('backend.books.edit', compact('book', 'categories'));
    }

    public function update(Request $request,$id)
    {
        // validation
        $request->validate([
            'cover' => 'image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'required|max:255',
            'category' => 'required',
            'amount' => 'required|max:11',
            'file_book' => 'file|mimes:pdf|max:5048',
            'description' => 'required',
        ]);

        // get data by id
        $book = Book::findOrFail($id);

        // process upload cover
        if ($request->hasFile('cover')) {
            if ($book->cover && Storage::exists('public/covers/' . $book->cover)) {
                Storage::delete('public/covers/' . $book->cover);
            }

            $coverPath = $request->file('cover')->store('public/covers');
            $coverName = basename($coverPath);
        } else {
            $coverName = $book->cover;
        }

        // process upload file book
        if ($request->hasFile('file_book')) {
            if ($book->file_book && Storage::exists('public/files/' . $book->file_book)) {
                Storage::delete('public/files/' . $book->file_book);
            }

            $filePath = $request->file('file_book')->store('public/files');
            $fileName = basename($filePath);
        } else {
            $fileName = $book->file_book;
        }

        // update to table books
        $book->update([
            'cover' => $coverName,
            'title' => $request->title,
            'slug'  => Str::slug($request->title, '-'),
            'category_id' => $request->category,
            'user_id' => Auth::user()->id,
            'amount' => $request->amount,
            'file_book' => $fileName,
            'description' => $request->description,
        ]);

        return redirect('books')->with('message', 'Buku berhasil diubah!');
    }

    public function destroy($id)
    {
        // get data by id
        $book = Book::findOrFail($id);

        // process delete cover
        if ($book->cover) {
            Storage::delete('public/covers/' . $book->cover);
        }

        // process delete file book
        if ($book->file_book) {
            Storage::delete('public/files/' . $book->file_book);
        }

        // delete data
        $book->delete();

        return response()->json(['message' => 'Buku berhasil dihapus!']);
    }

    public function exportBooksExcel()
    {
        // get user
        $user = Auth::user();

        // get data
        $books = ($user->hasRole('admin')) ? Book::all() : Book::where('user_id', Auth::id())->get();

        // Define the Excel file name
        $fileName = 'books_export_' . date('Ymd_His') . '.xlsx';

        // Generate the Excel file using the Maatwebsite\Excel library
        return Excel::download(new BooksExportExcel($books), $fileName);
    }

    public function exportBooksPdf()
    {
        // get user
        $user = Auth::user();

        // get data
        $books = ($user->hasRole('admin')) ? Book::all() : Book::where('user_id', Auth::id())->get();

        // Pas the data to the PDF view
        $pdf = PDF::loadView('pdf.books', ['books' => $books]);

        // set the paper size and orientation
        $pdf->setPaper('A4', 'landscape');

        // Download the PDF file with a custom name
        return $pdf->download('books_export_' . date('Ymd_His') . '.pdf');
    }

}
