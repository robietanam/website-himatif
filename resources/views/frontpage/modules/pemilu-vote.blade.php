@extends('frontpage.layouts.app-frontpage')

@section('title', 'Pemilu Himatif')

@section('pageClass', 'pemilu')
@section('content')
    <div class="bg-white">


        @if (session('type') && session('message'))
            <div class="px-10 py-5">
                <div class="relative bg-red-500 bg-opacity-85 text-white py-4 px-10 rounded-lg mb-4">
                    {{ session('message') }}
                    <span class="absolute z-10 right-5 cursor-pointer h-5 w-5 fill-white "
                        onclick="this.parentElement.remove();">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 30 30">
                            <path
                                d="M 7 4 C 6.744125 4 6.4879687 4.0974687 6.2929688 4.2929688 L 4.2929688 6.2929688 C 3.9019687 6.6839688 3.9019687 7.3170313 4.2929688 7.7070312 L 11.585938 15 L 4.2929688 22.292969 C 3.9019687 22.683969 3.9019687 23.317031 4.2929688 23.707031 L 6.2929688 25.707031 C 6.6839688 26.098031 7.3170313 26.098031 7.7070312 25.707031 L 15 18.414062 L 22.292969 25.707031 C 22.682969 26.098031 23.317031 26.098031 23.707031 25.707031 L 25.707031 23.707031 C 26.098031 23.316031 26.098031 22.682969 25.707031 22.292969 L 18.414062 15 L 25.707031 7.7070312 C 26.098031 7.3170312 26.098031 6.6829688 25.707031 6.2929688 L 23.707031 4.2929688 C 23.316031 3.9019687 22.682969 3.9019687 22.292969 4.2929688 L 15 11.585938 L 7.7070312 4.2929688 C 7.5115312 4.0974687 7.255875 4 7 4 z">
                            </path>
                        </svg>
                    </span>
                </div>
            </div>
        @endif
        <form action="{{ route('frontpage.pemilu.submitVote') }}" method="POST" class="max-w-4xl mx-auto p-6">
            @csrf
            <h2 class="text-3xl font-bold mb-6 text-center">Pemilihan Kandidat Ketua Umum HIMATIF 2024</h2>
            <!-- NIM Input -->
            <div class="mb-4">
                <label for="nim" class="block text-gray-700 font-bold mb-2">NIM</label>
                <input type="text" id="nim" name="nim"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-500"
                    placeholder="Masukkan NIM Anda" required>
            </div>

            <!-- Token Input -->
            <div class="mb-4">
                <label for="token" class="block text-gray-700 font-bold mb-2">Token</label>
                <input type="text" id="token" name="token"
                    class="w-full px-3 py-2  border rounded-lg focus:outline-none focus:ring focus:ring-blue-500"
                    placeholder="Masukkan Token Anda" required>
            </div>

            <div class="flex flex-wrap justify-center gap-8 my-5">
                @foreach ($candidates as $candidate)
                    <div
                        class="relative w-64 border border-gray-300 rounded-lg shadow-md hover:cursor-pointer hover:shadow-2xl transition">
                        <input type="radio" name="candidate_id" value="{{ $candidate->id }}"
                            id="candidate-{{ $candidate->id }}" class="absolute opacity-0" />
                        <label for="candidate-{{ $candidate->id }}"
                            class="hover:cursor-pointer flex flex-col items-center justify-center h-full p-4 rounded-lg transition-colors duration-300 ease-in-out">
                            <span class="font-bold"> Paslon No. {{ $candidate->id }}</span>
                            <img src="{{ asset('storage/' . $candidate->photo) }}" alt="{{ $candidate->nama }}"
                                class="h-56 mb-2 rounded-md">
                            <span class="font-bold">{{ $candidate->nama }}</span>
                        </label>
                    </div>
                @endforeach
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center mt-16 mb-10">
                <button type="submit"
                    class="bg-slate-900 hover:bg-slate-200 text-white font-bold py-3 px-8 rounded-lg 
                    transition-all ease-in-out scale-100 hover:scale-110 duration-300
                    hover:text-slate-900 border-2 border-transparent hover:border-slate-900
                    ">Submit
                    Pilihan</button>
            </div>
        </form>

    </div>

@endsection

@section('style')
    <style>
        input[type="radio"]:checked+label {
            background-color: #faf09a;
            border: 2px solid #ffc107;
            /* Change to your desired color */
            color: black;
            /* Change text color if needed */
        }

        .input.input-bordered {
            background-color: white !important;
        }
    </style>
@endsection

@section('script')
    <script></script>
@endsection
