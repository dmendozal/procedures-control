<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ITSC - @yield('title')</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon.ico')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/cryptocurrency-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/plugins.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/helper.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    <link id="cus-style" rel="stylesheet" href="{{asset('assets/css/style-primary.css')}}">
    <style>
        .modal-custom {
            position: absolute;
        }
    </style>
</head>

<body id="sidebar">

    <div class="main-wrapper" id="mainprincipal">
        @include('partials.headersection')
        @include('partials.menu')
        <!-- Parte del contenido de la pagina-->
        <div class="content-body">
            <div class="row mbn-30">
                @yield('content')
            </div>
        </div>
        @include('partials.footer')
    </div>
    @include('partials.script')
</body>

</html>
