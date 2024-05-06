@extends('dashboard._layouts.app')

@section('title', 'Proker') {{-- title --}}
@section('header', 'Proker') {{-- header --}}

@section('breadcrumb') {{-- breadcrumb --}}
    <div class="breadcrumb-item">Proker</div>
@endsection {{-- end of breadcrumb --}}

@section('content') {{-- content --}}
    <div class="row">
        <div class="col-md-4">
            @component('dashboard._components.widget', ['color' => 'primary'])
                @slot('icon', 'fas fa-briefcase')
                @slot('title', 'Total Proker')
                @slot('content', $countAllProker)
            @endcomponent
        </div>
        <div class="col-md-4">
            @component('dashboard._components.widget', ['color' => 'info'])
                @slot('icon', 'fas fa-briefcase')
                @slot('title', 'Proker Aktif')
                @slot('content', $countActiveProker)
            @endcomponent
        </div>
        <div class="col-md-4">
            @component('dashboard._components.widget', ['color' => 'secondary'])
                @slot('icon', 'fas fa-briefcase')
                @slot('title', 'Proker Non-Aktif')
                @slot('content', $countInactiveProker)
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
                    <form id="form-active" action="{{ route('dashboard.admin.prokers.update-status') }}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="1">
                        <button id="btn-active" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top"
                            title="Sek Aktif Proker" disabled>
                            <i class="fas fa-check-square"></i>
                        </button>
                    </form>
                </div>
                <div class="col-md-auto">
                    <form id="form-inactive" action="{{ route('dashboard.admin.prokers.update-status') }}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="0">
                        <button id="btn-inactive" class="btn btn-sm btn-secondary" data-toggle="tooltip"
                            data-placement="top" title="Sek Tidak Aktif Proker" disabled>
                            <i class="fas fa-minus-square"></i>
                        </button>
                    </form>
                </div>
                <div class="col-md-auto">
                    <a data-toggle="modal" href="#m-create" class="btn btn-block btn-sm btn-primary">
                        <i class="fas fa-plus mr-2"></i> Tambah Data
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row gutters-xs align-items-center border-bottom pb-3 mb-3">
                <div class="col-md">Tampilkan Data</div>
                <div class="col-md-auto">
                    <a href="{{ route('dashboard.admin.prokers.index') }}"
                        class="btn {{ is_null(Request::get('status')) ? 'btn-primary' : 'btn-outline-secondary' }}">
                        Semua
                    </a>
                </div>
                <div class="col-md-auto">
                    <a href="{{ route('dashboard.admin.prokers.index') . '?status=1' }}"
                        class="btn {{ Request::get('status') === '1' ? 'btn-primary' : 'btn-outline-secondary' }}">
                        Aktif
                    </a>
                </div>
                <div class="col-md-auto">
                    <a href="{{ route('dashboard.admin.prokers.index') . '?status=0' }}"
                        class="btn {{ Request::get('status') === '0' ? 'btn-primary' : 'btn-outline-secondary' }}">
                        Inactive
                    </a>
                </div>
            </div>
            <div class="table-datatable-container">
                <table id="datatable" class="table table-datatable" width="100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th class="no-sort">Aksi</th>
                            <th class="no-sort">Logo</th>
                            <th>Nama</th>
                            <th>Status Proker</th>
                            <th>Status Pendaftaran</th>
                            <th>Ketua</th>
                            <th class="no-sort defined-default-width">Link Registrasi</th>
                            <th class="defined-default-width">Deskripsi</th>
                            <th>Dibuat Pada</th>
                            <th>Diupdate Pada</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{--  --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection {{-- end of content --}}

@section('modal')
    <div class="modal fade" id="m-create" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Anggota Proker</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('dashboard.admin.prokers.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div class="img-fit img-fit-contain bg-whitesmoke w-100 h-10rem my-3">
                                    <img id="img-logo" src="" alt="">
                                </div>
                                @component('dashboard._components._form-group.input-img')
                                    @slot('inputLabel', 'Logo Proker')
                                    @slot('inputPreviewIdentity', 'img-logo')
                                    @slot('inputName', 'logo')
                                    @slot('inputId', 'input-logo')
                                    @slot('inputIsRequired', true)
                                @endcomponent
                            </div>
                        </div>
                        {{-- input : name --}}
                        @component('dashboard._components._form-group.input')
                            @slot('inputLabel', 'Nama Proker')
                            @slot('inputName', 'name')
                            @slot('inputId', 'input-name')
                        @endcomponent
                        {{-- richtext : description --}}
                        <div class="form-group">
                            <label for="">Deskripsi Proker</label>
                            <textarea name="description" id="summernote-editor" cols="30" rows="8">{{ old('description') ? old('description') : '' }}</textarea>
                            @error('description')
                                <div class="text-invalid">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('style')
    {{-- style --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    @include('dashboard._styles.datatable')
@endpush {{-- end of style --}}

@push('script')
    {{-- script --}}
    @include('dashboard._scripts.datatable')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $('#summernote-editor').summernote({
            placeholder: 'Masukan Konten',
            tabsize: 2,
            height: 120,
            dialogsInBody: true,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol']],
                // ['table', ['table']],
                // ['insert', ['link', 'picture', 'video']],
                ['insert', ['link']],
            ],
        });
        $(document).ready(function() {
            /*
                Initialize form modal error
            */
            @if ($errors->first('store'))
                $('#m-create').modal('show');
            @endif

            /*
                Datatable
            */
            const ajax_url = '{{ route('ajax.getProkers') . '?status=' . Request::get('status') }}';
            const table = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                dom: `<'row no-gutters'<'col-md'l><'col-md-auto'f>>
                        <'row'<'col-12 table-datatable-container' t>>
                        <'row no-gutters justify-content-center'<'col-md'i><'col-md-auto'p>>`,
                responsive: true,
                language: {
                    lengthMenu: "Tampilkan _MENU_",
                    zeroRecords: "Tidak Ada Data Proker",
                    info: "Menampilkan _PAGE_ dari _PAGES_ page",
                    infoEmpty: "Tidak Ada Data",
                    infoFiltered: "(filtered from _MAX_ total records)",
                    search: "Cari Data Proker:"
                },
                ajax: ajax_url,
                columnDefs: [{
                        targets: 0,
                        checkboxes: {
                            selectRow: true,
                            selectCallback: function(nodes, selected) {
                                if (table.column(0).checkboxes.selected().length > 0) {
                                    $('#btn-active').removeAttr('disabled');
                                    $('#btn-inactive').removeAttr('disabled');
                                } else {
                                    $('#btn-active').attr('disabled', true);
                                    $('#btn-inactive').attr('disabled', true);
                                }
                            }
                        }
                    },
                    {
                        targets: 'defined-default-width',
                        className: 'defined-default-width'
                    },
                    {
                        targets: 'no-sort',
                        orderable: false
                    }
                ],
                select: {
                    'style': 'multi',
                    'selector': 'td:not(.is-clickable)'
                },
                order: [],
                columns: [{
                        data: 'id',
                        name: 'id',
                        searchable: false
                    },
                    {
                        data: 'action',
                        name: 'action',
                        searchable: false,
                        createdCell: (cell) => {
                            cell.classList.add('is-clickable');
                        }
                    },
                    {
                        data: 'logo',
                        name: 'logo',
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        searchable: false
                    },
                    {
                        data: 'is_registration_open',
                        name: 'is_registration_open',
                        searchable: false
                    },
                    {
                        data: 'leader',
                        name: 'leader',
                        searchable: false
                    },
                    {
                        data: 'link_registration',
                        name: 'link_registration',
                        searchable: false
                    },
                    {
                        data: 'description',
                        name: 'description',
                        searchable: false
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        searchable: false
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at',
                        searchable: false
                    },
                ],
            });

            /*
                Update Status Multiple Proker
            */
            $('#form-active').on('submit', function(e) {
                e.preventDefault();
                var form = this;
                var rows_selected = table.column(0).checkboxes.selected();
                Swal.fire({
                    title: `Set Aktif ${rows_selected.length} Data Proker ?`,
                    text: "Dengan Mengaktifkan Proker, maka proker akan ditampilkan pada website utama",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Iya, Aktifkan!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Iterate over all selected checkboxes
                        $(form).find('input[name="id[]"]').remove();
                        $.each(rows_selected, function(index, rowId) {
                            // Create a hidden element
                            $(form).append(
                                $('<input>')
                                .attr('type', 'hidden')
                                .attr('name', 'id[]')
                                .val(rowId)
                            );
                        });
                        form.submit();
                    }
                })
            });
            /*
                Update Status Multiple Proker
            */
            $('#form-inactive').on('submit', function(e) {
                e.preventDefault();
                var form = this;
                var rows_selected = table.column(0).checkboxes.selected();
                Swal.fire({
                    title: `Set Non Aktif ${rows_selected.length} Data Proker ?`,
                    text: "Dengan Nonaktifkan Proker, maka proker tidak akan ditampilkan pada website utama",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Iya, Nonaktifkan!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Iterate over all selected checkboxes
                        $(form).find('input[name="id[]"]').remove();
                        $.each(rows_selected, function(index, rowId) {
                            // Create a hidden element
                            $(form).append(
                                $('<input>')
                                .attr('type', 'hidden')
                                .attr('name', 'id[]')
                                .val(rowId)
                            );
                        });
                        form.submit();
                    }
                })
            });
        })
    </script>
@endpush {{-- end of script --}}
