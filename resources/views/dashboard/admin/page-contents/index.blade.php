@extends('dashboard._layouts.app')

@section('title', 'Data Editable Konten') {{-- title --}}
@section('header', 'Data Editable Konten') {{-- header --}}

@section('breadcrumb') {{-- breadcrumb --}}
    <div class="breadcrumb-item active"><a href="#">Home</a></div>
    <div class="breadcrumb-item">Semua Konten</div>
@endsection {{-- end of breadcrumb --}}

@section('content') {{-- content --}}

    <div class="card mb-3">
        <div class="card-body">
            <div class="row align-items-center gutters-xs">
                <div class="col-lg">
                    <h5 class="mb-0">Editable Konten</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row gutters-xs">
        @foreach ($contents as $content)
            <div class="col-lg-4">
                <div class="card card-primary mb-2">
                    <div class="card-body p-3">
                        <div class="text-16 text-dark font-weight-bold">
                            {{ $content->name }}
                        </div>
                        <hr>

                        <div class="img-fit img-fit-contain bg-whitesmoke w-100 h-8rem">
                            @if (file_exists(storage_path('app/public/' . $content->photo_example)))
                                <img src="{{ asset('storage/' . $content->photo_example) }}" alt="Page Example">
                            @else
                                <img src="{{ asset('img/' . $content->photo_example) }}" alt="Page Example">
                            @endif
                        </div>

                        <div class="row gutters-xs justify-content-end mt-3">
                            <div class="col-auto">
                                <a href="{{ url("dashboard/admin/page-contents/$content->id/edit") }}"
                                    class="btn btn-warning">
                                    <i class="fas fa-pen"></i> Edit
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection {{-- end of content --}}
