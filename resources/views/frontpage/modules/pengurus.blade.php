@extends('frontpage.layouts.app-frontpage')

@section('title', 'BERANDA')

@section('pageClass', 'about')
@section('content')

    {{-- Header --}}
    <header>
        <div class="container text-center">
            <h3 class="text-midnight text-dec text-dec-secondary-3 text-dec-tr font-extrabold mb-2">
                DIVISI DAN PENGURUS
            </h3>
            <h6 class="text-gray font-light">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat elementum
                consequat magna eu volutpat orci. Lacus bibendum vivamus nulla aliquet sed imperdiet
                id viverra. Lobortis aliquet est integer nibh ut elementumusto, in.
            </h6>
        </div>
    </header>
    {{-- End of Header --}}

    <section id="section-1">
        <div class="container">
            <div class="row gutters-xs gutters-lg-md justify-content-around justify-content-lg-center">
                <div class="col-12 mb-5">
                    <h4 class="text-midnight text-center font-extrabold mb-2">
                        BADAN PENGURUS HARIAN
                    </h4>
                </div>

                @for ($i = 0; $i < 3; $i++)
                    <div class="col-auto col-md-4 col-lg-3 mb-2">
                        <div class="card card-member shadow-midnight-sm">
                            <div class="card-body text-center">
                                <div class="img-wrapper">
                                    <img src="{{ asset('img/misc/member-placeholder.png') }}" alt="">
                                </div>
                                <div class="text-title">Aditya Ari F</div>
                                <div class="text-subtitle">Sekretaris</div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>

@endsection
