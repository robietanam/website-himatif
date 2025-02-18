@extends('dashboard._layouts.app')

@section('title', 'Ubah Data Pengurus') {{-- title --}}
@section('header', 'Pengurus') {{-- header --}}

@section('breadcrumb') {{-- breadcrumb --}}
    {{-- <div class="breadcrumb-item active"><a href="{{ route('dashboard.admin.users.index') }}">Keanggotaan</a></div>
    <div class="breadcrumb-item">Ubah Data</div> --}}
@endsection {{-- end of breadcrumb --}}

@section('content') {{-- content --}}

    <div class="row gutters-xs align-items-center justify-content-end my-4">
        <div class="col-lg">
            <h4>Ubah Data Review Alumni</h4>
        </div>
        <div class="col col-md-auto">
            <a href="{{ route('dashboard.admin.review-alumni.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left mr-1"></i> Semua Data
            </a>
        </div>
    </div>

    {{-- row : form --}}
    <form action="{{ route('dashboard.admin.review-alumni.update', $ganti->id) }}" enctype="multipart/form-data"
        method="POST">
        @csrf
        @method('put')
        <div class="col">

            <div class="col-lg">
                <div class="card">
                    <div class="card-body d-flex flex-column align-items-center">
                        <div class="img-wrapper img-wrapper-upload rounded-circle bg-secondary w-10rem h-10rem my-3">
                            <img id="img-anggota-1" src="{{ asset('storage/' . $ganti->photo) }}" alt="">
                        </div>
                        <input type="file" name="photo" placeholder="Upload Photo">
                        @error('photo')
                            <span class="me-2 text-danger fw-bold">{{ $message }}</span>
                        @enderror

                    </div>
                </div>
            </div>

            <div class="col-lg">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name">Nama :</label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Nama Alumni" value="{{ $ganti->name }}">
                        </div>

                        <div class="mb-3">
                            <label for="name">Nim :</label>
                            <input type="text" name="nim" id="nim" class="form-control"
                                placeholder="Nim Alumni" value="{{ $ganti->nim }}">
                        </div>

                        <div class="mb-3">
                            <label for="name">Nomor :</label>
                            <input type="text" name="phone" id="phone" class="form-control"
                                placeholder="Nomor Alumni" value="{{ $ganti->phone }}">
                        </div>

                        <div class="mb-3">
                            <label for="name">Lulusan:</label>
                            <input type="number" name="angkatan" id="angkatan" class="form-control"
                                placeholder="Angkatan Alumni" value="{{ $ganti->angkatan }}">
                        </div>

                        <div class="mb-3">
                            <label for="name">Tempat Kerja:</label>
                            <input type="text" name="tempat_kerja" id="tempat_kerja" class="form-control"
                                placeholder="Tempat_Kerja" value="{{ $ganti->tempat_kerja }}">
                        </div>

                        <div class="mb-3">
                            <label for="name">Pengalaman di TI :</label>
                            <input type="text" name="experience" id="experience" class="form-control"
                                placeholder="Experience" value="{{ $ganti->experience }}">
                        </div>

                        <div class="mb-3">
                            <label for="name">Motivasi :</label>
                            <input type="text" name="motivation" id="motivation" class="form-control"
                                placeholder="Motivation" value="{{ $ganti->motivation }}">
                        </div>

                        <div class="mb-3">
                            <label for="name">instagram :</label>
                            <input type="link" name="instagram" id="instagram" class="form-control"
                                placeholder="Instagram Alumni" value="{{ $ganti->instagram }}">
                        </div>

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

                {{-- <div class="card">
                    <div class="card-body">
                        <form action="{{ route('dashboard.admin.users.update-password', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <h6 class="mb-3">Ubah Password</h6>
                            {{-- input : password --}}
                {{-- @component('dashboard._components._form-group.input')
                    @slot('inputType', 'password')
                    @slot('inputLabel', 'Password')
                    @slot('inputName', 'password')
                    @slot('inputId', 'input-password')
                @endcomponent --}}

                {{-- submit --}}
                {{-- <div class="row justify-content-end">
                    <div class="col-auto">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div> --}}
    </form>
    </div>
    {{-- </div> --}} --
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
