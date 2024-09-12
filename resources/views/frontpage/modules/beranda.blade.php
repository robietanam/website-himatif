@extends('frontpage.layouts.app-frontpage')

@section('title', 'BERANDA')

@section('pageClass', 'homepage')
@section('content')

    {{-- Header --}}
    <header>
        <div class="container mx-auto sm:px-4 mx-auto sm:px-4">

            <div class="flex flex-wrap mb-5 mb-lg-10 justify-center text-center ">
                <div class="lg:w-1/2 pr-4 pl-4 order-2 lg:order-1 ">
                    <h3 class="text-dec text-dec-secondary-1 text-dec-tl text-midnight font-extrabold mb-2 hidden lg:block">
                        {{ $header['1-text']->content }}
                    </h3>
                    <p class="text-gray font-semibold mb-3">
                        {{ $header['2-text2']->content }}
                    </p>

                    <div
                        class="flex flex-row py-5 px-6 max-md:p-6 items-center justify-center bg-white border border-gray-200 rounded-full shadow hover:bg-gray-100">
                        <div class="">
                            <span class="bg-blue-400 text-white text-lg font-medium me-2 px-3 py-1 rounded-full">
                                {{ $header['4-marquee_tag']->content }}
                            </span>
                            <div class="">

                            </div>
                        </div>
                        <marquee direction="left"
                            class="text-lg w-full [&_a]:font-medium [&_a]:text-blue-600 [&_a]:dark:text-blue-500 [&_a]:hover:underline">

                            {!! $header['5-marquee_info']->content !!}
                        </marquee>
                    </div>

                </div>
                <div class="md:w-2/3 lg:w-1/2 pr-4 pl-4 order-1 lg:order-2 mb-3 lg:mb-0 pt-3">
                    <h3 class="text-dec text-dec-secondary-1 text-dec-tl text-midnight font-extrabold mb-2 lg:hidden">
                        HIMPUNAN MAHASISWA TEKNOLOGI INFORMASI
                    </h3>
                    @if (file_exists(storage_path('app/public/' . $header['3-photo']->content)))
                        <div class="header-img">
                            <img src="{{ asset('storage/' . $header['3-photo']->content) }}" alt=""
                                class="max-w-full h-auto">
                        </div>
                    @else
                        <div class="header-img">
                            <img src="{{ asset('img/' . $header['3-photo']->content) }}" alt=""
                                class="max-w-full h-auto">
                        </div>
                    @endif
                </div>
            </div>

            <div class="flex flex-wrap pt-32">
                <div class="w-full text-center mb-24">
                    <h3 class="text-dec text-dec-secondary-2 text-dec-tl text-midnight font-extrabold mb-2">
                        {{ $section2['text']->content }}
                    </h3>
                    <h6 class="text-gray font-semibold">
                        {{ $section2['text2']->content }}
                    </h6>
                </div>

                <div class="lg:w-1/3 pr-4 pl-4 mb-3 lg:mb-0">
                    <div
                        class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300 shadow-md shadow-yellow-100">
                        <div class="flex-auto p-6">
                            <div class="flex flex-wrap  items-center">
                                <div class="col-auto">
                                    <img src="{{ asset('img/icons/pencil-warning.svg') }}" alt=""
                                        class="w-3rem w-lg-5rem">
                                </div>
                                <div class="relative flex-grow max-w-full flex-1 px-4">
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
                <div class="lg:w-1/3 pr-4 pl-4 mb-3 lg:mb-0 lg:mt-4">
                    <div
                        class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300 shadow-md shadow-blue-200">
                        <div class="flex-auto p-6">
                            <div class="flex flex-wrap  items-center">
                                <div class="col-auto">
                                    <img src="{{ asset('img/icons/list-info.svg') }}" alt=""
                                        class="w-3rem w-lg-5rem">
                                </div>
                                <div class="relative flex-grow max-w-full flex-1 px-4">
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
                <div class="lg:w-1/3 pr-4 pl-4 mb-3 lg:mb-0 lg:mt-12">
                    <div
                        class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300 shadow-md shadow-green-200">
                        <div class="flex-auto p-6">
                            <div class="flex flex-wrap  items-center">
                                <div class="col-auto">
                                    <img src="{{ asset('img/icons/graduate-secondary.svg') }}" alt=""
                                        class="w-3rem w-lg-5rem">
                                </div>
                                <div class="relative flex-grow max-w-full flex-1 px-4">
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
        <div class="container mx-auto sm:px-4 mx-auto sm:px-4">
            <div class="flex flex-wrap items-center justify-center lg:justify-around text-center ">
                <div class="col-auto lg:w-2/5 pr-4 pl-4 mb-3 lg:mb-0">
                    <h3 class="text-dec text-dec-info-2 text-dec-tl text-midnight font-extrabold mb-2 lg:hidden">
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
                <div class="lg:w-2/5 pr-4 pl-4">
                    <h3
                        class="text-dec text-dec-info-2 text-dec-tl text-midnight font-extrabold mb-2 hidden lg:inline-block">
                        TENTANG HIMATIF
                    </h3>
                    <p class="text-gray mb-2">
                        HIMATIF (Himpunan Mahasiswa Teknologi Informasi) adalah Salah satu Organisasi Mahasiswa di Fakultas
                        Ilmu Komputer Universitas Jember. Terbentuknya HIMATIF dirintis oleh 7 Orang Mahasiswa Teknologi
                        Informasi pada tanggal 6 Agustus 2017.
                    </p>
                    <a href="{{ route('frontpage.about') }}"
                        class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md py-1 px-3 leading-normal no-underline btn-gradient-primary">Lihat
                        Lebih Lengkap</a>
                </div>
            </div>
        </div>
    </section>
    {{-- End of Section 1 : Tentang --}}

    {{-- Section 2 : Visi & Misi --}}
    <section id="section-2">
        <div class="container mx-auto sm:px-4 ">
            <div class="flex flex-wrap ">
                <div class="w-full text-center mb-5">
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
                    <div class="lg:w-1/2 pr-4 pl-4 mb-3 lg:mb-0 ">
                        <div
                            class="relative flex flex-col min-w-0 shadow-sm  rounded-xl break-words border bg-white border-1 border-gray-300 ">
                            <div class="flex-auto p-6">
                                <div class="flex flex-wrap  no-gutters">
                                    <div class="lg:w-1/3 pr-4 pl-4">
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
                                    <div class="relative lg:flex-grow lg:flex-1 p-2 lg:p-6">
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
        <div class="container mx-auto sm:px-4 mx-auto sm:px-4">
            <div class="flex flex-wrap  justify-center">
                <div class="w-full text-center mb-5">
                    <h3 class="text-dec text-dec-warning-1 text-dec-tl text-white font-extrabold mb-8">
                        PENGURUS HIMATIF
                    </h3>
                    <h6 class="text-gray-100">
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
                            'content' =>
                                'Pengembangan dan pemberdayaan akademik dan softskill mahasiswa serta untuk menciptakan mahasiswa berkompeten dan unggul',
                        ],
                        [
                            'shortname' => 'litbang',
                            'name' => 'Penelitian dan Pengembangan',
                            'content' =>
                                'Melakukan penelitian untuk mendapatkan hasil optimal dalam pengembangan mahasiswa teknologi informasi',
                        ],
                        [
                            'shortname' => 'humas',
                            'name' => 'Hubungan Masyarakat',
                            'content' =>
                                'Media komunikasi antara HIMATIF birokrasi, organisasi lain, instansi, maupun masyarakat umum dan menjadi penghubung antara himatif dengan mahasiswa teknologi informasi secara langsung',
                        ],
                        [
                            'shortname' => 'mediatek',
                            'name' => 'Media Teknologi',
                            'content' =>
                                'Media informasi dan komunikasi seputar teknologi informasi serta media pengembang teknologi HIMATIF',
                        ],
                    ];
                @endphp

                @foreach ($divisions as $i => $division)
                    <div class="md:w-1/2 xl:w-1/3 pr-4 pl-4 mb-8 md:mb-12 ">
                        <div class="flex flex-wrap  gutters-xs justify-center text-center lg:text-left">
                            <div class="col-auto mb-3 mr-2 lg:mb-0">
                                <img src="{{ asset('img/icons/' . $division['shortname'] . '-secondary.svg') }}"
                                    alt="" class="max-w-full h-auto">
                            </div>
                            <div class="relative lg:flex-grow lg:flex-1 lg:pl-1">
                                <h5 class="text-white font-bold mb-1">{{ $division['name'] }}</h5>
                                <p class="text-gray-100">
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

        <div class="container mx-auto sm:px-4  mx-auto sm:px-4">
            <h3 class="text-dec text-dec-info-1 text-dec-tr text-midnight font-extrabold mb-2">
                PROGRAM KERJA
            </h3>
            <h6 class="text-gray mb-2">Program Kerja Himatif tahun 2023/2024</h6>

            <div class="flex flex-wrap w-full justify-between op-5">
                <button type="button"
                    class="relative top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    id="slick-proker-prev">
                    <span
                        class=" inline-flex items-center justify-center w-10 h-10 rounded-full bg-midnight/30 group-hover:bg-black/50 group-focus:ring-4 group-focus:ring-white/70 group-focus:outline-none">
                        <svg class="my-auto mx-auto w-1/5 font-medium leading-tight text-xl text-white rtl:rotate-180"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="relative top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    id="slick-proker-next">
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-midnight/30 group-hover:bg-black/50 group-focus:ring-4 group-focus:ring-white/70 group-focus:outline-none">
                        <svg class="my-auto mx-auto w-1/5 font-medium leading-tight text-xl text-white rtl:rotate-180"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>

            </div>

            <div class="flex flex-wrap " id="slick-proker-row">
                @foreach ($prokers as $proker)
                    <div class="relative lg:flex-grow lg:flex-1 my-3 md:my-6 px-2 ">
                        <div
                            class="relative flex flex-col min-w-0 rounded-md break-words bg-white border-1 border-gray-300 card-proker border shadow-sm h-full">
                            <div class="flex-auto p-6 w-full h-full">
                                <div class="flex flex-wrap  justify-center  h-full">
                                    <div class="col-auto mb-2 lg:mb-0">
                                        <div class="w-52 h-52 pr-5 rounded-md flex items-center">
                                            @if ($proker->logo)
                                                <img src="{{ asset('storage/' . $proker->logo) }}" alt="">
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
                                                    class="inline-block p-1 text-center font-semibold text-sm align-baseline leading-none rounded-md badge-lg bg-green-500 text-white hover:green-600 mb-2">
                                                    Pendaftaran Dibuka</div>
                                            @endif

                                            <p class="text-12 text-md-14 text-gray mb-3">
                                                {{ substr(strip_tags($proker->description), 0, 80) . (strlen(strip_tags($proker->description)) > 80 ? '...' : '') }}
                                            </p>
                                        </div>

                                        <a href="{{ route('frontpage.proker.show', $proker->id) }}"
                                            class="text-gray pb-3">Lihat
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

    <section id="section-alumni" class="review" style="width: 100%">
        <div class="slide-container swiper">
            <br><br><br>
            <div class="w-full text-left mb-3 md:mb-12">
                <h3 class="text-dec text-dec-info-1 text-dec-tr text-midnight font-extrabold mb-2">
                    APA KATA ALUMNI KITA?
                </h3>
                <h6 class="text-gray mb-2">Tentang Alumni Teknologi Informasi</h6>
            </div>
            <br>
            <br>
            <br>
            <div class="slide-content swiper-wrapper">
                @foreach ($reviews as $review)
                    <div class="swiper-slide">
                        <div class="r-card">
                            <div class="card-inner">
                                <div class="card-front">
                                    <div class="image-content">
                                        <span class="overlay"></span>
                                        <div class="card-image">
                                            <img src="{{ asset('storage/' . $review->photo) }}"
                                                alt="Photo of {{ $review->name }}" class="card-img">
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <h2 class="name">{{ $review->name }}</h2>
                                        <p class="description">{{ $review->motivation }}</p>
                                    </div>
                                </div>
                                <div class="card-back">
                                    <p class="card-back-text">{{ $review->experience }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Navigasi Swiper -->
            <div class="swiper-button-next">></div>
            <div class="swiper-button-prev">
                < </div>
            </div>
            <div class="swiper-pagination"></div>
    </section>
    @if (false)
        <section id="section-alumni">
            <div class="container mx-auto px-4  ">
                <h3 class="text-dec text-dec-info-1 text-dec-tr text-midnight font-extrabold mb-2">
                    Apa Kata Alumni
                </h3>
                <h6 class="text-gray mb-2">Pesan dan Kesan dari Alumni</h6>

                <div class="flex flex-wrap  py-5 [&>div]:overflow-visible px-20 md:px-48" id="slick-alumni-row">
                    <div
                        class=" relative flex flex-wrap gap-6 p-6 justify-center w-full h-full rounded-md break-words bg-white border-1 border-gray-300 card-proker border shadow-sm ">
                        <div class="avatar -mt-10">
                            <div class="w-24 h-24 rounded-xl">
                                <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                            </div>
                        </div>

                        <div class="relative gap-2 md:flex-grow md:flex-1 flex flex-col justify-between h-full w-full">
                            <p class="text-sm font-bold">" My RISTEK experience has been the most impactful for
                                my technology
                                career. Here you
                                are interacting & learning together with the brightest minds in CS UI. After
                                graduation you will find your RISTEK buddies be Silicon Valley engineers, startup
                                founders, and other high flying professionals. "</p>
                            <p class="text-sm ">Adam Jordan, Security Lead @ Sea</p>
                        </div>
                    </div>
                    <div
                        class=" relative flex flex-wrap gap-6 p-6 justify-center w-full h-full rounded-md break-words bg-white border-1 border-gray-300 card-proker border shadow-sm ">
                        <div class="avatar -mt-10">
                            <div class="w-24 h-24 rounded-xl">
                                <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                            </div>
                        </div>

                        <div class="relative gap-2 md:flex-grow md:flex-1 flex flex-col justify-between h-full w-full">
                            <p class="text-sm font-bold">" My RISTEK experience has been the most impactful for
                                my technology
                                career. Here you
                                are interacting & learning together with the brightest minds in CS UI. After
                                graduation you will find your RISTEK buddies be Silicon Valley engineers, startup
                                founders, and other high flying professionals. "</p>
                            <p class="text-sm ">Adam Jordan, Security Lead @ Sea</p>
                        </div>
                    </div>
                    <div
                        class=" relative flex flex-wrap gap-6 p-6 justify-center w-full h-full rounded-md break-words bg-white border-1 border-gray-300 card-proker border shadow-sm ">
                        <div class="avatar -mt-10">
                            <div class="w-24 h-24 rounded-xl">
                                <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                            </div>
                        </div>

                        <div class="relative gap-2 md:flex-grow md:flex-1 flex flex-col justify-between h-full w-full">
                            <p class="text-sm font-bold">" My RISTEK experience has been the most impactful for
                                my technology
                                career. Here you
                                are interacting & learning together with the brightest minds in CS UI. After
                                graduation you will find your RISTEK buddies be Silicon Valley engineers, startup
                                founders, and other high flying professionals. "</p>
                            <p class="text-sm ">Adam Jordan, Security Lead @ Sea</p>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap px-20 md:px-48" id="slider-nav">
                    <div
                        class=" relative flex flex-wrap  items-center justify-center p-4 mx-4 max-lg:mx-1 rounded-md break-words bg-white border-1 border-gray-300 border shadow-sm ">
                        <div class="avatar mx-auto flex items-center justify-center">
                            <div class="max-w-20 max-h-20 rounded-xl">
                                <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                            </div>
                        </div>

                        <div
                            class="relative pt-2 gap-1 md:flex-grow md:flex-1 flex flex-col items-center justify-center h-full w-full">
                            <p class="text-sm font-bold text-center">Adam Jordan</p>
                            <p class="text-sm ">Sea</p>
                        </div>
                    </div>
                    <div
                        class=" relative flex flex-wrap  items-center justify-center p-4 mx-4 max-lg:mx-1 rounded-md break-words bg-white border-1 border-gray-300 border shadow-sm ">
                        <div class="avatar mx-auto flex items-center justify-center">
                            <div class="max-w-20 max-h-20 rounded-xl">
                                <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                            </div>
                        </div>

                        <div
                            class="relative pt-2 gap-1 md:flex-grow md:flex-1 flex flex-col items-center justify-center h-full w-full">
                            <p class="text-sm font-bold text-center">Adam Jordan</p>
                            <p class="text-sm ">Sea</p>
                        </div>
                    </div>
                    <div
                        class=" relative flex flex-wrap  items-center justify-center p-4 mx-4 max-lg:mx-1 rounded-md break-words bg-white border-1 border-gray-300 border shadow-sm ">
                        <div class="avatar mx-auto flex items-center justify-center">
                            <div class="max-w-20 max-h-20 rounded-xl">
                                <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                            </div>
                        </div>

                        <div
                            class="relative pt-2 gap-1 md:flex-grow md:flex-1 flex flex-col items-center justify-center h-full w-full">
                            <p class="text-sm font-bold text-center">Adam Jordan</p>
                            <p class="text-sm ">Sea</p>
                        </div>
                    </div>


                </div>
            </div>
        </section>
    @endif

    {{-- Section 5 : Galerry --}}
    <section id="section-5">
        <div class="container mx-auto sm:px-4 mx-auto sm:px-4">
            <div id="row-gallery" class="flex flex-wrap justify-start gutters-xs">
                <div class="w-full text-left mb-3 md:mb-12">
                    <h3 class="text-dec text-dec-info-1 text-dec-tr text-midnight font-extrabold mb-2">
                        GALERI KEGIATAN
                    </h3>
                    <h6 class="text-gray mb-2">Dokumentasi kegiatan HIMATIF terbaru</h6>
                </div>

                <div class="lg:w-1/2 pr-4 pl-4 mb-1 lg:mb-0">
                    @if (file_exists(storage_path('app/public/' . $gallery['1-image1']->content)))
                        <div data-src="{{ asset('storage/' . $gallery['1-image1']->content) }}"
                            class="img-gallery img-gallery-main">
                            <img src="{{ asset('storage/' . $gallery['1-image1']->content) }}" class="max-w-full h-auto"
                                alt="">
                        </div>
                    @else
                        <div data-src="{{ asset('img/' . $gallery['1-image1']->content) }}"
                            class="img-gallery img-gallery-main">
                            <img src="{{ asset('img/' . $gallery['1-image1']->content) }}" class="max-w-full h-auto"
                                alt="">
                        </div>
                    @endif
                </div>
                <div class="lg:w-1/2 pr-4 pl-4">
                    <div class="flex flex-wrap  gutters-xs">
                        @for ($i = 2; $i <= 5; $i++)
                            <div class="w-1/2 mb-1">
                                @if (file_exists(storage_path('app/public/' . $gallery["$i-image$i"]->content)))
                                    <div data-src="{{ asset('storage/' . $gallery["$i-image$i"]->content) }}"
                                        class="img-gallery">
                                        <img src="{{ asset('storage/' . $gallery["$i-image$i"]->content) }}"
                                            alt="" class="max-w-full h-auto">
                                    </div>
                                @else
                                    <div data-src="{{ asset('img/' . $gallery["$i-image$i"]->content) }}"
                                        class="img-gallery">
                                        <img src="{{ asset('img/' . $gallery["$i-image$i"]->content) }}" alt=""
                                            class="max-w-full h-auto">
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
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css"
        integrity="sha512-kwJUhJJaTDzGp6VTPBbMQWBFUof6+pv0SM3s8fo+E6XnPmVmtfwENK0vHYup3tsYnqHgRDoBDTJWoq7rnQw2+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Lightgallery -->
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

    <style>
        .slide-container {
            max-width: 1000px;
            width: 100%;
            padding: 20px 0;
            position: relative;
            margin: 0 auto;
            overflow: hidden;
        }

        .swiper-wrapper {
            display: flex;
        }

        .swiper-slide {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-shrink: 0;
            width: calc(33.33% - 20px);
            margin-right: 20px;
            transition: transform 0.5s ease-in-out;
        }

        .r-card {
            width: 100%;
            height: 300px;
            perspective: 1000px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            transition: transform 0.6s;
            transform-style: preserve-3d;
            cursor: pointer;
        }

        .card-front,
        .card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
        }

        .card-front {
            background-color: #ebd2b1;
            border-radius: 20px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .card-back {
            background-color: #ebd2b1;
            color: #fff;
            transform: rotateY(180deg);
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            border-radius: 20px;
            padding: 20px;
        }

        .r-card:hover .card-inner {
            transform: rotateY(180deg);
        }

        .image-content {
            padding: 20px;
            text-align: center;
        }

        .card-image {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background-color: #fff;
            padding: 5px;
            border: 5px solid #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
        }

        .card-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .card-content {
            width: 313px;
            height: 150px;
            padding: 10px;
            background-color: #FFFFFF;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            border-radius: 10px;
        }

        .name {
            font-size: 14px;
            font-weight: bold;
            color: black;
            margin-bottom: 10px;
            text-align: center;
            white-space: normal;
            word-wrap: break-word;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .description {
            font-size: 14px;
            color: #555;
            text-align: justify;
            margin-top: 5px;
            display: block;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 5;
            -webkit-box-orient: vertical;
        }

        .card-back-text {
            font-size: 14px;
            line-height: 1.5;
            text-align: justify;
            word-wrap: break-word;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 12;
            -webkit-box-orient: vertical;
            text-overflow: ellipsis;
            margin-top: 0;
            margin-bottom: auto;
            max-height: 100%;
            white-space: normal;
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: #000 !important;
            background-color: rgba(255, 255, 255, 0.8) !important;
            border-radius: 50% !important;
            width: 40px !important;
            height: 40px !important;
            font-size: 23px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            cursor: pointer;
            z-index: 10 !important;
            position: absolute !important;
            top: 40% !important;
            transform: translateY(-50%) !important;
            transition: background-color 0.3s ease, color 0.3s ease;
            box-sizing: border-box;
            border: 1px solid #ddd !important;
        }

        .swiper-button-next:hover,
        .swiper-button-prev:hover {
            background-color: rgba(255, 255, 255, 1) !important;
            color: #000 !important;
        }

        .swiper-button-next {
            right: 10px !important;
        }

        .swiper-button-prev {
            left: 10px !important;
        }

        .swiper-pagination {
            bottom: 10px !important;
            text-align: center !important;
        }

        .swiper-pagination-bullet {
            background: #ebd2b1 !important;
            opacity: 0.7 !important;
            width: 10px !important;
            height: 10px !important;
            border-radius: 50% !important;
        }

        .swiper-pagination-bullet-active {
            background: #c56d33 !important;
            opacity: 1 !important;
        }

        .swiper-button-next::before,
        .swiper-button-prev::before {
            content: none !important;
            /* Menghapus pseudo-element */
        }

        .swiper-button-next::after,
        .swiper-button-prev::after {
            content: none !important;
        }

        .swiper-pagination {
            position: relative !important;
            bottom: 11px !important;
            text-align: center !important;
        }


        @media (max-width: 768px) {

            .swiper-slide {
                width: 100%;
                margin-right: 0;
            }

            .r-card {
                height: 300px;
                width: 80%;
            }

            .card-inner {
                width: 100%;
                height: 100%;
            }

            .card-image {
                width: 120px;
                height: 120px;
            }

            .name {
                font-size: 18px;
            }

            .description {
                font-size: 14px;
            }

            .card-back-text {
                font-size: 16px;
            }

            .swiper-button-next,
            .swiper-button-prev {
                width: 45px;
                height: 45px;
                font-size: 18px;
                top: 20px;
                background-color: rgba(255, 255, 255, 0.9);
                border-radius: 50%;
                border: 1px solid #ddd;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .swiper-button-next {
                right: 40px;
            }

            .swiper-button-prev {
                left: 40px;
            }
        }

        @media (max-width: 480px) {

            .swiper-slide {
                width: 100%;
                margin-right: 0;
            }

            .r-card {
                height: 300px;
                width: 80%;
            }

            .card-inner {
                width: 100%;
                height: 100%;
            }

            .card-image {
                width: 120px;
                height: 120px;
            }

            .name {
                font-size: 18px;
            }

            .description {
                font-size: 14px;
            }

            .card-back-text {
                font-size: 16px;
            }

            .swiper-button-next,
            .swiper-button-prev {
                width: 45px;
                height: 45px;
                font-size: 18px;
                top: 39%;
                background-color: rgba(255, 255, 255, 0.9);
                border-radius: 50%;
                border: 1px solid #ddd;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .swiper-button-next {
                right: 40px;
            }

            .swiper-button-prev {
                left: 40px;
            }
        }
    </style>

@endsection

@section('script')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
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

            $('#slick-alumni-row').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,

                asNavFor: '#slider-nav'
            });
            $('#slider-nav').slick({
                slidesToShow: 4,
                responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 640,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }],
                slidesToScroll: 1,
                asNavFor: '#slick-alumni-row',
                dots: false,
                centerMode: true,
                focusOnSelect: true
            });

        })
    </script>
    {{-- Light Gallery --}}

    <script>
        const swiper = new Swiper('.swiper', {
            spaceBetween: 30,
            centeredSlides: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            loop: true,
            speed: 600,
            effect: 'slide',
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
            },
        });
    </script>
    {{-- Review-Alumni --}}

@endsection
