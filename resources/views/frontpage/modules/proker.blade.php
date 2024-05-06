@extends('frontpage.layouts.app-frontpage')

@section('title', 'PROKER')

@section('pageClass', 'proker')
@section('content')
    <header>
        <div class="container mx-auto sm:px-4  text-center">
            <h3 class="text-midnight text-dec text-dec-secondary-3 text-dec-tr font-extrabold mb-2">
                {{ $header['1-text']->content }}
            </h3>
            <h6 class="text-gray font-light">
                {{ $header['2-text2']->content }}
            </h6>
        </div>
    </header>

    <section id="section-1">
        <div class="container mx-auto sm:px-4 ">
            <div class="flex flex-wrap ">
                @foreach ($prokers as $proker)
                    <div class="md:w-1/2 pr-4 pl-4 mb-3">
                        <div
                            class="card card-proker relative flex flex-col min-w-0 rounded-md break-words bg-white shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] h-full">
                            <div class="flex-auto p-6 h-full">
                                <div class="flex flex-wrap space-x-4 justify-center h-full">
                                    <div class="col-auto mb-2 lg:mb-0">
                                        <div class="rounded card-img flex items-center">
                                            @if ($proker->logo)
                                                <img class="h-auto w-fit" src="{{ asset('storage/' . $proker->logo) }}"
                                                    alt="">
                                            @else
                                                <img src="{{ asset('img/placeholder/product-image-default.svg') }}"
                                                    alt="">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="relative md:flex-grow md:flex-1 flex flex-col justify-between">
                                        <div class="flex-grow">
                                            <a href="{{ route('frontpage.proker.show', $proker->id) }}"
                                                class="text-midnight">
                                                <h5 class="font-semibold mb-1">{{ $proker->name }}</h5>
                                            </a>

                                            @if ($proker->is_registration_open === '1')
                                                <div
                                                    class="inline-block px-3 py-2 text-center font-semibold text-sm align-baseline leading-none rounded-md badge-lg bg-green-500 text-white hover:green-600 mb-2">
                                                    Pendaftaran Dibuka</div>
                                            @endif

                                            <p class="text-sm text-gray-500 mb-3">
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
