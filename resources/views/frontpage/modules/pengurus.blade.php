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
                    @foreach ($pengurus as $user)
                        @if ($user->status === '1' && $user->periode[0]['division_id'] === strval($division->id))
                            @if ($user->periode[0]['position'] === 'Kepala Divisi')
                                <div
                                    class="group card card-member col-auto md:w-1/3 lg:w-1/4 mx-4 mb-6  bg-white shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] rounded-md overflow-hidden">
                                    <div
                                        class="z-10 group-hover:opacity-30 transition-all ease-linear 
                                              relative flex flex-col min-w-0  break-words ">
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
                                            <div class="text-lg text-gray-500">{{ $user->periode[0]['position'] }}</div>
                                        </div>
                                    </div>
                                    @if (isset($user->instagram) || isset($user->linkedin))
                                        <div
                                            class="w-full h-full bg-midnight flex flex-col gap-5 justify-center items-center
                                        absolute z-20 opacity-0 translate-y-72 transition-all 
                                        group-hover:opacity-80 group-hover:-translate-y-0 group-hover:ease-linear group-hover:delay-150 ">

                                            @if (isset($user->linkedin))
                                                <a class="btn btn-outline max-md:btn-md " href="{{ $user->linkedin }}"
                                                    target="_blank">
                                                    <div class="flex flex-row gap-3 items-center ">
                                                        <img class="max-md:h-6" src="{{ asset('img/icons/linkedin.svg') }}"
                                                            alt="" />
                                                        <p class="max-md:text-lg">Linkedin</p>
                                                    </div>
                                                </a>
                                            @endif
                                            @if (isset($user->instagram))
                                                <a class="btn btn-outline max-md:btn-md " href="{{ $user->instagram }}"
                                                    target="_blank">
                                                    <div class="flex flex-row gap-3 items-center ">
                                                        <img class="max-md:h-6"
                                                            src="{{ asset('img/icons/instagram.svg') }}" alt="" />
                                                        <p class="max-md:text-lg">Instagram</p>
                                                    </div>
                                                </a>
                                            @endif
                                        </div>
                                    @endif
                                </div>

                                <div class="w-full"></div>
                            @elseif($user->periode[0]['position'] === 'Kepala Subdivisi')
                                <div class="w-full"></div>
                                <div
                                    class="group card card-member col-auto md:w-1/3 lg:w-1/4 mx-4 mb-6  bg-white shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] rounded-md overflow-hidden">
                                    <div
                                        class="z-10 group-hover:opacity-30 transition-all ease-linear 
                                              relative flex flex-col min-w-0  break-words ">
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
                                            <div class="text-lg text-gray-500">{{ $user->periode[0]['position'] }}</div>
                                        </div>
                                    </div>
                                    @if (isset($user->instagram) || isset($user->linkedin))
                                        <div
                                            class="w-full h-full bg-midnight flex flex-col gap-5 justify-center items-center
                                        absolute z-20 opacity-0 translate-y-72 transition-all 
                                        group-hover:opacity-80 group-hover:-translate-y-0 group-hover:ease-linear group-hover:delay-150 ">

                                            @if (isset($user->linkedin))
                                                <a class="btn btn-outline max-md:btn-md " href="{{ $user->linkedin }}"
                                                    target="_blank">
                                                    <div class="flex flex-row gap-3 items-center ">
                                                        <img class="max-md:h-6" src="{{ asset('img/icons/linkedin.svg') }}"
                                                            alt="" />
                                                        <p class="max-md:text-lg">Linkedin</p>
                                                    </div>
                                                </a>
                                            @endif
                                            @if (isset($user->instagram))
                                                <a class="btn btn-outline max-md:btn-md " href="{{ $user->instagram }}"
                                                    target="_blank">
                                                    <div class="flex flex-row gap-3 items-center ">
                                                        <img class="max-md:h-6"
                                                            src="{{ asset('img/icons/instagram.svg') }}" alt="" />
                                                        <p class="max-md:text-lg">Instagram</p>
                                                    </div>
                                                </a>
                                            @endif
                                        </div>
                                    @endif

                                </div>
                            @else
                                <div
                                    class="group card card-member col-auto md:w-1/3 lg:w-1/4 mx-4 mb-6  bg-white shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] rounded-md overflow-hidden">
                                    <div
                                        class="z-10 group-hover:opacity-30 transition-all ease-linear 
                                      relative flex flex-col min-w-0  break-words ">
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
                                            <div class="text-lg text-gray-500">{{ $user->periode[0]['position'] }}</div>
                                        </div>
                                    </div>
                                    @if (isset($user->instagram) || isset($user->linkedin))
                                        <div
                                            class="w-full h-full bg-midnight flex flex-col gap-5 justify-center items-center
                                absolute z-20 opacity-0 translate-y-72 transition-all 
                                group-hover:opacity-80 group-hover:-translate-y-0 group-hover:ease-linear group-hover:delay-150 ">

                                            @if (isset($user->linkedin))
                                                <a class="btn btn-outline max-md:btn-md " href="{{ $user->linkedin }}"
                                                    target="_blank">
                                                    <div class="flex flex-row gap-3 items-center ">
                                                        <img class="max-md:h-6" src="{{ asset('img/icons/linkedin.svg') }}"
                                                            alt="" />
                                                        <p class="max-md:text-lg">Linkedin</p>
                                                    </div>
                                                </a>
                                            @endif
                                            @if (isset($user->instagram))
                                                <a class="btn btn-outline max-md:btn-md " href="{{ $user->instagram }}"
                                                    target="_blank">
                                                    <div class="flex flex-row gap-3 items-center ">
                                                        <img class="max-md:h-6"
                                                            src="{{ asset('img/icons/instagram.svg') }}" alt="" />
                                                        <p class="max-md:text-lg">Instagram</p>
                                                    </div>
                                                </a>
                                            @endif
                                        </div>
                                    @endif

                                </div>
                            @endif
                        @else
                            <div></div>
                        @endif
                    @endforeach
                    @foreach ($division->subDivisions as $subdivsion)
                        @foreach ($pengurus as $user)
                            @if ($user->status === '1' && $user->periode[0]['division_id'] === strval($subdivsion->id))
                                @if ($user->periode[0]['position'] === 'Kepala Divisi')
                                    <div
                                        class="group card card-member col-auto md:w-1/3 lg:w-1/4 mx-4 mb-6  bg-white shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] rounded-md overflow-hidden">
                                        <div
                                            class="z-10 group-hover:opacity-30 transition-all ease-linear 
                                          relative flex flex-col min-w-0  break-words ">
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
                                                <div class="text-lg text-gray-500">{{ $user->periode[0]['position'] }}
                                                </div>
                                            </div>
                                        </div>
                                        @if (isset($user->instagram) || isset($user->linkedin))
                                            <div
                                                class="w-full h-full bg-midnight flex flex-col gap-5 justify-center items-center
                                    absolute z-20 opacity-0 translate-y-72 transition-all 
                                    group-hover:opacity-80 group-hover:-translate-y-0 group-hover:ease-linear group-hover:delay-150 ">

                                                @if (isset($user->linkedin))
                                                    <a class="btn btn-outline max-md:btn-md "
                                                        href="{{ $user->linkedin }}" target="_blank">
                                                        <div class="flex flex-row gap-3 items-center ">
                                                            <img class="max-md:h-6"
                                                                src="{{ asset('img/icons/linkedin.svg') }}"
                                                                alt="" />
                                                            <p class="max-md:text-lg">Linkedin</p>
                                                        </div>
                                                    </a>
                                                @endif
                                                @if (isset($user->instagram))
                                                    <a class="btn btn-outline max-md:btn-md "
                                                        href="{{ $user->instagram }}" target="_blank">
                                                        <div class="flex flex-row gap-3 items-center ">
                                                            <img class="max-md:h-6"
                                                                src="{{ asset('img/icons/instagram.svg') }}"
                                                                alt="" />
                                                            <p class="max-md:text-lg">Instagram</p>
                                                        </div>
                                                    </a>
                                                @endif
                                            </div>
                                        @endif

                                    </div>
                                    <div class="w-full"></div>
                                @elseif($user->periode[0]['position'] === 'Kepala Subdivisi')
                                    <div class="w-full"></div>
                                    <div
                                        class="group card card-member col-auto md:w-1/3 lg:w-1/4 mx-4 mb-6  bg-white shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] rounded-md overflow-hidden">
                                        <div
                                            class="z-10 group-hover:opacity-30 transition-all ease-linear 
                                              relative flex flex-col min-w-0  break-words ">
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
                                                <div class="text-lg text-gray-500">{{ $user->periode[0]['position'] }}
                                                </div>
                                            </div>
                                        </div>
                                        @if (isset($user->instagram) || isset($user->linkedin))
                                            <div
                                                class="w-full h-full bg-midnight flex flex-col gap-5 justify-center items-center
                                        absolute z-20 opacity-0 translate-y-72 transition-all 
                                        group-hover:opacity-80 group-hover:-translate-y-0 group-hover:ease-linear group-hover:delay-150 ">

                                                @if (isset($user->linkedin))
                                                    <a class="btn btn-outline max-md:btn-md "
                                                        href="{{ $user->linkedin }}" target="_blank">
                                                        <div class="flex flex-row gap-3 items-center ">
                                                            <img class="max-md:h-6"
                                                                src="{{ asset('img/icons/linkedin.svg') }}"
                                                                alt="" />
                                                            <p class="max-md:text-lg">Linkedin</p>
                                                        </div>
                                                    </a>
                                                @endif
                                                @if (isset($user->instagram))
                                                    <a class="btn btn-outline max-md:btn-md "
                                                        href="{{ $user->instagram }}" target="_blank">
                                                        <div class="flex flex-row gap-3 items-center ">
                                                            <img class="max-md:h-6"
                                                                src="{{ asset('img/icons/instagram.svg') }}"
                                                                alt="" />
                                                            <p class="max-md:text-lg">Instagram</p>
                                                        </div>
                                                    </a>
                                                @endif
                                            </div>
                                        @endif

                                    </div>
                                @else
                                    <div
                                        class="group card card-member col-auto md:w-1/3 lg:w-1/4 mx-4 mb-6  bg-white shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] rounded-md overflow-hidden">
                                        <div
                                            class="z-10 group-hover:opacity-30 transition-all ease-linear 
                                          relative flex flex-col min-w-0  break-words ">
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
                                                <div class="text-lg text-gray-500">{{ $user->periode[0]['position'] }}
                                                </div>
                                            </div>
                                        </div>
                                        @if (isset($user->instagram) || isset($user->linkedin))
                                            <div
                                                class="w-full h-full bg-midnight flex flex-col gap-5 justify-center items-center
                                    absolute z-20 opacity-0 translate-y-72 transition-all 
                                    group-hover:opacity-80 group-hover:-translate-y-0 group-hover:ease-linear group-hover:delay-150 ">

                                                @if (isset($user->linkedin))
                                                    <a class="btn btn-outline max-md:btn-md "
                                                        href="{{ $user->linkedin }}" target="_blank">
                                                        <div class="flex flex-row gap-3 items-center ">
                                                            <img class="max-md:h-6"
                                                                src="{{ asset('img/icons/linkedin.svg') }}"
                                                                alt="" />
                                                            <p class="max-md:text-lg">Linkedin</p>
                                                        </div>
                                                    </a>
                                                @endif
                                                @if (isset($user->instagram))
                                                    <a class="btn btn-outline max-md:btn-md "
                                                        href="{{ $user->instagram }}" target="_blank">
                                                        <div class="flex flex-row gap-3 items-center ">
                                                            <img class="max-md:h-6"
                                                                src="{{ asset('img/icons/instagram.svg') }}"
                                                                alt="" />
                                                            <p class="max-md:text-lg">Instagram</p>
                                                        </div>
                                                    </a>
                                                @endif
                                            </div>
                                        @endif

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
