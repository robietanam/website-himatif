@extends('dashboard._layouts.app')

@section('title', 'Keanggotaan') {{-- title --}}

@section('breadcrumb') {{-- breadcrumb --}}
    <div class="breadcrumb-item">Keanggotaan</div>
@endsection {{-- end of breadcrumb --}}

@section('content') {{-- content --}}

    <div class="row">
        <div class="col-md-4">
            @component('dashboard._components.widget', ['color' => 'primary'])
                @slot('icon', 'fas fa-users')
                @slot('title', 'Semua Pengurus')
                @slot('content', $countAllUser)
            @endcomponent
        </div>
        <div class="col-md-4">
            @component('dashboard._components.widget', ['color' => 'info'])
                @slot('icon', 'fas fa-users')
                @slot('title', 'Pengurus Aktif')
                @slot('content', $countActiveUser)
            @endcomponent
        </div>
        <div class="col-md-4">
            @component('dashboard._components.widget', ['color' => 'secondary'])
                @slot('icon', 'fas fa-users')
                @slot('title', 'Pengurus Non-Aktif')
                @slot('content', $countInactiveUser)
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
                    <form id="form-active" action="{{ route('dashboard.admin.users.update-status') }}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="1">
                        <button id="btn-active" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top"
                            title="Sek Aktif Pengurus" disabled>
                            <i class="fas fa-check-square"></i>
                        </button>
                    </form>
                </div>
                <div class="col-md-auto">
                    <form id="form-inactive" action="{{ route('dashboard.admin.users.update-status') }}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="0">
                        <button id="btn-inactive" class="btn btn-sm btn-secondary" data-toggle="tooltip"
                            data-placement="top" title="Sek Tidak Aktif Pengurus" disabled>
                            <i class="fas fa-minus-square"></i>
                        </button>
                    </form>
                </div>
                <div class="col-md-auto">
                    <a href="{{ route('dashboard.admin.users.create') }}" class="btn btn-block btn-sm btn-primary">
                        <i class="fas fa-plus mr-2"></i> Tambah Data
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row align-items-center border-bottom pb-3 mb-3">
                <div class="col-md">Export Data</div>
                {{-- <div class="col-md-auto">
                    <a href="{{ route('dashboard.admin.keanggotaan.export') }}" class="btn btn-outline-success">Export Excell</a>
                </div> --}}
            </div>
            <div class="table-datatable-wrapper">
                <table id="datatable" class="table table-datatable" width="100%">
                    <thead>
                        <tr>
                            <th class="no-export"></th>
                            <th class="no-sort no-export">Aksi</th>
                            <th class="no-sort no-export">Foto</th>
                            <th>Nama</th>
                            <th>Nim</th>
                            <th>Division</th>
                            <th>Status</th>
                            <th>Nomor Hp</th>
                            <th>Instagram</th>
                            <th>Linkedin</th>
                            <th>Email</th>
                            <th>Akses</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @for ($i = 0; $i < 5; $i++)
                        <tr>
                            <th></th>
                            <th>{{ $i+1 }}</th>
                            <th>{{ 1000+$i+1 }}</th>
                            <th>{{ 2000+$i+1 }}</th>
                            <th>Keterangan</th>
                            <th>Dibuat Pada</th>
                            <th>Ditulis DTM</th>
                            <th>Aksi</th>
                        </tr>
                        @endfor --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection {{-- end of content --}}

@push('style')
    {{-- style --}}
    @include('dashboard._styles.datatable')
@endpush {{-- end of style --}}

@push('script')
    {{-- script --}}
    @include('dashboard._scripts.datatable')
    <script>
        $(document).ready(function() {

            const ajax_url = '{{ route('ajax.getUsers') }}';
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
                        title: 'Data Keanggotaan Himatif',
                        exportOptions: {
                            orthogonal: "dtm",
                            columns: "thead th:not(.no-export)"
                        }
                    },
                ],
                responsive: true,
                language: {
                    "lengthMenu": "Tampilkan _MENU_",
                    "zeroRecords": "Tidak Ada Data Pengurus",
                    "info": "Menampilkan _PAGE_ dari _PAGES_ page",
                    "infoEmpty": "Tidak Ada Data",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "search": "Cari Data Pengurus:"
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
                        'targets': 'no-sort',
                        "orderable": false
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
                        "searchable": false
                    },
                    {
                        data: 'action',
                        name: 'action',
                        "searchable": false,
                        createdCell: (cell) => {
                            cell.classList.add('is-clickable');
                        }
                    },
                    {
                        data: 'photo',
                        name: 'photo',
                        "searchable": false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'nim',
                        name: 'nim'
                    },
                    {
                        data: 'division',
                        name: 'division'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        "searchable": false
                    },
                    {
                        data: 'phone',
                        name: 'phone',
                        "searchable": false
                    }, {
                        data: 'instagram',
                        name: 'instagram',
                        "searchable": false
                    }, {
                        data: 'linkedin',
                        name: 'linkedin',
                        "searchable": false
                    },
                    {
                        data: 'email',
                        name: 'email',
                        "searchable": false
                    },
                    {
                        data: 'role',
                        name: 'role',
                        "searchable": false
                    },
                ]
            });

            /*
                Update Status Multiple Pengurus
            */
            $('#form-active').on('submit', function(e) {
                e.preventDefault();
                var form = this;
                var rows_selected = table.column(0).checkboxes.selected();
                Swal.fire({
                    title: `Set Aktif ${rows_selected.length} Data Pengurus ?`,
                    text: "Dengan Mengaktifkan Pengurus, maka proker akan ditampilkan pada website utama",
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
                Update Status Multiple Pengurus
            */
            $('#form-inactive').on('submit', function(e) {
                e.preventDefault();
                var form = this;
                var rows_selected = table.column(0).checkboxes.selected();
                Swal.fire({
                    title: `Set Non Aktif ${rows_selected.length} Data Pengurus ?`,
                    text: "Dengan Nonaktifkan Pengurus, maka proker tidak akan ditampilkan pada website utama",
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
