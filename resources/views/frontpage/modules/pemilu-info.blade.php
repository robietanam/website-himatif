@extends('frontpage.layouts.app-frontpage')

@section('title', 'Pemilu Himatif')

@section('pageClass', 'pemilu')
@section('content')

    <div class="container p-10 max-sm:px-4 max-sm:py-10 mx-auto bg-white">
        @if (request()->query('status') === 'campaign')
            <div class="text-center w-full px-20 max-sm:px-4 flex flex-col justify-center items-center ">
                <h2 class="font-bold max-sm:text-3xl">
                    Periode Voting Belum Dimulai
                </h2>

                <img src="{{ asset('img/illustration/vote-info.svg') }}" alt=""
                    class="w-2/4 max-sm:w-full my-10 rounded-md" />

                <p class="max-sm:text-base">
                    Silahkan klik <a href="/pemilu"
                        class="bg-blue-500 px-2 py-1 rounded-lg text-white hover:bg-white hover:text-blue-500">Link</a>
                    berikut untuk melihat visi & misi kandidat Pemilu HIMATIF 2024.
                </p>
            </div>
        @elseif (request()->query('status') === 'ended')
            <div class="text-center w-full px-20 max-sm:px-4  flex flex-col justify-center items-center">
                <h2 class="font-bold max-sm:text-3xl">
                    Periode Pemilu Telah Berakhir
                </h2>

                <img src="{{ asset('img/illustration/vote-info.svg') }}" alt=""
                    class="w-2/4 max-sm:w-full my-10 rounded-md" />

                <p>
                    Terima kasih sudah mengikuti kegiatan Pemilu HIMATIF 2024.
                </p>
            </div>
        @elseif (request()->query('status') === 'notstarted')
            <div class="text-center w-full px-20 max-sm:px-4  flex flex-col justify-center items-center">
                <h2 class="font-bold max-sm:text-3xl ">
                    Periode Pemilu Belum Dimulai
                </h2>

                <img src="{{ asset('img/illustration/vote-info.svg') }}" alt=""
                    class="w-2/4 max-sm:w-full my-10 rounded-md" />

                <p class="max-sm:text-base">
                    Silahkan menunggu informasi lebih lanjut terkait PEMILU HIMATIF 2024.
                </p>
            </div>
        @elseif (request()->query('status') === 'success')
            <div class="text-center w-full px-20 max-sm:px-4 flex flex-col justify-center items-center ">
                <h2 class="font-bold max-sm:text-3xl">
                    Suara Berhasil Disimpan ✔
                </h2>

                <img src="{{ asset('img/illustration/vote-info.svg') }}" alt=""
                    class="w-2/4 max-sm:w-full my-10 rounded-md" />

                <p class="max-sm:text-base">
                    Terima kasih sudah mengikuti kegiatan Pemilu HIMATIF 2024.
                </p>
            </div>
        @else
            <div class="text-center w-full px-20 max-sm:px-4  flex flex-col justify-center items-center">
                <h2 class="font-bold max-sm:text-3xl">
                    Pemilu HIMATIF 2024
                </h2>

                <img src="{{ asset('img/illustration/vote-info.svg') }}" alt=""
                    class="w-2/4 max-sm:w-full my-10 rounded-md" />

                <p class="max-sm:text-base">
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
