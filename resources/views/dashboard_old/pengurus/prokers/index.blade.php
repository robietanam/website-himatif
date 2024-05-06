@extends('dashboard._layouts.app')

@section('title', 'Proker') {{-- title --}}
@section('header', 'Proker') {{-- header --}}

@section('breadcrumb') {{-- breadcrumb --}}
    <div class="inline-block px-2 py-2 text-gray-700">Proker Saya</div>
@endsection {{-- end of breadcrumb --}}

@section('content') {{-- content --}}
    @if (count($prokers) > 0)
        <div class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300">
            <div class="flex-auto p-6">
                <h5 class="mb-3">Proker Saya</h5>
                <div class="table-datatable-container">
                    <table class="w-full max-w-full mb-4 bg-transparent table-datatable" width="100%">
                        <thead>
                            <tr>
                                <th>Aksi</th>
                                <th>Logo</th>
                                <th>Nama</th>
                                <th>Status Proker</th>
                                <th>Status Pendaftaran</th>
                                <th>Ketua</th>
                                <th>Link Registrasi</th>
                                <th>Deskripsi</th>
                                <th>Dibuat Pada</th>
                                <th>Diupdate Pada</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prokers as $proker)
                                <tr>
                                    <td>
                                        <div class="flex items-center">
                                            <a href="{{ route('dashboard.pengurus.prokers.show', $proker->id) }}"
                                                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md  no-underline py-1 px-2 leading-tight text-xs  bg-blue-600 text-white hover:bg-blue-600 mr-1">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('dashboard.pengurus.prokers.edit', $proker->id) }}"
                                                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md  no-underline py-1 px-2 leading-tight text-xs  bg-orange-400 text-black hover:bg-orange-500">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        @if ($proker->logo)
                                            <div class="img-wrapper img-wrapper-table"><img
                                                    src="{{ 'storage/' . $proker->logo }}" alt=""></div>
                                        @else
                                            <div class="img-wrapper img-wrapper-table"><i
                                                    class="fas fa-image text-white"></i></div>
                                        @endif
                                    </td>
                                    <td style="width: 180px;">{{ $proker->name }}</td>
                                    <td>
                                        @if ($proker->status === '1')
                                            <span
                                                class="inline-block p-1 text-center font-semibold text-sm align-baseline leading-none rounded-md bg-green-500 text-white hover:green-600"><i
                                                    class="fas fa-check-square mr-1"></i> Aktif</span>
                                        @else
                                            <span
                                                class="inline-block p-1 text-center font-semibold text-sm align-baseline leading-none rounded-md bg-gray-600 text-white hover:bg-gray-700"><i
                                                    class="fas fa-minus-square mr-1"></i> Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($proker->is_registration_open === '1')
                                            <span
                                                class="inline-block p-1 text-center font-semibold text-sm align-baseline leading-none rounded-md bg-blue-500 text-white hover:bg-blue-600"><i
                                                    class="fas fa-share-square mr-1"></i> Dibuka</span>
                                        @else
                                            <span
                                                class="inline-block p-1 text-center font-semibold text-sm align-baseline leading-none rounded-md bg-gray-600 text-white hover:bg-gray-700"><i
                                                    class="fas fa-minus-square mr-1"></i> Ditutup</span>
                                        @endif
                                    </td>
                                    <td>{{ $proker->getLeader() }}</td>
                                    <td>
                                        <a href="{{ $proker->link_registration }}" target="_blank">
                                            {{ substr($proker->link_registration, 0, 20) . '...' }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ substr(strip_tags($proker->description), 0, 40) . (strlen(strip_tags($proker->description)) > 40 ? '...' : '') }}
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($proker->created_at)->translatedFormat('d F Y') }}
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($proker->updated_at)->translatedFormat('d F Y') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <div class="flex flex-wrap  justify-center">
            <div class="lg:w-2/3 pr-4 pl-4">
                <div class="img-fit img-fit-contain h-12rem h-md-18rem h-lg-24rem">
                    <img src="{{ asset('img/illustration/empty-proker.svg') }}" alt="Dashboard Pengurus Illustration"
                        class="max-w-full h-auto">
                </div>

                <div class="text-18 text-md-24 text-lg-32 text-center font-weight-600">
                    Belum ada Proker
                    <br class="hidden md:block">
                    untuk kamu
                </div>
            </div>
        </div>
    @endif
@endsection {{-- end of content --}}
