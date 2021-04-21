@extends('_ui.frontpage.layouts.app-frontpage')

@section('title', 'TENTANG')

@section('pageClass', 'about')
@section('content')

    <header>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 col-lg-auto">
                    <img src="{{ asset('img/logo.png') }}" alt="" class="img-fluid"> 
                </div>
                <div class="col-md">
                    <h3 class="text-midnight text-dec text-dec-secondary-3 text-dec-tr font-extrabold mb-2">
                        TENTANG HIMATIF
                    </h3>
                    <h6 class="text-gray font-light">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat elementum 
                        consequat magna eu volutpat orci. Lacus bibendum vivamus nulla aliquet sed imperdiet 
                        id viverra. Lobortis aliquet est integer nibh ut elementum. Egestas at sollicitudin sed 
                        justo, in.
                    </h6>
                </div>
            </div>
        </div>
    </header>

    <section id="section-1">
        <div class="container">
            <h3 class="text-midnight text-dec text-dec-info-1 text-dec-tr font-extrabold mb-2">
                CERITA SINGKAT
            </h3>
            <h6 class="text-gray font-light">
                Cerita singkat terbentuknya himatif hingga sampai saat ini.
            </h6>

            @php
                $stories_data = [
                    ['img' => '1.jpg', 'title' => 'Tanggal 6 Agustus 2017 Terbentuknya HIMATIF', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos numquam ut dolorum ipsam porro adipisci accusantium commodi molestiae suscipit iure at, aliquam aut nostrum inventore similique quasi eius corporis aperiam.'],
                    ['img' => '2.jpg', 'title' => '7 Perintis HIMATIF', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos numquam ut dolorum ipsam porro adipisci accusantium commodi molestiae suscipit iure at, aliquam aut nostrum inventore similique quasi eius corporis aperiam.'],
                    ['img' => '3.jpg', 'title' => 'Proker Pertama', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos numquam ut dolorum ipsam porro adipisci accusantium commodi molestiae suscipit iure at, aliquam aut nostrum inventore similique quasi eius corporis aperiam.'],
                    ['img' => '4.jpg', 'title' => 'HIMATIF saat ini', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos numquam ut dolorum ipsam porro adipisci accusantium commodi molestiae suscipit iure at, aliquam aut nostrum inventore similique quasi eius corporis aperiam.'],
                ];
            @endphp

            <ul class="list-about mt-5">
                @foreach ($stories_data as $story)
                <li class="list-about-item">
                    <div class="row justify-content-around">
                        <div class="col-md-6 col-lg-5">
                            <img src="{{ asset('img/galery/'.$story['img']) }}" alt="" class="img-fluid rounded-sm">
                        </div>
                        <div class="col-md col-lg-6 pt-2">
                            <h4 class="text-midnight font-extrabold">Tanggal 6 Agustus 2017 Terbentuknya HIMATIF</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium at maiores ipsum voluptatem deleniti aliquid eligendi eum magni assumenda, temporibus aspernatur corporis, in harum illo ad. Beatae dignissimos veritatis nemo?</p>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>

        </div>
    </section>

    <section id="section-2">
        <div class="container">
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

            <div class="row justify-content-center text-left mt-4">
                {{-- card styled of header on about page --}}
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card rounded-sm" id="card-about-1">
                        <div class="card-body text-white">
                            <h5 class="font-extrabold">17 Proker</h5>
                            <div class="font-light my-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum labore consectetur facere aut sed cum mollitia quo! Nam libero unde deserunt ipsa. Nam, corporis.</div>
                            <a href="" class="text-white">Lihat Detail <i class="fas fa-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card rounded-sm" id="card-about-2">
                        <div class="card-body text-midnight">
                            <h5 class="font-extrabold">5 Divisi</h5>
                            <div class="text-gray font-light my-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum labore consectetur facere aut sed cum mollitia quo! Nam libero unde deserunt ipsa. Nam, corporis.</div>
                            <a href="" class="text-gray">Lihat Detail <i class="fas fa-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card rounded-sm" id="card-about-3">
                        <div class="card-body text-midnight">
                            <h5 class="font-extrabold">36 Pengurus</h5>
                            <div class="text-gray font-light my-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum labore consectetur facere aut sed cum mollitia quo! Nam libero unde deserunt ipsa. Nam, corporis.</div>
                            <a href="" class="text-gray">Lihat Detail <i class="fas fa-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>
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