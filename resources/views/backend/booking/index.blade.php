@extends('layouts.backend.main')

@section('title', 'Transaksi')

@section('css')
<!-- Datatables -->
<link rel="stylesheet" href="{{ asset('backend') }}/libs/data-tables/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="{{ asset('backend') }}/libs/data-tables/css/responsive.bootstrap5.min.css">
<!-- Sweat Alert -->
<link rel="stylesheet" href="{{ asset('backend') }}/libs/sweetalert2/sweetalert2.min.css"/>
@endsection

@section('content')
<div class="container-fluid">
    <div class="layout-specing">
        <div class="d-md-flex justify-content-between align-items-center">
            <h5 class="mb-0">Transaksi</h5>

            <nav aria-label="breadcrumb" class="d-inline-block">
                <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                    <li class="breadcrumb-item text-capitalize"><a href="#">Transaksi</a></li>
                    <li class="breadcrumb-item text-capitalize active" aria-current="page">list</li>
                </ul>
            </nav>
        </div>

        <div class="row">
            <div class="col-12 mt-4">
                <div class="table-responsive shadow rounded">
                    <div class="card-body">
                        <table class="table table-center bg-white mb-0" id="table">
                            <thead>
                                <tr>
                                    <th class="text-center border-bottom p-3">No</th>
                                    <th class="border-bottom p-3">Bukti Transfer</th>
                                    <th class="border-bottom p-3">Paket</th>
                                    <th class="border-bottom p-3">Nama Pemesan</th>
                                    <th class="border-bottom p-3">Tgl Booking</th>
                                    <th class="border-bottom p-3">Bank</th>
                                    <th class="border-bottom p-3">Total</th>
                                    <th class="border-bottom p-3">Status</th>
                                    <th class="border-bottom p-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Start -->
                                @foreach($transactions as $transaction)
                                    <tr>
                                        <th class="text-center p-3" style="width: 5%;">{{ $loop->iteration }}</th>
                                        <td class="p-3">
                                            <a href="{{ asset('storage/evidences/' . $transaction->photo_evidence) }}" target="_blank">
                                                <img src="{{ asset('storage/evidences/' . $transaction->photo_evidence) }}" width="70px" class="img-fluid" alt="image-receipt">
                                            </a>
                                        </td>
                                        <td class="p-3">{{ $transaction->booking->package->name }}</td>
                                        <td class="p-3">
                                            @if ($transaction->booking->contactDetails && $transaction->booking->contactDetails->isNotEmpty())
                                                {{ $transaction->booking->contactDetails->first()->fullname }}
                                            @endif
                                        </td>
                                        <td class="p-3">{{ date('d/m/Y', strtotime($transaction->booking->start_date)) }} - {{ date('d/m/Y', strtotime($transaction->booking->end_date)) }}</td>
                                        <td class="p-3">{{ $transaction->name_bank }}</td>
                                        <td class="p-3">Rp {{ number_format($transaction->total, 0, ',', '.') }}</td>
                                        <td class="p-3">
                                            @if ($transaction->status == 'pending')
                                                <div class="badge bg-soft-secondary rounded px-3 py-1">
                                                    {{ strtoupper($transaction->status) }}
                                                </div>
                                            @elseif ($transaction->status == 'success')
                                                <div class="badge bg-soft-success rounded px-3 py-1">
                                                    {{ strtoupper($transaction->status) }}
                                                </div>
                                            @else
                                                <div class="badge bg-soft-danger rounded px-3 py-1">
                                                    {{ strtoupper($transaction->status) }}
                                                </div>
                                            @endif
                                        </td>
                                        <td class="p-3">
                                            <a href="javascript:void(0)" class="btn btn-info btn-sm d-flex mb-2" data-bs-toggle="modal" data-bs-target="#detail{{ $transaction->id }}">Detail</a>
                                        @if ($transaction->status == 'pending')
                                            <form action="{{ route('booking_validated') }}" method="POST" class="d-flex mb-2">
                                                @csrf
                                                <input type="hidden" name="booking_id" value="{{ $transaction->booking_id }}">
                                                <button type="submit" class="btn btn-success btn-sm">Validasi</button>
                                            </form>
                                            <form action="{{ route('booking_rejected') }}" method="POST" class="d-flex">
                                                @csrf
                                                <input type="hidden" name="booking_id" value="{{ $transaction->booking_id }}">
                                                <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                <!-- End -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
