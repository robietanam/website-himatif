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
                @slot('title', 'Pengurus')
                @slot('content', '25') 
            @endcomponent
        </div>
        <div class="col-md-4">
            @component('dashboard._components.widget', ['color' => 'info'])
                @slot('icon', 'fas fa-users')
                @slot('title', 'Anggota')
                @slot('content', '500') 
            @endcomponent
        </div>
        <div class="col-md-4">
            @component('dashboard._components.widget', ['color' => 'secondary'])
                @slot('icon', 'fas fa-users')
                @slot('title', 'Demisioner')
                @slot('content', '50') 
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
                    <form id="form-delete" action="{{ route('dashboard.admin.keanggotaan.delete') }}" method="POST">
                        @csrf @method('DELETE')
                        <button id="btn-delete" class="btn btn-sm btn-danger" disabled>
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
                <div class="col-md-auto">
                    <form id="form-edit" action="">
                        @csrf
                        <button id="btn-edit" class="btn btn-sm btn-warning" disabled>
                            <i class="fas fa-pen"></i>
                        </button>
                    </form>
                </div>
                <div class="col-md-auto">
                    <a href="{{ route('dashboard.admin.keanggotaan.create') }}" class="btn btn-block btn-sm btn-primary">
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
                <div class="col-md-auto">
                    <a href="{{ route('dashboard.admin.keanggotaan.export') }}" class="btn btn-outline-success">Export Excell</a>
                </div>
            </div>
            <div class="table-datatable-wrapper">
                <table id="datatable" class="table table-datatable" width="100%">
                    <thead>
                        <tr>
                            <th class="no-export"></th>
                            <th class="no-sort no-export">Foto</th>
                            <th>Nama</th>
                            <th>Nim</th>
                            <th>Divisi</th>
                            <th>Email</th>
                            <th>Nomor Hp</th>
                            <th>Angkatan</th>
                            <th>Status</th> 
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

@push('style') {{-- style --}}
    @include('dashboard._styles.datatable')
@endpush {{-- end of style --}}

@push('script') {{-- script --}}
    @include('dashboard._scripts.datatable')
    <script>
        $(document).ready(function() {

            const ajax_url = '{{ route('ajax.getKeanggotaan') }}';
            const table = $('#datatable').DataTable({
                dom: `<'row no-gutters'<'col-md'l><'col-md-auto'f>>
                        <'row'<'col-12 table-datatable-container' t>>
                        <'row no-gutters justify-content-center'<'col-md'i><'col-md-auto'p>>`,
                buttons: [
                    {
                        extend: 'colvis',
                        text: '<i class="fas fa-table mr-2"></i>Pilih Kolom',
                        className: 'btn-primary',
                        prefixButtons: [ 
                            {
                                extend: 'colvisRestore',
                                text: 'Tampilkan Semua Kolom'
                            }
                        ]
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
                pagingType: "numbers",
                language: {
                    "lengthMenu": "Tampilkan _MENU_",
                    "zeroRecords": "Tidak Ada Data Anggota",
                    "info": "Menampilkan _PAGE_ dari _PAGES_ page",
                    "infoEmpty": "Tidak Ada Data",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "search": "Cari Data Anggota:"
                },
                ajax: ajax_url,
                columnDefs: [
                    {
                        'targets': 0,
                        'checkboxes': {
                            'selectRow': true,
                            'selectCallback': function(nodes, selected) {
                                if (table.column(0).checkboxes.selected().length > 0) {
                                    $('#btn-delete').removeAttr('disabled');
                                } else {
                                    $('#btn-delete').attr('disabled', true);
                                }

                                if (table.column(0).checkboxes.selected().length > 0 && table.column(0).checkboxes.selected().length < 2) {
                                    $('#btn-edit').removeAttr('disabled');
                                } else {
                                    $('#btn-edit').attr('disabled', true);
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
                },
                order: [],
                columns: [
                    {data: 'id', name: 'id', "searchable": false},
                    {data: 'photo', name: 'photo', "searchable": false},
                    {data: 'name', name: 'name'},
                    {data: 'nim', name: 'nim'},
                    {data: 'division', name: 'division', "searchable": false},
                    {data: 'email', name: 'email', "searchable": false},
                    {data: 'phone', name: 'phone', "searchable": false},
                    {data: 'year_entry', name: 'year_entry', "searchable": false},
                    {data: 'status', name: 'status', "searchable": false},
                    {data: 'role', name: 'role', "searchable": false},
                ]
            });

            $('#form-edit').on('submit', function(e) {
                let form = this;
                let rows_selected = table.column(0).checkboxes.selected();
                $.each(rows_selected, function(index, rowId){
                    $(form).attr('action', `{{ url('dashboard/admin/keanggotaan/${rowId}/edit') }}`)
                });
            });
            $('#form-delete').on('submit', function(e){
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
                        $.each(rows_selected, function(index, rowId){
                            // Create a hidden element
                            $(form).append(
                                $('<input>')
                                    .attr('type', 'hidden')
                                    .attr('name', 'id[]')
                                    .val(rowId)
                            );
                        });
                        // form.submit();         
                    }
                })
            });
        })
    </script>
@endpush {{-- end of script --}}