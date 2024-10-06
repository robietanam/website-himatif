@extends('frontpage.layouts.app-frontpage')

@section('title', 'Pemilu Himatif')

@section('pageClass', 'pemilu')
@section('content')
    <div class="relative w-full h-full ">
        <div class="absolute -z-40 w-full h-full bg-grid bg-repeat opacity-[0.03]">
        </div>
        <div class="absolute -z-50 w-full h-full bg-gray-100">
        </div>

        <div class="grid grid-cols-2 p-10">
            <div class="flex flex-col gap-2 justify-center items-center ">
                <div class="">
                    <p class="max-md:text-base"> Hello Mahasiswa Teknologi Informasi 👋, </p>
                    <p class="max-md:text-base">Selamat datang di ...</p>
                </div>
            </div>

            <div class="m-auto">
                <img src="/img/hd_logo.png" alt="Logo HIMATIF" class="h-72 max-md:h-56 max-sm:h-40 aspect-square">
            </div>
        </div>
        <div class="flex flex-col justify-center items-center gap-4 py-10">
            <div class="flex flex-col items-center ">
                <p class="text-[4rem] py-4 font-bold max-md:text-[3rem] max-sm:text-[2rem]">PEMILU HIMATIF 6.0</p>
            </div>
            <p class="text-xl">Dengan tema :</p>
            <div
                class="group relative flex items-center justify-center hover:cursor-pointer  transition-all duration-150 ease-in-out">
                <div
                    class="rounded-tr-3xl rounded-bl-3xl rounded-tl-lg rounded-br-lg border border-black w-[90%] bg-white group-hover:bg-black">
                    <p class="py-3 px-4 text-center font-semibold group-hover:text-white max-sm:text-sm">Mewujudkan
                        Kepemimpinan Inovatif
                        yang Kolaboratif, Responsif, Proaktif, dan Berintegritas bagi HIMATIF 2024/2025</p>
                </div>
                <div
                    class="absolute -bottom-2 max-sm:right-8 right-11 -z-10 rounded-tr-xl rounded-bl-3xl rounded-tl-lg rounded-br-lg  w-[90%] bg-red-400 group-hover:bg-white border border-transparent group-hover:border-black h-20">
                </div>
            </div>
        </div>

        <div class="flex flex-col justify-center items-center my-16 gap-4 text-center ">
            <p class="max-sm:text-base">Scoll Kebawah untuk melihat Visi dan Misi mereka</p>
            <div class="w-5 h-5 animate-bounce"><svg xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 256 256" xml:space="preserve">
                    <defs>
                    </defs>
                    <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;"
                        transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                        <path
                            d="M 90 24.25 c 0 -0.896 -0.342 -1.792 -1.025 -2.475 c -1.366 -1.367 -3.583 -1.367 -4.949 0 L 45 60.8 L 5.975 21.775 c -1.367 -1.367 -3.583 -1.367 -4.95 0 c -1.366 1.367 -1.366 3.583 0 4.95 l 41.5 41.5 c 1.366 1.367 3.583 1.367 4.949 0 l 41.5 -41.5 C 89.658 26.042 90 25.146 90 24.25 z"
                            style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                            transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                    </g>
                </svg>
            </div>
        </div>

        <div class="flex flex-col justify-center items-center w-full gap-8 mt-5">
            <p class="text-2xl font-extrabold text-center max-sm:text-lg">3 Alasan Kenapa Jangan Sampai Golput</p>
            <div class="grid lg:grid-cols-3 justify-center items-center w-[90%] gap-8 min-h-80 max-xl:min-h-56">
                <div
                    class="rounded-xl overflow-hidden border-black border-2 w-96 max-xl:w-80  h-full hover:scale-110 hover:cursor-pointer transition-all duration-150 ease-in-out">
                    <div
                        class="relative py-2 px-3 w-full h-1/4 border-b-2 border-black bg-green-400 flex justify-center items-center">
                        <p class="font-extrabold text-base  text-center text-black">
                            Partisipasi Aktif Mendorong Kepemimpinan yang Berkualitas
                        </p>
                    </div>
                    <div class="p-2 h-3/4 flex items-center bg-white">
                        <p class="text-center align-middle text-lg max-xl:text-sm">
                            Pemilihan umum adalah cara demokratis untuk menentukan pemimpin yang akan mewakili mahasiswa.
                            Dengan tidak Golput maka mahasiswa berpartisipasi aktif ini memastikan bahwa pemilihan dilakukan
                            secara adil dan demokratis.
                        </p>
                    </div>
                </div>
                <div
                    class="rounded-xl overflow-hidden border-black border-2 w-96 max-xl:w-80  h-full hover:scale-110 hover:cursor-pointer transition-all duration-150 ease-in-out">
                    <div
                        class="relative py-2 px-3 w-full h-1/4 border-b-2 border-black bg-green-400 flex justify-center items-center">
                        <p class="font-extrabold text-base  text-center text-black">
                            Menghormati Proses Demokrasi
                        </p>
                    </div>
                    <div class="p-2 h-3/4 flex items-center bg-white">
                        <p class="text-center align-middle text-lg max-xl:text-sm">
                            Dengan memberikan suara, mahasiswa ikut serta dalam pembentukan keputusan bersama dan
                            menunjukkan rasa tanggung jawab terhadap pilihan kepemimpinan yang akan mempengaruhi arah
                            himpunan.
                        </p>
                    </div>
                </div>
                <div
                    class="rounded-xl overflow-hidden border-black border-2 w-96 max-xl:w-80  h-full hover:scale-110 hover:cursor-pointer transition-all duration-150 ease-in-out">
                    <div
                        class="relative py-2 px-3 w-full h-1/4 border-b-2 border-black bg-green-400 flex justify-center items-center">
                        <p class="font-extrabold text-base  text-center text-black">
                            Meningkatkan Legitimasi Pemimpin Terpilih
                        </p>
                    </div>
                    <div class="p-2 h-3/4 flex items-center bg-white">
                        <p class="text-center align-middle text-lg max-xl:text-sm">
                            Memastikan bahwa kepemimpinan yang terpilih memiliki dukungan luas dari anggota himpunan. Jika
                            banyak anggota memilih untuk golput, pemimpin terpilih mungkin menghadapi tantangan untuk
                            meyakinkan anggota bahwa mereka memiliki dukungan yang diperlukan.
                        </p>
                    </div>
                </div>

            </div>
        </div>

        <div class="flex flex-col gap-4 mt-32">
            @foreach ($candidates as $key => $candidate)
                @if ($key > 0)
                    <div class="h-[1px] w-[97%] bg-black rounded-full mx-auto"></div>
                @endif
                @if ($key === 0)
                    <div class="relative w-full my-8">
                        <div class="grid md:grid-cols-6 grid-cols-1 gap-4">
                            <div
                                class=" relative col-span-2 max-sm:col-span-4 flex flex-col justify-end items-center h-[24rem] ">
                                <div
                                    class="absolute z-10 -top-4 h-fit px-4 py-1 w-fit -bottom-8 rounded-lg bg-white border-red-500 border-2">
                                    <p class="text-black font-bold"> Paslon {{ $candidate->id }}</p>
                                </div>
                                <img class="h-[24rem] w-fit object-cover overflow-hidden rounded-t-xl px-5 bg-purple-100 border-purple-700 border-t-4 border-r-4 border-l-4"
                                    src="{{ asset('storage/' . $candidate->photo) }}" alt="Candidate {{ $candidate->id }}">
                                <div
                                    class="relative h-fit w-fit min-w-80 flex items-center justify-center py-3 px-10 rounded-2xl border border-black bg-purple-400 ">
                                    <p class="text-center align-middle text-lg text-black font-extrabold ">
                                        {{ $candidate->nama }}</p>

                                </div>
                            </div>
                            <div class="col-span-4 px-10 w-full flex flex-col gap-8">
                                <div class="rounded-xl overflow-hidden border-black border-2">
                                    <div
                                        class="relative py-2 w-full border-b-2 border-black bg-blue-500 flex justify-center items-center">
                                        <p class="font-extrabold text-2xl ">
                                            Visi
                                        </p>
                                        <div class="absolute z-10 right-5 flex flex-row gap-2">
                                            <div class="rounded-full h-5 aspect-square bg-red-500 border border-black">
                                            </div>
                                            <div class="rounded-full h-5 aspect-square bg-green-500 border border-black">
                                            </div>
                                            <div class="rounded-full h-5 aspect-square bg-yellow-500 border border-black">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="py-5 px-8 bg-white max-sm:px-5">
                                        <p class="text-justify align-middle text-lg max-sm:text-sm ">
                                            {{ $candidate->visi }}
                                        </p>
                                    </div>
                                </div>
                                <div class="rounded-xl overflow-hidden border-black border-2">
                                    <div
                                        class="relative py-2 w-full border-b-2 border-black bg-green-400 flex justify-center items-center">
                                        <p class="font-extrabold text-2xl">
                                            Misi
                                        </p>
                                        <div class="absolute z-10 right-5 flex flex-row gap-2">
                                            <div class="rounded-full h-5 aspect-square bg-red-500 border border-black">
                                            </div>
                                            <div class="rounded-full h-5 aspect-square bg-green-500 border border-black">
                                            </div>
                                            <div class="rounded-full h-5 aspect-square bg-yellow-500 border border-black">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="py-5 px-8 max-sm:px-5 bg-white">
                                        <ol class="list-decimal px-10 max-sm:px-5">
                                            @foreach ($candidate->misi as $item)
                                                <li class="text-lg text-justify align-middle max-sm:text-sm">
                                                    {{ $item }} </li>
                                            @endforeach
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif ($key === 1)
                    <div class="relative w-full my-8">
                        <div class="grid md:grid-cols-6 grid-cols-1 ">
                            <div
                                class="md:order-last relative col-span-2 max-sm:col-span-4 flex flex-col justify-end items-center h-[24rem] ">
                                <div
                                    class="absolute z-10 -top-4 h-fit px-4 py-1 w-fit -bottom-8 rounded-lg bg-white border-red-500 border-2">
                                    <p class="text-black font-bold"> Paslon {{ $candidate->id }}</p>
                                </div>
                                <img class="h-[24rem] w-fit object-cover overflow-hidden rounded-t-xl px-5 bg-blue-100 border-blue-700 border-t-4 border-r-4 border-l-4"
                                    src="{{ asset('storage/' . $candidate->photo) }}" alt="Candidate {{ $candidate->id }}">
                                <div
                                    class="relative h-fit w-fit min-w-80 flex items-center justify-center py-3 px-10 rounded-2xl border border-black bg-blue-400 ">
                                    <p class="text-center align-middle text-lg text-black font-extrabold ">
                                        {{ $candidate->nama }}</p>

                                </div>
                            </div>
                            <div class="max-md:order-last col-span-4 px-10 w-full flex flex-col gap-8 mt-4">
                                <div class="rounded-xl overflow-hidden border-black border-2">
                                    <div
                                        class="relative py-2 w-full border-b-2 border-black bg-red-400 flex justify-center items-center">
                                        <p class="font-extrabold text-2xl ">
                                            Visi
                                        </p>
                                        <div class="absolute z-10 right-5 flex flex-row gap-2">
                                            <div class="rounded-full h-5 aspect-square bg-red-500 border border-black">
                                            </div>
                                            <div class="rounded-full h-5 aspect-square bg-green-500 border border-black">
                                            </div>
                                            <div class="rounded-full h-5 aspect-square bg-yellow-500 border border-black">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="py-5 px-8 bg-white  max-sm:px-5">
                                        <p class="text-justify align-middle text-lg max-sm:text-sm">
                                            {{ $candidate->visi }}
                                        </p>
                                    </div>
                                </div>
                                <div class="rounded-xl overflow-hidden border-black border-2">
                                    <div
                                        class="relative py-2 w-full border-b-2 border-black bg-purple-400 flex justify-center items-center">
                                        <p class="font-extrabold text-2xl">
                                            Misi
                                        </p>
                                        <div class="absolute z-10 right-5 flex flex-row gap-2">
                                            <div class="rounded-full h-5 aspect-square bg-red-500 border border-black">
                                            </div>
                                            <div class="rounded-full h-5 aspect-square bg-green-500 border border-black">
                                            </div>
                                            <div class="rounded-full h-5 aspect-square bg-yellow-500 border border-black">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="py-5 px-8  max-sm:px-5 bg-white">
                                        <ol class="list-decimal px-10  max-sm:px-5">
                                            @foreach ($candidate->misi as $item)
                                                <li class="text-lg text-justify max-sm:text-sm"> {{ $item }} </li>
                                            @endforeach
                                        </ol>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @elseif ($key === 2)
                    <div class="relative w-full my-8">
                        <div class="grid md:grid-cols-6 grid-cols-1 gap-4">
                            <div
                                class="relative col-span-2 max-sm:col-span-4 flex flex-col justify-end items-center h-[24rem] ">
                                <div
                                    class="absolute z-10 -top-4 h-fit px-4 py-1 w-fit -bottom-8 rounded-lg bg-white border-red-500 border-2">
                                    <p class="text-black font-bold"> Paslon {{ $candidate->id }}</p>
                                </div>
                                <img class="h-[24rem] w-fit object-cover overflow-hidden rounded-t-xl px-5 bg-purple-50 border-red-700 border-t-4 border-r-4 border-l-4"
                                    src="{{ asset('storage/' . $candidate->photo) }}"
                                    alt="Candidate {{ $candidate->id }}">
                                <div
                                    class="relative h-fit w-fit min-w-80 flex items-center justify-center py-3 px-10 rounded-2xl border border-black bg-red-400 ">
                                    <p class="text-center align-middle text-lg text-black font-extrabold ">
                                        {{ $candidate->nama }}</p>

                                </div>
                            </div>
                            <div class="col-span-4 px-10 w-full flex flex-col gap-8">
                                <div class="rounded-xl overflow-hidden border-black border-2">
                                    <div
                                        class="relative py-2 w-full border-b-2 border-black bg-purple-500 flex justify-center items-center">
                                        <p class="font-extrabold text-2xl ">
                                            Visi
                                        </p>
                                        <div class="absolute z-10 right-5 flex flex-row gap-2">
                                            <div class="rounded-full h-5 aspect-square bg-red-500 border border-black">
                                            </div>
                                            <div class="rounded-full h-5 aspect-square bg-green-500 border border-black">
                                            </div>
                                            <div class="rounded-full h-5 aspect-square bg-yellow-500 border border-black">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="py-5 px-8 bg-white  max-sm:px-5">
                                        <p class="text-justify align-middle text-lg  max-sm:text-sm">
                                            {{ $candidate->visi }}
                                        </p>
                                    </div>
                                </div>
                                <div class="rounded-xl overflow-hidden border-black border-2">
                                    <div
                                        class="relative py-2 w-full border-b-2 border-black bg-blue-400 flex justify-center items-center">
                                        <p class="font-extrabold text-2xl">
                                            Misi
                                        </p>
                                        <div class="absolute z-10 right-5 flex flex-row gap-2">
                                            <div class="rounded-full h-5 aspect-square bg-red-500 border border-black">
                                            </div>
                                            <div class="rounded-full h-5 aspect-square bg-green-500 border border-black">
                                            </div>
                                            <div class="rounded-full h-5 aspect-square bg-yellow-500 border border-black">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="py-5 px-8 bg-white  max-sm:px-5">
                                        <ol class="list-decimal px-10  max-sm:px-5">
                                            @foreach ($candidate->misi as $item)
                                                <li class="text-lg text-justify  max-sm:text-sm"> {{ $item }}
                                                </li>
                                            @endforeach
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="w-full flex flex-col gap-3 justify-center items-center py-14">
            <p class="text-center"> Klik tombol, jika sudah siap memberikan suara</p>
            <div onclick="location.href='{{ route('frontpage.pemilu.vote') }}'"
                class="bg-slate-600 py-2 px-5 rounded-full w-fit text-white hover:cursor-pointer hover:bg-slate-200 hover:text-slate-600 
                transition-all ease-out duration-200 scale-100 hover:scale-110 
                border-2 border-transparent hover:border-slate-900">
                <p class="mx-5 font-bold">
                    Vote Sekarang
                </p>
            </div>
        </div>
    </div>


@endsection

@section('style')
    <style>
    </style>
@endsection

@section('script')
    <script></script>
@endsection

<!--
<div class="relative col-span-2 flex flex-col justify-end items-center h-fit ">
                                    <div class="absolute z-10 -top-2 h-fit px-4 py-1 w-fit  rounded-lg bg-red-50 border-red-500 border-2">
                                        <p class="text-black font-extrabold "> Paslon {{ $candidate->id }}</p>
                                    </div>
                                    <div class="absolute top-16 bg-purple-600 rotate-12 w-60 h-60 -z-10">

                                    </div>
                                    <img class="h-[26rem] w-fit object-cover overflow-hidden rounded-t-xl px-5 -bottom-1"
                                        src="{{ asset('storage/' . $candidate->photo) }}" alt="Gambar Kandidat {{ $candidate->id }}">
                                    <div class=" relative h-fit w-fit min-w-80 flex items-center justify-center py-3 px-10 rounded-2xl border border-black bg-purple-400 ">
                                        <p class="text-center align-middle text-lg text-black font-extrabold ">
                                            {{ $candidate->nama }}</p>
                                            
                                    </div>
                                </div> -->
