@extends('frontpage.layouts.app-frontpage')

@section('title', 'TENTANG')

@section('pageClass', 'about')
@section('content')

    <header>
        <div class="container mx-auto sm:px-4 mx-auto sm:px-4 mx-auto sm:px-4 text-center">
            <h3 class="text-midnight text-dec text-dec-secondary-3 text-dec-tr font-extrabold mb-2">
                {{ $header['1-text']->content }}
            </h3>
            <h6 class="text-gray font-light">
                {{ $header['2-text2']->content }}
            </h6>
        </div>
    </header>

    <section id="section-1">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap ">
                <div class="w-full mb-5">
                    <h3 class="text-dec text-dec-info-1 text-dec-tr text-midnight font-extrabold mb-2">
                        Makna Logo HIMATIF
                    </h3>
                    <p class="text-gray">
                        Makna Logo Himpunan Mahasiswa Teknologi Informasi
                    </p>
                </div>
                <div class="lg:w-1/3 pr-4 pl-4">
                    <img src="{{ asset('img/logo.png') }}" alt="" class="max-w-full h-auto">
                </div>
                <div class="lg:w-2/3 pr-4 pl-4">
                    <ul class="list-about mt-5">
                        <li class="list-about-item">
                            <div class="flex flex-wrap  justify-around">
                                <div class="md:w-1/2 pr-4 pl-4">
                                    <div class="w-4rem h-4rem bg-gray border-lg border-black rounded-full mb-2"></div>
                                    <p>
                                        Warna Abu-abu bermakna <b>kemantapan kejayaan dan kesejahteraan</b>
                                    </p>
                                </div>
                                <div class="md:w-1/2 pr-4 pl-4">
                                    <div class="w-4rem h-4rem bg-gray-100 border-lg border-black rounded-full mb-2"></div>
                                    <p>
                                        Warna putih bermakna <b>kesucian dan kejujuran</b>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="list-about-item">
                            <div class="flex flex-wrap  justify-around">
                                <div class="md:w-1/2 pr-4 pl-4">
                                    <p>
                                        Segi delapan melambangkan bulan <b>terbentuknya HIMATIF yaitu bulan Agustus</b>
                                    </p>
                                </div>
                                <div class="md:w-1/2 pr-4 pl-4">
                                    <p>
                                        Garis berwarna kuning melambangkan <b>sikap optimis dan selalu berfikiran
                                            positif</b>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="list-about-item">
                            <div class="flex flex-wrap  justify-around">
                                <div class="md:w-1/2 pr-4 pl-4">
                                    <p>
                                        Orang mengelilingi lambang UNEJ melambangkan <b>HIMATIF berada
                                            dalam naungan Universitas Jember
                                            dan merupakan bagian dari
                                            keluarga Universitas Jember</b>
                                    </p>
                                </div>
                                <div class="md:w-1/2 pr-4 pl-4">
                                    <p>
                                        Lambang Orang yang saling merangkul mengartikan <b>rasa kekeluargaan, solidaritas
                                            yang tinggi, dan kebersamaan</b>, berjumlah enam melambangkan <b>tanggal
                                            terbentuknya HIMATIF yaitu tanggal 06</b>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="list-about-item">
                            <div class="flex flex-wrap  justify-around">
                                <div class="md:w-1/2 pr-4 pl-4">
                                    <p>
                                        Warna Abu-abu dan Putih melambangkan <b>Fakultas Ilmu Komputer yang menaungi
                                            HIMATIF</b>
                                    </p>
                                </div>
                                <div class="md:w-1/2 pr-4 pl-4">
                                    <p>
                                        Lambang Universitas Jember menandakan kebanggaan <b>HIMATIF sebagai bagian dari
                                            Program Studi Teknologi Informasi UNIVERSITAS JEMBER</b>
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="section-2">
        <div class="container mx-auto sm:px-4 mx-auto sm:px-4 mx-auto sm:px-4">
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
                    <div class="lg:w-1/2 pr-4 pl-4 mb-3 lg:mb-0">
                        <div
                            class="relative flex flex-col min-w-0 rounded-lg break-words border bg-white border-1 border-gray-300 card-vision shadow-midnight-sm">
                            <div class="flex-auto p-6">
                                <div class="flex flex-wrap  no-gutters">
                                    <div class="lg:w-1/3 w-full  pr-4 pl-4">
                                        @if (file_exists(storage_path('app/public/' . $visionMission[$key . '_photo']->content)))
                                            <div class="object-contain overflow-hidden  ">
                                                <img src="{{ asset('storage/' . $visionMission[$key . '_photo']->content) }}"
                                                    alt="">
                                            </div>
                                        @else
                                            <div class="object-contain overflow-hidden ">
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

    <section id="section-3">
        <div class="container mx-auto sm:px-4 mx-auto sm:px-4 mx-auto sm:px-4 text-center">
            <div class="flex flex-wrap  justify-center">
                <div class="col-auto">
                    <h3 class="text-midnight text-dec text-dec-secondary-2 text-dec-tl font-extrabold mb-2">
                        DATA KEPENGURUSAN
                    </h3>
                    <h6 class="text-gray font-light">
                        Data Kepengurusan himatif meliputi jumlah Proker, Pengurus, <br> dan Divisi yang ada setiap tahunnya
                    </h6>
                </div>
            </div>

            <div class="flex flex-wrap  justify-center text-left mt-4 mb-10">
                {{-- card styled of header on about page --}}
                <div class="md:w-1/2 pr-4 pl-4 lg:w-1/3 pr-4 pl-4 xl:w-1/4 pr-4 pl-4">
                    <div class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300 rounded-sm"
                        id="card-about-1">
                        <div class="flex-auto p-6 text-white">
                            <h5 class="font-extrabold">20 Proker</h5>
                            <div class="font-light my-2">Program kerja HIMATIF merupakan sejumlah kegiatan dan inisiatif
                                yang ditujukan untuk meningkatkan kualitas pendidikan, pengembangan soft skill dan hard
                                skill mahasiswa, serta memperkuat hubungan antar-mahasiswa dan dengan pihak-pihak terkait.
                            </div>
                            <a href="{{ url('/proker') }}" class="text-white">Lihat Detail <i
                                    class="fas fa-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2 pr-4 pl-4 lg:w-1/3 pr-4 pl-4 xl:w-1/4 pr-4 pl-4">
                    <div class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300 rounded-sm"
                        id="card-about-2">
                        <div class="flex-auto p-6 text-midnight">
                            <h5 class="font-extrabold">5 Divisi</h5>
                            <div class="text-gray font-light my-2">HIMATIF memiliki struktur kepengurusan yang bertanggung
                                jawab atas berbagai aspek dan kegiatan organisasi. Setiap divisi memiliki tugas pokok dan
                                fungsi masing-masing untuk mencapai tujuan organisasi secara keseluruhan.</div>
                            <a href="{{ url('/pengurus') }}" class="text-gray">Lihat Detail <i
                                    class="fas fa-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2 pr-4 pl-4 lg:w-1/3 pr-4 pl-4 xl:w-1/4 pr-4 pl-4">
                    <div class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300 rounded-sm"
                        id="card-about-3">
                        <div class="flex-auto p-6 text-midnight">
                            <h5 class="font-extrabold">50 Pengurus</h5>
                            <div class="text-gray font-light my-2">HIMATIF dikelola oleh individu-individu yang bertanggung
                                jawab atas manajemen dan pengelolaan organisasi serta pelaksanaan program-program yang telah
                                ditetapkan. </div>
                            <a href="{{ url('/pengurus') }}" class="text-gray">Lihat Detail <i
                                    class="fas fa-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="py-10">
                <h3 class="text-midnight text-dec text-dec-secondary-3 text-dec-tr font-extrabold mb-2">
                    {{ $slogan['1-text']->content }}
                </h3>
                <h6 class="text-gray font-light">
                    {{ $slogan['2-text2']->content }}
                </h6>

                <h2 class="text-midnight my-3 font-extrabold">
                    {{ $slogan['3-slogan']->content }}
                </h2>
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
