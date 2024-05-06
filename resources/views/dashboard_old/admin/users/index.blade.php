@extends('dashboard._layouts.app')

@section('title', 'Keanggotaan') {{-- title --}}

@section('breadcrumb') {{-- breadcrumb --}}
    <div class="inline-block px-2 py-2 text-gray-700">Keanggotaan</div>
@endsection {{-- end of breadcrumb --}}

@section('content') {{-- content --}}

    <div class="flex flex-wrap ">
        <div class="md:w-1/3 pr-4 pl-4">
            @component('dashboard._components.widget', ['color' => 'primary'])
                @slot('icon', 'fas fa-users')
                @slot('title', 'Semua Pengurus')
                @slot('content', $countAllUser)
            @endcomponent
        </div>
        <div class="md:w-1/3 pr-4 pl-4">
            @component('dashboard._components.widget', ['color' => 'info'])
                @slot('icon', 'fas fa-users')
                @slot('title', 'Pengurus Aktif')
                @slot('content', $countActiveUser)
            @endcomponent
        </div>
        <div class="md:w-1/3 pr-4 pl-4">
            @component('dashboard._components.widget', ['color' => 'secondary'])
                @slot('icon', 'fas fa-users')
                @slot('title', 'Pengurus Non-Aktif')
                @slot('content', $countInactiveUser)
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
                    <form id="form-active" action="{{ route('dashboard.admin.users.update-status') }}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="1">
                        <button id="btn-active"
                            class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md  no-underline py-1 px-2 leading-tight text-xs  bg-green-500 text-white hover:bg-green-600"
                            data-toggle="tooltip" data-placement="top" title="Sek Aktif Pengurus" disabled>
                            <i class="fas fa-check-square"></i>
                        </button>
                    </form>
                </div>
                <div class="col-md-auto">
                    <form id="form-inactive" action="{{ route('dashboard.admin.users.update-status') }}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="0">
                        <button id="btn-inactive"
                            class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md  no-underline py-1 px-2 leading-tight text-xs  bg-gray-600 text-white hover:bg-gray-700"
                            data-toggle="tooltip" data-placement="top" title="Sek Tidak Aktif Pengurus" disabled>
                            <i class="fas fa-minus-square"></i>
                        </button>
                    </form>
                </div>
                <div class="col-md-auto">
                    <a href="{{ route('dashboard.admin.users.create') }}"
                        class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md  no-underline block w-full py-1 px-2 leading-tight text-xs  bg-blue-600 text-white hover:bg-blue-600">
                        <i class="fas fa-plus mr-2"></i> Tambah Data
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300">
        <div class="flex-auto p-6">
            <div class="flex flex-wrap  items-center border-b pb-3 mb-3">
                <div class="relative md:flex-grow md:flex-1">Export Data</div>
                {{-- <div class="col-md-auto">
                    <a href="{{ route('dashboard.admin.keanggotaan.export') }}" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md py-1 px-3 leading-normal no-underline text-green-500 border-green-500 hover:bg-green-500 hover:text-white bg-white hover:bg-green-600">Export Excell</a>
                </div> --}}
            </div>
            <div class="table-datatable-wrapper">
                <table id="datatable" class="w-full max-w-full mb-4 bg-transparent table-datatable" width="100%">
                    <thead>
                        <tr>
                            <th class="no-export"></th>
                            <th class="no-sort no-export">Aksi</th>
                            <th class="no-sort no-export">Foto</th>
                            <th>Nama</th>
                            <th>Nim</th>
                            <th>Divisi</th>
                            <th>Jabatan</th>
                            <th>Status</th>
                            <th>Nomor Hp</th>
                            <th>Email</th>
                            <th>Angkatan</th>
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
                        name: 'division',
                        "searchable": false
                    },
                    {
                        data: 'position',
                        name: 'division',
                        "searchable": false
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
                    },
                    {
                        data: 'email',
                        name: 'email',
                        "searchable": false
                    },
                    {
                        data: 'year_entry',
                        name: 'year_entry',
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
