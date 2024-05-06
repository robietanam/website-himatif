@extends('dashboard._layouts.app')

@section('title', 'Tambah Data Posts') {{-- title --}}
@section('header', 'Posts') {{-- header --}}

@section('breadcrumb') {{-- breadcrumb --}}
    <div class="breadcrumb-item active"><a href="{{ route('dashboard.admin.posts.index') }}">Posts</a></div>
    <div class="breadcrumb-item">Ubah Data</div>
@endsection {{-- end of breadcrumb --}}

@section('content') {{-- content --}}
    <div class="row gutters-xs align-items-center justify-content-end my-4">
        <div class="col-lg">
            <h4>Ubah Data Post</h4>
        </div>
        <div class="col col-md-auto">
            <a href="{{ route('dashboard.admin.posts.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left mr-1"></i> Semua Data
            </a>
        </div>
    </div>

    {{-- row : form --}}
    <form action="{{ route('dashboard.admin.posts.update', $post->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        <div class="row gutters-xs">

            {{-- col : image upload --}}
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body d-flex flex-column align-items-center">
                        <div class="img-wrapper img-wrapper-upload bg-secondary w-100 h-10rem my-3">
                            <img id="img-post" src="{{ asset('storage/' . $post->photo) }}" alt="">
                        </div>
                        @component('dashboard._components._form-group.input-img')
                            @slot('inputLabel', 'Banner Post')
                            @slot('inputPreviewIdentity', 'img-post')
                            @slot('inputName', 'photo')
                            @slot('inputId', 'input-photo')
                            {{-- @slot('inputIsRequired', true) --}}
                        @endcomponent
                    </div>
                </div>
            </div>

            {{-- col : input --}}
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        {{-- input : title --}}
                        @component('dashboard._components._form-group.input')
                            @slot('inputLabel', 'Judul')
                            @slot('inputName', 'title')
                            @slot('inputId', 'input-title')
                            @slot('inputValue', $post->title)
                        @endcomponent

                        {{-- richtext : body --}}
                        <div class="form-group">
                            <label for="">Konten Post</label>
                            <textarea name="body" id="summernote-editor" cols="30" rows="8">{{ old('body') ? old('body') : $post->body }}</textarea>
                            @error('body')
                                <div class="text-invalid">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- input : status --}}
                        @component('dashboard._components._form-group.input-radio')
                            @slot('inputLabel', 'Status')
                            @slot('inputName', 'status')
                            @slot('inputId', 'input-status')
                            @slot('inputValue', 1)
                            @slot('inputDatas', [
                                '<i class="fas fa-share-square mr-1"></i> Publish' => 1,
                                '<i class="fas fa-archive mr-1"></i> Taruh Draft' => 0,
                                ])
                            @endcomponent

                            {{-- input : is_featured --}}
                            @component('dashboard._components._form-group.input-radio')
                                @slot('inputLabel', 'Jadikan Featured Post')
                                @slot('inputName', 'is_featured')
                                @slot('inputId', 'input-is_featured')
                                @slot('inputValue', 0)
                                @slot('inputDatas', [
                                    '<i class="fas fa-check mr-1"></i> Iya' => 1,
                                    '<i class="fas fa-minus-square mr-1"></i> Tidak' => 0,
                                    ])
                                @endcomponent

                                {{-- input : category_id --}}
                                @php
                                    $inputDatasCategory = [];
                                    foreach ($categories as $category) {
                                        $inputDatasCategory["$category->name"] = $category->id;
                                    }
                                @endphp
                                @component('dashboard._components._form-group.input-select')
                                    @slot('inputLabel', 'Kategori')
                                    @slot('inputName', 'category_id')
                                    @slot('inputId', 'input-category_id')
                                    @slot('inputValue', $post->category_id)
                                    @slot('inputIsSearchable', true)
                                    @slot('inputDatas', $inputDatasCategory)
                                @endcomponent

                                {{-- submit --}}
                                <div class="row justify-content-end">
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
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
