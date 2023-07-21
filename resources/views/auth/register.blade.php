@extends('layouts.auth.main')

@section('title', 'Daftar')

@section('content')
<!-- Hero Start -->
<section class="bg-primary d-flex align-items-center">
    <div class="bg-overlay bg-overlay-white"></div>
    <div class="container mt-4 p-5">
        <div class="row justify-content-center">
            <div class="col-5">
                <div class="card p-4 rounded shadow">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <h5 class="mb-5 mt-3 text-center">Daftarkan akun anda</h5>

                        <div class="form-floating mb-2">
                            <input type="text" class="form-control @error('fullname') is-invalid @enderror"  name="fullname" id="floatingInput" placeholder="Nama Lengkap" value="{{ old('fullname') }}" autocomplete="fullname">
                            <label for="floatingInput">Nama Lengkap</label>
                            @error('fullname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-2">
                            <input type="email" class="form-control @error('email') is-invalid @enderror"  name="email" id="floatingInput" placeholder="nama@gmail.com" value="{{ old('email') }}" autocomplete="email">
                            <label for="floatingInput">Email</label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="floatingPassword" placeholder="Kata Sandi" autocomplete="new-password">
                            <label for="floatingPassword">Kata Sandi</label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password_confirmation" id="floatingPassword" placeholder="Konfirmasi Kata Sandi" autocomplete="new-password">
                            <label for="floatingPassword">Konfirmasi Kata Sandi</label>
                        </div>

                        <button class="btn btn-primary w-100" type="submit">Daftar</button>

                        <div class="col-12 text-center mt-3">
                            <p class="mb-0 mt-3"><small class="text-dark me-2">Sudah memiliki akun ?</small> <a href="{{ route('login') }}" class="text-dark fw-bold">Masuk</a></p>
                        </div><!--end col-->

                        <p class="mb-0 text-muted mt-3 text-center">© <script>document.write(new Date().getFullYear())</script> Digital Perpustakaan Berbasis Website.</p>
                    </form>
                </div>
            </div>
        </div>
    </div> <!--end container-->
</section><!--end section-->
<!-- Hero End -->
@endsection
