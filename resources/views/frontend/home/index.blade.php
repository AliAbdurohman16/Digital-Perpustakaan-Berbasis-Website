@extends('layouts.frontend.main')

@section('title', 'Beranda')

@section('content')
<!-- Hero Start -->
<section class="bg-half-260 bg-primary d-table w-100" style="background: url('frontend/images/hero.png') center center;">
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-heading text-center mt-4">
                    <h1 class="display-4 title-dark fw-bold text-white mb-3">Digital Perpustakaan Berbasis Website</h1>
                    <p class="para-desc mx-auto text-white-50">Jelajahi Ilmu di Ujung Jari: Akses Mudah Melalui Perpustakaan Digital Online!</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
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

<!-- Feature Start -->
<section class="section">
    <div class="container" id="layanan">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4">Layanan</h4>
                    <p class="text-muted para-desc mx-auto mb-0">Solusi lengkap untuk perpustakaan digital modern: desain menarik dan manajemen konten efisien untuk akses pengetahuan online yang lebih luas.</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-md-4 col-12 mt-5">
                <div class="features feature-primary text-center">
                    <div class="image position-relative d-inline-block">
                        <i class="uil uil-file-search-alt h2 text-primary"></i>
                    </div>

                    <div class="content mt-4">
                        <h5>Strategi & Riset</h5>
                        <p class="text-muted mb-0">Menggali pemahaman mendalam tentang kebutuhan pengguna, menganalisis tren, dan melakukan penelitian untuk meningkatkan ketersediaan dan relevansi koleksi.</p>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-md-4 col-12 mt-5">
                <div class="features feature-primary text-center">
                    <div class="image position-relative d-inline-block">
                        <i class="uil uil-airplay h2 text-primary"></i>
                    </div>

                    <div class="content mt-4">
                        <h5>Penggunaan yang Mudah</h5>
                        <p class="text-muted mb-0">Memastikan perpustakaan dapat diakses dengan mudah oleh semua pengguna, dari antarmuka yang ramah pengguna hingga navigasi yang intuitif.</p>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-md-4 col-12 mt-5">
                <div class="features feature-primary text-center">
                    <div class="image position-relative d-inline-block">
                        <i class="uil uil-clock h2 text-primary"></i>
                    </div>

                    <div class="content mt-4">
                        <h5>Akses 24 JAM</h5>
                        <p class="text-muted mb-0">Menyediakan akses tanpa henti ke koleksi, informasi, dan layanan dengan ketersediaan penuh sepanjang waktu kepada pengguna</p>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->

    <div class="container mt-100 mt-60" id="e-book">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4">E-Book Terbaru</h4>
                    <p class="text-muted para-desc mx-auto mb-0">Temukan cara memanfaatkan perpustakaan digital untuk memperluas pengetahuan Anda. Dapatkan E-book kami sekarang!</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            @foreach ($books as $book)
            <div class="col-lg-4 col-md-6 mt-4 pt-2">
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
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- Feature End -->
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
