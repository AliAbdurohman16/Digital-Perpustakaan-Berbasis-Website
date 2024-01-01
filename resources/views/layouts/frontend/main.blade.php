
<!doctype html>
<html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8" />
        <title>@yield('title') - Digital Perpustakaan Berbasis Website</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Digital Perpustakaan Berbasis Website" />
        <meta name="keywords" content="Perpustakaan, Digital" />
        <meta name="author" content="Ali Abdurohman" />

        <!-- favicon -->
        <link rel="shortcut icon" href="{{ asset('frontend') }}/images/favicon.ico" />

        <!-- Bootstrap Css -->
        <link href="{{ asset('frontend') }}/css/bootstrap.min.css" class="theme-opt" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('frontend') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend') }}/libs/@iconscout/unicons/css/line.css" type="text/css" rel="stylesheet" />
        <!-- Style Css-->
        <link href="{{ asset('frontend') }}/css/style.min.css" class="theme-opt" rel="stylesheet" type="text/css" />

    </head>

    <body>
        <!-- Loader -->
        @include('layouts.frontend.loader')
        <!-- Loader -->

        <!-- Navbar Start -->
        @include('layouts.frontend.navbar')
        <!-- Navbar End -->

        <!-- Content Start -->
        @yield('content')
        <!-- Content End -->

        <!-- Footer Start -->
        @include('layouts.frontend.footer')
        <!-- Footer End -->

        <!-- Back to top -->
        <a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top fs-5"><i data-feather="arrow-up" class="fea icon-sm icons align-middle"></i></a>
        <!-- Back to top -->

        <!-- Javascript -->
        <script src="{{ asset('frontend') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('frontend') }}/libs/feather-icons/feather.min.js"></script>
        <!-- Main Js -->
        <script src="{{ asset('frontend') }}/js/plugins.init.js"></script>
        <script src="{{ asset('frontend') }}/js/app.js"></script>

        @yield('javascript')
    </body>
</html>
