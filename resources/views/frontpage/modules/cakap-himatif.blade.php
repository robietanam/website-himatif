@extends('frontpage.layouts.app-frontpage')

@section('title', 'Cakap x Himatif')

@section('pageClass', 'cakap')
@section('content')

    <main class="py-5 bg-white">

        @if ($errors->any())

            <ul>
                @foreach ($errors->all() as $error)
                    <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">Error </span>
                            {{ $error }}
                        </div>

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

        <div>
            <p class="text-center text-2xl text-black pb-10"> CAKAP x HIMATIF </p>
            <input type="checkbox" id="my_modal_7" class="modal-toggle" />
            <div class="modal" role="dialog">
                <div class="modal-box">
                    <h3 class="text-lg font-bold">Hello!</h3>
                    <p class="py-4">This modal works with a hidden checkbox!</p>
                </div>
                <label class="modal-backdrop" for="my_modal_7">Close</label>
            </div>
            <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
            <form action="{{ route('frontpage.cakap.store') }}" method="POST" class="max-w-md mx-auto px-4">
                @csrf
                <div class="mb-5">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukkan
                        Email Kamu</label>
                    <input type="email" id="email" name="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required />
                </div>
                <div class="mb-5">
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukkan Nama
                        Kamu</label>
                    <input type="text" id="nama" name="nama"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required />
                </div>

                <select name="label_id" id="label_id" class="select select-md select-bordered w-full  bg-transparent mb-5">
                    <option disabled selected>Pilih paket?</option>
                    @foreach ($labelCount as $label)
                        <option @if ($label->cakap_kodes_count == 0) disabled @endif value="{{ $label->id }}">
                            {{ $label->name }} Tersisa {{ $label->cakap_kodes_count }}
                        </option>
                    @endforeach

                </select>

                <div class="flex items-start mb-5">
                    <div class="flex items-center h-5 gap-2">
                        <input id="remember" type="checkbox" value=""
                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                            required />
                        <label for="remember" class=" text-sm font-medium text-gray-900 dark:text-gray-300">Dengan klik
                            submit anda mensetujui</label>
                        <label for="my_modal_7" class="text-sm text-blue-400">Syarat dan ketentuan</label>
                    </div>


                </div>

                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
            {{-- <form action="{{ route('dashboard.admin.prokers.update', $proker->id) }}" enctype="multipart/form-data"
        method="POST">
        @csrf

        < <div class="form-group mb-3">
            <label for="">
                {{ $inputLabel }}
                @if (isset($inputIsRequired) && $inputIsRequired === true)
                    <span class="text-muted text-secondary">(harus diisi)</span>
                @endif
            </label>
            <input type="{{ isset($inputType) ? $inputType : 'text' }}" name="{{ $inputName }}"
                id="{{ $inputId }}" value="{{ isset($inputValue) ? $inputValue : old($inputName) }}"
                placeholder="Input {{ $inputLabel }}"
                class="form-control {{ isset($inputSize) ? $inputSize : '' }}  @error($inputName) is-invalid @enderror"
                @if (isset($inputIsDisabled) && $inputIsDisabled === true) disabled @endif @if (isset($inputIsReadOnly) && $inputIsReadOnly === true) readonly @endif
                @if (isset($inputIsRequired) && $inputIsRequired === true) required @endif>

            @isset($inputHelp)
                <small class="form-text text-muted">{!! $inputHelp !!}</small>
            @endisset

            @error($inputName)
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror --}}
        </div>

        </form>
        </div>
    </main>

@endsection

@section('style')

@endsection

@section('script')

@endsection
