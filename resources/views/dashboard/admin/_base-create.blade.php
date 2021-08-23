@extends('dashboard._layouts.app')

@section('title', 'Tambah Data PAGE_BASE_NAME') {{-- title --}}
@section('header', 'PAGE_BASE_NAME') {{-- header --}}

@section('breadcrumb') {{-- breadcrumb --}}
    <div class="breadcrumb-item active"><a href="#">PAGE_BASE_NAME</a></div>
    <div class="breadcrumb-item">Tambah Data</div>
@endsection {{-- end of breadcrumb --}}

@section('content') {{-- content --}}

    <div class="row gutters-xs align-items-center justify-content-end my-4">
        <div class="col-lg">
            <h4>Tambah Data</h4>
        </div>
        <div class="col col-md-auto">
            <a 
                href="{{ route('dashboard.admin.ROUTE_BASE_NAME.index') }}" 
                class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left mr-1"></i> Semua Data
            </a>
        </div>
    </div>

    {{-- row : form --}}
    <form action="{{ route('dashboard.admin.ROUTE_BASE_NAME.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row">

            {{-- col : image upload --}}
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body d-flex flex-column align-items-center">

                    </div>
                </div>
            </div>
            
            {{-- col : input --}}
            <div class="col-lg">
                <div class="card">
                    <div class="card-body">

                        {{-- submit --}}
                        <div class="row justify-content-end">
                            <div class="col-auto">
                                <button class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
    {{-- end of row : form --}}


@endsection {{-- end of content --}}

@push('style') {{-- style --}}
    
@endpush {{-- end of style --}}

@push('script') {{-- script --}}
    <script>
        "use strict";
    </script>
@endpush {{-- end of script --}}