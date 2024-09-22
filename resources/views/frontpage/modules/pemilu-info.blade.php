@extends('frontpage.layouts.app-frontpage')

@section('title', 'Pemilu Himatif')

@section('pageClass', 'pemilu')
@section('content')

    <div class="container p-10 mx-auto">

        @if (request()->query('status') === 'campaign')
            <div class="text-center w-full px-20  flex flex-col justify-center items-center">
                <h2 class="font-bold">
                    Periode Voting Belum Dimulai
                </h2>

                <img src="{{ asset('img/illustration/vote-info.svg') }}" alt=""
                    class="w-2/4 w-md-50 my-10 rounded-md" />

                <p>
                    Silahkan klik <a href="/pemilu"
                        class="bg-blue-500 px-2 py-1 rounded-lg text-white hover:bg-white hover:text-blue-500">Link</a>
                    berikut untuk melihat visi & misi kandidat Pemilu HIMATIF 2024.
                </p>
            </div>
        @elseif (request()->query('status') === 'ended')
            <div class="text-center w-full px-20  flex flex-col justify-center items-center">
                <h2 class="font-bold">
                    Periode Pemilu Telah Berakhir
                </h2>

                <img src="{{ asset('img/illustration/vote-info.svg') }}" alt=""
                    class="w-2/4 w-md-50 my-10 rounded-md" />

                <p>
                    Terima kasih sudah mengikuti kegiatan Pemilu HIMATIF 2024.
                </p>
            </div>
        @elseif (request()->query('status') === 'notstarted')
            <div class="text-center w-full px-20  flex flex-col justify-center items-center">
                <h2 class="font-bold">
                    Periode Pemilu Belum Dimulai
                </h2>

                <img src="{{ asset('img/illustration/vote-info.svg') }}" alt=""
                    class="w-2/4 w-md-50 my-10 rounded-md" />

                <p>
                    Silahkan menunggu informasi lebih lanjut terkait PEMILU HIMATIF 2024.
                </p>
            </div>
        @elseif (request()->query('status') === 'success')
            <div class="text-center w-full px-20 flex flex-col justify-center items-center ">
                <h2 class="font-bold">
                    Suara Berhasil Disimpan ✔
                </h2>

                <img src="{{ asset('img/illustration/vote-info.svg') }}" alt=""
                    class="w-2/4 w-md-50 my-10 rounded-md" />

                <p>
                    Terima kasih sudah mengikuti kegiatan Pemilu HIMATIF 2024.
                </p>
            </div>
        @else
            <div class="text-center w-full px-20  flex flex-col justify-center items-center">
                <h2 class="font-bold">
                    Pemilu HIMATIF 2024
                </h2>

                <img src="{{ asset('img/illustration/vote-info.svg') }}" alt=""
                    class="w-2/4 w-md-50 my-10 rounded-md" />

                <p>
                    Silahkan nantikan informasi lebih lanjut terkait Pemilu HIMATIF 2024.
                </p>
            </div>
        @endif

    </div>

@endsection

@section('style')
    <style>

    </style>
@endsection

@section('script')
    <script></script>
@endsection
