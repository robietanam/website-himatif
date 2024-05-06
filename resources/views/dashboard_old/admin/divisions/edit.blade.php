@extends('dashboard._layouts.app')

@section('title', 'Edit Data Posts') {{-- title --}}
@section('header', 'Posts') {{-- header --}}

@section('breadcrumb') {{-- breadcrumb --}}
    <div class="inline-block px-2 py-2 text-gray-700"><a href="{{ route('dashboard.admin.divisions.index') }}">Divisi</a>
    </div>
    <div class="inline-block px-2 py-2 text-gray-700">Ubah Data</div>
@endsection {{-- end of breadcrumb --}}

@section('content') {{-- content --}}
    <div class="flex flex-wrap  gutters-xs items-center justify-end my-4">
        <div class="relative lg:flex-grow lg:flex-1">
            <h4>Ubah Data Divisi</h4>
        </div>
        <div class="relative flex-grow max-w-full flex-1 px-4 col-md-auto">
            <a href="{{ route('dashboard.admin.divisions.index') }}"
                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md py-1 px-3 leading-normal no-underline text-gray-600 border-gray-600 hover:bg-gray-600 hover:text-white bg-white hover:bg-gray-700">
                <i class="fas fa-arrow-left mr-1"></i> Semua Data
            </a>
        </div>
    </div>

    {{-- row : form --}}
    <form action="{{ route('dashboard.admin.divisions.update', $division->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="flex flex-wrap  gutters-xs justify-center">
            <div class="lg:w-2/3 pr-4 pl-4">
                <div class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300">
                    <div class="flex-auto p-6">
                        {{-- input : name --}}
                        @component('dashboard._components._form-group.input')
                            @slot('inputLabel', 'Nama Divisi')
                            @slot('inputName', 'name')
                            @slot('inputId', 'input-name')
                            @slot('inputValue', $division->name)
                        @endcomponent

                        {{-- input : name_slug --}}
                        @component('dashboard._components._form-group.input')
                            @slot('inputLabel', 'Nama Sebutan')
                            @slot('inputName', 'name_slug')
                            @slot('inputId', 'input-name_slug')
                            @slot('inputValue', $division->name_slug)
                        @endcomponent

                        {{-- input : description --}}
                        @component('dashboard._components._form-group.textarea')
                            @slot('inputLabel', 'Deskripsi')
                            @slot('inputName', 'description')
                            @slot('inputId', 'input-description')
                            @slot('inputValue', $division->description)
                        @endcomponent

                        {{-- input : status --}}
                        @component('dashboard._components._form-group.input-radio')
                            @slot('inputLabel', 'Status')
                            @slot('inputName', 'status')
                            @slot('inputId', 'input-status')
                            @slot('inputValue', $division->status)
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
                                @slot('inputValue', $division->parent_id)
                                @slot('inputDatas', $inputDatasDivisionParent)
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
    @endsection {{-- end of content --}}
