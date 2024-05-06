@extends('dashboard._layouts.app')

@section('title', 'Ubah Data Proker') {{-- title --}}
@section('header', 'Proker') {{-- header --}}

@section('breadcrumb') {{-- breadcrumb --}}
    <div class="inline-block px-2 py-2 text-gray-700 active"><a
            href="{{ route('dashboard.pengurus.prokers.index') }}">Proker</a></div>
    <div class="inline-block px-2 py-2 text-gray-700">Atur Proker</div>
@endsection {{-- end of breadcrumb --}}

@section('content') {{-- content --}}
    <div class="flex flex-wrap  gutters-xs items-center justify-end my-4">
        <div class="relative lg:flex-grow lg:flex-1">
            <h4>Ubah Data</h4>
        </div>
        <div class="relative flex-grow max-w-full flex-1 px-4 col-md-auto">
            <a href="{{ route('dashboard.pengurus.prokers.index') }}"
                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md py-1 px-3 leading-normal no-underline text-gray-600 border-gray-600 hover:bg-gray-600 hover:text-white bg-white hover:bg-gray-700">
                <i class="fas fa-arrow-left mr-1"></i> Semua Data
            </a>
        </div>
    </div>

    <div class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300">
        <div class="flex-auto p-6">
            <ul class="flex flex-wrap list-none pl-0 mb-0  ">
                <li class="">
                    <a class="inline-block py-2 px-4 no-underline {{ !Request::get('tabs') ? 'active' : '' }}"
                        href="{{ route('dashboard.pengurus.prokers.edit', $proker->id) }}">
                        Data Proker
                    </a>
                </li>
                <li class="">
                    <a class="inline-block py-2 px-4 no-underline {{ Request::get('tabs') === 'users' ? 'active' : '' }}"
                        href="{{ route('dashboard.pengurus.prokers.edit', $proker->id) . '?tabs=users' }}">
                        Anggota Proker
                    </a>
                </li>
            </ul>
        </div>
    </div>

    {{-- row : form update proker --}}
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane opacity-0 {{ !Request::get('tabs') ? 'opacity-100 block active' : '' }}" id="nav-update-proker"
            role="tabpanel">
            <form action="{{ route('dashboard.pengurus.prokers.update', $proker->id) }}" enctype="multipart/form-data"
                method="POST">
                @csrf
                @method('PUT')
                <div class="flex flex-wrap  gutters-xs">
                    {{-- col : image upload --}}
                    <div class="lg:w-1/3 pr-4 pl-4">
                        <div
                            class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300">
                            <div class="flex-auto p-6 flex flex-col items-center">
                                <div class="img-wrapper img-wrapper-upload bg-gray-600 w-full h-10rem my-3">
                                    <img id="img-logo" src="{{ asset('storage/' . $proker->logo) }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- col : input --}}
                    <div class="relative lg:flex-grow lg:flex-1">
                        <div
                            class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300">
                            <div class="flex-auto p-6">
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
                                <div class="mb-4">
                                    <label for="">Deskripsi Proker</label>
                                    <div class="bg-whitesmoke rounded-sm p-6">
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
                                        '<i class="fas fa-share-square text-blue-600 mr-1"></i> Dibuka' => 1,
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
                                    <div class="flex flex-wrap  justify-end">
                                        <div class="col-auto">
                                            <button type="submit"
                                                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane opacity-0 {{ Request::get('tabs') === 'users' ? 'opacity-100 block active' : '' }}"
                id="nav-update-proker-user" role="tabpanel">
                <div class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300">
                    <div class="flex-auto p-6">
                        <div class="flex flex-wrap  gutters-xs items-center border-b pb-3 mb-3">
                            <div class="relative md:flex-grow md:flex-1">Operasi Data</div>
                            <div class="col-md-auto">
                                <a data-toggle="modal" href="#m-create-proker-user"
                                    class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600">
                                    Tambah Anggota
                                </a>
                            </div>
                        </div>
                        <div class="table-datatable-container">
                            <table id="datatable" class="w-full max-w-full mb-4 bg-transparent table-datatable" width="100%">
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
        <div class="modal opacity-0" id="m-edit-proker-user" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Anggota Proker</h5>
                        <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" data-dismiss="modal"
                            aria-label="Close">
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

                            <button type="button" id="m-edit-btn-not-pengurus"
                                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md py-1 px-3 leading-normal no-underline p-0 font-normal text-blue-700 bg-transparent text-blue-600 mb-2">
                                Bukan Pengurus Himatif ?
                            </button>
                            <button type="button" id="m-edit-btn-is-pengurus"
                                class="hidden inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md py-1 px-3 leading-normal no-underline p-0 font-normal text-blue-700 bg-transparent text-blue-600 mb-2">
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
                            <button type="button"
                                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md py-1 px-3 leading-normal no-underline bg-gray-600 text-white hover:bg-gray-700"
                                data-dismiss="modal">Close</button>
                            <button type="submit"
                                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600">Simpan
                                Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal opacity-0" id="m-create-proker-user" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Anggota Proker</h5>
                        <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" data-dismiss="modal"
                            aria-label="Close">
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

                            <button type="button" id="m-create-btn-not-pengurus"
                                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md py-1 px-3 leading-normal no-underline p-0 font-normal text-blue-700 bg-transparent text-blue-600 mb-2">
                                Bukan Pengurus Himatif ?
                            </button>
                            <button type="button" id="m-create-btn-is-pengurus"
                                class="hidden inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md py-1 px-3 leading-normal no-underline p-0 font-normal text-blue-700 bg-transparent text-blue-600 mb-2">
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
                            <button type="button"
                                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md py-1 px-3 leading-normal no-underline bg-gray-600 text-white hover:bg-gray-700"
                                data-dismiss="modal">Close</button>
                            <button type="submit"
                                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600">Simpan
                                Perubahan</button>
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