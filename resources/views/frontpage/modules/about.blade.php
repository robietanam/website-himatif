@extends('frontpage.layouts.app-frontpage')

@section('title', 'TENTANG')

@section('pageClass', 'about')
@section('content')

    <header>
        <div class="container text-center">
            <h3 class="text-midnight text-dec text-dec-secondary-3 text-dec-tr font-extrabold mb-2">
                TENTANG HIMATIF
            </h3>
            <h6 class="text-gray font-light">
                HIMATIF (Himpunan Mahasiswa Teknologi Informasi) adalah Salah satu Organisasi Mahasiswa di Fakultas Ilmu
                Komputer Universitas Jember. Terbentuknya HIMATIF dirintis oleh 7 Orang Mahasiswa Teknologi Informasi pada
                tanggal 6 Agustus 2017.
            </h6>
        </div>
    </header>

    <section id="section-1">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-5">
                    <h3 class="text-dec text-dec-info-1 text-dec-tr text-midnight font-extrabold mb-2">
                        Makna Logo HIMATIF
                    </h3>
                    <p class="text-gray">
                        Makna Logo Himpunan Mahasiswa Teknologi Informasi
                    </p>
                </div>
                <div class="col-lg-4">
                    <img src="{{ asset('img/logo.png') }}" alt="" class="img-fluid">
                </div>
                <div class="col-lg-8">
                    <ul class="list-about mt-5">
                        <li class="list-about-item">
                            <div class="row justify-content-around">
                                <div class="col-md-6">
                                    <div class="w-4rem h-4rem bg-gray border-lg border-black rounded-circle mb-2"></div>
                                    <p>
                                        Warna Abu-abu bermakna <b>kemantapan kejayaan dan kesejahteraan</b>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <div class="w-4rem h-4rem bg-light border-lg border-black rounded-circle mb-2"></div>
                                    <p>
                                        Warna putih bermakna <b>kesucian dan kejujuran</b>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="list-about-item">
                            <div class="row justify-content-around">
                                <div class="col-md-6">
                                    <p>
                                        Segi delapan melambangkan bulan <b>terbentuknya HIMATIF yaitu bulan Agustus</b>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        Garis berwarna kuning melambangkan <b>sikap optimis dan selalu berfikiran
                                            positif</b>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="list-about-item">
                            <div class="row justify-content-around">
                                <div class="col-md-6">
                                    <p>
                                        Orang mengelilingi lambang UNEJ melambangkan <b>HIMATIF berada
                                            dalam naungan Universitas Jember
                                            dan merupakan bagian dari
                                            keluarga Universitas Jember</b>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        Lambang Orang yang saling merangkul mengartikan <b>rasa kekeluargaan, solidaritas
                                            yang tinggi, dan kebersamaan</b>, berjumlah enam melambangkan <b>tanggal
                                            terbentuknya HIMATIF yaitu tanggal 06</b>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="list-about-item">
                            <div class="row justify-content-around">
                                <div class="col-md-6">
                                    <p>
                                        Warna Abu-abu dan Putih melambangkan <b>Fakultas Ilmu Komputer yang menaungi
                                            HIMATIF</b>
                                    </p>
                                </div>
                                <div class="col-md-6">
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
                                        Unggul dalam pengembangan ilmu pengetahuan dan teknologi bidang teknologi informasi
                                        untuk menunjang pertanian industrial pada tahun 2035
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
                                        1. Menyelenggarakan pendidikan program sarjana bidang teknologi informasi secara
                                        profesional
                                        <br>
                                        2. Menyiapkan sumber daya manusia yang berkualitas dalam penguasaan kompetensi
                                        materi teknologi informasi terutama pada pengembangan pertanian industrial
                                        <br>
                                        3. Mengembangkan ilmu pengetahuan dan teknologi informasi bagi kepentingan
                                        kemanusiaan
                                        <br>
                                        4. Memberdayakan masyarakat melalui penerapan teknologi informasi dan komunikasi
                                        <br>
                                        5. Mengembangkan jaringan kerjasama dengan pemangku kepentingan (Stakeholders) dalam
                                        bidang teknologi informasi
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="section-3">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-auto">
                    <h3 class="text-midnight text-dec text-dec-secondary-2 text-dec-tl font-extrabold mb-2">
                        DATA KEPENGURUSAN
                    </h3>
                    <h6 class="text-gray font-light">
                        Data Kepengurusan himatif meliputi jumlah Proker, Pengurus, <br> dan Divisi yang ada setiap tahunnya
                    </h6>
                </div>
            </div>

            <div class="row justify-content-center text-left mt-4 mb-10">
                {{-- card styled of header on about page --}}
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card rounded-sm" id="card-about-1">
                        <div class="card-body text-white">
                            <h5 class="font-extrabold">17 Proker</h5>
                            <div class="font-light my-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum
                                labore consectetur facere aut sed cum mollitia quo! Nam libero unde deserunt ipsa. Nam,
                                corporis.</div>
                            <a href="" class="text-white">Lihat Detail <i class="fas fa-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card rounded-sm" id="card-about-2">
                        <div class="card-body text-midnight">
                            <h5 class="font-extrabold">5 Divisi</h5>
                            <div class="text-gray font-light my-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Rerum labore consectetur facere aut sed cum mollitia quo! Nam libero unde deserunt ipsa.
                                Nam, corporis.</div>
                            <a href="" class="text-gray">Lihat Detail <i class="fas fa-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card rounded-sm" id="card-about-3">
                        <div class="card-body text-midnight">
                            <h5 class="font-extrabold">36 Pengurus</h5>
                            <div class="text-gray font-light my-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Rerum labore consectetur facere aut sed cum mollitia quo! Nam libero unde deserunt ipsa.
                                Nam, corporis.</div>
                            <a href="" class="text-gray">Lihat Detail <i class="fas fa-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="py-10">
                <h3 class="text-midnight text-dec text-dec-secondary-3 text-dec-tr font-extrabold mb-2">
                    Slogan HIMATIF
                </h3>
                <h6 class="text-gray font-light">
                    Slogan Himpunan Mahasiswa Teknologi Informasi
                </h6>

                <h2 class="text-midnight my-3 font-extrabold">
                    “ MUDA, TIDAK MENYERAH! ”
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
    <script>

    </script>
@endsection
