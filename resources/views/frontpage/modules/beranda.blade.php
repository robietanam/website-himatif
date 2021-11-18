@extends('frontpage.layouts.app-frontpage')

@section('title', 'BERANDA')

@section('pageClass', 'homepage')
@section('content')

    {{-- Header --}}
    <header>
        <div class="container">
            <div class="row mb-5 mb-lg-10 justify-content-center text-center text-lg-left">
                <div class="col-lg-6 order-2 order-lg-1">
                    <h3 class="text-dec text-dec-secondary-1 text-dec-tl text-midnight font-extrabold mb-2 d-none d-lg-block">
                        HIMPUNAN MAHASISWA TEKNOLOGI INFORMASI
                    </h3>
                    <p class="text-gray font-semibold mb-3">HIMATIF (Himpunan Mahasiswa Teknologi Informasi) adalah salah satu organisasi mahasiswa di Fakultas Ilmu Komputer, Universitas Jember yang memiliki tujuan pokok meningkatkan kualitas Sumber Daya Mahasiswa Teknologi Informasi.</p>

                    <div class="row">
                        <div class="col-xl-10">
                            <div class="card card-marquee">
                                <div class="card-body">
                                    <div class="row gutters-xs align-items-center">
                                        <div class="col-auto">
                                            <div class="badge badge-pill badge-lg badge-info"><span class="d-none d-md-inline">Info</span> Terbaru</div>
                                        </div>
                                        <div class="col">
                                            <marquee direction="left">
                                                Open Recruitment Pengurus Baru HIMATIF Periode 2021/2022.
                                                <a href="https://bit.ly/OprecHMTF" target="_blank"><b>Join now!</b></a>
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
                    <div class="header-img">
                        <img src="{{ asset('img/misc/header-homepage.png') }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>

            <div class="row pt-5">
                <div class="col-12 text-center mb-5">
                    <h3 class="text-dec text-dec-secondary-2 text-dec-tl text-midnight font-extrabold mb-2">
                        APA YANG KAMI LAKUKAN
                    </h3>
                    <h6 class="text-gray font-semibold">Kami Berfokus pada pengembangan kualitas Sumber Daya Mahasiswa Teknologi Informasi</h6>
                </div>

                <div class="col-lg-4 mb-3 mb-lg-0">
                    <div class="card shadow-warning-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <img src="{{ asset('img/icons/pencil-warning.svg') }}" alt="" class="w-3rem w-lg-5rem">
                                </div>
                                <div class="col">
                                    <h6 class="text-midnight font-bold">Menyusun Proker</h6>
                                    <div class="text-gray">
                                        Program kerja dibuat dan dikelola oleh masing-masing divisi di HIMATIF sesuai ruang lingkup masing masing
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
                                    <img src="{{ asset('img/icons/list-info.svg') }}" alt="" class="w-3rem w-lg-5rem">
                                </div>
                                <div class="col">
                                    <h6 class="text-midnight font-bold">Melaksanakan Proker</h6>
                                    <div class="text-gray">
                                        Program kerja yang telah dirancang, dilaksanakan dan diikuti oleh seluruh elemen di HIMATIF
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
                                    <img src="{{ asset('img/icons/graduate-secondary.svg') }}" alt="" class="w-3rem w-lg-5rem">
                                </div>
                                <div class="col">
                                    <h6 class="text-midnight font-bold">
                                        Meningkatkan Kualitas
                                        Sumber Daya Mahasiswa
                                    </h6>
                                    <div class="text-gray">
                                        Output yang diharapkan pada setiap proker yaitu meningkatnya kualitas Sumber Daya Mahasiswa HIMATIF
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
                        <div class="img-about">
                            <img src="{{ asset('img/misc/about-3.png') }}" alt="">
                        </div>
                        <div class="img-about">
                            <img src="{{ asset('img/misc/about-2.png') }}" alt="">
                        </div>
                        <div class="img-about">
                            <img src="{{ asset('img/misc/about-1.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <h3 class="text-dec text-dec-info-2 text-dec-tl text-midnight font-extrabold mb-2 d-none d-lg-inline-block">
                        TENTANG HIMATIF
                    </h3>
                    <p class="text-gray mb-2">
                        HIMATIF (Himpunan Mahasiswa Teknologi Informasi) adalah Salah satu Organisasi Mahasiswa di Fakultas Ilmu Komputer Universitas Jember. Terbentuknya HIMATIF dirintis oleh 7 Orang Mahasiswa Teknologi Informasi pada tanggal 6 Agustus 2017.
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
                        VISI DAN MISI
                    </h3>
                    <p class="text-gray">
                        Visi dan Misi Himpunan Mahasiswa Teknologi Informasi
                    </p>
                </div>
                <div class="col-lg-6 mb-3 mb-lg-0">
                    <div class="card card-vision shadow-midnight-sm">
                        <div class="card-body">
                            <div class="row no-gutters">
                                <div class="col-lg-4">
                                    <div class="img-fit img-fit-cover h-20rem">
                                        <img src="{{ asset('img/misc/visi.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="col-lg p-2 p-lg-3">
                                    <h5 class="text-midnight text-shadowed font-extrabold">
                                        VISI <span class="text-shadowed-content">VISI</span>
                                    </h5>
                                    <div class="divider my-2"></div>
                                    <div class="text-gray">
                                        Unggul dalam pengembangan ilmu pengetahuan dan teknologi bidang teknologi informasi untuk menunjang pertanian industrial pada tahun 2035
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-vision shadow-midnight-sm">
                        <div class="card-body">
                            <div class="row no-gutters">
                                <div class="col-lg-4">
                                    <div class="img-fit img-fit-cover h-20rem">
                                        <img src="{{ asset('img/misc/misi.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="col-lg p-2 p-lg-3">
                                    <h5 class="text-midnight text-shadowed font-extrabold">
                                        MISI <span class="text-shadowed-content">MISI</span>
                                    </h5>
                                    <div class="divider my-2"></div>
                                    <div class="text-gray">
                                        1. Menyelenggarakan pendidikan program sarjana bidang teknologi informasi secara profesional
                                        <br>
                                        2. Menyiapkan sumber daya manusia yang berkualitas dalam penguasaan kompetensi materi teknologi informasi terutama pada pengembangan pertanian industrial
                                        <br>
                                        3. Mengembangkan ilmu pengetahuan dan teknologi informasi bagi kepentingan kemanusiaan
                                        <br>
                                        4. Memberdayakan masyarakat melalui penerapan teknologi informasi dan komunikasi
                                        <br>
                                        5. Mengembangkan jaringan kerjasama dengan pemangku kepentingan (Stakeholders) dalam bidang teknologi informasi
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                            'content' => 'BPH Terdisi atas Ketua Umum, Sekretaris Umum dan Bendahara Umum'
                        ],
                        [
                            'shortname' => 'psdm',
                            'name' => 'Pengembangan Sumber Daya Mahasiswa',
                            'content' => 'Pengembangan dan pemberdayaan akademik dan softskill mahasiswa serta untuk menciptakan mahasiswa berkompeten dan unggul'
                        ],
                        [
                            'shortname' => 'litbang',
                            'name' => 'Penelitian dan Pengembangan',
                            'content' => 'Melakukan penelitian untuk mendapatkan hasil optimal dalam pengembangan mahasiswa teknologi informasi'
                        ],
                        [
                            'shortname' => 'humas',
                            'name' => 'Hubungan Masyarakat',
                            'content' => 'Media komunikasi antara HIMATIF birokrasi, organisasi lain, instansi, maupun masyarakat umum dan menjadi penghubung antara himatif dengan mahasiswa teknologi informasi secara langsung'
                        ],
                        [
                            'shortname' => 'mediatek',
                            'name' => 'Media Teknologi',
                            'content' => 'Media informasi dan komunikasi seputar teknologi informasi serta media pengembang teknologi HIMATIF'
                        ],
                    ];
                @endphp

                @foreach ($divisions as $i => $division)
                <div class="col-md-6 col-xl-4 mb-3 mb-md-5">
                    <div class="row gutters-xs justify-content-center text-center text-lg-left">
                        <div class="col-auto mb-1 mb-lg-0">
                            <img src="{{ asset('img/icons/'.$division['shortname'].'-secondary.svg') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-lg pl-lg-1">
                            <h5 class="text-white font-bold mb-1">{{ $division['name'] }}</h5>
                            <p class="text-light">
                                {{ strlen($division['content']) > 85 ? substr($division['content'], 0, 85) . '...' : $division['content'] }}
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
            <h6 class="text-gray mb-2">Program Kerja Himatif tahun 2020/2021</h6>

            <div class="row justify-content-between op-5">
                <div class="col-auto">
                    <i id="slick-proker-prev" class="far fa-arrow-alt-circle-left text-gray"></i>
                </div>
                <div class="col-auto">
                    <i id="slick-proker-next" class="far fa-arrow-alt-circle-right text-gray"></i>
                </div>
            </div>

            <div class="row" id="slick-proker-row">
                <div class="col-lg-6 my-3 my-md-4">
                    <div class="card shadow-midnight-sm">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-auto col-xl-4">
                                    <h4 class="text-midnight font-bold mb-1 d-xl-none">Technology Innovative Challenge</h4>
                                    <div class="img-fit img-fit-contain h-20rem">
                                        <img src="{{ asset('img/features/proker/tic.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="col-xl pt-lg-2">
                                    <h6 class="text-midnight font-bold mb-1 d-none d-xl-block">Technology Innovative Challenge</h6>
                                    <p class="text-gray mb-2">
                                        Dilaksanakan
                                        untuk membimbing mahasiswa Teknologi Informasi Fakultas Ilmu Komputer
                                        Universitas Jember agar dapat menulis dengan baik dan benar.
                                    </p>
                                    <a href="" class="text-gray">
                                        Detail <i class="fas fa-arrow-right ml-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 my-3 my-md-4">
                    <div class="card shadow-midnight-sm">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-auto col-xl-4">
                                    <h4 class="text-midnight font-bold mb-1 d-xl-none">ITeC</h4>
                                    <div class="img-fit img-fit-contain h-20rem">
                                        <img src="{{ asset('img/features/proker/itec.png') }}" alt="" class="img-fluid">
                                    </div>
                                </div>
                                <div class="col-xl pt-lg-2">
                                    <h6 class="text-midnight font-bold mb-1 d-none d-xl-block">ITeC</h6>
                                    <p class="text-gray mb-2">
                                        Penyaluran dan pengembangan minat dan bakat mahasiswa dalam kompetisi IoT dan Desain UI/UX Aplikasi - “Information Technology Competition”
                                    </p>
                                    <a href="" class="text-gray">
                                        Detail <i class="fas fa-arrow-right ml-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 my-3 my-md-4">
                    <div class="card shadow-midnight-sm">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-auto col-xl-4">
                                    <h4 class="text-midnight font-bold mb-1 d-xl-none">Technology Innovative Challenge</h4>
                                    <div class="img-fit img-fit-contain h-20rem">
                                        <img src="{{ asset('img/features/proker/tic.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="col-xl pt-lg-2">
                                    <h6 class="text-midnight font-bold mb-1 d-none d-xl-block">Technology Innovative Challenge</h6>
                                    <p class="text-gray mb-2">
                                        Dilaksanakan
                                        untuk membimbing mahasiswa Teknologi Informasi Fakultas Ilmu Komputer
                                        Universitas Jember agar dapat menulis dengan baik dan benar.
                                    </p>
                                    <a href="" class="text-gray">
                                        Detail <i class="fas fa-arrow-right ml-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End of Section 4 : Proker --}}

    {{-- Section 5 : Galerry --}}
    <section id="section-5">
        <div class="container">
            <div class="row gutters-xs">
                <div class="col-12 text-right mb-3 mb-md-5">
                    <h3 class="text-dec text-dec-info-1 text-dec-tr text-midnight font-extrabold mb-2">
                        GALERI KEGIATAN
                    </h3>
                    <h6 class="text-gray mb-2">Dokumentasi kegiatan HIMATIF terbaru</h6>
                </div>

                <div class="col-lg-6 mb-1 mb-lg-0">
                    <a href="{{ asset("img/galery/1.jpg") }}" data-lightbox="kegiatan">
                        <div class="img-gallery img-gallery-main">
                            <img src="{{ asset('img/galery/1.jpg') }}" alt="" class="img-fluid">
                        </div>
                    </a>
                </div>
                <div class="col-lg-6">
                    <div class="row gutters-xs">
                        @for ($i = 2; $i <= 5; $i++)
                        <div class="col-6 mb-1">
                            <a href="{{ asset("img/galery/$i.jpg") }}" data-lightbox="kegiatan">
                                <div class="img-gallery">
                                    <img src="{{ asset("img/galery/$i.jpg") }}" alt="" class="img-fluid">
                                </div>
                            </a>
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
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link rel="stylesheet" href="{{ asset('vendors/lightbox/lightbox.min.css') }}">
    <style>
        #slick-proker-prev, #slick-proker-next {
            transition: all .3s ease;
            font-size: 2.4rem;
            cursor: pointer;
        }
        #slick-proker-prev:hover, #slick-proker-next:hover {
            font-size: 2.6rem;
        }
    </style>
@endsection

@section('script')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="{{ asset('vendors/lightbox/lightbox.min.js') }}"></script>
    <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true,
            'fadeDuration': 300,
            'alwaysShowNavOnTouchDevices': true
        })
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
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    </script>
@endsection
