@extends('frontpage.layouts.app-frontpage')

@php
    $timeline_active = -1;

@endphp

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

                            <div class="my-2 ">
                                <div
                                    class="img-fit img-fit-contain h-12rem w-12rem h-md-18rem w-md-18rem bg-light rounded-sm">
                                    @if ($proker->logo)
                                        <img src="{{ asset('storage/' . $proker->logo) }}" alt="">
                                    @else
                                        <img src="{{ asset('img/placeholder/product-image-default.svg') }}" alt="">
                                    @endif
                                </div>

                            </div>

                            <p class="text-12 text-md-14 text-gray">
                                {!! $proker->description !!}
                            </p>
                            <div class="d-flex justify-content-between mt-3">
                                <div class="d-flex">
                                    @if (isset($proker->link_instagram) && !empty($proker->link_instagram))
                                        <div class="col-auto mr-1">
                                            <a target="_blank" href="//{{ $proker->link_instagram }} "
                                                class="btn btn-outline-danger">

                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15"
                                                    fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334">
                                                    </path>
                                                </svg>
                                                Instagram
                                            </a>
                                        </div>
                                    @endif

                                    @if (isset($proker->link_contact_person) && !empty($proker->link_contact_person))
                                        <div class="col-auto">
                                            <a target="_blank"
                                                href="//wa.me/+62{{ substr($proker->link_contact_person, 1) }} "
                                                class="btn btn-success">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                                    <path
                                                        d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232">
                                                    </path>
                                                </svg>
                                                Contact Person
                                            </a>
                                        </div>
                                    @endif
                                </div>

                                <div class="d-flex">
                                    @if (isset($proker->link_storage_certificate) && !empty($proker->link_storage_certificate))
                                        <div class="col-auto mr-1">
                                            <a target="_blank" href="{{ $proker->link_storage_certificate }} "
                                                class="btn btn-gradient-primary"> Sertifikat </a>
                                        </div>
                                    @endif

                                    @if ($proker->is_registration_open === '1')
                                        <div class="col-auto">
                                            <a href="{{ $proker->link_registration }}" target="_blank"
                                                class="btn btn-gradient-primary">Daftar Sekarang</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                    @if ($proker->is_timeline_open)
                        <div class="accordion  mt-2" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                        aria-controls="panelsStayOpen-collapseOne">

                                        <h6 class="mt-1 p-1">Timeline {{ $proker->name === 'ITEC' ? 'UI/UX' : '' }}</h6>
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="panelsStayOpen-headingOne">
                                    <div class="accordion-body">

                                        @foreach ($proker->timeline as $key => $timeline)
                                            @if (date('Y-m-d H:i:s') < date('Y-m-d H:i:s', strtotime($timeline[2])))
                                                @php
                                                    if ($timeline_active == -1) {
                                                        $timeline_active = $key;
                                                    }
                                                @endphp

                                                @if ($key == $timeline_active)
                                                    <div class="tl-item active">
                                                        <div class="tl-dot b-primary"></div>
                                                        <div class="tl-content">

                                                            <div class="">{{ $timeline[0] }}</div>
                                                            @if (date('d-m-Y', strtotime($timeline[2])) === date('d-m-Y', strtotime($timeline[1])))
                                                                <div class="tl-date text-muted mt-1">
                                                                    {{ tgl_indo(date('d-m-Y', strtotime($timeline[2]))) }}
                                                                </div>
                                                            @else
                                                                <div class="tl-date text-muted mt-1">

                                                                    {{ tgl_indo(date(date('Y', strtotime($timeline[1])) == date('Y', strtotime($timeline[2])) ? 'd-m ' : 'd-m-Y', strtotime($timeline[1]))) }}
                                                                    -
                                                                    {{ tgl_indo(date('d-m-Y', strtotime($timeline[2]))) }}
                                                                </div>
                                                            @endif

                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="tl-item">
                                                        <div class="tl-dot b-warning"></div>
                                                        <div class="tl-content">

                                                            <div class="">{{ $timeline[0] }}</div>
                                                            @if (date('d-m-Y', strtotime($timeline[2])) === date('d-m-Y', strtotime($timeline[1])))
                                                                <div class="tl-date text-muted mt-1">
                                                                    {{ tgl_indo(date('d-m-Y', strtotime($timeline[2]))) }}
                                                                </div>
                                                            @else
                                                                <div class="tl-date text-muted mt-1">

                                                                    {{ tgl_indo(date(date('Y', strtotime($timeline[1])) == date('Y', strtotime($timeline[2])) ? 'd-m ' : 'd-m-Y', strtotime($timeline[1]))) }}
                                                                    -
                                                                    {{ tgl_indo(date('d-m-Y', strtotime($timeline[2]))) }}
                                                                </div>
                                                            @endif

                                                        </div>
                                                    </div>
                                                @endif
                                            @else
                                                <div class="tl-item">
                                                    <div class="tl-dot b-danger"></div>

                                                    <div class="tl-content">

                                                        <div class="">{{ $timeline[0] }}</div>
                                                        @if (date('d-m-Y', strtotime($timeline[2])) === date('d-m-Y', strtotime($timeline[1])))
                                                            <div class="tl-date text-muted mt-1">
                                                                {{ tgl_indo(date('d-m-Y', strtotime($timeline[2]))) }}
                                                            </div>
                                                        @else
                                                            <div class="tl-date text-muted mt-1">

                                                                {{ tgl_indo(date(date('Y', strtotime($timeline[1])) == date('Y', strtotime($timeline[2])) ? 'd-m ' : 'd-m-Y', strtotime($timeline[1]))) }}
                                                                -
                                                                {{ tgl_indo(date('d-m-Y', strtotime($timeline[2]))) }}
                                                            </div>
                                                        @endif

                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @if ($proker->name === 'ITEC')
                                <div class="accordion  mt-2" id="accordionPanelsStayOpenExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                                aria-controls="panelsStayOpen-collapseOne">

                                                <h6 class="mt-1 p-1">Timeline Data Mining</h6>
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                            aria-labelledby="panelsStayOpen-headingOne">
                                            <div class="accordion-body">
                                                @php
                                                    $sementara = [['Pendaftaran dan Pengumpulan Proposal Full Paper', '2024-02-24T17:05', '2024-03-18T19:18'], ['Pengumuman lolos/Babak Final', '2024-03-25T19:30', '2024-03-25T19:30'], ['TM dan Pengundian Nomor Urut', '2024-03-29T09:31', '2024-03-29T09:31'], ['Final dan Presentasi', '2024-03-30T09:31', '2024-03-30T09:31']];
                                                @endphp
                                                @foreach ($sementara as $key => $timeline)
                                                    @if (date('Y-m-d H:i:s') < date('Y-m-d H:i:s', strtotime($timeline[2])))
                                                        @php
                                                            if ($timeline_active == -1) {
                                                                $timeline_active = $key;
                                                            }
                                                        @endphp

                                                        @if ($key == $timeline_active)
                                                            <div class="tl-item active">
                                                                <div class="tl-dot b-primary"></div>
                                                                <div class="tl-content">

                                                                    <div class="">{{ $timeline[0] }}</div>
                                                                    @if (date('d-m-Y', strtotime($timeline[2])) === date('d-m-Y', strtotime($timeline[1])))
                                                                        <div class="tl-date text-muted mt-1">
                                                                            {{ tgl_indo(date('d-m-Y', strtotime($timeline[2]))) }}
                                                                        </div>
                                                                    @else
                                                                        <div class="tl-date text-muted mt-1">

                                                                            {{ tgl_indo(date(date('Y', strtotime($timeline[1])) == date('Y', strtotime($timeline[2])) ? 'd-m ' : 'd-m-Y', strtotime($timeline[1]))) }}
                                                                            -
                                                                            {{ tgl_indo(date('d-m-Y', strtotime($timeline[2]))) }}
                                                                        </div>
                                                                    @endif

                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="tl-item">
                                                                <div class="tl-dot b-warning"></div>
                                                                <div class="tl-content">

                                                                    <div class="">{{ $timeline[0] }}</div>
                                                                    @if (date('d-m-Y', strtotime($timeline[2])) === date('d-m-Y', strtotime($timeline[1])))
                                                                        <div class="tl-date text-muted mt-1">
                                                                            {{ tgl_indo(date('d-m-Y', strtotime($timeline[2]))) }}
                                                                        </div>
                                                                    @else
                                                                        <div class="tl-date text-muted mt-1">

                                                                            {{ tgl_indo(date(date('Y', strtotime($timeline[1])) == date('Y', strtotime($timeline[2])) ? 'd-m ' : 'd-m-Y', strtotime($timeline[1]))) }}
                                                                            -
                                                                            {{ tgl_indo(date('d-m-Y', strtotime($timeline[2]))) }}
                                                                        </div>
                                                                    @endif

                                                                </div>
                                                            </div>
                                                        @endif
                                                    @else
                                                        <div class="tl-item">
                                                            <div class="tl-dot b-danger"></div>

                                                            <div class="tl-content">

                                                                <div class="">{{ $timeline[0] }}</div>
                                                                @if (date('d-m-Y', strtotime($timeline[2])) === date('d-m-Y', strtotime($timeline[1])))
                                                                    <div class="tl-date text-muted mt-1">
                                                                        {{ tgl_indo(date('d-m-Y', strtotime($timeline[2]))) }}
                                                                    </div>
                                                                @else
                                                                    <div class="tl-date text-muted mt-1">

                                                                        {{ tgl_indo(date(date('Y', strtotime($timeline[1])) == date('Y', strtotime($timeline[2])) ? 'd-m ' : 'd-m-Y', strtotime($timeline[1]))) }}
                                                                        -
                                                                        {{ tgl_indo(date('d-m-Y', strtotime($timeline[2]))) }}
                                                                    </div>
                                                                @endif

                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                            @endif
                    @endif

                    @if ($proker->dokumentasi && $proker->is_dokumentasi_open)
                        <div class="accordion-item mt-2">
                            <h2 class="accordion-header" id="galeri">
                                <button class="accordion-button " type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseGaleri" aria-expanded="false"
                                    aria-controls="collapseGaleri">
                                    <h6 class="mt-1 p-1">Galeri</h6>
                                </button>
                            </h2>
                            <div id="collapseGaleri" class="accordion-collapse collapse show" aria-labelledby="galeri"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">

                                    <div id="carouselExampleIndicators" class="carousel carousel-dark slide"
                                        data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleIndicators" data-slide-to="0"
                                                class="active">
                                            </li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            @foreach ($proker->dokumentasi as $key => $dokumentasi)
                                                <div
                                                    class="carousel-item @if ($key == 0) active @endif ">
                                                    <img class="image-coursel"
                                                        src="{{ asset('storage/' . $dokumentasi) }}"
                                                        alt="Dokumetasi {{ $key }}">
                                                </div>
                                            @endforeach

                                        </div>
                                        <a class="carousel-control-prev " href="#carouselExampleIndicators"
                                            role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                            data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>

                                </div>
                            </div>

                    @endif
                </div>
            </div>
        </div>
        </div>
        </div>
    </main>

    <style>
        @media (min-width:992px) {
            .page-container {
                max-width: 1140px;
                margin: 0 auto
            }

            .page-sidenav {
                display: block !important
            }
        }

        .image-coursel {
            display: block;
            width: auto;
            height: 360px;
            margin-left: auto;
            margin-right: auto;
        }

        .carousel-control-prev:hover {
            background-color: #5555552c;
            color: #fff;
        }

        .carousel-control-next:hover {
            background-color: #5555552c;
            color: #fff;
        }

        .padding {
            padding: 2rem
        }

        .w-32 {
            width: 32px !important;
            height: 32px !important;
            font-size: .85em
        }

        .tl-item .avatar {
            z-index: 2
        }

        .circle {
            border-radius: 500px
        }

        .gd-warning {
            color: #fff;
            border: none;
            background: #f4c414 linear-gradient(45deg, #f4c414, #f45414)
        }

        .timeline {
            position: relative;
            border-color: rgba(160, 175, 185, .15);
            padding: 0;
            margin: 0
        }

        .p-4 {
            padding: 1.5rem !important
        }

        .block,
        .card {
            background: #fff;
            border-width: 0;
            border-radius: .25rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .05);
            margin-bottom: 1.5rem
        }

        .mb-4,
        .my-4 {
            margin-bottom: 1.5rem !important
        }

        .tl-item {
            border-radius: 3px;
            position: relative;
            display: -ms-flexbox;
            display: flex
        }

        .tl-item>* {
            padding: 10px
        }

        .tl-item .avatar {
            z-index: 2
        }

        .tl-item:last-child .tl-dot:after {
            display: none
        }

        .tl-item.active .tl-dot:before {
            border-color: #448bff;
            box-shadow: 0 0 0 4px rgba(68, 139, 255, .2)
        }

        .tl-item:last-child .tl-dot:after {
            display: none
        }

        .tl-item.active .tl-dot:before {
            border-color: #448bff;
            box-shadow: 0 0 0 4px rgba(68, 139, 255, .2)
        }

        .tl-dot {
            position: relative;
            border-color: rgba(160, 175, 185, .15)
        }

        .tl-dot:after,
        .tl-dot:before {
            content: '';
            position: absolute;
            border-color: inherit;
            border-width: 2px;
            border-style: solid;
            border-radius: 50%;
            width: 10px;
            height: 10px;
            top: 15px;
            left: 50%;
            transform: translateX(-50%)
        }

        .tl-dot:after {
            width: 0;
            height: auto;
            top: 25px;
            bottom: -15px;
            border-right-width: 0;
            border-top-width: 0;
            border-bottom-width: 0;
            border-radius: 0
        }

        tl-item.active .tl-dot:before {
            border-color: #448bff;
            box-shadow: 0 0 0 4px rgba(68, 139, 255, .2)
        }

        .tl-dot {
            position: relative;
            border-color: rgba(160, 175, 185, .15)
        }

        .tl-dot:after,
        .tl-dot:before {
            content: '';
            position: absolute;
            border-color: inherit;
            border-width: 2px;
            border-style: solid;
            border-radius: 50%;
            width: 10px;
            height: 10px;
            top: 15px;
            left: 50%;
            transform: translateX(-50%)
        }

        .tl-dot:after {
            width: 0;
            height: auto;
            top: 25px;
            bottom: -15px;
            border-right-width: 0;
            border-top-width: 0;
            border-bottom-width: 0;
            border-radius: 0
        }

        .tl-content p:last-child {
            margin-bottom: 0
        }

        .tl-date {
            font-size: .85em;
            margin-top: 2px;
            min-width: 100px;
            max-width: 200px
        }

        .avatar {
            position: relative;
            line-height: 1;
            border-radius: 500px;
            white-space: nowrap;
            font-weight: 700;
            border-radius: 100%;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-pack: center;
            justify-content: center;
            -ms-flex-align: center;
            align-items: center;
            -ms-flex-negative: 0;
            flex-shrink: 0;
            border-radius: 500px;
            box-shadow: 0 5px 10px 0 rgba(50, 50, 50, .15)
        }

        .b-warning {
            border-color: #f4c414 !important;
        }

        .b-primary {
            border-color: #448bff !important;
        }

        .b-danger {
            border-color: #f54394 !important;
        }
    </style>
@endsection
