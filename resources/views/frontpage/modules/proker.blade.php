@extends('frontpage.layouts.app-frontpage')

@section('title', 'PROKER')

@section('pageClass', 'proker')
@section('content')
    <header>
        <div class="container text-center">
            <h3 class="text-midnight text-dec text-dec-secondary-3 text-dec-tr font-extrabold mb-2">
                {{ $header['1-text']->content }}
            </h3>
            <h6 class="text-gray font-light">
                {{ $header['2-text2']->content }}
            </h6>
        </div>
    </header>

    <section id="section-1">
        <div class="container">
            <div class="row">
                @foreach ($prokers as $proker)
                    <div class="col-md-6 mb-3">
                        <div class="card card-proker border border-light shadow-gray-sm h-100">
                            <div class="card-body h-100">
                                <div class="row justify-content-center h-100">
                                    <div class="col-auto mb-2 mb-lg-0">
                                        <div class="card-img">
                                            @if ($proker->logo)
                                                <img src="{{ asset('storage/' . $proker->logo) }}" alt="">
                                            @else
                                                <img src="{{ asset('img/placeholder/product-image-default.svg') }}"
                                                    alt="">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md d-flex flex-column justify-content-between">
                                        <div class="flex-grow-1">
                                            <a href="{{ route('frontpage.proker.show', $proker->id) }}"
                                                class="text-midnight">
                                                <h5 class="font-semibold mb-1">{{ $proker->name }}</h5>
                                            </a>

                                            @if ($proker->is_registration_open === '1')
                                                <div class="badge badge-lg badge-success mb-2">Pendaftaran Dibuka</div>
                                            @endif

                                            <p class="text-12 text-md-14 text-gray mb-3">
                                                {{ substr(strip_tags($proker->description), 0, 80) . (strlen(strip_tags($proker->description)) > 80 ? '...' : '') }}
                                            </p>
                                        </div>

                                        <a href="{{ route('frontpage.proker.show', $proker->id) }}" class="text-gray">Lihat
                                            Detail <i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('style')
    <style>

    </style>
@endsection

@section('script')
    <script></script>
@endsection
