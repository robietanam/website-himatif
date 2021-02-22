<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HIMATIF | @yield('title')</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app-frontpage.min.css') }}">
    @yield('style')
</head>
<body class="@yield('pageClass')">

    @include('_ui.frontpage.layouts.navbar')
    
    @yield('content')
    
    @include('_ui.frontpage.layouts.footer')


    <script src="{{ asset('vendors/bootstrap/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/app-frontpage.min.js') }}"></script>
    @yield('script')
</body>
</html>