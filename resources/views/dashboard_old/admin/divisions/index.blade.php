@extends('dashboard._layouts.app')

@section('title', 'Divisi') {{-- title --}}
@section('header', 'Divisi') {{-- header --}}

@section('breadcrumb') {{-- breadcrumb --}}
    <div class="inline-block px-2 py-2 text-gray-700">Divisi</div>
@endsection {{-- end of breadcrumb --}}

@section('content') {{-- content --}}
    <div class="flex flex-wrap ">
        <div class="md:w-1/3 pr-4 pl-4">
            @component('dashboard._components.widget', ['color' => 'primary'])
                @slot('icon', 'fas fa-user-cog')
                @slot('title', 'Total Divisi')
                @slot('content', $countAllDivision)
            @endcomponent
        </div>
        <div class="md:w-1/3 pr-4 pl-4">
            @component('dashboard._components.widget', ['color' => 'info'])
                @slot('icon', 'fas fa-user-cog')
                @slot('title', 'Divisi utama')
                @slot('content', $countMainDivision)
            @endcomponent
        </div>
        <div class="md:w-1/3 pr-4 pl-4">
            @component('dashboard._components.widget', ['color' => 'warning'])
                @slot('icon', 'fas fa-user-cog')
                @slot('title', 'Sub Divisi')
                @slot('content', $countSubDivision)
            @endcomponent
        </div>
    </div>

    <div class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300 mb-2">
        <div class="flex-auto p-6">
            <div class="flex flex-wrap  items-center gutters-xs">
                <div class="relative lg:flex-grow lg:flex-1">
                    <h5 class="mb-0">Operasi Data</h5>
                </div>
                <div class="col-md-auto">
                    <a href="{{ route('dashboard.admin.divisions.create') }}"
                        class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md  no-underline block w-full py-1 px-2 leading-tight text-xs  bg-blue-600 text-white hover:bg-blue-600">
                        <i class="fas fa-plus mr-2"></i> Tambah Data
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300">
        <div class="flex-auto p-6">
            <div class="table-datatable-wrapper">
                <table
                    class="w-full max-w-full mb-4 bg-transparent block w-full overflow-auto scrolling-touch table-striped"
                    width="100%">
                    <thead>
                        <tr>
                            <th>Nama Divisi</th>
                            <th>Sebutan</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                            <th>Tipe</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($divisions as $division)
                            <tr>
                                <td>{{ $division->name }}</td>
                                <td>{{ $division->name_slug }}</td>
                                <td>
                                    {{ substr($division->description, 0, 40) . (strlen($division->description) > 40 ? '...' : '') }}
                                </td>
                                <td>
                                    @if ($division->status === '1')
                                        <div
                                            class="inline-block p-1 text-center font-semibold text-sm align-baseline leading-none rounded-md bg-blue-500 text-white hover:bg-blue-600">
                                            Aktif</div>
                                    @else
                                        <div
                                            class="inline-block p-1 text-center font-semibold text-sm align-baseline leading-none rounded-md bg-gray-600 text-white hover:bg-gray-700">
                                            Tidak Aktif</div>
                                    @endif
                                </td>
                                <td>
                                    @if ($division->mainDivision)
                                        <div
                                            class="inline-block p-1 text-center font-semibold text-sm align-baseline leading-none rounded-md bg-orange-400 text-black hover:bg-orange-500">
                                            Sub Divisi</div>
                                    @else
                                        <div
                                            class="inline-block p-1 text-center font-semibold text-sm align-baseline leading-none rounded-md bg-teal-500 text-white hover:bg-teal-600">
                                            Divisi Utama</div>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('dashboard.admin.divisions.edit', $division->id) }}"
                                        class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md  no-underline py-1 px-2 leading-tight text-xs  bg-orange-400 text-black hover:bg-orange-500">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection {{-- end of content --}}
