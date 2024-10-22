@extends('dashboard._layouts.app')

@section('title', 'Ubah Data Pengurus') {{-- title --}}
@section('header', 'Pengurus') {{-- header --}}

@section('breadcrumb') {{-- breadcrumb --}}
    <div class="breadcrumb-item active"><a href="{{ route('dashboard.admin.users.index') }}">Keanggotaan</a></div>
    <div class="breadcrumb-item">Ubah Data</div>
@endsection {{-- end of breadcrumb --}}

@section('content') {{-- content --}}

    <div class="row gutters-xs align-items-center justify-content-end my-4">
        <div class="col-lg">
            <h4>Ubah Data Pengurus</h4>
        </div>
        <div class="col col-md-auto">
            <a href="{{ route('dashboard.admin.users.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left mr-1"></i> Semua Data
            </a>
        </div>
    </div>

    {{-- row : form --}}
    <form action="{{ route('dashboard.admin.users.update', $user->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        <div class="col">

            <div class="col-lg">
                <div class="card">
                    <div class="card-body d-flex flex-column align-items-center">
                        <div class="img-wrapper img-wrapper-upload rounded-circle bg-secondary w-10rem h-10rem my-3">
                            <img id="img-anggota-1" src="" alt="">
                        </div>
                        @component('dashboard._components._form-group.input-img')
                            @slot('inputLabel', 'Foto Anggota')
                            @slot('inputPreviewIdentity', 'img-anggota-1')
                            @slot('inputName', 'photo')
                            @slot('inputId', 'input-photo')
                            {{-- @slot('inputIsRequired', true) --}}
                        @endcomponent
                    </div>
                </div>
            </div>

            <div class="col-lg">
                <div class="card">
                    <div class="card-body">
                        {{-- input : name --}}
                        @component('dashboard._components._form-group.input')
                            @slot('inputLabel', 'Nama')
                            @slot('inputName', 'name')
                            @slot('inputId', 'input-name')
                            @slot('inputIsRequired', true)
                            @slot('inputValue', $user->name)
                        @endcomponent

                        {{-- input : nim --}}
                        @component('dashboard._components._form-group.input')
                            @slot('inputLabel', 'Nim')
                            @slot('inputName', 'nim')
                            @slot('inputId', 'input-nim')
                            @slot('inputIsRequired', true)
                            @slot('inputValue', $user->nim)
                        @endcomponent

                        {{-- input : email --}}
                        @component('dashboard._components._form-group.input')
                            @slot('inputType', 'email')
                            @slot('inputLabel', 'Email')
                            @slot('inputName', 'email')
                            @slot('inputId', 'input-email')
                            @slot('inputIsRequired', true)
                            @slot('inputValue', $user->email)
                        @endcomponent

                        {{-- input : phone --}}
                        @component('dashboard._components._form-group.input')
                            @slot('inputType', 'number')
                            @slot('inputLabel', 'Nomor Hp')
                            @slot('inputName', 'phone')
                            @slot('inputId', 'input-phone')
                            @slot('inputValue', $user->phone)
                        @endcomponent

                        {{-- input : instagram --}}
                        @component('dashboard._components._form-group.input')
                            @slot('inputLabel', 'Instagram')
                            @slot('inputName', 'instagram')
                            @slot('inputId', 'input-instagram')
                            @slot('inputIsRequired', false)
                            @slot('inputValue', $user->instagram)
                        @endcomponent

                        {{-- input : linkedin --}}
                        @component('dashboard._components._form-group.input')
                            @slot('inputLabel', 'Linkedin')
                            @slot('inputName', 'linkedin')
                            @slot('inputId', 'input-linkedin')
                            @slot('inputIsRequired', false)
                            @slot('inputValue', $user->linkedin)
                        @endcomponent

                        {{-- input : status --}}
                        @component('dashboard._components._form-group.input-radio')
                            @slot('inputLabel', 'Status')
                            @slot('inputName', 'status')
                            @slot('inputId', 'input-status')
                            @slot('inputValue', $user->status)
                            @slot('inputDatas', [
                                'aktif' => 1,
                                'nonaktif' => 0,
                                ])
                            @endcomponent


                            {{-- input : division_id --}}
                            @php
                                $inputDatasDivision = [];
                                foreach ($divisions as $division) {
                                    $inputDatasDivision[$division->name] = $division->id;
                                }
                            @endphp

                            {{-- input : position --}}
                            @php
                                $inputDatasPosition = [];
                                foreach ($positions as $position) {
                                    $inputDatasPosition[$position] = $position;
                                }
                            @endphp

                            @component('dashboard._components._form-group.input-multiple-periode')
                                @slot('inputLabel', 'Periode')
                                @slot('inputName', 'periode')
                                @slot('inputId', 'input-position')
                                @slot('inputIsRequired', true)
                                @slot('inputIsSearchable', true)
                                @slot('divisionOption', $inputDatasDivision)
                                @slot('positionOption', $inputDatasPosition)
                                @slot('inputValue', $user->periode)
                            @endcomponent

                            {{-- input : role_id --}}
                            {{-- @php
                            $inputDatasRole = [];
                            foreach ($roles as $role) {
                                $inputDatasRole["$role->name"] = $role->id;
                            }
                        @endphp
                        @component('dashboard._components._form-group.input-select')
                            @slot('inputLabel', 'Akses Sistem')
                            @slot('inputName', 'role_id')
                            @slot('inputId', 'input-role_id')
                            @slot('inputHelp', 'Jika tidak diisi default akan <b>Pengurus</b>')
                            @slot('inputIsRequired', true)
                            @slot('inputDatas', $inputDatasRole)
                        @endcomponent --}}

                            {{-- submit --}}
                            <div class="row justify-content-end">
                                <div class="col-auto">
                                    <button class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('dashboard.admin.users.update-password', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <h6 class="mb-3">Ubah Password</h6>
                                {{-- input : password --}}
                                @component('dashboard._components._form-group.input')
                                    @slot('inputType', 'password')
                                    @slot('inputLabel', 'Password')
                                    @slot('inputName', 'password')
                                    @slot('inputId', 'input-password')
                                @endcomponent

                                {{-- submit --}}
                                <div class="row justify-content-end">
                                    <div class="col-auto">
                                        <button class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </form>
        {{-- end of row : form --}}


    @endsection {{-- end of content --}}

    @push('style')
        {{-- style --}}
    @endpush {{-- end of style --}}

    @push('script')
        {{-- script --}}
        <script>
            "use strict";
            var i = 0;
            $("#dynamic-ar").click(function() {
                ++i;
                $("#dynamicAddRemove").append(
                    `<tr>
                <td style="width:70%">
                    <div class="form-group mb-3">
    <label for="">
        Tahun Masuk
            </label>

    <div class="input-group">
        <input type="text" name="periode_year[]" id="input-periode-year_entry" value="" class="form-control form-control-year   ">
        <div class="input-group-append" disabled="">
            <span class="input-group-text" id="basic-addon2"><i class="fas fa-calendar-alt"></i></span>
        </div>
    </div>

    </div>
                    <div class="form-group">
    <label for="">
        Divisi
                    <span class="text-muted text-secondary">(harus diisi)</span>
            </label> <br>
    <select name="periode_division[]" id="input-periode-division_id" data-width="100%" data-size="5" data-live-search="true" data-live-search-placeholder="Cari..." title="Pilih Divisi" required="" class=" " style="width: 100%;">
        
                    <option value="1">
                Badan Pengurus Harian
            </option>
                    <option value="2">
                Pengembangan Sumber Daya Mahasiswa
            </option>
                    <option value="3">
                Penelitian dan Pengembangan
            </option>
                    <option value="4">
                Hubungan Mahasiswa
            </option>
                    <option value="5">
                Hubungan Luar
            </option>
                    <option value="6">
                Media Sosial
            </option>
                    <option value="7">
                Media Teknologi
            </option>
                    <option value="8">
                Media Informasi
            </option>
                    <option value="9">
                Pengembangan Teknologi
            </option>
            </select>
    
    </div>
                    <div class="form-group">
    <label for="">
        Jabatan
                    <span class="text-muted text-secondary">(harus diisi)</span>
            </label> <br>
    <select name="periode_position[]" id="input-periode-position" data-width="100%" data-size="5" data-live-search="true" data-live-search-placeholder="Cari..." title="Pilih Jabatan" required="" class=" " style="width: 100%;">
        
                    <option value="Ketua Umum">
                Ketua Umum
            </option>
                    <option value="Sekretaris">
                Sekretaris
            </option>
                    <option value="Bendahara">
                Bendahara
            </option>
                    <option value="Kepala Divisi">
                Kepala Divisi
            </option>
                    <option value="Kepala Subdivisi">
                Kepala Subdivisi
            </option>
                    <option value="Anggota">
                Anggota
            </option>
                    <option value="Demisioner">
                Demisioner
            </option>
            </select>
    
    </div>
                </td>
                <td>

                    <button type="button" class="btn btn-outline-danger remove-input-field">Delete</button>
                </td>
            </tr>`
                );
            });
            $(document).on('click', '.remove-input-field', function() {
                $(this).parents('tr').remove();
            });
        </script>
    @endpush {{-- end of script --}}
