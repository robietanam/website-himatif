@extends('dashboard._layouts.app')

@section('title', 'Pemilu') {{-- title --}}
@section('header', 'Pemilu') {{-- header --}}

@section('breadcrumb') {{-- breadcrumb --}}
    <div class="breadcrumb-item">Pemilu</div>
@endsection {{-- end of breadcrumb --}}

@section('content') {{-- content --}}
    <div class="container mx-auto my-4">
        <h2 class="text-xl font-bold">Total Suara</h2>
        <canvas id="candidateChart" width="400" height="400"></canvas> <!-- Set width and height here -->
    </div>
    <div class="row">
        @foreach ($countAll as $nim => $total)
            @if ($nim === 'Belum Vote')
                <div class="col-md-12">
                    @component('dashboard._components.widget', ['color' => 'primary'])
                        @slot('icon', 'fas fa-briefcase')
                        @slot('title', $nim)
                        @slot('content', $total)
                    @endcomponent
                </div>
            @else
                <div class="col-md-4">
                    @component('dashboard._components.widget', ['color' => 'primary'])
                        @slot('icon', 'fas fa-briefcase')
                        @slot('title', $nim)
                        @slot('content', $total)
                    @endcomponent
                </div>
            @endif
        @endforeach
    </div>

    <div class="card mb-2">
        <div class="card-body">
            <div class="row align-items-center gutters-xs">
                <div class="col-lg">
                    <h5 class="mb-0">Operasi Data</h5>
                </div>
                <div class="col-md-auto">
                    <a target="_blank" href="{{ route('dashboard.admin.pemilu-vote.email.preview') }}"><button
                            type="button" class="btn btn-primary">Preview</button></a>
                </div>
                <div class="col-md-auto">
                    <form id="form-delete" action="{{ route('dashboard.admin.pemilu-vote.destroys') }}" method="POST">
                        @csrf @method('DELETE')
                        <button id="btn-delete" class="btn btn-sm btn-danger" disabled>
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>

                <div class="col-md-auto">
                    <form id="form-email" action="{{ route('dashboard.admin.pemilu-vote.email.send') }}" method="POST">
                        @csrf
                        <button id='btn-email' class="btn btn-block btn-sm btn-primary">
                            <i class="fas fa-plus mr-2"></i> Kirim Email
                        </button>
                    </form>
                </div>
                <div class="col-md-auto">
                    <a data-bs-toggle="modal" href="#m-create" class="btn btn-block btn-sm btn-primary">
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
                    <a href="{{ route('dashboard.admin.pemilu-vote.index') }}"
                        class="btn {{ is_null(Request::get('status')) ? 'btn-primary' : 'btn-outline-secondary' }}">
                        Semua
                    </a>
                </div>
                <div class="col-md-auto">
                    <a href="{{ route('dashboard.admin.pemilu-vote.index') . '?status=0' }}"
                        class="btn {{ Request::get('status') === '0' ? 'btn-primary' : 'btn-outline-secondary' }}">
                        Belum memilih
                    </a>
                </div>

            </div>
            <div class="table-datatable-container">
                <table id="datatable" class="table table-datatable" width="100%">
                    <thead>
                        <tr>
                            <th class="no-export"></th>
                            <th class="no-sort no-export">Aksi</th>
                            <th>NIM</th>
                            <th>TOKEN</th>
                            <th>Vote</th>
                            <th>Email Status</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Voter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('dashboard.admin.pemilu-vote.addVoter') }}" enctype="multipart/form-data"
                    method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div class="img-fit img-fit-contain bg-whitesmoke w-100 h-10rem my-3">
                                    <img id="img-logo" src="" alt="">
                                </div>
                                @component('dashboard._components._form-group.input-img')
                                    @slot('inputLabel', 'CSV ( Pastikan NIM ada pada row bernama "NIM")')
                                    @slot('inputPreviewIdentity', 'img-logo')
                                    @slot('inputName', 'csv')
                                    @slot('inputId', 'input-csv')
                                @endcomponent
                            </div>
                        </div>
                        {{-- input : name --}}
                        @component('dashboard._components._form-group.textarea')
                            @slot('inputLabel', 'Jika multiple voter, pisahkan dengan enter')
                            @slot('inputPlaceholder',
                                '
                                212410102067
                                212410102030
                                212410102087
                                ')
                                @slot('inputName', 'nim_list')
                                @slot('inputId', 'input-nim_list')
                            @endcomponent


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
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            $(document).ready(function() {
                const ctx = document.getElementById('candidateChart').getContext('2d');

                const data = @json($countAll); // Pass PHP data to JavaScript

                const labels = [];
                const counts = [];

                // Loop through the response to extract only candidates with votes
                for (const [key, value] of Object.entries(data)) {
                    if (key !== "Belum Vote") { // Exclude "Belum Vote"
                        labels.push(key);
                        counts.push(value);
                    }
                }
                const candidateChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Vote Count',
                            data: counts,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)', // Red
                                'rgba(54, 162, 235, 0.2)', // Blue
                                'rgba(255, 206, 86, 0.2)', // Yellow
                                'rgba(75, 192, 192, 0.2)', // Teal
                                'rgba(153, 102, 255, 0.2)', // Purple
                                'rgba(255, 159, 64, 0.2)' // Orange
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(tooltipItem) {
                                        return `${tooltipItem.label}: ${tooltipItem.raw}`;
                                    }
                                }
                            }
                        }
                    }
                });
                /*
                    Initialize form modal error
                */
                @if ($errors->first('store'))
                    $('#m-create').modal('show');
                @endif

                /*
                    Datatable
                */
                const ajax_url = '{{ route('ajax.getVoter') . '?status=' . Request::get('status') }}';
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
                                        $('#btn-delete').removeAttr('disabled');
                                    } else {
                                        $('#btn-delete').attr('disabled', true);
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
                    order: [
                        [2, 'asc']
                    ],
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
                            data: 'nim',
                            name: 'nim',
                        },
                        {
                            data: 'token',
                            name: 'token'
                        },
                        {
                            data: 'vote_status',
                            name: 'vote_status',
                        },
                        {
                            data: 'email_status',
                            name: 'email_status',
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

                $('#form-email').on('submit', function(e) {
                    e.preventDefault();
                    var form = this;
                    var rows_selected = table.column(0).checkboxes.selected();
                    Swal.fire({
                        title: `Kirim ${rows_selected.length} Email ?`,
                        text: "Jangan ditutup dan tunggu sampai ada alert , ngirimnya kalau banyak lama",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Iya!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Iterate over all selected checkboxes
                            $.each(table.rows({
                                selected: true
                            }).data(), function(index, data) {
                                // Create a hidden element
                                console.log(data.nim);
                                $(form).append(
                                    $('<input>')
                                    .attr('type', 'hidden')
                                    .attr('name', 'id[]')
                                    .val(data.id)
                                );
                                $(form).append(
                                    $('<input>')
                                    .attr('type', 'hidden')
                                    .attr('name', 'nim[]')
                                    .val(data.nim)
                                );
                                $(form).append(
                                    $('<input>')
                                    .attr('type', 'hidden')
                                    .attr('name', 'token[]')
                                    .val(data.token)
                                );
                            });
                            form.submit();
                        }
                    })
                });
            })
        </script>
    @endpush {{-- end of script --}}
