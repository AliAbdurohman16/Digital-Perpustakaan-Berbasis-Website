@extends('layouts.backend.main')

@section('title', 'Buku')

@section('css')
<link rel="stylesheet" href="{{ asset('backend') }}/libs/select2/select2.min.css"/>
<link rel="stylesheet" href="{{ asset('backend') }}/css/select2.css"/>
<link rel="stylesheet" href="{{ asset('backend') }}/libs/summernote/summernote.min.css"/>
@endsection

@section('content')
<div class="container-fluid">
    <div class="layout-specing">
        <div class="d-md-flex justify-content-between align-items-center">
            <h5 class="mb-0">Buku</h5>

            <nav aria-label="breadcrumb" class="d-inline-block">
                <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                    <li class="breadcrumb-item text-capitalize"><a href="{{ route('books.index') }}">Buku</a></li>
                    <li class="breadcrumb-item text-capitalize active" aria-current="page">Tambah Data</li>
                </ul>
            </nav>
        </div>

        <a href="{{ route('books.index') }}" class="btn btn-warning btn-sm mt-4"><i class="fa-solid fa-arrow-left"></i> Kembali</a>

        <div class="col-lg-12 mt-4">
            <div class="card">
                <div class="container">
                    <div class="card-body">
                        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Cover Buku <span class="text-danger">*</span></label>
                                        <div class="row">
                                            <div class="col-sm-3 mb-2">
                                                <img src="{{ asset('default/image.png') }}" width="100px" alt="image" class="img-thumbnail cover-preview">
                                            </div>
                                            <div class="col-sm-9">
                                                <input name="cover" id="cover" type="file" class="form-control mb-1 @error('cover') is-invalid @enderror" accept="image/*" onchange="previewCover()">
                                                <small><span class="text-danger mb-1">*</span> Ukuran file harus berupa jpeg,png,jpg dan maksimal 2 MB.</small>
                                                @error('cover')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Judul Buku <span class="text-danger">*</span></label>
                                        <input name="title" id="title" type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Judul Buku" value="{{ old('title') }}">
                                        @error('title')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Kategori Buku <span class="text-danger">*</span></label>
                                        <select name="category" id="category" class="form-control select2 @error('category') is-invalid @enderror">
                                            <option value="">Pilih Kategori</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Jumlah Buku <span class="text-danger">*</span></label>
                                        <input name="amount" id="amount" type="number" class="form-control @error('amount') is-invalid @enderror" placeholder="Jumlah Buku" value="{{ old('amount') }}">
                                        @error('amount')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Upload File Buku <span class="text-danger">*</span></label>
                                        <input name="file_book" id="file_book" type="file" class="form-control mb-1 @error('file_book') is-invalid @enderror">
                                        <small><span class="text-danger mb-1">*</span> Ukuran file harus berupa PDF dan maksimal 5 MB.</small>
                                        @error('file_book')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Deskripsi Buku  <span class="text-danger">*</span></label>
                                        <textarea name="description" id="summernote" rows="4" class="form-control @error('description') is-invalid @enderror" placeholder="Deskripsi Buku">{{ old('description') }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div><!--end row-->
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="submit" class="btn btn-primary" value="Simpan">
                                </div><!--end col-->
                            </div><!--end row-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
</div><!--end container-->
@endsection

@section('javascript')
<script src="{{ asset('backend') }}/libs/select2/select2.min.js"></script>
<script src="{{ asset('backend') }}/libs/summernote/summernote.min.js"></script>
<script>
    // show select2
    $(document).ready(function() {
        $('.select2').select2();
        $('#summernote').summernote();
    });

    // function preview cover
    function previewCover() {
        const cover = document.querySelector('#cover');
        const coverPreview = document.querySelector('.cover-preview');
        const fileCover = new FileReader();
        fileCover.readAsDataURL(cover.files[0]);
        fileCover.onload = function(e) {
            coverPreview.src = e.target.result;
        }
    }
</script>
@endsection
