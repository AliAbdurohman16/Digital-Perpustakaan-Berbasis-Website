@extends('layouts.backend.main')

@section('title', 'Buku')

@section('css')
<!-- Datatables -->
<link rel="stylesheet" href="{{ asset('backend') }}/libs/data-tables/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="{{ asset('backend') }}/libs/data-tables/css/responsive.bootstrap5.min.css">
<link rel="stylesheet" href="{{ asset('backend') }}/libs/sweetalert2/sweetalert2.min.css"/>
@endsection

@section('content')
<div class="container-fluid">
    <div class="layout-specing">
        <div class="d-md-flex justify-content-between align-items-center">
            <h5 class="mb-0">Buku</h5>

            <nav aria-label="breadcrumb" class="d-inline-block">
                <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                    <li class="breadcrumb-item text-capitalize"><a href="#">Buku</a></li>
                    <li class="breadcrumb-item text-capitalize active" aria-current="page">list</li>
                </ul>
            </nav>
        </div>

        <div class="row">
            <div class="col-12 mt-4">
                <div class="d-grid gap-2 d-md-flex">
                    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3 btn-sm">Tambah Data +</a>
                    <a href="{{ route('export.books.excel') }}" class="btn btn-success mb-3 btn-sm">Export Excel</a>
                    <a href="{{ route('export.books.pdf') }}" class="btn btn-danger mb-3 btn-sm">Export PDF</a>
                </div>
                <div class="card shadow rounded">
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="col-6 col-md-3">
                                <label for="categoryFilter">Filter Kategori:</label>
                                <select id="categoryFilter" class="form-select">
                                    <option value="">Semua Kategori</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-center bg-white mb-0" id="table">
                                <thead>
                                    <tr>
                                        <th class="text-center border-bottom p-3">No</th>
                                        <th class="border-bottom p-3">Cover</th>
                                        <th class="border-bottom p-3">Judul</th>
                                        <th class="border-bottom p-3">Kategori</th>
                                        <th class="border-bottom p-3">Jumlah</th>
                                        <th class="border-bottom p-3">Pengupload</th>
                                        <th class="border-bottom p-3">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Start -->
                                    @foreach($books as $book)
                                        <tr class="book-row" data-category="{{ $book->category->id }}">
                                            <th class="text-center p-3" style="width: 5%;">{{ $loop->iteration }}</th>
                                            <td class="p-3"><img src="{{ asset('storage/covers/' . $book->cover) }}" width="70px" class="img-fluid" alt="cover"></td>
                                            <td class="p-3">{{ $book->title }}</td>
                                            <td class="p-3">{{ $book->category->name }}</td>
                                            <td class="p-3">{{ $book->amount }}</td>
                                            <td class="p-3">{{ $book->user->fullname }}</td>
                                            <td style="width: 20%;">
                                                <a href="{{ asset('storage/files/' . $book->file_book) }}" class="btn btn-primary btn-sm mb-2" target="_blank">File PDF</a>
                                                <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm mb-2">Detail</a>
                                                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm mb-2">Edit</a>
                                                <button type="button" class="btn btn-danger btn-sm mb-2 btn-delete" data-id="{{ $book->id }}">Hapus</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <!-- End -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
</div><!--end container-->
@endsection

@section('javascript')
<!-- Datatables -->
<script src="{{ asset('backend') }}/libs/data-tables/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('backend') }}/libs/data-tables/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('backend') }}/libs/data-tables/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('backend') }}/libs/data-tables/js/responsive.bootstrap5.min.js"></script>
<script src="{{ asset('backend') }}/libs/sweetalert2/sweetalert2.min.js"></script>

<script>
    $(document).ready(function () {
        // show datatable with search and pagination
        $('#table').DataTable();

        // Handle category filter change
        $("#categoryFilter").change(function () {
            var selectedCategoryId = $(this).val();
            if (selectedCategoryId === "") {
                // Show all rows if "Semua Kategori" is selected
                $(".book-row").show();
            } else {
                // Hide all rows, then show only the rows with the selected category
                $(".book-row").hide();

                // Reset the iteration counter for each category
                var categoryCounter = {};

                $(".book-row[data-category='" + selectedCategoryId + "']").each(function (index) {
                    var categoryId = $(this).data("category");
                    if (categoryCounter[categoryId] === undefined) {
                        categoryCounter[categoryId] = 1;
                    }

                    // Set the new value for $loop->iteration
                    $(this).find(".text-center.p-3").text(categoryCounter[categoryId]);

                    // Increment the counter for the next book in this category
                    categoryCounter[categoryId]++;
                });

                // Show rows with the selected category
                $(".book-row[data-category='" + selectedCategoryId + "']").show();
            }

            // Automatically update $loop->iteration in <th> elements
            $(".book-row:visible").each(function (index) {
                $(this).find(".text-center.p-3").text(index + 1);
            });
        });
    });

    // show dialog success
    @if (Session::has('message'))
        swal.fire({
            icon: "success",
            title: "Berhasil",
            text: "{{ Session::get('message') }}",
        }).then((result) => {
            if (result.isConfirmed) {
                location.reload();
            }
        });
    @endif

    // function delete
    $(".btn-delete").click(function() {
        var id = $(this).data("id");
        Swal.fire({
            title: 'Hapus',
            text: "Apakah anda yakin ingin menghapus?",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "books/" + id,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function(response) {
                        swal.fire({
                            icon: "success",
                            title: "Berhasil",
                            text: response.message,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    },
                });
            }
        })
    });

</script>
@endsection
