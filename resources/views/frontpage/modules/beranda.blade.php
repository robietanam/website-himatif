@extends('frontpage.layouts.app-frontpage')

@section('title', 'BERANDA')

@section('pageClass', 'homepage')
@section('content')

    {{-- Header --}}
    <header>
        <div class="container">
            <div class="row mb-5 mb-lg-10 justify-content-center text-center text-lg-left">
                <div class="col-lg-6 order-2 order-lg-1">
                    <h3
                        class="text-dec text-dec-secondary-1 text-dec-tl text-midnight font-extrabold mb-2 d-none d-lg-block">
                        {{ $header['1-text']->content }}
                    </h3>
                    <p class="text-gray font-semibold mb-3">
                        {{ $header['2-text2']->content }}
                    </p>

                    <div class="row">
                        <div class="col-xl-10">
                            <div class="card card-marquee">
                                <div class="card-body">
                                    <div class="row gutters-xs align-items-center">
                                        <div class="col-auto">
                                            <div class="badge badge-pill badge-lg badge-info">
                                                {{ $header['4-marquee_tag']->content }}
                                            </div>
                                        </div>
                                        <div class="col">
                                            <marquee direction="left">
                                                {!! $header['5-marquee_info']->content !!}
                                            </marquee>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-8 col-lg-6 order-1 order-lg-2 mb-3 mb-lg-0 pt-3">
                    <h3 class="text-dec text-dec-secondary-1 text-dec-tl text-midnight font-extrabold mb-2 d-lg-none">
                        HIMPUNAN MAHASISWA TEKNOLOGI INFORMASI
                    </h3>
                    @if (file_exists(storage_path('app/public/' . $header['3-photo']->content)))
                        <div class="header-img">
                            <img src="{{ asset('storage/' . $header['3-photo']->content) }}" alt=""
                                class="img-fluid">
                        </div>
                    @else
                        <div class="header-img">
                            <img src="{{ asset('img/' . $header['3-photo']->content) }}" alt="" class="img-fluid">
                        </div>
                    @endif
                </div>
            </div>

            <div class="row pt-5">
                <div class="col-12 text-center mb-5">
                    <h3 class="text-dec text-dec-secondary-2 text-dec-tl text-midnight font-extrabold mb-2">
                        {{ $section2['text']->content }}
                    </h3>
                    <h6 class="text-gray font-semibold">
                        {{ $section2['text2']->content }}
                    </h6>
                </div>

                <div class="col-lg-4 mb-3 mb-lg-0">
                    <div class="card shadow-warning-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <img src="{{ asset('img/icons/pencil-warning.svg') }}" alt=""
                                        class="w-3rem w-lg-5rem">
                                </div>
                                <div class="col">
                                    <h6 class="text-midnight font-bold">
                                        {{ $section2['card1_text']->content }}
                                    </h6>
                                    <div class="text-gray">
                                        {{ $section2['card1_text2']->content }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-3 mb-lg-0 mt-lg-3">
                    <div class="card shadow-info-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <img src="{{ asset('img/icons/list-info.svg') }}" alt=""
                                        class="w-3rem w-lg-5rem">
                                </div>
                                <div class="col">
                                    <h6 class="text-midnight font-bold">
                                        {{ $section2['card2_text']->content }}
                                    </h6>
                                    <div class="text-gray">
                                        {{ $section2['card2_text2']->content }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-3 mb-lg-0 mt-lg-5">
                    <div class="card shadow-secondary-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <img src="{{ asset('img/icons/graduate-secondary.svg') }}" alt=""
                                        class="w-3rem w-lg-5rem">
                                </div>
                                <div class="col">
                                    <h6 class="text-midnight font-bold">
                                        {{ $section2['card3_text']->content }}
                                    </h6>
                                    <div class="text-gray">
                                        {{ $section2['card3_text2']->content }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    {{-- End of Header --}}

    {{-- Section 1 : Tentang --}}
    <section id="section-1">
        <div class="container">
            <div class="row justify-content-center justify-content-lg-around text-center text-lg-left">
                <div class="col-auto col-lg-5 mb-3 mb-lg-0">
                    <h3 class="text-dec text-dec-info-2 text-dec-tl text-midnight font-extrabold mb-2 d-lg-none">
                        TENTANG HIMATIF
                    </h3>
                    <div class="img-wrapper-about">
                        @for ($i = 1; $i <= 3; $i++)
                            @if (file_exists(storage_path('app/public/' . $section3["image$i"]->content)))
                                <div class="img-about">
                                    <img src="{{ asset('storage/' . $section3["image$i"]->content) }}" alt="">
                                </div>
                            @else
                                <div class="img-about">
                                    <img src="{{ asset('img/' . $section3["image$i"]->content) }}" alt="">
                                </div>
                            @endif
                        @endfor
                    </div>
                </div>
                <div class="col-lg-5">
                    <h3
                        class="text-dec text-dec-info-2 text-dec-tl text-midnight font-extrabold mb-2 d-none d-lg-inline-block">
                        TENTANG HIMATIF
                    </h3>
                    <p class="text-gray mb-2">
                        HIMATIF (Himpunan Mahasiswa Teknologi Informasi) adalah Salah satu Organisasi Mahasiswa di Fakultas
                        Ilmu Komputer Universitas Jember. Terbentuknya HIMATIF dirintis oleh 7 Orang Mahasiswa Teknologi
                        Informasi pada tanggal 6 Agustus 2017.
                    </p>
                    <a href="{{ route('frontpage.about') }}" class="btn btn-gradient-primary">Lihat Lebih Lengkap</a>
                </div>
            </div>
        </div>
    </section>
    {{-- End of Section 1 : Tentang --}}

    {{-- Section 2 : Visi & Misi --}}
    <section id="section-2">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h3 class="text-dec text-dec-info-1 text-dec-tr text-midnight font-extrabold mb-2">
                        {{ $visionMission['1-text']->content }}
                    </h3>
                    <p class="text-gray">
                        {{ $visionMission['2-text2']->content }}
                    </p>
                </div>
                @php
                    $dataKeysVisionMission = ['3-vision', '4-mission'];
                @endphp
                @foreach ($dataKeysVisionMission as $key)
                    <div class="col-lg-6 mb-3 mb-lg-0">
                        <div class="card card-vision shadow-midnight-sm">
                            <div class="card-body">
                                <div class="row no-gutters">
                                    <div class="col-lg-4">
                                        @if (file_exists(storage_path('app/public/' . $visionMission[$key . '_photo']->content)))
                                            <div class="img-fit img-fit-cover h-20rem">
                                                <img src="{{ asset('storage/' . $visionMission[$key . '_photo']->content) }}"
                                                    alt="">
                                            </div>
                                        @else
                                            <div class="img-fit img-fit-cover h-20rem">
                                                <img src="{{ asset('img/' . $visionMission[$key . '_photo']->content) }}"
                                                    alt="">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg p-2 p-lg-3">
                                        <h5 class="text-midnight text-shadowed font-extrabold">
                                            {{ $visionMission[$key . '_text']->content }}
                                            <span
                                                class="text-shadowed-content">{{ $visionMission[$key . '_text']->content }}</span>
                                        </h5>
                                        <div class="divider my-2"></div>
                                        <div class="text-gray">
                                            {!! $visionMission[$key . '_text2']->content !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- End of Section 2 : Visi & Misi --}}

    {{-- Section 3 : Divisi --}}
    <section id="section-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center mb-5">
                    <h3 class="text-dec text-dec-warning-1 text-dec-tl text-white font-extrabold mb-2">
                        PENGURUS HIMATIF
                    </h3>
                    <h6 class="text-light">
                        Pengurus HIMATIF terbagi atas beberapa divisi dengan
                        tugas pokok dan tanggung jawab masing-masing
                    </h6>
                </div>

                @php
                    $divisions = [
                        [
                            'shortname' => 'bph',
                            'name' => 'Badan Pengurus Harian',
                            'content' => 'BPH Terdisi atas Ketua Umum, Sekretaris Umum dan Bendahara Umum',
                        ],
                        [
                            'shortname' => 'psdm',
                            'name' => 'Pengembangan Sumber Daya Mahasiswa',
                            'content' => 'Pengembangan dan pemberdayaan akademik dan softskill mahasiswa serta untuk menciptakan mahasiswa berkompeten dan unggul',
                        ],
                        [
                            'shortname' => 'litbang',
                            'name' => 'Penelitian dan Pengembangan',
                            'content' => 'Melakukan penelitian untuk mendapatkan hasil optimal dalam pengembangan mahasiswa teknologi informasi',
                        ],
                        [
                            'shortname' => 'humas',
                            'name' => 'Hubungan Masyarakat',
                            'content' => 'Media komunikasi antara HIMATIF birokrasi, organisasi lain, instansi, maupun masyarakat umum dan menjadi penghubung antara himatif dengan mahasiswa teknologi informasi secara langsung',
                        ],
                        [
                            'shortname' => 'mediatek',
                            'name' => 'Media Teknologi',
                            'content' => 'Media informasi dan komunikasi seputar teknologi informasi serta media pengembang teknologi HIMATIF',
                        ],
                    ];
                @endphp

                @foreach ($divisions as $i => $division)
                    <div class="col-md-6 col-xl-4 mb-3 mb-md-5">
                        <div class="row gutters-xs justify-content-center text-center text-lg-left">
                            <div class="col-auto mb-1 mb-lg-0">
                                <img src="{{ asset('img/icons/' . $division['shortname'] . '-secondary.svg') }}"
                                    alt="" class="img-fluid">
                            </div>
                            <div class="col-lg pl-lg-1">
                                <h5 class="text-white font-bold mb-1">{{ $division['name'] }}</h5>
                                <p class="text-light">
                                    {{-- {{ strlen($division['content']) > 85 ? substr($division['content'], 0, 85) . '...' : $division['content'] }} --}}
                                    {{ $division['content'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    {{-- End of Section 3 : Divisi --}}

    {{-- Section 4 : Proker --}}
    <section id="section-4">
        <div class="container">
            <h3 class="text-dec text-dec-info-1 text-dec-tr text-midnight font-extrabold mb-2">
                PROGRAM KERJA
            </h3>
            <h6 class="text-gray mb-2">Program Kerja Himatif tahun 2023/2024</h6>

            <div class="row justify-content-between op-5">
                <div class="col-auto">
                    <i id="slick-proker-prev" class="far fa-arrow-alt-circle-left text-gray"></i>
                </div>
                <div class="col-auto">
                    <i id="slick-proker-next" class="far fa-arrow-alt-circle-right text-gray"></i>
                </div>
            </div>

            <div class="row" id="slick-proker-row">
                @foreach ($prokers as $proker)
                    <div class="col-lg my-3 my-md-4">
                        <div class="card card-proker border border-light shadow-gray-sm h-100">
                            <div class="card-body w-100 h-100">
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

                                        <a href="{{ route('frontpage.proker.show', $proker->id) }}"
                                            class="text-gray">Lihat Detail <i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- End of Section 4 : Proker --}}

    {{-- Section 5 : Galerry --}}
    <section id="section-5">
        <div class="container">
            <div id="row-gallery" class="row gutters-xs">
                <div class="col-12 text-right mb-3 mb-md-5">
                    <h3 class="text-dec text-dec-info-1 text-dec-tr text-midnight font-extrabold mb-2">
                        GALERI KEGIATAN
                    </h3>
                    <h6 class="text-gray mb-2">Dokumentasi kegiatan HIMATIF terbaru</h6>
                </div>

                <div class="col-lg-6 mb-1 mb-lg-0">
                    @if (file_exists(storage_path('app/public/' . $gallery['1-image1']->content)))
                        <div data-src="{{ asset('storage/' . $gallery['1-image1']->content) }}"
                            class="img-gallery img-gallery-main">
                            <img src="{{ asset('storage/' . $gallery['1-image1']->content) }}" class="img-fluid"
                                alt="">
                        </div>
                    @else
                        <div data-src="{{ asset('img/' . $gallery['1-image1']->content) }}"
                            class="img-gallery img-gallery-main">
                            <img src="{{ asset('img/' . $gallery['1-image1']->content) }}" class="img-fluid"
                                alt="">
                        </div>
                    @endif
                </div>
                <div class="col-lg-6">
                    <div class="row gutters-xs">
                        @for ($i = 2; $i <= 5; $i++)
                            <div class="col-6 mb-1">
                                @if (file_exists(storage_path('app/public/' . $gallery["$i-image$i"]->content)))
                                    <div data-src="{{ asset('storage/' . $gallery["$i-image$i"]->content) }}"
                                        class="img-gallery">
                                        <img src="{{ asset('storage/' . $gallery["$i-image$i"]->content) }}"
                                            alt="" class="img-fluid">
                                    </div>
                                @else
                                    <div data-src="{{ asset('img/' . $gallery["$i-image$i"]->content) }}"
                                        class="img-gallery">
                                        <img src="{{ asset('img/' . $gallery["$i-image$i"]->content) }}" alt=""
                                            class="img-fluid">
                                    </div>
                                @endif
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End of Section 5 : Galerry --}}

@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <!-- Lightgallery -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css"
        integrity="sha512-kwJUhJJaTDzGp6VTPBbMQWBFUof6+pv0SM3s8fo+E6XnPmVmtfwENK0vHYup3tsYnqHgRDoBDTJWoq7rnQw2+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        #slick-proker-prev,
        #slick-proker-next {
            transition: all .3s ease;
            font-size: 2.4rem;
            cursor: pointer;
        }

        #slick-proker-prev:hover,
        #slick-proker-next:hover {
            font-size: 2.6rem;
        }

        .slick-track {
            margin-left: unset;
            margin-right: unset;
        }
    </style>
@endsection

@section('script')
    {{-- Slick --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    {{-- Light Gallery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"
        integrity="sha512-b4rL1m5b76KrUhDkj2Vf14Y0l1NtbiNXwV+SzOzLGv6Tz1roJHa70yr8RmTUswrauu2Wgb/xBJPR8v80pQYKtQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(function() {
            lightGallery(document.getElementById('row-gallery'), {
                mode: 'lg-fade',
                cssEasing: 'ease-in',
                speed: 1000,
                startClass: 'lg-fade',
                backdropDuration: 500,
                hideBarsDelay: 500,
                selector: '[data-src]',
                download: false,
            });
            $('#slick-proker-row').slick({
                infinite: true,
                autoplay: true,
                pauseOnDotsHover: true,
                slidesToShow: 2,
                slidesToScroll: 2,
                autoplay: true,
                dots: false,
                prevArrow: $('#slick-proker-prev'),
                nextArrow: $('#slick-proker-next'),
                responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }]
            });
        })
    </script>
@endsection
