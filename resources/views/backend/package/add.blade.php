@extends('layouts.backend.main')

@section('title', 'Paket')

@section('css')
<!-- Datatables -->
<link rel="stylesheet" href="{{ asset('backend') }}/libs/data-tables/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="{{ asset('backend') }}/libs/data-tables/css/responsive.bootstrap5.min.css">
<link rel="stylesheet" href="{{ asset('backend') }}/libs/sweetalert2/sweetalert2.min.css"/>
<link rel="stylesheet" href="{{ asset('backend') }}/libs/tagsinput/tagsinput.css"/>
<link rel="stylesheet" href="{{ asset('backend') }}/css/tag-input.css"/>
@endsection

@section('content')
<div class="container-fluid">
    <div class="layout-specing">
        <div class="d-md-flex justify-content-between align-items-center">
            <h5 class="mb-0">Paket</h5>

            <nav aria-label="breadcrumb" class="d-inline-block">
                <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                    <li class="breadcrumb-item text-capitalize"><a href="{{ route('packages.index') }}">Paket</a></li>
                    <li class="breadcrumb-item text-capitalize active" aria-current="page">Tambah Data</li>
                </ul>
            </nav>
        </div>

        <a href="{{ route('packages.index') }}" class="btn btn-warning btn-sm mt-4"><i class="fa-solid fa-arrow-left"></i> Kembali</a>

        <div class="col-lg-12 mt-4">
            <div class="card">
                <div class="container">
                    <div class="card-body">
                        <form action="{{ route('packages.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Foto <span class="text-danger">*</span></label>
                                        <div class="row">
                                            <div class="col-sm-3 mb-2">
                                                <img src="{{ asset('default/image.png') }}" width="100px" alt="image" class="img-thumbnail img-preview">
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" accept="image/*" onchange="previewImg()">
                                                @error('image')
                                                    <span class="invalid-feedback errorimage" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Paket <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Paket" name="name" value="{{ old('name') }}" autocomplete="name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Lokasi <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('location') is-invalid @enderror" placeholder="Contoh: Bandung" name="location" value="{{ old('location') }}" autocomplete="location">
                                        @error('location')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Harga <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('price') is-invalid @enderror" placeholder="Harga" name="price" id="price" value="{{ old('price') }}" autocomplete="price">
                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Benefit <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('benefits') is-invalid @enderror" name="benefits" id="benefits" value="{{ old('benefits') }}" data-role="tagsinput" autocomplete="benefits">
                                        @error('benefits')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="submit" id="submit" name="send" class="btn btn-primary" value="Simpan">
                                </div><!--end col-->
                            </div><!--end row-->
                        </form><!--end form-->
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
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
<script src="{{ asset('backend') }}/libs/autoNumeric/autoNumeric.min.js"></script>
<script src="{{ asset('backend') }}/libs/tagsinput/tagsinput.min.js"></script>
<script>
    // function preview image
    function previewImg() {
        const logo = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');
        const fileImg = new FileReader();
        fileImg.readAsDataURL(logo.files[0]);
        fileImg.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }

    // show price to IDR
    new AutoNumeric('#price', {
        currencySymbol : 'Rp ',
        decimalCharacter : ',',
        digitGroupSeparator : '.',
        decimalPlaces: 0,
    });
</script>
@endsection
