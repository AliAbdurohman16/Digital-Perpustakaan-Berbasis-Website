@extends('layouts.frontend.main')

@section('title', 'E-Book Detail')

@section('content')
<!-- Hero Start -->
<section class="bg-half-170 bg-light d-table w-100">
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="pages-heading">
                    <h2> {{ $book->title }} </h2>
                    <ul class="list-unstyled mt-4 mb-0">
                        <li class="list-inline-item h6 user text-muted me-2"><i class="mdi mdi-account"></i> {{ $book->user->fullname }}</li>
                        <li class="list-inline-item h6 date text-muted"><i class="mdi mdi-calendar-check"></i> {{ date('d F Y', strtotime($book->created_at)) }}</li>
                    </ul>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="position-breadcrumb">
            <nav aria-label="breadcrumb" class="d-inline-block">
                <ul class="breadcrumb rounded shadow mb-0 px-4 py-2">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="#">E-Book</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
                </ul>
            </nav>
        </div>
    </div> <!--end container-->
</section><!--end section-->
<!-- Hero End -->

<!-- Shape Start -->
<div class="position-relative">
    <div class="shape overflow-hidden text-color-white">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!--Shape End-->

<!-- Blog STart -->
<section class="section">
    <div class="container">
        <div class="row">
            <!-- BLog Start -->
            <div class="col-lg-8 col-md-6">
                <div class="card blog blog-detail border-0 shadow rounded">
                    <img src="{{ asset('storage/covers/' . $book->cover) }}" class="img-fluid rounded-top" alt="cover">
                    <div class="card-body content">
                        <h6><i class="mdi mdi-tag text-primary me-1"></i><a href="{{ route('category', $book->category->slug) }}" class="text-primary">{{ $book->category->name }}</a></h6>
                        <p class="mt-3">{!! $book->description !!}</p>
                    </div>
                </div>
            </div>
            <!-- BLog End -->

            <!-- START SIDEBAR -->
            <div class="col-lg-4 col-md-6 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <div class="card border-0 sidebar sticky-bar ms-lg-4">
                    <div class="card-body p-0">
                        <!-- FILE E-BOOK -->
                        <div class="text-center">
                            <span class="bg-light d-block py-2 rounded shadow text-center h6 mb-0">
                                File E-Book
                            </span>

                            <div class="mt-4">
                                <a href="{{ asset('storage/files/' . $book->file_book) }}" class="btn btn-primary" target="_blank"><i class="uil uil-file-download"></i> Unduh E-Book</a>
                            </div>
                        </div>
                        <!-- FILE E-BOOK -->

                        <!-- RECENT POST -->
                        <div class="widget mt-4">
                            <span class="bg-light d-block py-2 rounded shadow text-center h6 mb-0">
                                E-Book Terbaru
                            </span>

                            <div class="mt-4">
                                @foreach ($recent_book as $rb)
                                <div class="d-flex align-items-center mb-3">
                                    <img src="{{ asset('storage/covers/' . $rb->cover) }}" class="avatar avatar-small rounded" style="width: auto;" alt="">
                                    <div class="flex-1 ms-3">
                                        <a href="{{ route('detail', $rb->slug) }}" class="d-block title text-dark">{{ $rb->title }}</a>
                                        <span class="text-muted">{{ date('d F Y', strtotime($rb->created_at)) }}</span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- RECENT POST -->

                        <!-- CATEGORY -->
                        <div class="widget mt-4">
                            <span class="bg-light d-block py-2 rounded shadow text-center h6 mb-0">
                                Kategori
                            </span>

                            <div class="tagcloud text-center mt-4">
                                @foreach ($categories as $category)
                                <a href="{{ route('category', $category->slug) }}" class="rounded">{{ $category->name }}</a>
                                @endforeach
                            </div>
                        </div>
                        <!-- CATEGORY -->
                    </div>
                </div>
            </div><!--end col-->
            <!-- END SIDEBAR -->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- Blog End -->
@endsection
