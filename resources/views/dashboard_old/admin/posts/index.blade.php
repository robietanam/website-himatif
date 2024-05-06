@extends('dashboard._layouts.app')

@section('title', 'Keanggotaan') {{-- title --}}
@section('header', 'Keanggotaan') {{-- header --}}

@section('breadcrumb') {{-- breadcrumb --}}
    <div class="inline-block px-2 py-2 text-gray-700">Post</div>
@endsection {{-- end of breadcrumb --}}

@section('content') {{-- content --}}
    <div class="flex flex-wrap ">
        <div class="md:w-1/3 pr-4 pl-4">
            @component('dashboard._components.widget', ['color' => 'primary'])
                @slot('icon', 'fas fa-image')
                @slot('title', 'Total Berita')
                @slot('content', $countAllPost)
            @endcomponent
        </div>
        <div class="md:w-1/3 pr-4 pl-4">
            @component('dashboard._components.widget', ['color' => 'info'])
                @slot('icon', 'fas fa-image')
                @slot('title', 'Berita Aktif')
                @slot('content', $countActivePost)
            @endcomponent
        </div>
        <div class="md:w-1/3 pr-4 pl-4">
            @component('dashboard._components.widget', ['color' => 'secondary'])
                @slot('icon', 'fas fa-image')
                @slot('title', 'Berita Non-Aktif')
                @slot('content', $countInactivePost)
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
                    <form id="form-delete" action="{{ route('dashboard.admin.posts.destroys') }}" method="POST">
                        @csrf @method('DELETE')
                        <button id="btn-delete"
                            class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md  no-underline py-1 px-2 leading-tight text-xs  bg-red-600 text-white hover:bg-red-700"
                            disabled>
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
                {{-- <div class="col-md-auto">
                    <form id="form-draft" action="{{ route('dashboard.admin.posts.draft') }}" method="POST">
                        @csrf @method('PUT')
                        <button id="btn-draft" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md  no-underline block w-full py-1 px-2 leading-tight text-xs  bg-gray-600 text-white hover:bg-gray-700" disabled>
                            <i class="fas fa-archive"></i>
                        </button>
                    </form>
                </div> --}}
                {{-- <div class="col-md-auto">
                    <form id="form-publish" action="{{ route('dashboard.admin.posts.publish') }}" method="POST">
                        @csrf @method('PUT')
                        <button id="btn-publish" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md  no-underline block w-full py-1 px-2 leading-tight text-xs  bg-green-500 text-white hover:bg-green-600" disabled>
                            <i class="fas fa-share-square"></i>
                        </button>
                    </form>
                </div> --}}
                <div class="col-md-auto">
                    <form id="form-edit">
                        <button id="btn-edit"
                            class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md  no-underline py-1 px-2 leading-tight text-xs  bg-orange-400 text-black hover:bg-orange-500"
                            disabled>
                            <i class="fas fa-pen"></i>
                        </button>
                    </form>
                </div>
                <div class="col-md-auto">
                    <a href="{{ route('dashboard.admin.posts.create') }}"
                        class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md  no-underline block w-full py-1 px-2 leading-tight text-xs  bg-blue-600 text-white hover:bg-blue-600">
                        <i class="fas fa-plus mr-2"></i> Tambah Data
                    </a>
                </div>

            </div>
        </div>
    </div>

    <div class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300">
        <div class="flex-auto p-6">
            <div class="flex flex-wrap  gutters-xs items-center border-b pb-3 mb-3">
                <div class="relative md:flex-grow md:flex-1">Tampilkan Data</div>
                <div class="col-md-auto">
                    <a href=""
                        class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600">Semua</a>
                </div>
                <div class="col-md-auto">
                    <a href=""
                        class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md py-1 px-3 leading-normal no-underline text-gray-600 border-gray-600 hover:bg-gray-600 hover:text-white bg-white hover:bg-gray-700">Trash</a>
                </div>
            </div>
            <div class="table-datatable-container">
                <table id="datatable" class="w-full max-w-full mb-4 bg-transparent table-datatable" width="100%">
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

@push('style')
    {{-- style --}}
    @include('dashboard._styles.datatable')
@endpush {{-- end of style --}}

@push('script')
    {{-- script --}}
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
                ajax: ajax_url,
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
                        data: 'photo',
                        name: 'photo',
                        searchable: false
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'slug',
                        name: 'slug',
                        createdCell: (cell) => {
                            cell.classList.add('is-clickable');
                        }
                    },
                    {
                        data: 'category',
                        name: 'category',
                        searchable: false
                    },
                    {
                        data: 'status',
                        name: 'status',
                        searchable: false
                    },
                    {
                        data: 'is_featured',
                        name: 'is_featured',
                        searchable: false
                    },
                    {
                        data: 'body',
                        name: 'body',
                        searchable: false
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        searchable: false
                    },
                    {
                        data: 'user_id',
                        name: 'user_id',
                        searchable: false
                    },
                ],
            });

            $('#form-edit').on('submit', function(e) {
                e.preventDefault();
                let form = this;
                let row_selected_id = table.column(0).checkboxes.selected()[0];
                $(form).attr('action', `{{ url('dashboard/admin/posts/${row_selected_id}/edit') }}`);
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
            $('#form-draft').on('submit', function(e) {
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
            $('#form-publish').on('submit', function(e) {
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
