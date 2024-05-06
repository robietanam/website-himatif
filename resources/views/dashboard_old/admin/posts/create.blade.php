@extends('dashboard._layouts.app')

@section('title', 'Tambah Data Posts') {{-- title --}}
@section('header', 'Posts') {{-- header --}}

@section('breadcrumb') {{-- breadcrumb --}}
    <div class="inline-block px-2 py-2 text-gray-700 active"><a href="{{ route('dashboard.admin.posts.index') }}">Posts</a>
    </div>
    <div class="inline-block px-2 py-2 text-gray-700">Tambah Data</div>
@endsection {{-- end of breadcrumb --}}

@section('content') {{-- content --}}

    <div class="flex flex-wrap  gutters-xs items-center justify-end my-4">
        <div class="relative lg:flex-grow lg:flex-1">
            <h4>Tambah Data Post</h4>
        </div>
        <div class="relative flex-grow max-w-full flex-1 px-4 col-md-auto">
            <a href="{{ route('dashboard.admin.posts.index') }}"
                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md py-1 px-3 leading-normal no-underline text-gray-600 border-gray-600 hover:bg-gray-600 hover:text-white bg-white hover:bg-gray-700">
                <i class="fas fa-arrow-left mr-1"></i> Semua Data
            </a>
        </div>
    </div>

    {{-- row : form --}}
    <form action="{{ route('dashboard.admin.posts.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="flex flex-wrap  gutters-xs">

            {{-- col : image upload --}}
            <div class="lg:w-2/5 pr-4 pl-4">
                <div class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300">
                    <div class="flex-auto p-6 flex flex-col items-center">
                        <div class="img-wrapper img-wrapper-upload bg-gray-600 w-full h-10rem my-3">
                            <img id="img-post" src="" alt="">
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
            <div class="relative lg:flex-grow lg:flex-1">
                <div class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300">
                    <div class="flex-auto p-6">
                        {{-- input : title --}}
                        @component('dashboard._components._form-group.input')
                            @slot('inputLabel', 'Judul')
                            @slot('inputName', 'title')
                            @slot('inputId', 'input-title')
                        @endcomponent

                        {{-- richtext : body --}}
                        <div class="mb-4">
                            <label for="">Konten Post</label>
                            <textarea name="body" id="summernote-editor" cols="30" rows="8">{{ old('body') }}</textarea>
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
                                    @slot('inputIsSearchable', true)
                                    @slot('inputDatas', $inputDatasCategory)
                                @endcomponent

                                {{-- submit --}}
                                <div class="flex flex-wrap  justify-end">
                                    <div class="col-auto">
                                        <button type="submit"
                                            class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600">Simpan</button>
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
        @endpush {{-- end of style --}}

        @push('script')
            {{-- script --}}
            {{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> --}}
            {{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script> --}}
            <script src="{{ asset('vendors/ckeditor5/build/ckeditor.js') }}"></script>
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
                //     toolbar: [
                //         ['style', ['style']],
                //         ['font', ['bold', 'underline', 'clear']],
                //         ['color', ['color']],
                //         ['para', ['ul', 'ol', 'paragraph']],
                //         ['table', ['table']],
                //         // ['insert', ['link', 'picture', 'video']],
                //         ['insert', ['link']],
                //     ],
                // });

                // $('form').on('submit', function(e) {
                //     console.log( $('[name="body"]').val() )
                //     e.preventDefault();
                // });
            </script>
        @endpush {{-- end of script --}}
