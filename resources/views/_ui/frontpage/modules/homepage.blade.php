@extends('_ui.frontpage.layouts.app-frontpage')

@section('title', 'BERANDA')

@section('pageClass', 'homepage')
@section('content')

    {{-- Header --}}
    <header>
        <div class="container">
            <div class="row mb-5 mb-lg-10 justify-content-center text-center text-lg-left">
                <div class="col-lg-6 order-2 order-lg-1">
                    <h3 class="text-dec text-dec-secondary-1 text-dec-tl text-midnight font-weight-extrabold mb-2 d-none d-lg-block">
                        HIMPUNAN MAHASISWA TEKNOLOGI INFORMASI
                    </h3>
                    <p class="text-gray font-weight-semibold mb-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem blanditiis ipsa consequuntur debitis beatae ea hic inventore numquam perspiciatis dicta voluptatum sapiente earum id libero velit, quod vel ad laborum aut molestias odio? Sed nesciunt, quas illum ratione molestias possimus iste. Doloribus accusantium aspernatur voluptate pariatur asperiores odit vel reprehenderit.</p>

                    <div class="row">
                        <div class="col-xl-10">
                            <div class="card card-marquee">
                                <div class="card-body">
                                    <div class="row gutters-xs align-items-center">
                                        <div class="col-auto">
                                            <div class="badge badge-pill badge-lg badge-info"><span class="d-none d-md-inline">Info</span> Terbaru</div>
                                        </div>
                                        <div class="col">
                                            <marquee direction="left">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, fuga!</marquee>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-8 col-lg-6 order-1 order-lg-2 mb-3 mb-lg-0 pt-3">
                    <h3 class="text-dec text-dec-secondary-1 text-dec-tl text-midnight font-weight-extrabold mb-2 d-lg-none">
                        HIMPUNAN MAHASISWA TEKNOLOGI INFORMASI
                    </h3>
                    <div class="header-img">
                        <img src="{{ asset('img/misc/header-homepage.png') }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            
            <div class="row pt-5">
                <div class="col-12 text-center mb-5">
                    <h3 class="text-dec text-dec-secondary-2 text-dec-tl text-midnight font-weight-extrabold mb-2">
                        APA YANG KAMI LAKUKAN
                    </h3>
                    <h6 class="text-gray font-weight-semibold">Berfokus pada pengembangan SDM pada ranah Teknologi Informasi</h6>
                </div>

                <div class="col-lg-4 mb-3 mb-lg-0">
                    <div class="card shadow-warning-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <img src="{{ asset('img/icons/pencil-warning.svg') }}" alt="" class="w-3rem w-lg-5rem">
                                </div>
                                <div class="col">
                                    <h6 class="text-midnight font-weight-bold">Menyusun Proker</h6>
                                    <div class="text-gray">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo repellat eveniet sint nam corrupti.</div>
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
                                    <h6 class="text-midnight font-weight-bold">Melaksanakan Proker</h6>
                                    <div class="text-gray">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo repellat eveniet sint nam corrupti.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-3 mb-lg-0">
                    <div class="card shadow-secondary-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <img src="{{ asset('img/icons/graduate-secondary.svg') }}" alt="" class="w-3rem w-lg-5rem">
                                </div>
                                <div class="col">
                                    <h6 class="text-midnight font-weight-bold">Meningkatkan SDM</h6>
                                    <div class="text-gray">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo repellat eveniet sint nam corrupti.</div>
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
                    <h3 class="text-dec text-dec-info-2 text-dec-tl text-midnight font-weight-extrabold mb-2 d-lg-none">
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
                <div class="col-lg-5 text-lg-right">
                    <h3 class="text-dec text-dec-info-2 text-dec-tl text-midnight font-weight-extrabold mb-2 d-none d-lg-inline-block">
                        TENTANG HIMATIF
                    </h3>
                    <p class="text-gray mb-2">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi quasi quibusdam aperiam molestiae sequi doloremque optio asperiores vel cum ab fuga itaque quidem provident quae omnis reprehenderit animi cupiditate magni consequuntur sunt, recusandae dolor? Tempore aliquid id soluta nihil facilis?
                    </p>
                    <a href="" class="btn btn-gradient-primary">Lihat Lebih Lengkap</a>
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
                    <h3 class="text-dec text-dec-info-1 text-dec-tr text-midnight font-weight-extrabold mb-2">
                        VISI DAN MISI
                    </h3>
                    <p class="text-gray">
                        Dengan menerapkan visi dan misi, kami dapat mengembangkan <br class="d-none d-lg-block"> lebih dalam ranah Teknologi Informasi
                    </p>
                </div>
                <div class="col-lg-6 mb-3 mb-lg-0">
                    <div class="card card-vision shadow-midnight-sm">
                        <div class="card-body">
                            <div class="row no-gutters">
                                <div class="col-lg-4">
                                    <div class="img-fit img-fit-cover h-20rem h-lg-100">
                                        <img src="{{ asset('img/misc/visi.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="col-lg p-2 p-lg-3">
                                    <h5 class="text-midnight text-shadowed font-weight-extrabold">
                                        VISI <span class="text-shadowed-content">VISI</span>
                                    </h5>
                                    <div class="divider my-2"></div>
                                    <div class="text-gray">
                                        Lorem ipsum dolor sit amet, 
                                        consectetur adipiscing elit. Tempor 
                                        nulla convallis donec neque urna, a 
                                        nunc commodo. Tincidunt viverra sit 
                                        urna, mauris maecenas lorem vitae.
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
                                    <div class="img-fit img-fit-cover h-20rem h-lg-100">
                                        <img src="{{ asset('img/misc/misi.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="col-lg p-2 p-lg-3">
                                    <h5 class="text-midnight text-shadowed font-weight-extrabold">
                                        MISI <span class="text-shadowed-content">MISI</span>
                                    </h5>
                                    <div class="divider my-2"></div>
                                    <div class="text-gray">
                                        Lorem ipsum dolor sit amet, 
                                        consectetur adipiscing elit. Tempor 
                                        nulla convallis donec neque urna, a 
                                        nunc commodo. Tincidunt viverra sit 
                                        urna, mauris maecenas lorem vitae.
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
                    <h3 class="text-dec text-dec-warning-1 text-dec-tl text-white font-weight-extrabold mb-2">
                        DIVISI
                    </h3>
                    <h6 class="text-light">5 Divisi Himatif saat ini</h6>
                </div>

                @php
                    $divisions = [
                        [
                            'shortname' => 'bph',
                            'name' => 'Badan Pengurus Harian',
                            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod modi neque officia odio molestiae repudiandae error maxime, distinctio fugit dolores suscipit, eaque laudantium, nihil ipsa odit itaque delectus. Voluptas sed assumenda illo ipsam laborum adipisci sunt ab, tempore possimus culpa laudantium ex cupiditate, voluptates maxime consequatur excepturi fugit neque reiciendis.'
                        ],
                        [
                            'shortname' => 'psdm',
                            'name' => 'Pengembangan Sumber Daya Mahasiswa',
                            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod modi neque officia odio molestiae repudiandae error maxime, distinctio fugit dolores suscipit, eaque laudantium, nihil ipsa odit itaque delectus. Voluptas sed assumenda illo ipsam laborum adipisci sunt ab, tempore possimus culpa laudantium ex cupiditate, voluptates maxime consequatur excepturi fugit neque reiciendis.'
                        ],
                        [
                            'shortname' => 'litbang',
                            'name' => 'Penelitian dan Pengembangan',
                            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod modi neque officia odio molestiae repudiandae error maxime, distinctio fugit dolores suscipit, eaque laudantium, nihil ipsa odit itaque delectus. Voluptas sed assumenda illo ipsam laborum adipisci sunt ab, tempore possimus culpa laudantium ex cupiditate, voluptates maxime consequatur excepturi fugit neque reiciendis.'
                        ],
                        [
                            'shortname' => 'humas',
                            'name' => 'Hubungan Masyarakat',
                            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod modi neque officia odio molestiae repudiandae error maxime, distinctio fugit dolores suscipit, eaque laudantium, nihil ipsa odit itaque delectus. Voluptas sed assumenda illo ipsam laborum adipisci sunt ab, tempore possimus culpa laudantium ex cupiditate, voluptates maxime consequatur excepturi fugit neque reiciendis.'
                        ],
                        [
                            'shortname' => 'mediatek',
                            'name' => 'Media Teknologi',
                            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod modi neque officia odio molestiae repudiandae error maxime, distinctio fugit dolores suscipit, eaque laudantium, nihil ipsa odit itaque delectus. Voluptas sed assumenda illo ipsam laborum adipisci sunt ab, tempore possimus culpa laudantium ex cupiditate, voluptates maxime consequatur excepturi fugit neque reiciendis.'
                        ],
                    ];
                @endphp

                @foreach ($divisions as $i => $division)
                <div class="col-md-6 mb-4 {{ $i == 0 ? 'offset-md-1' : '' }}">
                    <div class="row gutters-xs justify-content-center text-center text-lg-left">
                        <div class="col-auto mb-1 mb-lg-0">
                            <img src="{{ asset('img/icons/'.$division['shortname'].'-secondary.svg') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-lg pl-lg-1">
                            <h5 class="text-white font-weight-bold mb-1">{{ $division['name'] }}</h5>
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
            <h3 class="text-dec text-dec-info-1 text-dec-tr text-midnight font-weight-extrabold mb-2">
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
                                <div class="col-auto col-xl-4">
                                    <h4 class="text-midnight font-weight-bold mb-1 d-xl-none">Technology Innovative Challenge</h4>
                                    <div class="img-fit img-fit-contain h-20rem">
                                        <img src="{{ asset('img/features/proker/tic.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <h6 class="text-midnight font-weight-bold mb-1 d-none d-xl-block">Technology Innovative Challenge</h6>
                                    <p class="text-gray mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati magnam quo similique, soluta iusto quia vero molestiae non dolor saepe.</p>
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
                                <div class="col-auto col-xl-4">
                                    <h4 class="text-midnight font-weight-bold mb-1 d-xl-none">ITeC</h4>
                                    <div class="img-fit img-fit-contain h-20rem">
                                        <img src="{{ asset('img/features/proker/itec.png') }}" alt="" class="img-fluid">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <h6 class="text-midnight font-weight-bold mb-1 d-none d-xl-block">ITeC</h6>
                                    <p class="text-gray mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati magnam quo similique, soluta iusto quia vero molestiae non dolor saepe.</p>
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
                                <div class="col-auto col-xl-4">
                                    <h4 class="text-midnight font-weight-bold mb-1 d-xl-none">Technology Innovative Challenge</h4>
                                    <div class="img-fit img-fit-contain h-20rem">
                                        <img src="{{ asset('img/features/proker/tic.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <h6 class="text-midnight font-weight-bold mb-1 d-none d-xl-block">Technology Innovative Challenge</h6>
                                    <p class="text-gray mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati magnam quo similique, soluta iusto quia vero molestiae non dolor saepe.</p>
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
                    <h3 class="text-dec text-dec-info-1 text-dec-tr text-midnight font-weight-extrabold mb-2">
                        GALERI KEGIATAN
                    </h3>
                    <h6 class="text-gray mb-2">Kegiatan Himatif Terbaru</h6>
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