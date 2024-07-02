@extends('frontpage.layouts.app-frontpage')

@section('title', 'Berita')

@section('pageClass', 'blog')
@section('content')
    <main class="py-5 py-md-6 mx-4  ">
        <div class="container mx-auto sm:px-32 ">
            <p class="text-4xl  text-midnight text-center"> NIM Checker Mahasiswa Teknologi Informasi </p>
            <form action="{{ route('frontpage.nim-checker') }}">
                <div class="flex flex-wrap mb-5 mt-5">
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Search</label>
                    <div class="relative flex-grow max-w-full flex-1 ">
                        <div class="absolute inset-y-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="default-search" value="{{ Request::get('q') }}" name="q"
                            class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-gray-500 focus:border-gray-500 "
                            placeholder="Masukan NIM atau Nama Mahasiswa" required />
                        <input type="hidden" name="limit" value="{{ Request::get('limit') ?? 8 }}">
                        <button type="submit"
                            class="text-white absolute end-2.5 bottom-2.5 bg-yellow-600 hover:bg-[#f3eecb] hover:text-black focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 ">Search</button>
                    </div>

                </div>
            </form>
            <div class="flex flex-wrap w-full ">
                @foreach ($nims as $nim)
                    <div tabindex="0"
                        class="collapse collapse-arrow border mb-3 shadow-md bg-gray-50 hover:border-yellow-400 focus:border-yellow-400">
                        <div class="collapse-title text-xl text-midnight font-medium ">
                            {{ $nim->nim }}
                        </div>
                        <div class="collapse-content grid grid-rows-4 ">
                            <div class="grid grid-cols-4 lg:grid-cols-8 ">
                                <p class="col-span-1 max-lg:text-lg">Nama</p>
                                <p class="col-span-3 lg:col-span-7 max-lg:text-lg">{{ $nim->name }}</p>
                            </div>
                            <div class="grid grid-cols-4 lg:grid-cols-8">
                                <p class="col-span-1 max-lg:text-lg">NIM</p>
                                <p class="col-span-3 lg:col-span-7 max-lg:text-lg">{{ $nim->nim }}</p>
                            </div>
                            <div class="grid grid-cols-4 lg:grid-cols-8">
                                <p class="col-span-1 max-lg:text-lg">Angkatan</p>
                                <p class="col-span-3 lg:col-span-7 max-lg:text-lg">{{ $nim->angkatan }}</p>
                            </div>
                            <div class="grid grid-cols-4 lg:grid-cols-8">
                                <p class="col-span-1 max-lg:text-lg">Status</p>
                                <p class="col-span-3 lg:col-span-7 max-lg:text-lg">{{ $nim->status }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

                @if (isset($nims) && $nims !== [])
                    <div class="flex flex-wrap items-center justify-center mt-4 w-full py-4">
                        <div class="col-auto">
                            <form action="{{ route('frontpage.nim-checker') }}">
                                <input type="hidden" name="q" value="{{ Request::get('q') }}">
                                <input type="hidden" name="limit" value="{{ Request::get('limit') + 8 }}">
                                <button
                                    class="inline-block align-middle text-center select-none font-normal
                                whitespace-no-wrap text-white bg-gradient-to-r from-yellow-800 to-yellow-600 hover:bg-none
                                hover:text-yellow-800 hover:border hover:border-yellow-700 rounded-md py-3 px-4
                                leading-normal no-underline transition ease-in-out hover:scale-110 duration-300">
                                    Tampilkan Lebih Banyak
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="flex flex-wrap items-center justify-center mt-4 w-full py-32">
                        <div class="col-auto">
                            <p class="text-center"> Gunakan Pencarian Untuk Menampilkan List Detail Mahasiswa </p>
                        </div>
                    </div>
                @endif

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
    <script></script>
@endsection
