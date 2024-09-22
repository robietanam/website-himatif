@extends('dashboard._layouts.app')

@section('title', 'Pemilu Kandidat') {{-- title --}}
@section('header', 'Pemilu Kandidat') {{-- header --}}

@section('breadcrumb') {{-- breadcrumb --}}
    <div class="breadcrumb-item">Pemilu Kandidat</div>
@endsection {{-- end of breadcrumb --}}

@section('content') {{-- content --}}
    <div class="card mb-2">
        <div class="card-body">
            <div class="row align-items-center gutters-xs">
                <div class="col-lg">
                    <h5 class="mb-0">Operasi Data</h5>
                </div>
                <div class="col-md-auto">
                    <form id="form-delete" action="{{ route('dashboard.admin.pemilu-candidate.destroys') }}" method="POST">
                        @csrf @method('DELETE')
                        <button id="btn-delete" class="btn btn-sm btn-danger" disabled>
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>

                <div class="col-md-auto">
                    <form id="form-edit">
                        <button id="btn-edit" class="btn btn-sm btn-warning" disabled>
                            <i class="fas fa-pen"></i>
                        </button>
                    </form>
                </div>
                <div class="col-md-auto">
                    <a href="{{ route('dashboard.admin.pemilu-candidate.create') }}"
                        class="btn btn-block btn-sm btn-primary">
                        <i class="fas fa-plus mr-2"></i> Tambah Data
                    </a>
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
                            <th class="no-sort no-export">Aksi</th>
                            <th class="no-sort no-export">Foto</th>
                            <th>No Paslon</th>
                            <th>Nama</th>
                            <th>Nim</th>
                            <th>Visi</th>
                            <th>Misi</th>
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

@push('style')
    {{-- style --}}
    @include('dashboard._styles.datatable')
@endpush {{-- end of style --}}

@push('script')
    {{-- script --}}
    @include('dashboard._scripts.datatable')
    <script>
        $(document).ready(function() {
            const ajax_url = '{{ route('ajax.getCandidate') }}';

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
                        searchable: false
                    },
                    {
                        data: 'no',
                        name: 'no'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'nim',
                        name: 'nim',
                    },
                    {
                        data: 'visi',
                        name: 'visi',
                        searchable: false
                    },
                    {
                        data: 'misi',
                        name: 'misi',
                        searchable: false
                    },
                ],
            });

            $('#form-edit').on('submit', function(e) {
                e.preventDefault();
                let form = this;
                let row_selected_id = table.column(0).checkboxes.selected()[0];
                $(form).attr('action',
                    `{{ url('dashboard/admin/pemilu-candidate/${row_selected_id}/edit') }}`);
                form.submit()
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
        })
    </script>
@endpush {{-- end of script --}}
