@extends('dashboard._layouts.app')

@section('title', 'Tambah Data Posts') {{-- title --}}
@section('header', 'Posts') {{-- header --}}

@section('breadcrumb') {{-- breadcrumb --}}
    <div class="breadcrumb-item active"><a href="{{ route('dashboard.admin.posts.index') }}">Posts</a></div>
    <div class="breadcrumb-item">Tambah Data</div>
@endsection {{-- end of breadcrumb --}}

@section('content') {{-- content --}}

    <div class="row gutters-xs align-items-center justify-content-end my-4">
        <div class="col-lg">
            <h4>Tambah Data Post</h4>
        </div>
        <div class="col col-md-auto">
            <a href="{{ route('dashboard.admin.pemilu-candidate.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left mr-1"></i> Semua Data
            </a>
        </div>
    </div>
    {{ route('dashboard.admin.pemilu-candidate.update', $candidate->id) }}
    {{ route('dashboard.admin.posts.update', 1) }}
    {{-- row : form --}}
    <form action="{{ route('dashboard.admin.pemilu-candidate.update', $candidate->id) }}" enctype="multipart/form-data"
        method="POST">
        @csrf
        @method('PUT')
        <div class="row gutters-xs">

            {{-- col : image upload --}}
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body d-flex flex-column align-items-center">
                        <div class="img-wrapper img-wrapper-upload bg-secondary w-100 h-10rem my-3">
                            <img id="img-post" src="" alt="">
                        </div>
                        @component('dashboard._components._form-group.input-img')
                            @slot('inputLabel', 'Banner Post')
                            @slot('inputPreviewIdentity', 'img-post')
                            @slot('inputName', 'photo')
                            @slot('inputId', 'input-photo')
                            @slot('inputValue', $candidate->photo)
                            {{-- @slot('inputIsRequired', true) --}}
                        @endcomponent
                    </div>
                </div>
            </div>

            {{-- col : input --}}
            <div class="col-lg">
                <div class="card">
                    <div class="card-body">
                        @component('dashboard._components._form-group.input')
                            @slot('inputLabel', 'No Paslon')
                            @slot('inputName', 'id')
                            @slot('inputId', 'input-id')
                            @slot('inputValue', $candidate->id)
                        @endcomponent
                        @component('dashboard._components._form-group.input')
                            @slot('inputLabel', 'Nama Kandidat')
                            @slot('inputName', 'nama')
                            @slot('inputId', 'input-nama')
                            @slot('inputValue', $candidate->nama)
                        @endcomponent
                        @component('dashboard._components._form-group.input')
                            @slot('inputLabel', 'Nim Kandidat')
                            @slot('inputName', 'nim')
                            @slot('inputId', 'input-nim')
                            @slot('inputValue', $candidate->nim)
                        @endcomponent
                        @component('dashboard._components._form-group.textarea')
                            @slot('inputLabel', 'Visi')
                            @slot('inputName', 'visi')
                            @slot('inputId', 'input-visi')
                            @slot('inputValue', $candidate->visi)
                        @endcomponent
                        @component('dashboard._components._form-group.input-multiple-text')
                            @slot('inputLabel', 'Misi')
                            @slot('inputName', 'misi')
                            @slot('inputId', 'input-misi')
                            @slot('inputValue', $candidate->misi)
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
        var i = 0;
        $("#dynamic-ar").click(function() {
            ++i;
            $("#dynamicAddRemove").append(
                `<tr>
                <td>
                    <input type="text" name="misi[]"
                        value="" placeholder="Input Misi"
                        class="form-control "
                        required>

                </td>

                <td>
                    <button type="button" class="btn btn-outline-danger remove-input-field">Delete</button>
                </td>
            </tr>`
            );
        });

        $(document).on('click', '.remove-input-field', function() {
            $(this).parents('tr').remove();
        });
    </script>
@endpush {{-- end of script --}}
