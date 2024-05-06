@extends('dashboard._layouts.app')

@section('title', 'Ubah Data Proker') {{-- title --}}
@section('header', 'Proker') {{-- header --}}

@section('breadcrumb') {{-- breadcrumb --}}
    <div class="inline-block px-2 py-2 text-gray-700 active"><a
            href="{{ route('dashboard.pengurus.prokers.index') }}">Proker</a></div>
    <div class="inline-block px-2 py-2 text-gray-700">Detail Proker</div>
@endsection {{-- end of breadcrumb --}}

@section('content') {{-- content --}}
    <div class="flex flex-wrap  gutters-xs items-center justify-end my-4">
        <div class="relative lg:flex-grow lg:flex-1">
            <h4>Detail Proker</h4>
        </div>
        <div class="relative flex-grow max-w-full flex-1 px-4 col-md-auto">
            @if (Request::get('tabs') === 'users')
                <a href="{{ route('dashboard.pengurus.prokers.edit', $proker->id) . '?tabs=users' }}"
                    class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md py-1 px-3 leading-normal no-underline bg-orange-400 text-black hover:bg-orange-500">
                    <i class="fas fa-pen mr-1"></i> Edit Data
                </a>
            @else
                <a href="{{ route('dashboard.pengurus.prokers.edit', $proker->id) }}"
                    class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md py-1 px-3 leading-normal no-underline bg-orange-400 text-black hover:bg-orange-500">
                    <i class="fas fa-pen mr-1"></i> Edit Data
                </a>
            @endif
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
                        href="{{ route('dashboard.pengurus.prokers.show', $proker->id) }}">
                        Data Proker
                    </a>
                </li>
                <li class="">
                    <a class="inline-block py-2 px-4 no-underline {{ Request::get('tabs') === 'users' ? 'active' : '' }}"
                        href="{{ route('dashboard.pengurus.prokers.show', $proker->id) . '?tabs=users' }}">
                        Anggota Proker
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane opacity-0 {{ !Request::get('tabs') ? 'opacity-100 block active' : '' }}" id="nav-update-proker"
            role="tabpanel">
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
                            <div class="mb-4">
                                <label for="">Status Pendaftaran</label>
                                <div>
                                    @if ($proker->is_registration_open === '1')
                                        <i class="fas fa-check-square text-green-500 mr-1"></i> Dibuka
                                    @else
                                        <i class="fas fa-minus-square mr-1"></i> Ditutup
                                    @endif
                                </div>
                            </div>

                            {{-- input : link_registration --}}
                            @component('dashboard._components._form-group.input')
                                @slot('inputLabel', 'Link Registrasi')
                                @slot('inputName', 'link_registration')
                                @slot('inputId', 'input-link_registration')
                                @slot('inputValue', $proker->link_registration)
                                @slot('inputIsDisabled', true)
                            @endcomponent

                            {{-- input : link_instagram --}}
                            @component('dashboard._components._form-group.input')
                                @slot('inputLabel', 'Link Instagram')
                                @slot('inputName', 'link_instagram')
                                @slot('inputId', 'input-link_instagram')
                                @slot('inputValue', $proker->link_instagram)
                                @slot('inputIsDisabled', true)
                            @endcomponent

                            {{-- input : link_storage_document --}}
                            @component('dashboard._components._form-group.input')
                                @slot('inputLabel', 'Link Penyimpanan Dokumen')
                                @slot('inputName', 'link_storage_document')
                                @slot('inputId', 'input-link_storage_document')
                                @slot('inputValue', $proker->link_storage_document)
                                @slot('inputIsDisabled', true)
                            @endcomponent

                            {{-- input : link_storage_certificate --}}
                            @component('dashboard._components._form-group.input')
                                @slot('inputLabel', 'Link Penyimpanan Sertifikat')
                                @slot('inputName', 'link_storage_certificate')
                                @slot('inputId', 'input-link_storage_certificate')
                                @slot('inputValue', $proker->link_storage_certificate)
                                @slot('inputIsDisabled', true)
                            @endcomponent

                            {{-- input : link_storage_pdd_documentation --}}
                            @component('dashboard._components._form-group.input')
                                @slot('inputLabel', 'Link Penyimpanan Dokumentasi PDD')
                                @slot('inputName', 'link_storage_pdd_documentation')
                                @slot('inputId', 'input-link_storage_pdd_documentation')
                                @slot('inputValue', $proker->link_storage_pdd_documentation)
                                @slot('inputIsDisabled', true)
                            @endcomponent

                            {{-- input : link_contact_person --}}
                            @component('dashboard._components._form-group.input')
                                @slot('inputLabel', 'No WA PJ HUMAS')
                                @slot('inputName', 'link_contact_person')
                                @slot('inputId', 'input-link_contact_person')
                                @slot('inputValue', $proker->link_contact_person)
                                @slot('inputIsDisabled', true)
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane opacity-0 {{ Request::get('tabs') === 'users' ? 'opacity-100 block active' : '' }}"
            id="nav-update-proker-user" role="tabpanel">
            <div class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300">
                <div class="flex-auto p-6">
                    <div class="table-datatable-container">
                        <table id="datatable" class="w-full max-w-full mb-4 bg-transparent table-datatable" width="100%">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Nim</th>
                                    <th>Nomor Hp</th>
                                    <th>Jabatan</th>
                                    <th class="no-sort">Catatan</th>
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

@push('style')
    {{-- style --}}
    @include('dashboard._styles.datatable')
@endpush {{-- end of style --}}

@push('script')
    {{-- script --}}
    @include('dashboard._scripts.datatable')
    <script>
        $(document).ready(function() {
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
    </script>
@endpush {{-- end of script --}}
