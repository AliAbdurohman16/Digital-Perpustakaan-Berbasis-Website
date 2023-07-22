<!DOCTYPE html>
<html>
<head>
    <style>
        /* Add any custom styles here */
        body {
            font-family: Arial, sans-serif;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            border: 1px solid #dee2e6;
            padding: 8px;
        }
        .table th {
            text-align: center;
        }
        .table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <h2>Data Buku</h2>
    <table class="table table-center bg-white mb-0" id="table">
        <thead>
            <tr>
                <th class="text-center border-bottom p-3">No</th>
                <th class="border-bottom p-3">Judul</th>
                <th class="border-bottom p-3">Kategori</th>
                <th class="border-bottom p-3">Jumlah</th>
                @if (Auth::user()->hasRole('admin'))
                <th class="border-bottom p-3">Pengupload</th>
                @endif
                <th class="border-bottom p-3">File</th>
            </tr>
        </thead>
        <tbody>
            <!-- Start -->
            @foreach($books as $book)
                <tr class="book-row" data-category="{{ $book->category->id }}">
                    <td class="text-center p-3" style="width: 5%;">{{ $loop->iteration }}</td>
                    <td class="p-3">{{ $book->title }}</td>
                    <td class="p-3">{{ $book->category->name }}</td>
                    <td class="p-3">{{ $book->amount }}</td>
                    @if (Auth::user()->hasRole('admin'))
                    <td class="p-3">{{ $book->user->fullname }}</td>
                    @endif
                    <td class="p-3">{{ $book->file_book ? asset('storage/files/' . $book->file_book) : 'No File' }}</td>
                </tr>
            @endforeach
            <!-- End -->
        </tbody>
    </table>
</body>
</html>
