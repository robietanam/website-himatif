@extends('_ui.frontpage.layouts.app-frontpage')

@section('title', 'Berita')

@section('pageClass', 'blog')
@section('content')
    <main class="py-5 py-md-10">
        <div class="container">
            <div class="row mb-5">
                <div class="col">
                    <input name="keyword" type="text" placeholder="Cari Post..." class="form-control bg-transparent"
                        style="border: 0; border-bottom: 1px solid #E2E2E2;">
                </div>
                <div class="col-auto">
                    <button class="btn btn-primary">Cari Blog</button>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">

                    <div class="card bg-white mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto mb-3 mb-md-0">
                                    <div
                                        class="img-fit img-fit-cover  w-100 h-20rem w-md-20rem h-md-20rem w-xl-30rem h-xl-30rem rounded-sm">
                                        <img src="{{ asset('img/galery/1.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col d-flex flex-column justify-content-between">
                                    <div>
                                        <h5 class="text-midnight font-bold mb-2">Event Baru Telah Hadir</h5>
                                        <p class="text-gray">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                            Minus corrupti ut magnam suscipit minima dolores vitae adipisci nobis a tenetur,
                                            ullam tempora expedita neque aperiam dolore deleniti repellendus ea optio.</p>
                                    </div>
                                    <span class="text-sm text-gray mt-3">20 April 2018</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="card bg-white">
                        <div class="card-body">

                            <h5 class="text-midnight font-bold mb-2">Blog Lainnya</h5>

                            <div class="row gutters-xs mb-3">
                                <div class="col-auto">
                                    <div class="img-fit img-fit-cover w-4rem h-4rem rounded-sm">
                                        <img src="{{ asset('img/galery/1.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col pl-1">
                                    <div class="text-midnight font-bold">Event Baru Telah Hadir</div>
                                    <div class="text-sm text-gray">Lorem, ipsum...</div>
                                </div>
                            </div>
                            <div class="row gutters-xs mb-3">
                                <div class="col-auto">
                                    <div class="img-fit img-fit-cover w-4rem h-4rem rounded-sm">
                                        <img src="{{ asset('img/galery/1.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col pl-1">
                                    <div class="text-midnight font-bold">Event Baru Telah Hadir</div>
                                    <div class="text-sm text-gray">Lorem, ipsum...</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

@section('style')
    <style>

    </style>
@endsection

@section('script')
    <script>

    </script>
@endsection
