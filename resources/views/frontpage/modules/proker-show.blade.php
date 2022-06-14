@extends('frontpage.layouts.app-frontpage')

@section('title', 'PROKER DETAIL')

@section('pageClass', 'proker')
@section('content')
    <main class="py-5 py-md-6 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-gray mb-1">Detail Proker :</h6>
                            <h4 class="text-midnight font-semibold">{{ $proker->name }}</h4>

                            @if ($proker->is_registration_open === '1')
                                <div class="badge badge-lg badge-success">Pendaftaran Dibuka</div>
                            @endif

                            <div class="my-2">
                                <div class="img-fit img-fit-contain h-12rem w-12rem h-md-18rem w-md-18rem bg-light rounded-sm">
                                    @if ($proker->logo)
                                        <img src="{{ asset('storage/'.$proker->logo) }}" alt="">
                                    @else
                                        <img src="{{ asset('img/placeholder/product-image-default.svg') }}" alt="">
                                    @endif
                                </div>
                            </div>

                            <p class="text-12 text-md-14 text-gray">
                                {!! $proker->description !!}
                            </p>

                            @if ($proker->is_registration_open === '1')
                                <div class="row justify-content-end mt-3">
                                    <div class="col-auto">
                                        <a href="{{ $proker->link_registration }}" target="_blank" class="btn btn-gradient-primary">Daftar Sekarang</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
