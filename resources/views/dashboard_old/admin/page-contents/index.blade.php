@extends('dashboard._layouts.app')

@section('title', 'Data Editable Konten') {{-- title --}}
@section('header', 'Data Editable Konten') {{-- header --}}

@section('breadcrumb') {{-- breadcrumb --}}
    <div class="inline-block px-2 py-2 text-gray-700 active"><a href="#">Home</a></div>
    <div class="inline-block px-2 py-2 text-gray-700">Semua Konten</div>
@endsection {{-- end of breadcrumb --}}

@section('content') {{-- content --}}

    <div class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300 mb-3">
        <div class="flex-auto p-6">
            <div class="flex flex-wrap  items-center gutters-xs">
                <div class="relative lg:flex-grow lg:flex-1">
                    <h5 class="mb-0">Editable Konten</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-wrap  gutters-xs">
        @foreach ($contents as $content)
            <div class="lg:w-1/3 pr-4 pl-4">
                <div
                    class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300 card-primary mb-2">
                    <div class="flex-auto p-6 p-6">
                        <div class="text-16 text-gray-900 font-bold">
                            {{ $content->name }}
                        </div>
                        <hr>

                        <div class="img-fit img-fit-contain bg-whitesmoke w-full h-8rem">
                            @if (file_exists(storage_path('app/public/' . $content->photo_example)))
                                <img src="{{ asset('storage/' . $content->photo_example) }}" alt="Page Example">
                            @else
                                <img src="{{ asset('img/' . $content->photo_example) }}" alt="Page Example">
                            @endif
                        </div>

                        <div class="flex flex-wrap  gutters-xs justify-end mt-3">
                            <div class="col-auto">
                                <a href="{{ url("dashboard/admin/page-contents/$content->id/edit") }}"
                                    class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-md py-1 px-3 leading-normal no-underline bg-orange-400 text-black hover:bg-orange-500">
                                    <i class="fas fa-pen"></i> Edit
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection {{-- end of content --}}
