@extends('layouts.backend.main')

@section('title', 'Payment')

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
            <h5 class="mb-0">Payment</h5>

            <nav aria-label="breadcrumb" class="d-inline-block">
                <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                    <li class="breadcrumb-item text-capitalize"><a href="{{ route('payments.index') }}">Payment</a></li>
                    <li class="breadcrumb-item text-capitalize active" aria-current="page">Ubah Data</li>
                </ul>
            </nav>
        </div>

        <a href="{{ route('payments.index') }}" class="btn btn-warning btn-sm mt-4"><i class="fa-solid fa-arrow-left"></i> Kembali</a>

        <div class="col-lg-6 mt-4">
            <div class="card">
                <div class="container">
                    <div class="card-body">
                        <form action="{{ route('payments.update', $payment->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Bank/Provider <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('name_bank/provider') is-invalid @enderror" placeholder="Nama Bank/Provider" name="name_bank/provider" value="{{ $payment->name_bank }}" autocomplete="name_bank/provider">
                                        @error('name_bank/provider')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">No Rekening/Provider <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control @error('no_rekening/provider') is-invalid @enderror" placeholder="No Rekening/Provider" name="no_rekening/provider" value="{{ $payment->account_number }}" autocomplete="no_rekening/provider">
                                        @error('no_rekening/provider')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Pemilik <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('name_owner') is-invalid @enderror" placeholder="Nama Pemilik" name="name_owner" value="{{ $payment->name_owner }}" autocomplete="name_owner">
                                        @error('name_owner')
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
@endsection
