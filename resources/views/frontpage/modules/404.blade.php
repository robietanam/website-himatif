@extends('_ui.frontpage.layouts.app-frontpage')

@section('title', 'Not Found')

@section('pageClass', 'notfound')
@section('content')

    <main class="text-center py-5 py-md-10">
        <div class="container mx-auto sm:px-4 ">
            <h1 class="text-midnight font-boldest">
                Not Found
            </h1>

            <img src="{{ asset('img/illustration/404.svg') }}" alt="" class="w-3/4 w-md-50 my-5">

            <h5 class="text-gray font-semibold mb-3">
                Halaman yang anda cari tidak Dapat ditemukan
            </h5>
            <a href=""
                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600">Menuju
                Beranda</a>
        </div>
    </main>

@endsection

@section('style')
    <style>

    </style>
@endsection

@section('script')
    <script></script>
@endsection
