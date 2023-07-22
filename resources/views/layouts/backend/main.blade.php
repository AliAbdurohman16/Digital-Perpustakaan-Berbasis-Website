<!doctype html>
<html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8" />
        <title>@yield('title') - Digital Perpustakaan Berbasis Website</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Bootstrap Css -->
        <link href="{{ asset('backend') }}/css/bootstrap.min.css" class="theme-opt" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('backend') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend') }}/libs/@iconscout/unicons/css/line.css" type="text/css" rel="stylesheet" />
        <!-- Style Css-->
        <link href="{{ asset('backend') }}/css/style.min.css" class="theme-opt" rel="stylesheet" type="text/css" />
        @yield('css')

    </head>

    <body>
        <div class="page-wrapper toggled">
            @include('layouts.backend.sidebar')

            <!-- Start Page Content -->
            <main class="page-content bg-light">
                @include('layouts.backend.topbar')

                @yield('content')

                @include('layouts.backend.footer')
            </main>
            <!--End page-content" -->
        </div>
        <!-- page-wrapper -->

        <!-- Javascript -->
        <script src="{{ asset('backend') }}/js/jquery.min.js"></script>
        <script src="{{ asset('backend') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        @yield('javascript')
        <!-- Main Js -->
        <script src="{{ asset('backend') }}/js/app.js"></script>

    </body>

</html>
