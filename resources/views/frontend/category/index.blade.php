@extends('layouts.frontend.main')

@section('title', 'Kategori')

@section('content')
<!-- Hero Start -->
<section class="bg-half-170 bg-light d-table w-100">
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="pages-heading">
                    <h2> Kategori </h2>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="position-breadcrumb">
            <nav aria-label="breadcrumb" class="d-inline-block">
                <ul class="breadcrumb rounded shadow mb-0 px-4 py-2">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="#">Kategori</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $categ->name }}</li>
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
                <div class="row">
                    @foreach ($books as $book)
                    <div class="col-lg-6 col-md-12 mb-4 pb-2">
                        <div class="card blog blog-primary rounded border-0 shadow">
                            <div class="position-relative">
                                <img src="{{ asset('storage/covers/' . $book->cover) }}" class="card-img-top rounded-top" alt="cover">
                                <div class="overlay rounded-top"></div>
                            </div>
                            <div class="card-body content">
                                <h5><a href="{{ route('detail', $book->slug) }}" class="card-title title text-dark" id="bookTitle_{{ $loop->iteration }}">{{ $book->title }}</a></h5>
                                <div class="post-meta d-flex justify-content-between mt-3">
                                    <ul class="list-unstyled mb-0">
                                        <li class="list-inline-item me-2 mb-0"><a href="{{ route('category', $book->category->slug) }}" class="text-muted like"><i class="uil uil-tag-alt me-1"></i>{{ $book->category->name }}</a></li>
                                    </ul>
                                    <a href="{{ route('detail', $book->slug) }}" class="text-muted readmore">Selengkapnya <i class="uil uil-angle-right-b align-middle"></i></a>
                                </div>
                            </div>
                            <div class="author">
                                <small class="user d-block"><i class="uil uil-user"></i> {{ $book->user->fullname }}</small>
                                <small class="date"><i class="uil uil-calendar-alt"></i> {{ date('d F Y', strtotime($book->created_at)) }}</small>
                            </div>
                        </div>
                    </div><!--end col-->
                    @endforeach

                    <!-- PAGINATION START -->
                    <div class="col-12">
                        <ul class="pagination justify-content-center mb-0">
                            <!-- Previous -->
                            @if ($books->previousPageUrl())
                                <li class="page-item"><a class="page-link" href="{{ $books->previousPageUrl() }}" aria-label="Previous">Prev</a></li>
                            @else
                                <li class="page-item disabled"><span class="page-link" aria-label="Previous">Prev</span></li>
                            @endif

                            <!-- Page number -->
                            @for ($i = 1; $i <= $books->lastPage(); $i++)
                                <li class="page-item {{ ($books->currentPage() == $i) ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $books->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            <!-- Next -->
                            @if ($books->nextPageUrl())
                                <li class="page-item"><a class="page-link" href="{{ $books->nextPageUrl() }}" aria-label="Next">Next</a></li>
                            @else
                                <li class="page-item disabled"><span class="page-link" aria-label="Next">Next</span></li>
                            @endif
                        </ul>
                    </div><!--end col-->
                    <!-- PAGINATION END -->
                </div><!--end row-->
            </div><!--end col-->
            <!-- BLog End -->

            <!-- START SIDEBAR -->
            <div class="col-lg-4 col-md-6 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <div class="card border-0 sidebar sticky-bar ms-lg-4">
                    <div class="card-body p-0">
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

@section('javascript')
<script>
    let windowWidth = window.innerWidth;

    let maxWords = 3;

    if (windowWidth < 768) {
        maxWords = 2;
    }

    let titles = document.querySelectorAll('.card-title');
    titles.forEach(title => {
        let words = title.textContent.trim().split(' ');
        if (words.length > maxWords) {
            title.textContent = words.slice(0, maxWords).join(' ') + '...';
        }
    });
</script>
@endsection
