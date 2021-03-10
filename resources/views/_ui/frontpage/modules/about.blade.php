@extends('_ui.frontpage.layouts.app-frontpage')

@section('title', 'ABOUT US')

@section('pageClass', 'about')
@section('content')

    {{-- Header --}}
    <header>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center mb-7">
                    <h1 class="text-midnight font-extrabold mb-3">Not Found</h1>
                </div>
                <div class="justify-content-center mb-8">
                    <img src="{{ asset('img/misc/404.png') }}" alt="">
                </div>
                <div class="col-8 text-center mb-5">
                    <h5 class="text-gray font-bold">Terima kasih, atas antusias untuk menggunakan halaman ini, tapi maaf halaman ini masih perbaikan</h5>
                </div>
                <div class="col-8 text-center mb-5">
                    <a href="" class="btn btn-primary">Menuju Beranda</a>
                </div>
            </div>
        </div>
    </header>
    {{-- End of Header --}}

@endsection
