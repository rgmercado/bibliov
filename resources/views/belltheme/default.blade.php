<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
    <meta property="og:title" content="">
    <meta property="og:image" content="">
    <meta property="og:url" content="">
    <meta property="og:site_name" content="">
    <meta property="og:description" content="">
    <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="">
    <!--Bloque para la Autenticacion -->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link href="{!! asset('belltheme/img/favicon.ico') !!}" rel="icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700|Roboto:400,900" rel="stylesheet">
    <!-- Bootstrap CSS File -->
    <link href="{!! asset('belltheme/lib/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
    <!-- Libraries CSS Files -->
    <link href="{!! asset('css/font-awesome.min.css') !!}" rel="stylesheet">
    <!-- Main Stylesheet File -->
    <link href="{!! asset('belltheme/css/style.css') !!}" rel="stylesheet">
    <!-- Main Stylesheet File -->
    <link href="{!! asset('css/sidebar.css') !!}" rel="stylesheet">
    <!-- Required JavaScript Libraries -->
    <script src="{!! asset('belltheme/lib/jquery/jquery.min.js') !!}"></script>
    <script src="{!! asset('belltheme/lib/jquery/jquery-migrate.min.js') !!}"></script>
    <script src="{!! asset('belltheme/lib/superfish/hoverIntent.js') !!}"></script>
    <script src="{!! asset('belltheme/lib/superfish/superfish.min.js') !!}"></script>
    <script src="{!! asset('belltheme/lib/tether/js/tether.min.js') !!}"></script>
    <script src="{!! asset('belltheme/lib/stellar/stellar.min.js') !!}"></script>
    <script src="{!! asset('belltheme/lib/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
    <script src="{!! asset('belltheme/lib/counterup/counterup.min.js') !!}"></script>
    <script src="{!! asset('belltheme/lib/waypoints/waypoints.min.js') !!}"></script>
    <script src="{!! asset('belltheme/lib/easing/easing.js') !!}"></script>
    <script src="{!! asset('belltheme/lib/stickyjs/sticky.js') !!}"></script>
    <script src="{!! asset('belltheme/lib/parallax/parallax.js') !!}"></script>
    <script src="{!! asset('belltheme/lib/lockfixed/lockfixed.min.js') !!}"></script>
    <!-- Template Specisifc Custom Javascript File -->
    <script src="{!! asset('belltheme/js/custom.js') !!}"></script>
    <script src="{!! asset('belltheme/contactform/contactform.js') !!}"></script>
    <title>Biblioteca Digital en Linea Unellez - @yield('title')</title>
</head>
<body>
    @include('belltheme.header')
    <div class="row">
        <div class="left">
            @yield('content')
        </div>
        <div class="right">
            @include('belltheme.sidebar')
        </div>
    </div>
    @include('belltheme.footer')
</body>
</html>
