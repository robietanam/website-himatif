@extends('auth._layouts.app')

@section('title', 'MASUK SEBAGAI ADMIN')
@section('content')
    <div class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300 card-primary">
        <div class="py-3 px-6 mb-0 bg-gray-200 border-b-1 border-gray-300 text-gray-900 tx-18 font-bold">Selamat Datang
            Kembali</div>

        <div class="flex-auto p-6">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4 mb-2">
                    <label for="email" class="md:text-right">Email Kamu</label>
                    <input type="email" name="email" value="{{ old('email') }}" id="email"
                        class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded-md @error('email') bg-red-700 @enderror"
                        required autocomplete="username" autofocus>

                </div>
                <div class="mb-4 mb-2">
                    <label for="password" class="md:text-right">Password</label>
                    <input type="password" name="password" value="" id="password"
                        class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded-md @error('password') bg-red-700 @enderror"
                        required autocomplete="current-password" autofocus>
                </div>

                @error('email')
                    <div class="text-red-600 tx-12 my-3" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror

                <div class="flex items-center justify-between  mb-3">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input {{ old('remember') ? 'checked' : '' }} type="checkbox" name="remember"
                            class="custom-control-input" id="remember">
                        <label class="custom-control-label" for="remember">Ingat Saya ?</label>
                    </div>
                </div>

                <button type="submit"
                    class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md  no-underline py-3 px-4 leading-tight text-xl block w-full bg-blue-600 text-white hover:bg-blue-600 mb-2 mt-5">Masuk
                    Sekarang</button>
            </form>
        </div>
    </div>
@endsection
