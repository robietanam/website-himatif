@extends('dashboard._layouts.app')

@section('title', 'Pengurus') {{-- title --}}
@section('header', 'Pengurus') {{-- header --}}

@section('breadcrumb') {{-- breadcrumb --}}
    <div class="breadcrumb-item active"><a href="#">Home</a></div>
@endsection {{-- end of breadcrumb --}}

@section('content') {{-- content --}}
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="img-fit img-fit-contain h-12rem h-md-18rem h-lg-24rem">
                <img src="{{ asset('img/illustration/pengurus.svg') }}" alt="Dashboard Pengurus Illustration" class="img-fluid">
            </div>

            <div class="text-18 text-md-24 text-lg-32 text-center font-weight-600">
                Selamat Datang kembali
                <br class="d-none d-md-block">
                Pengurus Himatif &#x1F973;
            </div>
        </div>
    </div>
@endsection {{-- end of content --}}
