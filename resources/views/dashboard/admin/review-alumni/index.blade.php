@extends('dashboard._layouts.app')

@section('title', 'Admin') {{-- title --}}
@section('header', 'Admin') {{-- header --}}

@section('breadcrumb') {{-- breadcrumb --}}
    <div class="breadcrumb-item active">Review Alumni</div>
@endsection {{-- end of breadcrumb --}}

@section('content') {{-- content --}}


    <div class="card mb-3">
        <div class="card-body">
            <div class="row align-items-center gutters-xs">
                <div class="col-lg">
                    <h5 class="mb-0">Editable Konten</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-2">
        <div class="card-body">
            <div class="row align-items-center gutters-xs">
                <div class="col-lg">
                    <h5 class="mb-0">Operasi Data</h5>
                </div>
                <div class="col-md-auto">

                    <form id="form-email" action="{{ route('dashboard.admin.review-alumni.create') }}" method="GET">
                        @csrf
                        <button id='btn-email' class="btn btn-block btn-sm btn-primary">
                            <i class="fas fa-plus mr-2"></i> Tambah Data
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-datatable-container">
                <table id="reviews_table" class="table table-responsive table-datatable" width="100%">
                    <thead>
                        <tr>
                            <th class="no-export">No</th>
                            <th>Action</th>
                            <th class="w-25">Nama</th>
                            <th class="w-25">Nim</th>
                            <th class="">Nomor HP</th>
                            <th class="">Lulusan</th>
                            <th class="">Tempat Kerja</th>
                            <th class="">Pengalaman di TI</th>
                            <th class="">Motivasi</th>
                            <th>Instagram</th>
                            <th>Photo</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <form action="{{ route('dashboard.admin.review-alumni.destroy', $item->id) }}"
                                        method="POST">
                                        <a type="button" class="btn btn-warning btn-sm"
                                            href="{{ route('dashboard.admin.review-alumni.edit', $item->id) }}"
                                            style="padding: 2px 5px; font-size: 14px; height: 28px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </a>
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            style="padding: 2px 5px; font-size: 15px; height: 28px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                                <path
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->nim }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->angkatan }}</td>
                                <td>{{ $item->tempat_kerja }}</td>
                                <td
                                    style="max-width: 400px; word-wrap: break-word; word-break: break-word; white-space: normal; text-align: justify; padding: 10px;">
                                    {{ Str::limit($item->experience, 40, '...') }}
                                </td>
                                <td
                                    style="max-width: 400px; word-wrap: break-word; word-break: break-word; white-space: normal; text-align: justify; padding: 10px;">
                                    {{ Str::limit($item->motivation, 40, '...') }}
                                </td>
                                <td>{{ $item->instagram }}</td>
                                {{-- <td>{{ $item->photo }}</td> --}}
                                <td>
                                    @if ($item->photo != null)
                                        <div style="width:100px">
                                            <img src="{{ asset('storage/' . $item->photo) }}" class="img-fluid"
                                                alt="...">

                                        </div>
                                    @else
                                        <p class="text-info">tidak ada foto</p>
                                    @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- end of row : form --}}
@endsection {{-- end of content --}}

@push('style')
    {{-- style --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet"> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> --}}

    @include('dashboard._styles.datatable')
@endpush {{-- end of style --}}

@push('script')
    {{-- script --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script> --}}

    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script> --}}

    @include('dashboard._scripts.datatable')

    <script>
        $(document).ready(function() {
            $('#reviews_table').DataTable({
                responsive: true
            });
        });
    </script>
@endpush {{-- end of script --}}
