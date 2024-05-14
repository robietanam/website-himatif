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
                    <h5 class="mb-0">Editable Konten </h5>
                </div>
                <div class="row justify-content-end">
                    <div class="col-auto">
                        <a target="_blank" href="{{ route('dashboard.admin.cakap.email.preview') }}"><button type="button"
                                class="btn btn-primary">Preview</button></a>

                    </div>
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
                            <th class="">Status</th>
                            <th class="">Kode</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < count($dataForm['nama']); $i++)
                            <tr>
                                <td></td>
                                <td>{{ $dataForm['nama'][$i] }}</td>
                                <td>{{ $dataForm['email'][$i] }}</td>
                                <td>{{ $dataForm['id_form'][$i] }}</td>
                                <td>{{ $dataForm['status'][$i] }}</td>
                                <td></td>
                            </tr>
                        @endfor
                        {{--  --}}
                    </tbody>
                </table>
            </div>
            <div class="row justify-content-end">
                <div class="col-auto">
                    <button type="button" id="btn-email" class="btn btn-primary">Simpan</button>
                </div>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            const ajax_url_kode = '{{ route('ajax.getCakapsEmail') }}';

            const tableKode = $('#datatable').DataTable({
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
                    data: {!! json_encode($dataForm) !!},

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
                        data: 'nama',
                        name: 'nama',
                    },

                    {
                        data: 'email',
                        name: 'email',
                    },
                    {
                        data: 'id_form',
                        name: 'id_form',
                        searchable: false
                    },
                    {
                        data: 'status',
                        name: 'status',
                        searchable: false
                    },
                    {
                        data: 'kode',
                        name: 'kode',
                    },
                ],

            });
            $('#btn-email').click(function() {
                //ajax
                var form_data = tableKode.rows().data()
                $.each(form_data, function(key, value) {
                    $.ajax({
                        url: "{{ route('dashboard.admin.cakap.email.sends') }}",
                        type: "GET",
                        cache: false,
                        data: {
                            "data": value,
                        },
                        success: function(response) {
                            console.log(response);
                            //...

                        },
                        error: function(error) {
                            console.log(error)
                            //...

                        }
                    });
                });
                console.log(tableKode.rows().data())


            })
        });
    </script>
@endpush {{-- end of script --}}
