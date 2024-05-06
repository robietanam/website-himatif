@extends('dashboard._layouts.app')

@section('title', 'Detail Data Post') {{-- title --}}
@section('header', 'Posts') {{-- header --}}

@section('breadcrumb') {{-- breadcrumb --}}
    <div class="inline-block px-2 py-2 text-gray-700 active"><a href="{{ route('dashboard.admin.posts.index') }}">Posts</a>
    </div>
    <div class="inline-block px-2 py-2 text-gray-700">Detail Post</div>
@endsection {{-- end of breadcrumb --}}

@section('content') {{-- content --}}
    <div class="flex flex-wrap  gutters-xs items-center justify-end my-4">
        <div class="relative lg:flex-grow lg:flex-1">
            <h4>Detail Post</h4>
        </div>
        <div class="relative flex-grow max-w-full flex-1 px-4 col-md-auto">
            <a href="{{ route('dashboard.admin.posts.index') }}"
                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md py-1 px-3 leading-normal no-underline text-gray-600 border-gray-600 hover:bg-gray-600 hover:text-white bg-white hover:bg-gray-700">
                <i class="fas fa-arrow-left mr-1"></i> Semua Data
            </a>
        </div>
    </div>

    <div class="flex flex-wrap ">
        <div class="lg:w-2/3 pr-4 pl-4">
            <div class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300">
                <div class="flex-auto p-6">
                    <h2 class="mb-2">{{ $post->title }}</h2>
                    <div class="mb-3">
                        {{ $post->category->name }}
                    </div>

                    @if ($post->photo)
                        <div class="img-fit img-fit-cover w-full h-24rem bg-red-600 rounded-sm text-center mb-3">
                            <img src="{{ $post->photo }}" alt="Post">
                        </div>
                    @else
                        <div class="img-fit img-fit-contain w-full h-24rem bg-whitesmoke mb-3">
                            <img src="{{ asset('img/placeholder/product-image-default.svg') }}" alt="Post">
                        </div>
                    @endif

                    <p>
                        {!! $post->body !!}
                    </p>
                </div>
            </div>
        </div>
        <div class="relative lg:flex-grow lg:flex-1">
            <a href="{{ route('frontpage.berita.show', $post->slug) }}" target="_blank"
                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md py-1 px-3 leading-normal no-underline block w-full bg-blue-600 text-white hover:bg-blue-600 mb-3">Tampilkan
                Preview</a>
            <div
                class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300 mb-2">
                <div class="flex-auto p-6">
                    {{-- user_id --}}
                    <div class="text-14 text-gray-900 mb-2">Dibuat Oleh</div>
                    <div class="flex flex-wrap  gutters-xs">
                        <div class="col-auto"><i class="fas fa-user"></i></div>
                        <div class="relative flex-grow max-w-full flex-1 px-4">
                            <div class="text-14 text-gray-900">{{ $post->user->name }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300 mb-2">
                <div class="flex-auto p-6">
                    {{-- status --}}
                    <div class="flex flex-wrap  items-center mb-3">
                        <div class="relative flex-grow max-w-full flex-1 px-4 text-14 text-gray-900">Status</div>
                        <div class="col-auto">
                            @if ($post->status === '1')
                                <div
                                    class="inline-block p-1 text-center font-semibold text-sm align-baseline leading-none rounded-md block bg-green-500 text-white hover:green-600">
                                    Aktif</div>
                            @else
                                <div
                                    class="inline-block p-1 text-center font-semibold text-sm align-baseline leading-none rounded-md block bg-gray-600 text-white hover:bg-gray-700">
                                    Tidak Aktif</div>
                            @endif
                        </div>
                    </div>
                    {{-- is_featured --}}
                    <div class="flex flex-wrap  items-center">
                        <div class="relative flex-grow max-w-full flex-1 px-4 text-14 text-gray-900">Jenis Post</div>
                        <div class="col-auto">
                            @if ($post->is_featured === '1')
                                <div
                                    class="inline-block p-1 text-center font-semibold text-sm align-baseline leading-none rounded-md block bg-green-500 text-white hover:green-600">
                                    Post Utama</div>
                            @else
                                <div
                                    class="inline-block p-1 text-center font-semibold text-sm align-baseline leading-none rounded-md block bg-gray-600 text-white hover:bg-gray-700">
                                    Post Biasa</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300 mb-0">
                <div class="flex-auto p-6">
                    {{-- created_at --}}
                    <div class="flex flex-wrap  items-center mb-3">
                        <div class="relative flex-grow max-w-full flex-1 px-4 text-14 text-gray-900">Dibuat Pada</div>
                        <div class="col-auto">
                            {{ $post->getHumanDate('created_at') }}
                        </div>
                    </div>
                    {{-- created_at --}}
                    <div class="flex flex-wrap  items-center">
                        <div class="relative flex-grow max-w-full flex-1 px-4 text-14 text-gray-900">Terakhir di update Pada
                        </div>
                        <div class="col-auto">
                            {{ $post->getHumanDate('updated_at') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection {{-- end of content --}}
