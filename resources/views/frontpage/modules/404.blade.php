@extends('_ui.frontpage.layouts.app-frontpage')

@section('title', 'Not Found')

@section('pageClass', 'notfound')
@section('content')

    <main class="text-center py-5 py-md-10">
        <div class="container">
            <h1 class="text-midnight font-boldest">
                Not Found
            </h1>

            <img src="{{ asset('img/illustration/404.svg') }}" alt="" class="w-75 w-md-50 my-5">

            <h5 class="text-gray font-semibold mb-3">
                Halaman yang anda cari tidak Dapat ditemukan
            </h5>
            <a href="" class="btn btn-primary">Menuju Beranda</a>
        </div>
    </main>

@endsection

@section('style')
    <style>

    </style>
@endsection

@section('script')
    <script>

    </script>
@endsection
