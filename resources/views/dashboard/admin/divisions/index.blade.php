@extends('dashboard._layouts.app')

@section('title', 'Divisi') {{-- title --}}
@section('header', 'Divisi') {{-- header --}}

@section('breadcrumb') {{-- breadcrumb --}}
    <div class="breadcrumb-item active"><a href="#">Home</a></div>
    <div class="breadcrumb-item">Divisi</div>
@endsection {{-- end of breadcrumb --}}

@section('content') {{-- content --}}
    <div class="row">
        <div class="col-md-4">
            @component('dashboard._components.widget', ['color' => 'primary'])
                @slot('icon', 'fas fa-user-cog')
                @slot('title', 'Total Divisi')
                @slot('content', $countAllDivision)
            @endcomponent
        </div>
        <div class="col-md-4">
            @component('dashboard._components.widget', ['color' => 'info'])
                @slot('icon', 'fas fa-user-cog')
                @slot('title', 'Divisi utama')
                @slot('content', $countMainDivision)
            @endcomponent
        </div>
        <div class="col-md-4">
            @component('dashboard._components.widget', ['color' => 'warning'])
                @slot('icon', 'fas fa-user-cog')
                @slot('title', 'Sub Divisi')
                @slot('content', $countSubDivision)
            @endcomponent
        </div>
    </div>

    <div class="card mb-2">
        <div class="card-body">
            <div class="row align-items-center gutters-xs">
                <div class="col-lg">
                    <h5 class="mb-0">Operasi Data</h5>
                </div>
                <div class="col-md-auto">
                    <a href="{{ route('dashboard.admin.divisions.create') }}" class="btn btn-block btn-sm btn-primary">
                        <i class="fas fa-plus mr-2"></i> Tambah Data
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-datatable-wrapper">
                <table class="table table-responsive table-striped" width="100%">
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
                                    {{ substr($division->description, 0, 40) . ((strlen($division->description) > 40) ? '...' : '') }}
                                </td>
                                <td>
                                    @if ($division->status === '1')
                                        <div class="badge badge-primary">Aktif</div>
                                    @else
                                        <div class="badge badge-secondary">Tidak Aktif</div>
                                    @endif
                                </td>
                                <td>
                                    @if ($division->mainDivision)
                                        <div class="badge badge-warning">Sub Divisi</div>
                                    @else
                                        <div class="badge badge-info">Divisi Utama</div>
                                    @endif
                                </td>
                                <td>
                                    <a
                                        href="{{ route('dashboard.admin.divisions.edit', $division->id) }}"
                                        class="btn btn-sm btn-warning"
                                    >
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
