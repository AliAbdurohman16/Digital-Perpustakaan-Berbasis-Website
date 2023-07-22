@extends('layouts.backend.main')

@section('title', 'Detail Buku')

@section('content')
<div class="container-fluid">
    <div class="layout-specing">
        <div class="d-md-flex justify-content-between align-items-center">
            <h5 class="mb-0">Buku</h5>

            <nav aria-label="breadcrumb" class="d-inline-block">
                <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                    <li class="breadcrumb-item text-capitalize"><a href="{{ route('books.index') }}">Buku</a></li>
                    <li class="breadcrumb-item text-capitalize active" aria-current="page">Detail</li>
                </ul>
            </nav>
        </div>

        <a href="{{ route('books.index') }}" class="btn btn-warning btn-sm mt-4"><i class="fa-solid fa-arrow-left"></i> Kembali</a>

        <div class="row">
            <!-- Detail Start -->
            <div class="col-lg-9 col-md-6 mt-4">
                <div class="card border-0 shadow rounded">
                    <img src="{{ asset('storage/covers/' . $book->cover) }}" class="img-fluid rounded-top" alt="">
                    <div class="card-body content">
                        <h6><i class="mdi mdi-tag text-primary me-1"></i><a href="javscript:void(0)" class="text-primary">{{ $book->category->name }}</a></h6>
                        <h4 class="mt-3">{{ $book->title }}</h4>
                        <div class="text-muted">
                            {!! $book->description !!}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Detail End -->

            <!-- START SIDEBAR -->
            <div class="col-lg-3 col-md-6 col-12 mt-4">
                <div class="card border-0 rounded shadow p-4">
                    <!-- Author -->
                    <div class="text-center">
                        <h5 class="mb-0">Pengupload</h5>

                        <div class="mt-4">
                            @if ($book->user->image == 'default/user.png')
                                <img src="{{ asset($book->user->image) }}" class="img-fluid avatar avatar-medium rounded-pill shadow-md d-block mx-auto" alt="avatar">
                            @else
                                <img src="{{ asset('storage/users/' . $book->user->image) }}" class="img-fluid avatar avatar-medium rounded-pill shadow-md d-block mx-auto" alt="avatar">
                            @endif

                            <a class="h5 mt-4 mb-0 d-block">{{ $book->user->fullname }}</a>
                            <small class="text-muted d-block">{{ $book->user->hasRole('admin') ? 'Administrator' : 'User' }}</small>
                        </div>
                    </div>
                    <!-- Author -->
                </div>
            </div><!--end col-->
            <!-- END SIDEBAR -->
        </div><!--end row-->
    </div>
</div><!--end container-->
@endsection
