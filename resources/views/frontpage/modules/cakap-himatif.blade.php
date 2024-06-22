@extends('frontpage.layouts.app-frontpage')

@section('title', 'Cakap x Himatif')

@section('pageClass', 'cakap')
@section('content')

    <main class="py-5 bg-white ">

        @if ($errors->any())

            <ul>
                @foreach ($errors->all() as $error)
                    <div id="alert-{{ $loop->index }}"
                        class="alert flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <div class="flex justify-start items-start gap-1">
                            <span class="font-medium badge badge-error">Alert </span>
                            {{ $error }}
                        </div>
                        <button type="button"
                            class="ml-auto -mx-1.5 -my-1.5 bg-transparent text-gray-500 rounded-lg hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-300 p-1.5 inline-flex h-8 w-8"
                            aria-label="Close" onclick="closeAlert({{ $loop->index }})">
                            <span class="sr-only">Close</span>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                @endforeach
            </ul>
        @endif

        @if (Session::has('message'))
            <div class="flex items-center p-4 mb-4 text-sm {{ Session::get('type') == 'danger' ? 'text-red-800 rounded-lg bg-red-50' : ' text-blue-800 rounded-lg bg-blue-50 ' }}"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">{{ Session::get('type') == 'danger' ? 'Error' : 'Info' }}</span>
                    {{ Session::get('message') }}
                </div>
            </div>
        @endif

        <div class="my-32">
            <p class="text-center text-2xl text-black pb-10"> CAKAP x HIMATIF </p>

            @if (Cookie::get('cakap_form_success') != true)
                <div class="form-cakap">
                    <input type="checkbox" id="my_modal_7" class="modal-toggle" />
                    <div class="modal" role="dialog">
                        <div class="modal-box">
                            <h3 class="text-lg font-bold">Hello!</h3>
                            <p class="py-4">This modal works with a hidden checkbox!</p>
                        </div>
                        <label class="modal-backdrop" for="my_modal_7">Close</label>
                    </div>
                    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
                    <form action="{{ route('frontpage.cakap.store') }}" method="POST" enctype="multipart/form-data"
                        class="max-w-md mx-auto px-4">
                        @csrf
                        <div class="mb-5">
                            <label for="email"
                                class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Masukkan
                                Email Kamu</label>
                            <input type="email" id="email" name="email"
                                class="bg-gray-50  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="" required />
                        </div>
                        <div class="mb-5">
                            <label for="nama"
                                class="block font-bold mb-2 text-sm  text-gray-900 dark:text-white">Masukkan
                                Nama
                                Kamu</label>
                            <input type="text" id="nama" name="nama"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>

                        <select name="label_id" id="label_id"
                            class="select select-md select-bordered w-full  bg-transparent mb-5 font-bold">
                            <option disabled selected>Pilih paket?</option>
                            @foreach ($labelCount as $label)
                                <option class="font-medium" @if ($label->cakap_kodes_count == 0) disabled @endif
                                    value="{{ $label->id }}">
                                    {{ $label->name }} Tersisa {{ $label->cakap_kodes_count }}
                                </option>
                            @endforeach
                        </select>

                        <div class="flex flex-col items-start mb-12">
                            <p class="text-sm text-black mb-2"> Bukti
                                Follow Instagram HIMATIF </p>
                            <input type="file" name="bukti_pendaftaran" id="bukti_pendaftaran"
                                placeholder="Upload Bukti Follow"
                                class="file-input file:bg-gray-500 file:border-gray-500 file:text-white file-input-bordered file-input-md w-full bg-white" />
                        </div>

                        <button type="submit"
                            class="text-white font-bold bg-gray-600 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300  rounded-lg text-sm w-full  px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Daftar</button>
                    </form>

                </div>
            @else
                <div id="success-container" class="flex flex-col items-center justify-center gap-5  ">
                    <p class="text-lg text-center px-5">Selamat, Anda telah berhasil mendaftar voucher Cakap X Himatif.
                    </p>
                    <?xml version="1.0" ?>
                    <svg class="h-32 w-32 fill-blue-700" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M320 1344q0-26-19-45t-45-19q-27 0-45.5 19t-18.5 45q0 27 18.5 45.5t45.5 18.5q26 0 45-18.5t19-45.5zm160-512v640q0 26-19 45t-45 19h-288q-26 0-45-19t-19-45v-640q0-26 19-45t45-19h288q26 0 45 19t19 45zm1184 0q0 86-55 149 15 44 15 76 3 76-43 137 17 56 0 117-15 57-54 94 9 112-49 181-64 76-197 78h-129q-66 0-144-15.5t-121.5-29-120.5-39.5q-123-43-158-44-26-1-45-19.5t-19-44.5v-641q0-25 18-43.5t43-20.5q24-2 76-59t101-121q68-87 101-120 18-18 31-48t17.5-48.5 13.5-60.5q7-39 12.5-61t19.5-52 34-50q19-19 45-19 46 0 82.5 10.5t60 26 40 40.5 24 45 12 50 5 45 .5 39q0 38-9.5 76t-19 60-27.5 56q-3 6-10 18t-11 22-8 24h277q78 0 135 57t57 135z" />
                    </svg>
                    <p class="text-sm text-center max-w-sm">
                        Kode voucher akan dikirimkan melalui email yang telah Anda daftarkan. Mohon cek email dan folder
                        spam
                        secara
                        berkala. Terima kasih!</p>

                </div>
            @endif
        </div>

    </main>

@endsection

@section('style')

@endsection

@section('script')
    <script>
        function closeAlert(index) {
            document.getElementById('alert-' + index).style.display = 'none';
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.alert').forEach(function(alert, index) {
                setTimeout(function() {
                    alert.style.display = 'none';
                }, 5000);
            });
        });
    </script>
@endsection
