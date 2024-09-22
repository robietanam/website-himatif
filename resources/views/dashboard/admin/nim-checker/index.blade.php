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

    <form action="{{ route('dashboard.admin.nim-checker.update') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row gutters-xs">

            {{-- col : image upload --}}
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body d-flex flex-column align-items-center">
                        <div class="img-wrapper img-wrapper-upload bg-secondary w-100 h-10rem my-3">
                            <img id="img-post" src="" alt="">
                        </div>
                        @component('dashboard._components._form-group.input-img')
                            @slot('inputLabel', 'NIM FILE CSV')
                            @slot('inputPreviewIdentity', 'img-post')
                            @slot('inputName', 'data')
                            @slot('inputId', 'input-data')
                            {{-- @slot('inputIsRequired', true) --}}
                        @endcomponent
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>

    </form>
    {{-- end of row : form --}}
@endsection {{-- end of content --}}

@push('style')
    {{-- style --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet"> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> --}}
@endpush {{-- end of style --}}

@push('script')
    {{-- script --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script> --}}
    <script src="{{ asset('vendors/ckeditor5/build/ckeditor.js') }}"></script>
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script> --}}
    <script>
        "use strict";

        ClassicEditor
            .create(document.querySelector('#summernote-editor'))
            .catch(error => {
                console.error(error);
            });



        // $('#summernote-editor').summernote({
        //     placeholder: 'Masukan Konten',
        //     tabsize: 2,
        //     height: 120,
        //     dialogsInBody: true,
        //     // toolbar: [
        //     //     ['style', ['style']],
        //     //     ['font', ['bold', 'underline', 'clear']],
        //     //     ['color', ['color']],
        //     //     ['para', ['ul', 'ol']],
        //     //     // ['table', ['table']],
        //     //     // ['insert', ['link', 'picture', 'video']],
        //     //     ['insert', ['link']],
        //     // ],
        // });
    </script>
@endpush {{-- end of script --}}
