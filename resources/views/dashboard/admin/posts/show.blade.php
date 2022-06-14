@extends('dashboard._layouts.app')

@section('title', 'Detail Data Post') {{-- title --}}
@section('header', 'Posts') {{-- header --}}

@section('breadcrumb') {{-- breadcrumb --}}
    <div class="breadcrumb-item active"><a href="{{ route('dashboard.admin.posts.index') }}">Posts</a></div>
    <div class="breadcrumb-item">Detail Post</div>
@endsection {{-- end of breadcrumb --}}

@section('content') {{-- content --}}
    <div class="row gutters-xs align-items-center justify-content-end my-4">
        <div class="col-lg">
            <h4>Detail Post</h4>
        </div>
        <div class="col col-md-auto">
            <a
                href="{{ route('dashboard.admin.posts.index') }}"
                class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left mr-1"></i> Semua Data
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h2 class="mb-2">{{ $post->title }}</h2>
                    <div class="mb-3">
                        {{ $post->category->name }}
                    </div>

                    @if ($post->photo)
                        <div class="img-fit img-fit-cover w-100 h-24rem bg-danger rounded-sm text-center mb-3">
                            <img src="{{ $post->photo }}" alt="Post">
                        </div>
                    @else
                        <div class="img-fit img-fit-contain w-100 h-24rem bg-whitesmoke mb-3">
                            <img src="{{ asset('img/placeholder/product-image-default.svg') }}" alt="Post">
                        </div>
                    @endif

                    <p>
                        {!! $post->body !!}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg">
            <a href="{{ route('frontpage.berita.show', $post->slug) }}" target="_blank" class="btn btn-block btn-primary mb-3">Tampilkan Preview</a>
            <div class="card mb-2">
                <div class="card-body">
                    {{-- user_id --}}
                    <div class="text-14 text-dark mb-2">Dibuat Oleh</div>
                    <div class="row gutters-xs">
                        <div class="col-auto"><i class="fas fa-user"></i></div>
                        <div class="col">
                            <div class="text-14 text-dark">{{ $post->user->name }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-2">
                <div class="card-body">
                    {{-- status --}}
                    <div class="row align-items-center mb-3">
                        <div class="col text-14 text-dark">Status</div>
                        <div class="col-auto">
                            @if ($post->status === '1')
                                <div class="badge d-block badge-success">Aktif</div>
                            @else
                                <div class="badge d-block badge-secondary">Tidak Aktif</div>
                            @endif
                        </div>
                    </div>
                    {{-- is_featured --}}
                    <div class="row align-items-center">
                        <div class="col text-14 text-dark">Jenis Post</div>
                        <div class="col-auto">
                            @if ($post->is_featured === '1')
                                <div class="badge d-block badge-success">Post Utama</div>
                            @else
                                <div class="badge d-block badge-secondary">Post Biasa</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-0">
                <div class="card-body">
                    {{-- created_at --}}
                    <div class="row align-items-center mb-3">
                        <div class="col text-14 text-dark">Dibuat Pada</div>
                        <div class="col-auto">
                            {{ $post->getHumanDate('created_at') }}
                        </div>
                    </div>
                    {{-- created_at --}}
                    <div class="row align-items-center">
                        <div class="col text-14 text-dark">Terakhir di update Pada</div>
                        <div class="col-auto">
                            {{ $post->getHumanDate('updated_at') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection {{-- end of content --}}
