<!-- sidebar-wrapper -->
<nav id="sidebar" class="sidebar-wrapper sidebar-dark">
    <div class="sidebar-content" data-simplebar style="height: calc(100% - 60px);">
        <div class="sidebar-brand">
            <a href="">
                <img src="{{ asset('backend') }}/images/logo-dark.png" height="24" class="logo-light-mode" alt="">
                <img src="{{ asset('backend') }}/images/logo-light.png" height="24" class="logo-dark-mode" alt="">
                <span class="sidebar-colored">
                    <img src="{{ asset('backend') }}/images/logo-light.png" height="24" alt="">
                </span>
            </a>
        </div>

        <ul class="sidebar-menu">
            <li><a href="{{ route('dashboard') }}"><i class="uil uil-estate me-2"></i>Dashboard</a></li>
            @if (Auth::user()->hasRole('admin'))
            <li><a href="{{ route('packages.index') }}"><i class="uil uil-package me-2"></i>Paket</a></li>
            @endif
            <li class="sidebar-dropdown">
                <a href="javascript:void(0)"><i class="uil uil-receipt me-2"></i>Booking</a>
                <div class="sidebar-submenu">
                    <ul>
                        <li><a href="{{ route('booking_pending') }}">Booking Pending</a></li>
                        <li><a href="{{ route('booking_success') }}">Booking Sukses</a></li>
                        <li><a href="{{ route('booking_failed') }}">Booking Gagal</a></li>
                    </ul>
                </div>
            </li>
            @if (Auth::user()->hasRole('admin'))
            <li><a href="{{ route('customers.index') }}"><i class="uil uil-users-alt me-2"></i>Pelanggan</a></li>
            <li><a href="{{ route('payments.index') }}"><i class="uil uil-credit-card me-2"></i>Payment</a></li>
            @endif
            <li><a href="{{ route('reports') }}"><i class="uil uil-folder me-2"></i>Laporan</a></li>
            <li class="sidebar-dropdown">
                <a href="javascript:void(0)"><i class="uil uil-user me-2"></i>Akun</a>
                <div class="sidebar-submenu">
                    <ul>
                        <li><a href="{{ route('profile.index') }}">Profil</a></li>
                        <li><a href="{{ route('change-password.index') }}">Ganti Kata Sandi</a></li>
                    </ul>
                </div>
            </li>
        </ul>
        <!-- sidebar-menu  -->
    </div>
</nav>
<!-- sidebar-wrapper  -->
