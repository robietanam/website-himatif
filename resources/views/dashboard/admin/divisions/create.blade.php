@extends('dashboard._layouts.app')

@section('title', 'Tambah Data Posts') {{-- title --}}
@section('header', 'Posts') {{-- header --}}

@section('breadcrumb') {{-- breadcrumb --}}
    <div class="breadcrumb-item active"><a href="#">Home</a></div>
    <div class="breadcrumb-item">Divisi</div>
    <div class="breadcrumb-item">Tambah Data</div>
@endsection {{-- end of breadcrumb --}}

@section('content') {{-- content --}}
    <div class="row gutters-xs align-items-center justify-content-end my-4">
        <div class="col-lg">
            <h4>Tambah Data</h4>
        </div>
        <div class="col col-md-auto">
            <a
                href="{{ route('dashboard.admin.divisions.index') }}"
                class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left mr-1"></i> Semua Data
            </a>
        </div>
    </div>

    {{-- row : form --}}
    <form action="{{ route('dashboard.admin.divisions.store') }}" method="POST">
        @csrf
        <div class="row gutters-xs justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        {{-- input : name --}}
                        @component('dashboard._components._form-group.input')
                            @slot('inputLabel', 'Nama Divisi')
                            @slot('inputName', 'name')
                            @slot('inputId', 'input-name')
                        @endcomponent

                        {{-- input : name_slug --}}
                        @component('dashboard._components._form-group.input')
                            @slot('inputLabel', 'Nama Sebutan')
                            @slot('inputName', 'name_slug')
                            @slot('inputId', 'input-name_slug')
                        @endcomponent

                        {{-- input : description --}}
                        @component('dashboard._components._form-group.textarea')
                            @slot('inputLabel', 'Deskripsi')
                            @slot('inputName', 'description')
                            @slot('inputId', 'input-description')
                        @endcomponent

                        {{-- input : status --}}
                        @component('dashboard._components._form-group.input-radio')
                            @slot('inputLabel', 'Status')
                            @slot('inputName', 'status')
                            @slot('inputId', 'input-status')
                            @slot('inputDatas', [
                                '<i class="fas fa-share-square mr-1"></i> Aktif' => 1,
                                '<i class="fas fa-archive mr-1"></i> Tidak Aktif' => 0,
                            ])
                        @endcomponent

                        {{-- input : parent_id --}}
                        @php
                            $inputDatasDivisionParent = [];
                            foreach ($divisionParents as $divisionParent) {
                                $inputDatasDivisionParent["$divisionParent->name"] = $divisionParent->id;
                            }
                        @endphp
                        @component('dashboard._components._form-group.input-select')
                            @slot('inputLabel', 'Parent Divisi')
                            @slot('inputName', 'parent_id')
                            @slot('inputId', 'input-parent_id')
                            @slot('inputIsSearchable', true)
                            @slot('inputDatas', $inputDatasDivisionParent)
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
@endsection {{-- end of content --}}
