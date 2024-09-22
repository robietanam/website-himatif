@extends('frontpage.layouts.app-frontpage')

@section('title', 'Pemilu Himatif')

@section('pageClass', 'pemilu')
@section('content')
    <div>
        <div class="grid grid-cols-2 p-10">
            <div class="flex flex-col gap-2">
                <div>
                    <p> Hello Mahasiswa Teknologi Informasi 👋, </p>
                    <p>Jangan Lupa Pilih Caketum HIMATIF ya.</p>
                </div>
                <div>
                    <h2>
                        Pemilu Himatif 6.0
                    </h2>
                    <p>
                        Pemilu | Ketua Umum HIMATIF
                    </p>
                </div>


                <p class="font-bold mt-6">
                    Scroll kebawah untuk melihat visi dan misi dari tiap Calon Ketua Umum HIMATIF 2023
                </p>

            </div>
            <div class="m-auto">
                <img src="/img/hd_logo.png" alt="Logo HIMATIF" class="h-96 w-fit">
            </div>
        </div>
        <div class="flex flex-col gap-4">
            @foreach ($candidates as $key => $candidate)
                @if ($key % 2 === 0)
                    <div class="relative w-full ">
                        <div class="grid grid-cols-6">
                            <div class="relative col-span-2 flex flex-row justify-evenly items-end  h-[24rem] ">
                                <div class="absolute -z-10 bg-gray-500 w-full h-full rounded-r-full"></div>
                                <div class="h-full flex items-center justify-center">
                                    <p class="text-center align-middle text-lg pb-2 text-white font-bold ">
                                        {{ $candidate->nama }}</p>
                                </div>
                                <img class="h-[24rem] w-fit object-cover overflow-hidden rounded-lg"
                                    src="{{ asset('storage/' . $candidate->photo) }}" alt="Candidate {{ $candidate->id }}">
                            </div>
                            <div class="col-span-4 px-10 w-full">
                                <div class=" w-full px-6 pt-6 rounded-xl flex flex-col gap-4 justify-center items-center">

                                    <div class="flex flex-col justify-center items-center">
                                        <p class="font-extrabold text-2xl">
                                            Visi
                                        </p>
                                        <p class="text-center align-middle text-lg">
                                            {{ $candidate->visi }}
                                        </p>
                                    </div>
                                    <div class="flex flex-col justify-center items-center">
                                        <p class="font-extrabold text-2xl">
                                            Misi
                                        </p>
                                        <ol class="list-decimal px-10">
                                            @foreach ($candidate->misi as $item)
                                                <li class="text-lg text-justify"> {{ $item }} </li>
                                            @endforeach
                                        </ol>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                @else
                    <div class="relative w-full ">
                        <div class="grid grid-cols-6 ">
                            <div class="col-span-4 px-10 w-full">
                                <div class=" w-full px-6 pt-6 rounded-xl flex flex-col gap-4 justify-center items-center">
                                    <div class="flex flex-col justify-center items-center">
                                        <p class="font-extrabold text-2xl">
                                            Visi
                                        </p>
                                        <p class="text-center align-middle text-lg">
                                            {{ $candidate->visi }}
                                        </p>
                                    </div>
                                    <div class="flex flex-col justify-center items-center">
                                        <p class="font-extrabold text-2xl">
                                            Misi
                                        </p>
                                        <ol class="list-decimal px-10">
                                            @foreach ($candidate->misi as $item)
                                                <li class="text-lg text-justify"> {{ $item }} </li>
                                            @endforeach
                                        </ol>
                                    </div>

                                </div>
                            </div>
                            <div class="relative col-span-2 flex flex-row justify-evenly items-end h-[24rem] ">
                                <div class="absolute -z-10 bg-gray-500 w-full h-full rounded-l-full right-0"></div>
                                <div class="h-full flex items-center justify-center">
                                    <p class="text-center align-middle text-lg pb-2 text-white font-bold">
                                        {{ $candidate->nama }}</p>
                                </div>
                                <img class="h-[24rem] w-fit object-cover overflow-hidden rounded-lg"
                                    src="{{ asset('storage/' . $candidate->photo) }}" alt="Candidate {{ $candidate->id }}">
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="w-full flex flex-col gap-3 justify-center items-center py-14">
            <p> Klik tombol, jika sudah siap memberikan suara</p>
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
