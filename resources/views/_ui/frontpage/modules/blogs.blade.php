@extends('_ui.frontpage.layouts.app-frontpage')

@section('title', 'detail')

@section('pageClass', 'blog')

@section('content')
<section id="section-1">
    <div class="container">
        <div class="row">
            <div class="col-10">
                <p class="text-link mb-1">Cari blog</p>
                <div class="divider"></div>
            </div>
            <div class="col-2">
                <button class="btn btn-block btn-outline-primary btn-sm">Cari blog</button>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mt-5">
            {{-- blog list --}}
            <div class="col-8">
                <div class="row">
                    {{-- data --}}
                    <div class="col-xs-12 col-sm-12 mb-1">
                        <div class="card card-vision shadow-midnight-sm rounded">
                            <div class="card-body">
                                <div class="row no-gutters">
                                    <h5 class="text-midnight text-shadowed font-extrabold mb-2">
                                        Event Baru Telah Hadir
                                    </h5>
                                    <div class="img-fit img-fit-cover h-30rem w-100 mb-2 rounded">
                                        <img src="http://127.0.0.1:8000/img/misc/visi.png" alt="">
                                    </div>
                                    <div class="text-gray mb-5">
                                        Lorem ipsum dolor sit amet,
                                        consectetur adipiscing elit. Tempor
                                        nulla convallis donec neque urna, a
                                        nunc commodo. Tincidunt viverra sit
                                        urna, mauris maecenas lorem vitae.
                                    </div>
                                    <div class="text-gray pt-3">20 April 2018</div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- blog lainnya --}}
            <div class="col-4">
                <div class="card card-vision shadow-midnight-sm rounded">
                    <div class="card-body">
                    <h5 class="text-midnight text-shadowed font-extrabold mb-2">
                        Blog lainnya
                    </h5>
                    <div class="row no-gutters">
                        {{-- data --}}
                        <div class="col-12">
                            <div class="row no-gutters">
                                <div class="col-4">
                                    <div class="img-fit img-fit-cover h-5rem w-5rem w-lg-80 h-lg-40">
                                        <img src="http://127.0.0.1:8000/img/misc/visi.png" alt="">
                                    </div>
                                </div>
                                <div class="col-8">
                                    <h7 class="text-midnight text-shadowed font-extrabold mb-2">
                                        Event Baru Telah Hadir
                                    </h7>
                                    <div class="text-gray mb-5">
                                        lorem ipsum dolor ammet..
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row no-gutters">
                                <div class="col-4">
                                    <div class="img-fit img-fit-cover h-5rem w-5rem w-lg-80 h-lg-40">
                                        <img src="http://127.0.0.1:8000/img/misc/visi.png" alt="">
                                    </div>
                                </div>
                                <div class="col-8">
                                    <h7 class="text-midnight text-shadowed font-extrabold mb-2">
                                        Event Baru Telah Hadir
                                    </h7>
                                    <div class="text-gray mb-5">
                                        lorem ipsum dolor ammet..
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection
