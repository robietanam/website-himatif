@extends('frontpage.layouts.app-frontpage')

@section('title', 'PENGURUS')

@section('pageClass', 'pengurus')
@section('content')

    {{-- Header --}}
    <header>
        <div class="container mx-auto sm:px-4 mx-auto sm:px-4 text-center">
            <h3 class="text-midnight text-dec text-dec-secondary-3 text-dec-tr font-extrabold mb-6">
                {{ $header['1-text']->content }}
            </h3>
            <h6 class="text-gray font-light">
                {{ $header['2-text2']->content }}
            </h6>
        </div>
    </header>
    {{-- End of Header --}}

    <section id="section-1">
        <div class="container mx-auto sm:px-4 ">
            <div class="flex flex-wrap  gutters-xs gutters-lg-md justify-center lg:justify-center">

                @foreach ($divisions as $division)
                    <div class="w-full mt-3 mb-1">
                        <h4 class="text-midnight text-center font-extrabold mb-6">
                            {{ $division->name }}
                        </h4>
                    </div>

                    @foreach ($division->users as $user)
                        @if ($user->status === '1')
                            @if ($user->position === 'Kepala Divisi')
                                <div class="col-auto md:w-1/3 lg:w-1/4 pr-4 pl-4 mb-6">
                                    <div
                                        class="card card-member relative flex flex-col min-w-0 rounded-md break-words bg-white shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] ">
                                        <div class="card-body text-center p-7">
                                            @if ($user->photo)
                                                <div class="img-wrapper">
                                                    <img src="{{ asset('storage/' . $user->photo) }}" alt="">
                                                </div>
                                            @else
                                                <div class="img-wrapper">
                                                    <img src="{{ asset('img/placeholder/product-image-default.svg') }}"
                                                        alt="">
                                                </div>
                                            @endif
                                            <div class="text-lg font-extrabold text-midnight truncate">{{ $user->name }}
                                            </div>
                                            <div class="text-lg text-gray-500">{{ $user->position }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full"></div>
                            @elseif($user->position === 'Kepala Subdivisi')
                                <div class="w-full"></div>
                                <div class="col-auto md:w-1/3 pr-4 pl-4 lg:w-1/4  mb-6">
                                    <div
                                        class="card card-member relative flex flex-col min-w-0 rounded-md break-words bg-white shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px]  ">
                                        <div class="card-body text-center p-7">
                                            @if ($user->photo)
                                                <div class="img-wrapper">
                                                    <img src="{{ asset('storage/' . $user->photo) }}" alt="">
                                                </div>
                                            @else
                                                <div class="img-wrapper">
                                                    <img src="{{ asset('img/placeholder/product-image-default.svg') }}"
                                                        alt="">
                                                </div>
                                            @endif
                                            <div class="text-lg font-extrabold text-midnight truncate">{{ $user->name }}
                                            </div>
                                            <div class="text-lg text-gray-500">{{ $user->position }}</div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-auto md:w-1/3 pr-4 pl-4 lg:w-1/4 mb-6">
                                    <div
                                        class="card card-member relative flex flex-col min-w-0 rounded-md break-words bg-white shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px]  ">
                                        <div class="card-body text-center p-7">
                                            @if ($user->photo)
                                                <div class="img-wrapper">
                                                    <img src="{{ asset('storage/' . $user->photo) }}" alt="">
                                                </div>
                                            @else
                                                <div class="img-wrapper">
                                                    <img src="{{ asset('img/placeholder/product-image-default.svg') }}"
                                                        alt="">
                                                </div>
                                            @endif
                                            <div class="text-lg font-extrabold text-midnight truncate">{{ $user->name }}
                                            </div>
                                            <div class="text-lg text-gray-500">{{ $user->position }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @else
                            <div></div>
                        @endif
                    @endforeach
                    @foreach ($division->subDivisions as $subdivsion)
                        @foreach ($subdivsion->users as $user)
                            @if ($user->status === '1')
                                @if ($user->position === 'Kepala Divisi')
                                    <div
                                        class="card card-member relative flex flex-col min-w-0 rounded-md break-words bg-white shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px]  ">
                                        <div class="card-body text-center p-7">
                                            @if ($user->photo)
                                                <div class="img-wrapper">
                                                    <img src="{{ asset('storage/' . $user->photo) }}" alt="">
                                                </div>
                                            @else
                                                <div class="img-wrapper">
                                                    <img src="{{ asset('img/placeholder/product-image-default.svg') }}"
                                                        alt="">
                                                </div>
                                            @endif
                                            <div class="text-lg font-extrabold text-midnight truncate">{{ $user->name }}
                                            </div>
                                            <div class="text-lg text-gray-500">{{ $user->position }}</div>
                                        </div>
                                    </div>
                                    <div class="w-full"></div>
                                @elseif($user->position === 'Kepala Subdivisi')
                                    <div class="w-full"></div>
                                    <div class="col-auto md:w-1/3 pr-4 pl-4 lg:w-1/4 mb-6">
                                        <div
                                            class="card card-member relative flex flex-col min-w-0 rounded-md break-words bg-white shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px]  ">
                                            <div class="card-body text-center p-7">
                                                @if ($user->photo)
                                                    <div class="img-wrapper">
                                                        <img src="{{ asset('storage/' . $user->photo) }}" alt="">
                                                    </div>
                                                @else
                                                    <div class="img-wrapper">
                                                        <img src="{{ asset('img/placeholder/product-image-default.svg') }}"
                                                            alt="">
                                                    </div>
                                                @endif
                                                <div class="text-lg font-extrabold text-midnight truncate">
                                                    {{ $user->name }}
                                                </div>
                                                <div class="text-lg text-gray-500">{{ $user->position }}</div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-auto md:w-1/3 pr-4 pl-4 lg:w-1/4 mb-6">
                                        <div
                                            class="card card-member relative flex flex-col min-w-0 rounded-md break-words bg-white shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px]  ">
                                            <div class="card-body text-center p-7">
                                                @if ($user->photo)
                                                    <div class="img-wrapper">
                                                        <img src="{{ asset('storage/' . $user->photo) }}" alt="">
                                                    </div>
                                                @else
                                                    <div class="img-wrapper">
                                                        <img src="{{ asset('img/placeholder/product-image-default.svg') }}"
                                                            alt="">
                                                    </div>
                                                @endif
                                                <div class="text-lg font-extrabold text-midnight truncate">
                                                    {{ $user->name }}
                                                </div>
                                                <div class="text-lg text-gray-500">{{ $user->position }}</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @else
                                <div></div>
                            @endif
                        @endforeach
                    @endforeach
                @endforeach


            </div>
        </div>
    </section>

@endsection
