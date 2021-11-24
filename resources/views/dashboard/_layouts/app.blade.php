<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Himatif') }} | @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- Bootstrap --}}
    <link href="{{ asset('vendors/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    {{-- Font Awesome --}}
    <link href="{{ asset('vendors/fontawesome/css/all.min.css') }}" rel="stylesheet">
    {{-- Bootstrap Select --}}
    <link href="{{ asset('vendors/bs-select/bootstrap-select.min.css')}}" rel="stylesheet">
    {{-- Sweetalert2 --}}
    <link rel="stylesheet" href="{{ asset('vendors/sweetalert2/sweetalert2.min.css') }}">
    {{-- Bootstrap Datepicker --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    {{-- Apps --}}
    <link href="{{ asset('css/app-dashboard.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app-dashboard-components.min.css') }}" rel="stylesheet">
    @stack('style')
</head>
<body>

    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            @include('dashboard._layouts.navbar')
            @include('dashboard._layouts.sidebar')

            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Himatif Dashboard</h1>
                        <div class="section-header-breadcrumb">
                            @yield('breadcrumb')
                        </div>
                    </div>

                    {{-- if flash alert exist --}}
                    @if(Session::has('message'))
                        <div class="alert alert-{{ Session::get('type') }}">
                        {{ Session::get('message') }}
                        </div>
                    @endif
                    @yield('content')
                </section>

            </div>
            @include('dashboard._layouts.footer')
        </div>
    </div>

    @yield('modal')

    <!-- Scripts -->
    <script src="{{ asset('vendors/bootstrap/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/moment.min.js') }}"></script>
    <script src="{{ asset('vendors/stisla/js/nicescroll.js') }}"></script>
    <script src="{{ asset('vendors/stisla/js/stisla.js') }}"></script>
    <script src="{{ asset('vendors/stisla/js/scripts.js') }}"></script>
    <script src="{{ asset('vendors/stisla/js/custom.js') }}"></script>
    <script src="{{ asset('vendors/bs-select/bootstrap-select.min.js')}}"></script>
    {{-- Sweetalert2 --}}
    <script src="{{ asset('vendors/sweetalert2/sweetalert2.min.js') }}"></script>
    {{-- Bootstrap Datepicker --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('js/app.js')}}"></script>
    @stack('script')
</body>
</html>
