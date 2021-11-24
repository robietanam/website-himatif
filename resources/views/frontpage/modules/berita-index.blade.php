@extends('frontpage.layouts.app-frontpage')

@section('title', 'Berita')

@section('pageClass', 'blog')
@section('content')
    <main class="py-5 py-md-6">
        <div class="container">
            <form action="{{ route('frontpage.berita') }}">
                <div class="row mb-5">
                    <div class="col">
                        <input
                            type="text"
                            name="q"
                            value="{{ Request::get('q') }}"
                            placeholder="Masukan Keyword Berita..." class="form-control bg-transparent"
                            style="border: 0; border-bottom: 1px solid #E2E2E2;"
                        >
                        <input type="hidden" name="limit" value="{{ Request::get('limit') }}">
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-gradient-primary">Cari Berita</button>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-lg">
                    @foreach ($posts as $post)
                        <a href="{{ route('frontpage.berita.show', $post->slug) }}" class="card shadow-black-sm card-post bg-white mb-3">
                            <div class="card-body">
                                <h5 class="text-midnight font-bold">{{ $post->title }}</h5>
                                <div class="text-sm text-gray mb-2">
                                    {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                </div>
                                <div class="row">
                                    <div class="col-md-auto mb-3 mb-md-0">
                                        <div class="card-img">
                                            @if ($post->photo)
                                                <img src="{{ asset('storage/'.$post->photo) }}" alt="">
                                            @else
                                                <img src="{{ asset('img/placeholder/product-image-default.svg') }}" alt="">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div>
                                            <div class="badge badge-link bg-gray mb-1">{{ $post->category->name }}</div>
                                            <p class="text-gray">
                                                {{ substr(strip_tags($post->body), 0, 320) . ((strlen(strip_tags($post->body)) > 320) ? '...' : '') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach

                    <div class="row justify-content-center mt-4">
                        <div class="col-auto">
                            <form action="{{ route('frontpage.berita') }}">
                                <input type="hidden" name="q" value="{{ Request::get('q') }}">
                                <input type="hidden" name="limit" value="{{ Request::get('limit') + 8 }}">
                                <button class="btn btn-gradient-primary">
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
    <script>

    </script>
@endsection
