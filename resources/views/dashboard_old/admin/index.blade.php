@extends('dashboard._layouts.app')

@section('title', 'Admin') {{-- title --}}
@section('header', 'Admin') {{-- header --}}

@section('breadcrumb') {{-- breadcrumb --}}
    <div class="inline-block px-2 py-2 text-gray-700 active">Dashboard</div>
@endsection {{-- end of breadcrumb --}}

@section('content') {{-- content --}}

    <div class="flex flex-wrap  justify-center">
        <div class="lg:w-2/3 pr-4 pl-4">
            <div class="img-fit img-fit-contain h-12rem h-md-18rem h-lg-24rem">
                <img src="{{ asset('img/illustration/admin.svg') }}" alt="Dashboard Pengurus Illustration" class="max-w-full h-auto">
            </div>

            <div class="text-18 text-md-24 text-lg-32 text-center font-weight-600">
                Selamat Datang kembali
                <br class="hidden md:block">
                Admin Himatif &#x1F973;
            </div>
        </div>
    </div>

@endsection {{-- end of content --}}
