<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF TOKEN -->
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
    @yield('style')

    <title>HIMATIF | @yield('title')</title>
</head>

<body style="overflow-x: hidden; overflow-y: auto;">
    <section class="section">
        <div class="container mt-3 pt-4">
            <h4 class="text-center my-3">HIMATIF</h4>
            <div class="row justify-content-center">
                <div class="col-12 col-sm-8 col-lg-5">

                @yield('content')

                <div class="simple-footer">
                    Copyright &copy; {{ env('APP_NAME') }} {{ date('Y') }}
                </div>
                </div>
            </div>
        </div>
    </section>

    {{-- JS DEPEDENCY --}}
    {{-- bootstrap --}}
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    {{-- stisla --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ asset('vendors/stisla/js/stisla.js') }}"></script>
    <script src="{{ asset('vendors/stisla/js/scripts.js') }}"></script>
    <script src="{{ asset('vendors/stisla/js/custom.js') }}"></script>
    {{-- bs-select --}}
    <script src="{{ asset('vendors/bs-select/bootstrap-select.min.js')}}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('script')
</body>
</html>
