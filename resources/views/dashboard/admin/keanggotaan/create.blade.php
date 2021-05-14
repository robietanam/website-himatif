@extends('dashboard._layouts.app')

@section('title', 'Tambah Data Keanggotaan') {{-- title --}}
@section('header', 'Keanggotaan') {{-- header --}}

@section('breadcrumb') {{-- breadcrumb --}}
    <div class="breadcrumb-item active"><a href="#">Keanggotaan</a></div>
    <div class="breadcrumb-item">Tambah Data</div>
@endsection {{-- end of breadcrumb --}}

@section('content') {{-- content --}}

    <div class="row gutters-xs align-items-center justify-content-end my-4">
        <div class="col-lg">
            <h4>Tambah Data</h4>
        </div>
        <div class="col col-md-auto">
            <a 
                href="{{ route('dashboard.admin.keanggotaan.index') }}" 
                class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left mr-1"></i> Semua Data
            </a>
        </div>
    </div>

    {{-- row : form --}}
    <form action="{{ route('dashboard.admin.keanggotaan.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row">

            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body d-flex flex-column align-items-center">
                        <div class="img-wrapper img-wrapper-upload rounded-circle bg-secondary w-10rem h-10rem my-3">
                            <img id="img-anggota-1" src="" alt="">
                        </div>
                        @component('dashboard._components._form-group.input-img')
                            @slot('inputLabel', 'Foto Anggota')
                            @slot('inputPreviewIdentity', 'img-anggota-1')
                            @slot('inputName', 'photo')
                            @slot('inputId', 'input-photo')
                            {{-- @slot('inputIsRequired', true) --}}
                        @endcomponent
                    </div>
                </div>
            </div>
            
            <div class="col-lg">
                <div class="card">
                    <div class="card-body">
                        {{-- input : name --}}
                        @component('dashboard._components._form-group.input')
                            @slot('inputLabel', 'Nama')
                            @slot('inputName', 'name')
                            @slot('inputId', 'input-name')
                            @slot('inputIsRequired', true)
                        @endcomponent

                        {{-- input : nim --}}
                        @component('dashboard._components._form-group.input')
                            @slot('inputLabel', 'Nim')
                            @slot('inputName', 'nim')
                            @slot('inputId', 'input-nim')
                            @slot('inputIsRequired', true)
                        @endcomponent

                        {{-- input : email --}}
                        @component('dashboard._components._form-group.input')
                            @slot('inputType', 'email')
                            @slot('inputLabel', 'Email')
                            @slot('inputName', 'email')
                            @slot('inputId', 'input-email')
                            @slot('inputIsRequired', true)
                        @endcomponent

                        {{-- input : password --}}
                        @component('dashboard._components._form-group.input')
                            @slot('inputType', 'password')
                            @slot('inputLabel', 'Password')
                            @slot('inputName', 'password')
                            @slot('inputId', 'input-password')
                            @slot('inputIsRequired', true)
                        @endcomponent

                        {{-- input : phone --}}
                        @component('dashboard._components._form-group.input')
                            @slot('inputType', 'number')
                            @slot('inputLabel', 'Nomor Hp')
                            @slot('inputName', 'phone')
                            @slot('inputId', 'input-phone')
                        @endcomponent

                        {{-- input : status --}}
                        @component('dashboard._components._form-group.input-radio')
                            @slot('inputLabel', 'Status')
                            @slot('inputName', 'status')
                            @slot('inputId', 'input-status')
                            @slot('inputIsRequired', true)
                            @slot('inputDatas', [
                                'aktif' => 1,
                                'nonaktif' => 0,
                            ])
                        @endcomponent

                        {{-- input : year_entry --}}
                        @component('dashboard._components._form-group.input-year')
                            @slot('inputLabel', 'Tahun Masuk')
                            @slot('inputName', 'year_entry')
                            @slot('inputId', 'input-year_entry')
                        @endcomponent

                        {{-- input : division_id --}}
                        @php
                            $inputDatasDivision = [];
                            foreach ($divisions as $division) {
                                $inputDatasDivision["$division->name_position | $division->name_slug"] = $division->id;
                            }
                        @endphp
                        @component('dashboard._components._form-group.input-select')
                            @slot('inputLabel', 'Divisi')
                            @slot('inputName', 'division_id')
                            @slot('inputId', 'input-division_id')
                            @slot('inputIsRequired', true)
                            @slot('inputIsSearchable', true)
                            @slot('inputDatas', $inputDatasDivision)
                        @endcomponent

                        {{-- input : role_id --}}
                        @php
                            $inputDatasRole = [];
                            foreach ($roles as $role) {
                                $inputDatasRole["$role->name"] = $role->id;
                            }
                        @endphp
                        @component('dashboard._components._form-group.input-select')
                            @slot('inputLabel', 'Akses Sistem')
                            @slot('inputName', 'role_id')
                            @slot('inputId', 'input-role_id')
                            @slot('inputHelp', 'Jika tidak diisi default akan <b>Anggota</b>')
                            @slot('inputIsRequired', true)
                            @slot('inputDatas', $inputDatasRole)
                        @endcomponent

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

@section('style') {{-- style --}}
    
@endsection {{-- end of style --}}

@section('script') {{-- script --}}
    <script>
        "use strict";
    </script>
@endsection {{-- end of script --}}