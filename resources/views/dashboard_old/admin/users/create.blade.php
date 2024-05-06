@extends('dashboard._layouts.app')

@section('title', 'Tambah Data Pengurus') {{-- title --}}
@section('header', 'Pengurus') {{-- header --}}

@section('breadcrumb') {{-- breadcrumb --}}
    <div class="inline-block px-2 py-2 text-gray-700 active"><a
            href="{{ route('dashboard.admin.users.index') }}">Keanggotaan</a></div>
    <div class="inline-block px-2 py-2 text-gray-700">Tambah Data</div>
@endsection {{-- end of breadcrumb --}}

@section('content') {{-- content --}}

    <div class="flex flex-wrap  gutters-xs items-center justify-end my-4">
        <div class="relative lg:flex-grow lg:flex-1">
            <h4>Tambah Data Pengurus</h4>
        </div>
        <div class="relative flex-grow max-w-full flex-1 px-4 col-md-auto">
            <a href="{{ route('dashboard.admin.users.index') }}"
                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md py-1 px-3 leading-normal no-underline text-gray-600 border-gray-600 hover:bg-gray-600 hover:text-white bg-white hover:bg-gray-700">
                <i class="fas fa-arrow-left mr-1"></i> Semua Data
            </a>
        </div>
    </div>

    {{-- row : form --}}
    <form action="{{ route('dashboard.admin.users.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="flex flex-wrap ">

            <div class="lg:w-2/5 pr-4 pl-4">
                <div class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300">
                    <div class="flex-auto p-6 flex flex-col items-center">
                        <div class="img-wrapper img-wrapper-upload rounded-full bg-gray-600 w-10rem h-10rem my-3">
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

            <div class="relative lg:flex-grow lg:flex-1">
                <div class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300">
                    <div class="flex-auto p-6">
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
                            @slot('inputValue', 1)
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
                                    $inputDatasDivision[$division->name] = $division->id;
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

                            {{-- input : position --}}
                            @php
                                $inputDatasPosition = [];
                                foreach ($positions as $position) {
                                    $inputDatasPosition[$position] = $position;
                                }
                            @endphp
                            @component('dashboard._components._form-group.input-select')
                                @slot('inputLabel', 'Jabatan')
                                @slot('inputName', 'position')
                                @slot('inputId', 'input-position')
                                @slot('inputIsRequired', true)
                                @slot('inputIsSearchable', true)
                                @slot('inputDatas', $inputDatasPosition)
                            @endcomponent

                            {{-- input : role_id --}}
                            {{-- @php
                            $inputDatasRole = [];
                            foreach ($roles as $role) {
                                $inputDatasRole["$role->name"] = $role->id;
                            }
                        @endphp
                        @component('dashboard._components._form-group.input-select')
                            @slot('inputLabel', 'Akses Sistem')
                            @slot('inputName', 'role_id')
                            @slot('inputId', 'input-role_id')
                            @slot('inputHelp', 'Jika tidak diisi default akan <b>Pengurus</b>')
                            @slot('inputIsRequired', true)
                            @slot('inputDatas', $inputDatasRole)
                        @endcomponent --}}

                            {{-- submit --}}
                            <div class="flex flex-wrap  justify-end">
                                <div class="col-auto">
                                    <button
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
    @endpush {{-- end of style --}}

    @push('script')
        {{-- script --}}
        <script>
            "use strict";
        </script>
    @endpush {{-- end of script --}}
