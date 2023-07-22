<?php

namespace App\Exports;

use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\Auth;

class BooksExportExcel implements FromCollection, WithHeadings
{
    protected $books;

    public function __construct($books)
    {
        $this->books = $books;
    }

    public function collection()
    {
        $counter = 0;

        $data = $this->books->map(function ($book) use (&$counter) {
            $counter++;
            return [
                'No' => $counter,
                'Cover' => asset('storage/covers/' . $book->cover),
                'Judul' => $book->title,
                'Kategori' => $book->category->name,
                'Jumlah' => $book->amount,
                'Pengupload' => $book->user->fullname,
                'File' => asset('storage/files/' . $book->file_book),
                'Deskripsi' => strip_tags($book->description),
            ];
        });

        return $data;
    }

    public function headings(): array
    {
        return [
            'No',
            'Cover',
            'Judul',
            'Kategori',
            'Jumlah',
            'Pengupload',
            'File',
            'Deskripsi',
        ];
    }
}
