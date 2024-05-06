@extends('dashboard._layouts.app')

@section('title', 'Ubah Data Proker') {{-- title --}}
@section('header', 'Proker') {{-- header --}}

@section('breadcrumb') {{-- breadcrumb --}}
    <div class="breadcrumb-item active"><a href="{{ route('dashboard.pengurus.prokers.index') }}">Proker</a></div>
    <div class="breadcrumb-item">Atur Proker</div>
@endsection {{-- end of breadcrumb --}}

@section('content') {{-- content --}}
    <div class="row gutters-xs align-items-center justify-content-end my-4">
        <div class="col-lg">
            <h4>Ubah Data</h4>
        </div>
        <div class="col col-md-auto">
            <a href="{{ route('dashboard.pengurus.prokers.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left mr-1"></i> Semua Data
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <ul class="nav nav-pills nav-justified">
                <li class="nav-item">
                    <a class="nav-link {{ !Request::get('tabs') ? 'active' : '' }}"
                        href="{{ route('dashboard.pengurus.prokers.edit', $proker->id) }}">
                        Data Proker
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::get('tabs') === 'users' ? 'active' : '' }}"
                        href="{{ route('dashboard.pengurus.prokers.edit', $proker->id) . '?tabs=users' }}">
                        Anggota Proker
                    </a>
                </li>
            </ul>
        </div>
    </div>

    {{-- row : form update proker --}}
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade {{ !Request::get('tabs') ? 'show active' : '' }}" id="nav-update-proker" role="tabpanel">
            <form action="{{ route('dashboard.pengurus.prokers.update', $proker->id) }}" enctype="multipart/form-data"
                method="POST">
                @csrf
                @method('PUT')
                <div class="row gutters-xs">
                    {{-- col : image upload --}}
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div class="img-wrapper img-wrapper-upload bg-secondary w-100 h-10rem my-3">
                                    <img id="img-logo" src="{{ asset('storage/' . $proker->logo) }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- col : input --}}
                    <div class="col-lg">
                        <div class="card">
                            <div class="card-body">
                                {{-- input : name --}}
                                @component('dashboard._components._form-group.input')
                                    @slot('inputLabel', 'Nama')
                                    @slot('inputName', 'name')
                                    @slot('inputId', 'input-name')
                                    @slot('inputValue', $proker->name)
                                    @slot('inputIsDisabled', true)
                                @endcomponent

                                {{-- input : Ketua Proker --}}
                                @component('dashboard._components._form-group.input')
                                    @slot('inputLabel', 'Ketua Proker')
                                    @slot('inputName', 'leader')
                                    @slot('inputId', 'input-leader')
                                    @slot('inputValue', $proker->getLeader())
                                    @slot('inputHelp', 'Buka menu "Anggota Proker" untuk Mengganti Ketua Proker')
                                    @slot('inputIsDisabled', true)
                                @endcomponent


                                {{-- richtext : description --}}
                                <div class="form-group">
                                    <label for="">Deskripsi Proker</label>
                                    <div class="bg-whitesmoke rounded-sm p-3">
                                        {!! $proker->description !!}
                                    </div>
                                </div>

                                {{-- input : is_registration_open --}}
                                @component('dashboard._components._form-group.input-radio')
                                    @slot('inputLabel', 'Status Pendaftaran')
                                    @slot('inputName', 'is_registration_open')
                                    @slot('inputId', 'input-is_registration_open')
                                    @slot('inputValue', old('is_registration_open') ?? $proker->is_registration_open)
                                    @slot('inputDatas', [
                                        '<i class="fas fa-share-square text-primary mr-1"></i> Dibuka' => 1,
                                        '<i class="fas fa-minus-square mr-1"></i> Ditutup' => 0,
                                        ])
                                    @endcomponent

                                    {{-- input : link_registration --}}
                                    @component('dashboard._components._form-group.input')
                                        @slot('inputLabel', 'Link Registrasi')
                                        @slot('inputHelp', 'Wajib diisi jika status registrasi "dibuka"')
                                        @slot('inputName', 'link_registration')
                                        @slot('inputId', 'input-link_registration')
                                        @slot('inputValue', $proker->link_registration)
                                    @endcomponent

                                    {{-- input : link_instagram --}}
                                    @component('dashboard._components._form-group.input')
                                        @slot('inputLabel', 'Link Instagram')
                                        @slot('inputHelp', 'Masukan link Instagram Proker jika ada')
                                        @slot('inputName', 'link_instagram')
                                        @slot('inputId', 'input-link_instagram')
                                        @slot('inputValue', $proker->link_instagram)
                                    @endcomponent

                                    {{-- input : link_storage_document --}}
                                    @component('dashboard._components._form-group.input')
                                        @slot('inputLabel', 'Link Penyimpanan Dokumen')
                                        @slot('inputName', 'link_storage_document')
                                        @slot('inputHelp', 'Masukan link penyimpanan dokumen seperti (lpj, surat, dll) jika ada')
                                        @slot('inputId', 'input-link_storage_document')
                                        @slot('inputValue', $proker->link_storage_document)
                                    @endcomponent

                                    {{-- input : link_storage_certificate --}}
                                    @component('dashboard._components._form-group.input')
                                        @slot('inputLabel', 'Link Penyimpanan Sertifikat')
                                        @slot('inputName', 'link_storage_certificate')
                                        @slot('inputHelp', 'Masukan link penyimpanan sertifikat jika ada')
                                        @slot('inputId', 'input-link_storage_certificate')
                                        @slot('inputValue', $proker->link_storage_certificate)
                                    @endcomponent

                                    {{-- input : link_storage_pdd_documentation --}}
                                    @component('dashboard._components._form-group.input')
                                        @slot('inputLabel', 'Link Penyimpanan Dokumentasi PDD')
                                        @slot('inputName', 'link_storage_pdd_documentation')
                                        @slot('inputHelp', 'Masukan link penyimpanan sertifikat jika ada')
                                        @slot('inputId', 'input-link_storage_pdd_documentation')
                                        @slot('inputValue', $proker->link_storage_pdd_documentation)
                                    @endcomponent

                                    {{-- input : link_contact_person --}}
                                    @component('dashboard._components._form-group.input')
                                        @slot('inputLabel', 'Nomor WA PJ HUMAS')
                                        @slot('inputName', 'link_contact_person')
                                        @slot('inputHelp', 'Nomor WA PJ HUMAS (Contoh : 0895326363837)')
                                        @slot('inputId', 'input-link_contact_person')
                                        @slot('inputValue', $proker->link_contact_person)
                                    @endcomponent

                                    {{-- submit --}}
                                    <div class="row justify-content-end">
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade {{ Request::get('tabs') === 'users' ? 'show active' : '' }}" id="nav-update-proker-user"
                role="tabpanel">
                <div class="card">
                    <div class="card-body">
                        <div class="row gutters-xs align-items-center border-bottom pb-3 mb-3">
                            <div class="col-md">Operasi Data</div>
                            <div class="col-md-auto">
                                <a data-toggle="modal" href="#m-create-proker-user" class="btn btn-primary">
                                    Tambah Anggota
                                </a>
                            </div>
                        </div>
                        <div class="table-datatable-container">
                            <table id="datatable" class="table table-datatable" width="100%">
                                <thead>
                                    <tr>
                                        <th class="no-sort">Aksi</th>
                                        <th>Nama</th>
                                        <th>Nim</th>
                                        <th>Nomor Hp</th>
                                        <th>Jabatan</th>
                                        <th>Catatan</th>
                                        <th>Ditambahkan Pada</th>
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
            </div>
        </div>
    @endsection {{-- end of content --}}

    @section('modal')
        <div class="modal fade" id="m-edit-proker-user" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Anggota Proker</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{-- action added via js --}}
                    <form action="" method="POST">
                        <div class="modal-body">
                            @csrf
                            @method('PUT')
                            {{-- input : search users --}}
                            @php
                                $inputDatasUser = [];
                                foreach ($users as $user) {
                                    $inputDatasUser["$user->name"] = $user->id;
                                }
                            @endphp
                            @component('dashboard._components._form-group.input-select')
                                @slot('inputLabel', 'Pilih dari Pengurus')
                                @slot('inputId', 'm-edit-proker-user-input-select_pengurus')
                                @slot('inputName', 'user_id')
                                @slot('inputHelp', 'Gunakan ini untuk jika anggota proker dari Pengurus Himatif')
                                @slot('inputIsSearchable', true)
                                @slot('inputDatas', $inputDatasUser)
                            @endcomponent

                            <hr class="my-2">

                            <button type="button" id="m-edit-btn-not-pengurus" class="btn p-0 btn-link text-primary mb-2">
                                Bukan Pengurus Himatif ?
                            </button>
                            <button type="button" id="m-edit-btn-is-pengurus"
                                class="d-none btn p-0 btn-link text-primary mb-2">
                                Dari Pengurus Himatif ?
                            </button>
                            {{-- input : name --}}
                            @component('dashboard._components._form-group.input')
                                @slot('inputLabel', 'Nama')
                                @slot('inputName', 'name')
                                @slot('inputIsReadOnly', true)
                                @slot('inputId', 'm-edit-proker-user-input-name')
                            @endcomponent
                            {{-- input : nim --}}
                            @component('dashboard._components._form-group.input')
                                @slot('inputLabel', 'Nim')
                                @slot('inputName', 'nim')
                                @slot('inputIsReadOnly', true)
                                @slot('inputId', 'm-edit-proker-user-input-nim')
                            @endcomponent
                            {{-- input : phone --}}
                            @component('dashboard._components._form-group.input')
                                @slot('inputLabel', 'Nomor Hp')
                                @slot('inputName', 'phone')
                                @slot('inputIsReadOnly', true)
                                @slot('inputId', 'm-edit-proker-user-input-phone')
                            @endcomponent

                            <hr>

                            {{-- input : proker_division_id --}}
                            @php
                                $inputDatasPosition = [];
                                foreach ($prokerDivisions as $division) {
                                    $inputDatasPosition["$division->name"] = $division->id;
                                }
                            @endphp
                            @component('dashboard._components._form-group.input-select')
                                @slot('inputLabel', 'Jabatan')
                                @slot('inputName', 'proker_division_id')
                                @slot('inputId', 'm-edit-proker-user-input-proker_division_id')
                                @slot('inputIsSearchable', true)
                                @slot('inputDatas', $inputDatasPosition)
                            @endcomponent
                            {{-- input : note --}}
                            @component('dashboard._components._form-group.textarea')
                                @slot('inputLabel', 'Catatan Untuk Anggota')
                                @slot('inputName', 'note')
                                @slot('inputId', 'm-edit-proker-user-input-note')
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
        <div class="modal fade" id="m-create-proker-user" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Anggota Proker</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('dashboard.pengurus.prokers.store.user') }}" method="POST">
                        <div class="modal-body">
                            @csrf
                            {{-- input : proker_id (hidden but required) --}}
                            <input type="hidden" name="proker_id" value="{{ $proker->id }}">

                            {{-- input : search users --}}
                            @php
                                $inputDatasUser = [];
                                foreach ($users as $user) {
                                    $inputDatasUser["$user->name"] = $user->id;
                                }
                            @endphp
                            @component('dashboard._components._form-group.input-select')
                                @slot('inputLabel', 'Pilih dari Pengurus')
                                @slot('inputId', 'm-create-proker-user-input-select_pengurus')
                                @slot('inputName', 'user_id')
                                @slot('inputHelp', 'Gunakan ini untuk jika anggota proker dari Pengurus Himatif')
                                @slot('inputIsSearchable', true)
                                @slot('inputDatas', $inputDatasUser)
                            @endcomponent

                            <hr class="my-2">

                            <button type="button" id="m-create-btn-not-pengurus" class="btn p-0 btn-link text-primary mb-2">
                                Bukan Pengurus Himatif ?
                            </button>
                            <button type="button" id="m-create-btn-is-pengurus"
                                class="d-none btn p-0 btn-link text-primary mb-2">
                                Dari Pengurus Himatif ?
                            </button>

                            {{-- input : name --}}
                            @component('dashboard._components._form-group.input')
                                @slot('inputLabel', 'Nama')
                                @slot('inputName', 'name')
                                @slot('inputIsReadOnly', true)
                                @slot('inputId', 'm-create-proker-user-input-name')
                            @endcomponent
                            {{-- input : nim --}}
                            @component('dashboard._components._form-group.input')
                                @slot('inputLabel', 'Nim')
                                @slot('inputName', 'nim')
                                @slot('inputIsReadOnly', true)
                                @slot('inputId', 'm-create-proker-user-input-nim')
                            @endcomponent
                            {{-- input : phone --}}
                            @component('dashboard._components._form-group.input')
                                @slot('inputLabel', 'Nomor Hp')
                                @slot('inputName', 'phone')
                                @slot('inputIsReadOnly', true)
                                @slot('inputId', 'm-create-proker-user-input-phone')
                            @endcomponent

                            <hr>

                            {{-- input : proker_division_id --}}
                            @php
                                $inputDatasPosition = [];
                                foreach ($prokerDivisions as $division) {
                                    $inputDatasPosition["$division->name"] = $division->id;
                                }
                            @endphp
                            @component('dashboard._components._form-group.input-select')
                                @slot('inputLabel', 'Jabatan')
                                @slot('inputName', 'proker_division_id')
                                @slot('inputId', 'm-create-proker-user-input-proker_division_id')
                                @slot('inputIsSearchable', true)
                                @slot('inputDatas', $inputDatasPosition)
                            @endcomponent
                            {{-- input : note --}}
                            @component('dashboard._components._form-group.textarea')
                                @slot('inputLabel', 'Catatan Untuk Anggota')
                                @slot('inputName', 'note')
                                @slot('inputId', 'm-create-proker-user-input-note')
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
        {{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> --}}
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
                @if ($errors->first('updateUser_user_id'))
                    $('#m-edit-proker-user')
                        .find('form')
                        .attr('action',
                            `{{ route('dashboard.pengurus.prokers.update.user', $errors->first('updateUser_user_id')) }}`
                        );
                    $('#m-edit-proker-user').modal('show');
                @endif
                @if ($errors->first('storeUser'))
                    $('#m-create-proker-user').modal('show');
                @endif

                /*
                    Datatable
                */
                const ajax_url = '{{ route('ajax.getProkerUsers', $proker->id) }}';
                const table = $('#datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    dom: `<'row no-gutters'<'col-md'l><'col-md-auto'f>>
                        <'row'<'col-12 table-datatable-container' t>>
                        <'row no-gutters justify-content-center'<'col-md'i><'col-md-auto'p>>`,
                    responsive: true,
                    language: {
                        lengthMenu: "Tampilkan _MENU_",
                        zeroRecords: "Tidak Ada Data User",
                        info: "Menampilkan _PAGE_ dari _PAGES_ page",
                        infoEmpty: "Tidak Ada Data",
                        infoFiltered: "(filtered from _MAX_ total records)",
                        search: "Cari Data User:"
                    },
                    ajax: ajax_url,
                    columnDefs: [{
                            targets: 'defined-default-width',
                            className: 'defined-default-width'
                        },
                        {
                            targets: 'no-sort',
                            orderable: false
                        }
                    ],
                    order: [],
                    columns: [{
                            data: 'action',
                            name: 'action',
                            searchable: false,
                            createdCell: (cell) => {
                                $(cell).addClass('is-clickabled');
                                if ($(cell).find('button').prop('disabled')) {
                                    $(cell).parent().addClass('bg-softlight');
                                }
                            }
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
                            data: 'phone',
                            name: 'phone'
                        },
                        {
                            data: 'position',
                            name: 'position'
                        },
                        {
                            data: 'note',
                            name: 'note'
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
            })

            /*
                handleChange Select pengurus
            */
            $('#m-edit-proker-user-input-select_pengurus').on('change', function(e) {
                $.ajax({
                    url: `{{ route('ajax.findUserById') }}/${$(this).val()}`,
                    success: (result) => {
                        const {
                            data
                        } = result;
                        $('#m-edit-proker-user-input-name').val(data.name);
                        $('#m-edit-proker-user-input-nim').val(data.nim);
                        $('#m-edit-proker-user-input-phone').val(data.phone);
                    }
                })
            })
            $('#m-create-proker-user-input-select_pengurus').on('change', function(e) {
                $.ajax({
                    url: `{{ route('ajax.findUserById') }}/${$(this).val()}`,
                    success: (result) => {
                        const {
                            data
                        } = result;
                        $('#m-create-proker-user-input-name').val(data.name);
                        $('#m-create-proker-user-input-nim').val(data.nim);
                        $('#m-create-proker-user-input-phone').val(data.phone);
                    }
                })
            })

            /*
                handleClick btn not/is pengurus
            */
            $('#m-edit-btn-not-pengurus').on('click', function() {
                $('#m-edit-proker-user-input-name').attr('readonly', false);
                $('#m-edit-proker-user-input-nim').attr('readonly', false);
                $('#m-edit-proker-user-input-phone').attr('readonly', false);
                $('#m-edit-proker-user-input-select_pengurus').val('default');
                $('#m-edit-proker-user-input-select_pengurus').prop('disabled', true);
                $('#m-edit-proker-user-input-select_pengurus').selectpicker('refresh');

                $(this).addClass('d-none');
                $('#m-edit-btn-is-pengurus').removeClass('d-none');
            })
            $('#m-edit-btn-is-pengurus').on('click', function() {
                $('#m-edit-proker-user-input-name').attr('readonly', true);
                $('#m-edit-proker-user-input-nim').attr('readonly', true);
                $('#m-edit-proker-user-input-phone').attr('readonly', true);
                $('#m-edit-proker-user-input-select_pengurus').val('default');
                $('#m-edit-proker-user-input-select_pengurus').prop('disabled', false);
                $('#m-edit-proker-user-input-select_pengurus').selectpicker('refresh');

                $(this).addClass('d-none');
                $('#m-edit-btn-not-pengurus').removeClass('d-none');
            })
            $('#m-create-btn-not-pengurus').on('click', function() {
                $('#m-create-proker-user-input-name').attr('readonly', false);
                $('#m-create-proker-user-input-nim').attr('readonly', false);
                $('#m-create-proker-user-input-phone').attr('readonly', false);
                $('#m-create-proker-user-input-select_pengurus').val('default');
                $('#m-create-proker-user-input-select_pengurus').prop('disabled', true);
                $('#m-create-proker-user-input-select_pengurus').selectpicker('refresh');

                $(this).addClass('d-none');
                $('#m-create-btn-is-pengurus').removeClass('d-none');
            })
            $('#m-create-btn-is-pengurus').on('click', function() {
                $('#m-create-proker-user-input-name').attr('readonly', true);
                $('#m-create-proker-user-input-nim').attr('readonly', true);
                $('#m-create-proker-user-input-phone').attr('readonly', true);
                $('#m-create-proker-user-input-select_pengurus').val('default');
                $('#m-create-proker-user-input-select_pengurus').prop('disabled', false);
                $('#m-create-proker-user-input-select_pengurus').selectpicker('refresh');

                $(this).addClass('d-none');
                $('#m-create-btn-not-pengurus').removeClass('d-none');
            })

            /*
                Modal edit proker user
            */
            function handleShowModalEdit(el) {
                const currentModal = $('#m-edit-proker-user');

                const data_id = $(el).data('m-edit-proker-user-id');
                const data_name = $(el).data('m-edit-proker-user-name');
                const data_nim = $(el).data('m-edit-proker-user-nim');
                const data_phone = $(el).data('m-edit-proker-user-phone');
                const data_proker_division_id = $(el).data('m-edit-proker-user-proker_division_id');
                const data_note = $(el).data('m-edit-proker-user-note');
                const data_user_id = $(el).data('m-edit-proker-user-user_id');

                if (!data_user_id) {
                    $('#m-edit-proker-user-input-name').attr('readonly', false);
                    $('#m-edit-proker-user-input-nim').attr('readonly', false);
                    $('#m-edit-proker-user-input-phone').attr('readonly', false);

                    $('#m-edit-btn-not-pengurus').addClass('d-none');
                    $('#m-edit-btn-is-pengurus').removeClass('d-none');
                }

                $('#m-edit-proker-user-input-name').val(data_name);
                $('#m-edit-proker-user-input-nim').val(data_nim);
                $('#m-edit-proker-user-input-phone').val(data_phone);
                $('#m-edit-proker-user-input-proker_division_id').selectpicker('val', data_proker_division_id);
                $('#m-edit-proker-user-input-select_pengurus').selectpicker('val', data_user_id);
                $('#m-edit-proker-user-input-note').val(data_note);

                currentModal.find('form').attr('action', `{{ route('dashboard.pengurus.prokers.update.user') }}/${data_id}`);
                currentModal.modal('show');
            }

            /*
                Modal delete proker user (confirm)
            */
            function handleDeleteProkerUser(event) {
                event.preventDefault();
                var form = event.target;
                Swal.fire({
                    title: "Hapus Anggota ?",
                    text: "Apakah anda yakin untuk menghapus anggota tersebut",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Iya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                })
            }
        </script>
    @endpush {{-- end of script --}}
