@extends('dashboard._layouts.app')

@section('title', 'Edit Konten') {{-- title --}}
@section('header', 'Konten') {{-- header --}}

@section('breadcrumb') {{-- breadcrumb --}}
    <div class="breadcrumb-item active"><a href="#">Home</a></div>
    <div class="breadcrumb-item active"><a href="#">Semua Konten</a></div>
    <div class="breadcrumb-item">Edit</div>
@endsection {{-- end of breadcrumb --}}

@section('content') {{-- content --}}
    <div class="row gutters-xs align-items-center justify-content-end my-4">
        <div class="col-lg">
            <h4>Edit {{ $content->name }}</h4>
        </div>
        <div class="col col-md-auto">
            <a href="{{ url('dashboard/admin/page-contents') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left mr-1"></i> Semua Data
            </a>
        </div>
    </div>

    <div class="row gutters-xs">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body p-3">
                    <div class="font-weight-600 mb-2">Gambar Contoh</div>
                    @if (file_exists(storage_path('app/public/' . $content->photo_example)))
                        <img src="{{ asset('storage/' . $content->photo_example) }}" alt="Page Example" class="img-fluid">
                    @else
                        <img src="{{ asset('img/' . $content->photo_example) }}" alt="Page Example" class="img-fluid">
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url("dashboard/admin/page-contents/$content->id") }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        @method('PUT')
                        @php
                            $contents = (array) json_decode($content->data);
                            ksort($contents);
                        @endphp
                        @foreach ($contents as $i => $contentData)
                            @switch($contentData->type)
                                @case('image')
                                    {{-- {{ dd($contentData) }} --}}
                                    <input type="hidden" name="{{ "data[$i][type]" }}" value="{{ $contentData->type }}">
                                    @if (file_exists(storage_path('app/public/' . $contentData->content)))
                                        <div class="img-fit img-fit-contain w-100 h-16rem bg-whitesmoke my-3">
                                            <img id="img-content-{{ $i }}"
                                                src="{{ asset('storage/' . $contentData->content) }}" alt="Post">
                                        </div>
                                    @else
                                        <div class="font-weight-600">Preview Upload</div>
                                        <div class="img-fit img-fit-contain w-100 h-16rem bg-whitesmoke mb-3">
                                            <img id="img-content-{{ $i }}"
                                                src="{{ asset('img/placeholder/product-image-default.svg') }}"
                                                alt="Post Placeholder">
                                        </div>
                                    @endif
                                    @component('dashboard._components._form-group.input-img')
                                        @slot('inputLabel', $contentData->name)
                                        @slot('inputPreviewIdentity', "img-content-$i")
                                        @slot('inputName', "data[$i][content]")
                                        @slot('inputId', 'input-photo')
                                        {{-- @slot('inputIsRequired', true) --}}
                                    @endcomponent
                                @break

                                @case('mediumtext')
                                    <input type="hidden" name="{{ "data[$i][type]" }}" value="{{ $contentData->type }}">
                                    <div class="form-group">
                                        <label for="">{{ $contentData->name }}</label>
                                        <textarea name="data[{{ $i }}][content]" class="summernote-editor" cols="30" rows="8">{{ old($contentData->name) ? old($contentData->name) : $contentData->content }}</textarea>
                                        @error($contentData->name)
                                            <div class="text-invalid">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                @break

                                @case('text')
                                    <input type="hidden" name="{{ "data[$i][type]" }}" value="{{ $contentData->type }}">
                                    @component('dashboard._components._form-group.textarea')
                                        @slot('inputLabel', $contentData->name)
                                        @slot('inputName', "data[$i][content]")
                                        @slot('inputId', "input-$i")
                                        @slot('inputValue', $contentData->content)
                                    @endcomponent
                                @break

                                {{-- default : string --}}

                                @default
                                    {{-- input hidden request check type --}}
                                    <input type="hidden" name="{{ "data[$i][type]" }}" value="{{ $contentData->type }}">
                                    @component('dashboard._components._form-group.input')
                                        @slot('inputLabel', $contentData->name)
                                        @slot('inputName', "data[$i][content]")
                                        @slot('inputId', "input-$i")
                                        @slot('inputValue', $contentData->content)
                                    @endcomponent
                                @break
                            @endswitch
                        @endforeach

                        {{-- submit --}}
                        <div class="row justify-content-end">
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection {{-- end of content --}}

@push('style')
    {{-- style --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush {{-- end of style --}}

@push('script')
    {{-- script --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        "use strict";

        $('.summernote-editor').summernote({
            placeholder: 'Masukan Konten',
            tabsize: 2,
            height: 120,
            dialogsInBody: true,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol']],
                ['insert', ['link']],
            ],
        });
    </script>
@endpush {{-- end of script --}}
