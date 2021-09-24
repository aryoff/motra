<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @auth
        <meta name="csrf-token" content="{{ csrf_token() }}">
    @endauth

    <title>
        {{ config('app.name', 'Laravel') }}
    </title>
    <link rel="icon" href="{{ asset(config('app.icon', 'favicon.ico')) }}"
        type="{{ config('app.icon_type', 'image/x-icon') }}" />

    <!-- Styles -->
    <link href="{{ mix('css/vendor.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet">
    @yield('module_css')
    <!-- Scripts -->
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>

</head>

@auth
    <body class="hold-transition sidebar-mini layout-fixed dark-mode">
@else
    <body class="layout-top-nav">
@endauth

<div id="app" class="wrapper">
    @if (asset(config('app.icon', '')) != '')
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset(config('app.icon', '')) }}" alt="preloaderLogo" height="60" width="60">
        </div>
    @endif
    <!-- Navbar -->
    @include('layouts.header')

    <!-- Main Sidebar Container -->
    @auth
        @include('layouts.sidebar')
    @endauth

    @yield('content')

    @include('layouts.footer')

    <!-- Control Sidebar -->
    @auth
        @include('layouts.control-sidebar')
    @endauth
    <!-- /.control-sidebar -->

</div>
<!-- ./wrapper -->
@can('isAdmin')
    <script src="{{ mix('js/admin.js') }}"></script>
@endcan
@yield('module_js')

</body>

</html>
