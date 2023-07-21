<!-- sidebar-wrapper -->
<nav id="sidebar" class="sidebar-wrapper sidebar-dark">
    <div class="sidebar-content" data-simplebar style="height: calc(100% - 60px);">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}" class="text-center">Digital Perpustakaan</a>
        </div>

        <ul class="sidebar-menu">
            <li><a href="{{ route('dashboard') }}"><i class="uil uil-estate me-2"></i>Dashboard</a></li>
            <li><a href="{{ route('categories.index') }}"><i class="uil uil-apps me-2"></i>Kategori</a></li>
            <li><a href="{{ route('books.index') }}"><i class="uil uil-book me-2"></i>Buku</a></li>
        </ul>
        <!-- sidebar-menu  -->
    </div>
</nav>
<!-- sidebar-wrapper  -->
