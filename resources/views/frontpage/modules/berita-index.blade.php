@extends('frontpage.layouts.app-frontpage')

@section('title', 'Berita')

@section('pageClass', 'blog')
@section('content')
    <main class="py-5 py-md-6 ">
        <div class="container mx-auto sm:px-4 ">
            <form action="{{ route('frontpage.berita') }}">
                <div class="flex flex-wrap mb-5 px-4">
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                    <div class="relative flex-grow max-w-full flex-1 ">
                        <div class="absolute inset-y-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="default-search" value="{{ Request::get('q') }}" name="q"
                            class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Masukan Keyword Berita..." required />
                        <input type="hidden" name="limit" value="{{ Request::get('limit') }}">
                        <button type="submit"
                            class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
                    </div>
                    {{-- <div class="relative flex-grow max-w-full flex-1 px-4">
                        <input type="text" name="q" value="{{ Request::get('q') }}"
                            placeholder="Masukan Keyword Berita..."
                            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded-md bg-transparent"
                            style="border: 0; border-bottom: 1px solid #E2E2E2;">
                        <input type="hidden" name="limit" value="{{ Request::get('limit') }}">
                    </div> --}}

                    {{-- <div class="col-auto">
                        <button
                            class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md py-1 px-3 leading-normal no-underline btn-gradient-primary">Cari
                            Berita</button>
                    </div> --}}
                </div>
            </form>
            <div class="flex flex-wrap w-full ">
                @foreach ($posts as $post)
                    <a href="{{ route('frontpage.berita.show', $post->slug) }}"
                        class="max-w-full flex-grow text-start white shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] p-6 mx-6 rounded-lg mb-3">
                        <h5 class="text-midnight  font-bold">{{ $post->title }}</h5>
                        <div class="text-sm text-gray mb-2">
                            {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                        </div>
                        <div class="flex flex-row  max-sm:flex-col justify-start items-start max-sm:items-center ">
                            <div class="flex-none h-48 w-48 mb-3 md:mb-0">
                                @if ($post->photo)
                                    <img class="h-full w-auto mx-auto object-cover "
                                        src="{{ asset('storage/' . $post->photo) }}" alt="" />
                                @else
                                    <img class="h-full w-auto mx-auto object-cover "
                                        src="{{ asset('img/placeholder/product-image-default.svg') }}" alt="" />
                                @endif
                            </div>
                            <div class=" text-wrap items-start justify-start px-4 py-2 h-36">
                                <div
                                    class="inline-block p-1 text-center font-semibold text-sm align-baseline leading-none rounded-md badge-link bg-gray mb-1">
                                    {{ $post->category->name }}
                                </div>
                                <p class="line-clamp-4 text-sm ">
                                    {{ strip_tags(str_replace(['<br>', '&nbsp;'], ' ', $post->body)) }}
                                    {{-- {{ substr(strip_tags(), 0, 320) . (strlen(strip_tags($post->body)) > 320 ? '...' : '') }} --}}
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach

                <div class="flex flex-wrap items-center justify-center mt-4 w-full py-4">
                    <div class="col-auto">
                        <form action="{{ route('frontpage.berita') }}">
                            <input type="hidden" name="q" value="{{ Request::get('q') }}">
                            <input type="hidden" name="limit" value="{{ Request::get('limit') + 8 }}">
                            <button
                                class="inline-block align-middle text-center select-none font-normal
                                whitespace-no-wrap text-white bg-gradient-to-r from-purple-800 to-purple-600 hover:bg-none
                                hover:text-purple-800 hover:border hover:border-purple-700 rounded-md py-3 px-4
                                leading-normal no-underline transition ease-in-out hover:scale-110 duration-300">
                                Tampilkan Lebih Banyak
                            </button>
                        </form>
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
    <script></script>
@endsection
