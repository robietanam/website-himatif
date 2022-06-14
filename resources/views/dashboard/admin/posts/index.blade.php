@extends('dashboard._layouts.app')

@section('title', 'Keanggotaan') {{-- title --}}
@section('header', 'Keanggotaan') {{-- header --}}

@section('breadcrumb') {{-- breadcrumb --}}
    <div class="breadcrumb-item">Post</div>
@endsection {{-- end of breadcrumb --}}

@section('content') {{-- content --}}
    <div class="row">
        <div class="col-md-4">
            @component('dashboard._components.widget', ['color' => 'primary'])
                @slot('icon', 'fas fa-image')
                @slot('title', 'Total Berita')
                @slot('content', $countAllPost)
            @endcomponent
        </div>
        <div class="col-md-4">
            @component('dashboard._components.widget', ['color' => 'info'])
                @slot('icon', 'fas fa-image')
                @slot('title', 'Berita Aktif')
                @slot('content', $countActivePost)
            @endcomponent
        </div>
        <div class="col-md-4">
            @component('dashboard._components.widget', ['color' => 'secondary'])
                @slot('icon', 'fas fa-image')
                @slot('title', 'Berita Non-Aktif')
                @slot('content', $countInactivePost)
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
                    <form id="form-delete" action="{{ route('dashboard.admin.posts.destroys') }}" method="POST">
                        @csrf @method('DELETE')
                        <button id="btn-delete" class="btn btn-sm btn-danger" disabled>
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
                {{-- <div class="col-md-auto">
                    <form id="form-draft" action="{{ route('dashboard.admin.posts.draft') }}" method="POST">
                        @csrf @method('PUT')
                        <button id="btn-draft" class="btn btn-block btn-sm btn-secondary" disabled>
                            <i class="fas fa-archive"></i>
                        </button>
                    </form>
                </div> --}}
                {{-- <div class="col-md-auto">
                    <form id="form-publish" action="{{ route('dashboard.admin.posts.publish') }}" method="POST">
                        @csrf @method('PUT')
                        <button id="btn-publish" class="btn btn-block btn-sm btn-success" disabled>
                            <i class="fas fa-share-square"></i>
                        </button>
                    </form>
                </div> --}}
                <div class="col-md-auto">
                    <form id="form-edit">
                        <button id="btn-edit" class="btn btn-sm btn-warning" disabled>
                            <i class="fas fa-pen"></i>
                        </button>
                    </form>
                </div>
                <div class="col-md-auto">
                    <a href="{{ route('dashboard.admin.posts.create') }}" class="btn btn-block btn-sm btn-primary">
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
                    <a href="" class="btn btn-primary">Semua</a>
                </div>
                <div class="col-md-auto">
                    <a href="" class="btn btn-outline-secondary">Trash</a>
                </div>
            </div>
            <div class="table-datatable-container">
                <table id="datatable" class="table table-datatable" width="100%">
                    <thead>
                        <tr>
                            <th class="no-export"></th>
                            <th class="no-sort no-export">Banner</th>
                            <th class="defined-default-width">Judul</th>
                            <th class="defined-default-width">Url</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Featured</th>
                            <th class="defined-default-width">Isi</th>
                            <th>Dibuat Pada</th>
                            <th>Dibuat oleh</th>
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

@push('style') {{-- style --}}
    @include('dashboard._styles.datatable')
@endpush {{-- end of style --}}

@push('script') {{-- script --}}
    @include('dashboard._scripts.datatable')
    <script>
        $(document).ready(function() {

            const ajax_url = '{{ route('ajax.getPosts') }}';
            const table = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
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
                ajax: ajax_url,
                columnDefs: [
                    {
                        targets: 0,
                        checkboxes: {
                            selectRow: true,
                            selectCallback: function(nodes, selected) {
                                if (table.column(0).checkboxes.selected().length > 0)
                                {
                                    $('#btn-delete').removeAttr('disabled');
                                    $('#btn-draft').removeAttr('disabled');
                                    $('#btn-publish').removeAttr('disabled');
                                } else {
                                    $('#btn-delete').attr('disabled', true);
                                    $('#btn-draft').attr('disabled', true);
                                    $('#btn-publish').attr('disabled', true);
                                }

                                if (table.column(0).checkboxes.selected().length > 0 &&
                                    table.column(0).checkboxes.selected().length < 2)
                                {
                                    $('#btn-edit').removeAttr('disabled');
                                }
                                else { $('#btn-edit').attr('disabled', true); }
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
                columns: [
                    {data: 'id', name: 'id', searchable: false},
                    {data: 'photo', name: 'photo', searchable: false},
                    {data: 'title', name: 'title'},
                    {data: 'slug', name: 'slug', createdCell: (cell) => {
                        cell.classList.add('is-clickable');
                    }},
                    {data: 'category', name: 'category', searchable: false},
                    {data: 'status', name: 'status', searchable: false},
                    {data: 'is_featured', name: 'is_featured', searchable: false},
                    {data: 'body', name: 'body', searchable: false},
                    {data: 'created_at', name: 'created_at', searchable: false},
                    {data: 'user_id', name: 'user_id', searchable: false},
                ],
            });

            $('#form-edit').on('submit', function(e) {
                e.preventDefault();
                let form = this;
                let row_selected_id = table.column(0).checkboxes.selected()[0];
                $(form).attr('action', `{{ url('dashboard/admin/posts/${row_selected_id}/edit') }}`);
                form.submit()
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
                        form.submit();
                    }
                })
            });
            $('#form-draft').on('submit', function(e){
                e.preventDefault();
                var form = this;
                var rows_selected = table.column(0).checkboxes.selected();
                Swal.fire({
                    title: "Pindah ke Draft Post Terpilih ?",
                    text: "Data akan disembunyikan, anda yakin ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Iya, pindah ke Draft!',
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
                        form.submit();
                    }
                })
            });
            $('#form-publish').on('submit', function(e){
                e.preventDefault();
                var form = this;
                var rows_selected = table.column(0).checkboxes.selected();
                Swal.fire({
                    title: "Publish Post Terpilih ?",
                    text: "Data ini akan ditampilkan pada website, anda yakin ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Iya, publish!',
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
                        form.submit();
                    }
                })
            });
        })
    </script>
@endpush {{-- end of script --}}