</div><!--end container-->
<!-- Modal Detail -->
@foreach ($transactions as $transaction)
<div class="modal fade" id="detail{{ $transaction->id }}" tabindex="-1" aria-labelledby="LoginForm-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded shadow border-0">
            <div class="modal-header border-bottom">
                <h5 class="modal-title" id="LoginForm-title">Data Booking</h5>
                <button type="button" class="btn btn-icon btn-close" data-bs-dismiss="modal" id="close-modal"><i class="uil uil-times fs-4 text-dark"></i></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="container">
                            <div class="row">
                                <div class="row">
                                    <div class="col-6 mb-2">
                                        <span>Invoice</span>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <span class="fw-bold">{{ $transaction->id }}</span>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <span>Kode Booking</span>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <span class="fw-bold">{{ $transaction->booking_id }}</span>
                                    </div>
                                    @if ($transaction->booking->contactDetails && $transaction->booking->contactDetails->isNotEmpty())
                                    <div class="col-6 mb-2">
                                        <span>Nama</span>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <span class="fw-bold">{{ $transaction->booking->contactDetails->first()->fullname }}</span>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <span>No. Identitas</span>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <span class="fw-bold">{{ $transaction->booking->contactDetails->first()->no_identity }}</span>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <span>Tipe Identitas</span>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <span class="fw-bold">{{ $transaction->booking->contactDetails->first()->type_identity }}</span>
                                    </div>
                                    @endif
                                    <div class="col-6 mb-2">
                                        <span>Paket</span>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <span class="fw-bold">{{ $transaction->booking->package->name }}</span>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <span>Lokasi</span>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <span class="fw-bold">{{ $transaction->booking->package->location }}</span>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <span>Tanggal Mulai</span>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <span class="fw-bold">{{ date('d/m/Y', strtotime($transaction->booking->start_date)) }}</span>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <span>Tanggal Selesai</span>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <span class="fw-bold">{{ date('d/m/Y', strtotime($transaction->booking->end_date)) }}</span>
                                    </div>
                                    @if ($transaction->status == 'success')
                                        <div class="col-6 mb-2">
                                            <span>Tanggal Divalidasi</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <span class="fw-bold">{{ date('d/m/Y', strtotime($transaction->updated_at)) }}</span>
                                        </div>
                                    @endif
                                    @if ($transaction->booking->contactDetails && $transaction->booking->contactDetails->isNotEmpty())
                                    <div class="col-6 mb-2">
                                        <span>Telepon</span>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <span class="fw-bold">{{ $transaction->booking->contactDetails->first()->telephone }}</span>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <span>Email</span>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <span class="fw-bold">{{ $transaction->booking->contactDetails->first()->email }}</span>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <span>Jenis Kelamin</span>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <span class="fw-bold">{{ $transaction->booking->contactDetails->first()->gender }}</span>
                                    </div>
                                    @endif
                                    <div class="col-6 mb-2">
                                        <span>Bank</span>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <span class="fw-bold">{{ $transaction->name_bank }}</span>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <span>Total</span>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <span class="fw-bold">Rp {{ number_format($transaction->total, 0, ',', '.') }}</span>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <span>Status</span>
                                    </div>
                                    <div class="col-6 mb-2">
                                        @if ($transaction->photo_evidence != null)
                                            <td class="{{ $transaction->status == 'success' ? 'text-success' : ($transaction->status == 'failed' ? 'text-danger' : 'text-muted') }}">
                                                {{ strtoupper($transaction->status) }}
                                            </td>
                                        @else
                                            <td class="text-muted">Belum Upload Bukti Pembayaran</td>
                                        @endif
                                    </div>
                                    <div class="col-6 mb-2">
                                        <span>Foto Identitas</span>
                                    </div>
                                    <div class="col-6 mb-2">
                                        @if ($transaction->booking->contactDetails && $transaction->booking->contactDetails->isNotEmpty())
                                        <a href="{{ asset('storage/identities/' . $transaction->booking->contactDetails->first()->upload_identity) }}" target="_blank">
                                            <img src="{{ asset('storage/identities/' . $transaction->booking->contactDetails->first()->upload_identity) }}" width="70px" class="img-fluid" alt="image-identity">
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- Modal Detail End -->

@endsection

@section('javascript')
<!-- Datatables -->
<script src="{{ asset('backend') }}/libs/data-tables/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('backend') }}/libs/data-tables/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('backend') }}/libs/data-tables/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('backend') }}/libs/data-tables/js/responsive.bootstrap5.min.js"></script>
<!-- Sweat Alert -->
<script src="{{ asset('backend') }}/libs/sweetalert2/sweetalert2.min.js"></script>

<script>
    // show datatable with search and pagination
    $(document).ready(function() {
        $('#table').DataTable();
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
</script>
@endsection
