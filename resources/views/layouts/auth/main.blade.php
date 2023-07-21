<!doctype html>
<html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8" />
        <title>@yield('title') - Digital Perpustakaan Berbasis Website</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap Css -->
        <link href="{{ asset('backend') }}/css/bootstrap.min.css" class="theme-opt" rel="stylesheet" type="text/css" />
        <!-- Style Css-->
        <link href="{{ asset('backend') }}/css/style.min.css" class="theme-opt" rel="stylesheet" type="text/css" />

    </head>

    <body>

        @yield('content')

        <!-- Javascript -->
        <script src="{{ asset('backend') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Main Js -->
        <script src="{{ asset('backend') }}/js/app.js"></script>

    </body>

</html>
