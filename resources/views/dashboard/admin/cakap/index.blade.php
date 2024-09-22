@extends('dashboard._layouts.app')

@section('title', 'Data Editable Konten') {{-- title --}}
@section('header', 'Data Editable Konten') {{-- header --}}

@section('breadcrumb') {{-- breadcrumb --}}
    <div class="breadcrumb-item active"><a href="#">Home</a></div>
    <div class="breadcrumb-item">Semua Konten</div>
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
            <div class="row gutters-xs align-items-center border-bottom pb-3 mb-3">
                <div class="col-md">Tampilkan Data</div>
                <div class="col-md-auto">
                    <a href="{{ route('dashboard.admin.cakap.index') }}"
                        class="btn {{ is_null(Request::get('status')) ? 'btn-primary' : 'btn-outline-secondary' }}">
                        Semua
                    </a>
                </div>
                <div class="col-md-auto">
                    <a href="{{ route('dashboard.admin.cakap.index') . '?status=1' }}"
                        class="btn {{ Request::get('status') === '1' ? 'btn-primary' : 'btn-outline-secondary' }}">
                        Terkirim
                    </a>
                </div>
                <div class="col-md-auto">
                    <a href="{{ route('dashboard.admin.cakap.index') . '?status=0' }}"
                        class="btn {{ Request::get('status') === '0' ? 'btn-primary' : 'btn-outline-secondary' }}">
                        Menunggu
                    </a>
                </div>
                <div class="col-md-auto">
                    <a href="{{ route('dashboard.admin.cakap.index') . '?status=2' }}"
                        class="btn {{ Request::get('status') === '2' ? 'btn-primary' : 'btn-outline-secondary' }}">
                        Error
                    </a>
                </div>
            </div>
            <div class="row align-items-center gutters-xs">
                <div class="col-lg">
                    <h5 class="mb-0">Operasi Data</h5>
                </div>
                <div class="col-md-auto">
                    <form id="form-delete" action="{{ route('dashboard.admin.cakap.destroys') }}" method="POST">
                        @csrf @method('DELETE')
                        <button id="btn-delete" class="btn btn-sm btn-danger" disabled>
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
                <div class="col-md-auto">

                    <form id="form-email" action="{{ route('dashboard.admin.cakap.email.send') }}" method="POST">
                        @csrf
                        <button id='btn-email' class="btn btn-block btn-sm btn-primary">
                            <i class="fas fa-plus mr-2"></i> Kirim Email
                        </button>
                    </form>


                </div>

                <div class="col-md-auto">
                    <a target="_blank" href="{{ route('dashboard.admin.cakap.email.preview') }}"><button type="button"
                            class="btn btn-primary">Preview</button></a>
                </div>


            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">

            <div class="table-datatable-container">
                <table id="datatable" class="table table-datatable" width="100%">
                    <thead>
                        <tr>
                            <th class="no-export"></th>
                            <th class="w-25">Nama</th>
                            <th class="w-25">Email</th>
                            <th class="">Form Id</th>
                            <th class="">Kode</th>
                            <th class="">Bukti</th>
                            <th class="">Label</th>
                            <th class="">Status</th>
                            <th>Dibuat pada</th>
                            <th>Diupdate pada</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{--  --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <form action="{{ route('dashboard.admin.cakap.kode.update') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row gutters-xs">
            <div class="col-lg">
                <div class="card">
                    <div class="card-body">
                        {{-- input : FILE CSV --}}
                        @component('dashboard._components._form-group.input-img')
                            @slot('inputLabel', 'Banner Post')
                            @slot('inputPreviewIdentity', 'img-post')
                            @slot('inputName', 'data')
                            @slot('inputId', 'input-data')
                            {{-- @slot('inputIsRequired', true) --}}
                        @endcomponent
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <div class="card">
        <div class="card mb-2">
            <div class="card-body">
                <div class="row align-items-center gutters-xs">
                    <div class="col-lg">
                        <h5 class="mb-0">Operasi Data</h5>
                    </div>
                    <div class="col-md-auto">
                        <form id="form-delete-kode" action="{{ route('dashboard.admin.cakap.kode.destroys') }}"
                            method="POST">
                            @csrf @method('DELETE')
                            <button id="btn-delete-kode" class="btn btn-sm btn-danger" disabled>
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="card-body">


            <div class="table-datatable-container">
                <table id="datatable-kode" class="table table-datatable" width="100%">
                    <thead>
                        <tr>
                            <th class="no-export"></th>
                            <th class="">Kode</th>
                            <th class="">Label</th>
                            <th>Dibuat pada</th>
                            <th>Diupdate pada</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{--  --}}
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
            const ajax_url = '{{ route('ajax.getCakaps') . '?status=' . Request::get('status') }}';
            const ajax_url_kode = '{{ route('ajax.getCakapKode') }}';

            const table = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                dom: `<'row no-gutters'<'col-md'l><'col-md-auto'f>>
                        <'row'<'col-12 table-datatable-container' t>>
                        <'row no-gutters justify-content-center'<'col-md'i><'col-md-auto'p>>`,
                buttons: [{
                        extend: 'colvis',
                        text: '<i class="fas fa-table mr-2"></i>Pilih Kolom',
                        className: 'btn-primary',
                        prefixButtons: [{
                            extend: 'colvisRestore',
                            text: 'Tampilkan Semua Kolom'
                        }]
                    },
                    {
                        extend: 'excel',
                        text: '<i class="fas fa-file-excel mr-2"></i>Export Excel',
                        className: 'btn-success',
                        title: 'Data Post Himatif',
                        exportOptions: {
                            orthogonal: "dtm",
                            columns: "thead th:not(.no-export)"
                        }
                    },
                ],
                responsive: true,
                language: {
                    lengthMenu: "Tampilkan _MENU_",
                    zeroRecords: "Tidak Ada Data Post",
                    info: "Menampilkan _PAGE_ dari _PAGES_ page",
                    infoEmpty: "Tidak Ada Data",
                    infoFiltered: "(filtered from _MAX_ total records)",
                    search: "Cari Data Post:"
                },
                ajax: {
                    url: ajax_url,

                },
                columnDefs: [{
                        targets: 0,
                        checkboxes: {
                            selectRow: true,
                            selectCallback: function(nodes, selected) {
                                if (table.column(0).checkboxes.selected().length > 0) {
                                    $('#btn-delete').removeAttr('disabled');
                                    $('#btn-draft').removeAttr('disabled');
                                    $('#btn-publish').removeAttr('disabled');
                                } else {
                                    $('#btn-delete').attr('disabled', true);
                                    $('#btn-draft').attr('disabled', true);
                                    $('#btn-publish').attr('disabled', true);
                                }

                                if (table.column(0).checkboxes.selected().length > 0 &&
                                    table.column(0).checkboxes.selected().length < 2) {
                                    $('#btn-edit').removeAttr('disabled');
                                } else {
                                    $('#btn-edit').attr('disabled', true);
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
                        data: 'nama',
                        name: 'nama',
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'id_form',
                        name: 'id_form',
                        searchable: false
                    },
                    {
                        data: 'kode',
                        name: 'kode',
                        searchable: false
                    },
                    {
                        data: 'bukti',
                        name: 'bukti',
                        searchable: false
                    },
                    {
                        data: 'label',
                        name: 'label',
                        searchable: false
                    },
                    {
                        data: 'status',
                        name: 'status',
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

            const tableKode = $('#datatable-kode').DataTable({
                processing: true,
                serverSide: true,
                dom: `<'row no-gutters'<'col-md'l><'col-md-auto'f>>
                        <'row'<'col-12 table-datatable-container' t>>
                        <'row no-gutters justify-content-center'<'col-md'i><'col-md-auto'p>>`,
                buttons: [{
                        extend: 'colvis',
                        text: '<i class="fas fa-table mr-2"></i>Pilih Kolom',
                        className: 'btn-primary',
                        prefixButtons: [{
                            extend: 'colvisRestore',
                            text: 'Tampilkan Semua Kolom'
                        }]
                    },
                    {
                        extend: 'excel',
                        text: '<i class="fas fa-file-excel mr-2"></i>Export Excel',
                        className: 'btn-success',
                        title: 'Data Post Himatif',
                        exportOptions: {
                            orthogonal: "dtm",
                            columns: "thead th:not(.no-export)"
                        }
                    },
                ],
                responsive: true,
                language: {
                    lengthMenu: "Tampilkan _MENU_",
                    zeroRecords: "Tidak Ada Data Post",
                    info: "Menampilkan _PAGE_ dari _PAGES_ page",
                    infoEmpty: "Tidak Ada Data",
                    infoFiltered: "(filtered from _MAX_ total records)",
                    search: "Cari Data Post:"
                },
                ajax: {
                    url: ajax_url_kode,

                },
                columnDefs: [{
                        targets: 0,
                        checkboxes: {
                            selectRow: true,
                            selectCallback: function(nodes, selected) {
                                if (tableKode.column(0).checkboxes.selected().length > 0) {
                                    $('#btn-delete-kode').removeAttr('disabled');
                                    $('#btn-draft').removeAttr('disabled');
                                    $('#btn-publish').removeAttr('disabled');
                                } else {
                                    $('#btn-delete-kode').attr('disabled', true);
                                    $('#btn-draft').attr('disabled', true);
                                    $('#btn-publish').attr('disabled', true);
                                }

                                if (tableKode.column(0).checkboxes.selected().length > 0 &&
                                    tableKode.column(0).checkboxes.selected().length < 2) {
                                    $('#btn-edit').removeAttr('disabled');
                                } else {
                                    $('#btn-edit').attr('disabled', true);
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
                        data: 'kode',
                        name: 'kode',
                    },
                    {
                        data: 'label',
                        name: 'label',
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



            $('#form-delete-kode').on('submit', function(e) {
                e.preventDefault();
                var form = this;
                var rows_selected = tableKode.column(0).checkboxes.selected();
                Swal.fire({
                    title: `Hapus ${rows_selected.length} Data ?`,
                    text: "Dengan Menghapus data ini, anda tidak dapat mengembalikannya",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Iya, Hapus!',
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


            $('#form-delete').on('submit', function(e) {
                e.preventDefault();
                var form = this;
                var rows_selected = table.column(0).checkboxes.selected();
                Swal.fire({
                    title: `Hapus ${rows_selected.length} Data ?`,
                    text: "Dengan Menghapus data ini, anda tidak dapat mengembalikannya",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Iya, Hapus!',
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

            $('#form-email').on('submit', function(e) {
                e.preventDefault();
                var form = this;
                var rows_selected = table.column(0).checkboxes.selected();
                Swal.fire({
                    title: `Kirim ${rows_selected.length} Email ?`,
                    text: "Cek lagi, sudah bener nih ye? Tunggu ngirimnya kalau banyak lama",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Iya, GASS!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Iterate over all selected checkboxes
                        $.each(table.rows({
                            selected: true
                        }).data(), function(index, data) {
                            // Create a hidden element
                            // console.log(data);
                            $(form).append(
                                $('<input>')
                                .attr('type', 'hidden')
                                .attr('name', 'id[]')
                                .val(data.id)
                            );
                            $(form).append(
                                $('<input>')
                                .attr('type', 'hidden')
                                .attr('name', 'nama[]')
                                .val(data.nama)
                            );
                            $(form).append(
                                $('<input>')
                                .attr('type', 'hidden')
                                .attr('name', 'email[]')
                                .val(data.email)
                            );
                            $(form).append(
                                $('<input>')
                                .attr('type', 'hidden')
                                .attr('name', 'id_form[]')
                                .val(data.id_form)
                            );
                            $(form).append(
                                $('<input>')
                                .attr('type', 'hidden')
                                .attr('name', 'kode[]')
                                .val(data.kode)
                            );
                            $(form).append(
                                $('<input>')
                                .attr('type', 'hidden')
                                .attr('name', 'label[]')
                                .val(data.label)
                            );
                            $(form).append(
                                $('<input>')
                                .attr('type', 'hidden')
                                .attr('name', 'status[]')
                                .val(data.status)
                            );
                        });
                        form.submit();
                    }
                })
            });
        })
    </script>
@endpush {{-- end of script --}}
