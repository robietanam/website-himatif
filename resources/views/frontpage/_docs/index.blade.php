@extends('_ui.frontpage.layouts.app-docs')

@section('title', 'Docs')
@section('content')

    <div class="container mx-auto sm:px-4 mx-auto sm:px-4 py-5">
        <div class="text-center">
            <h2 class="text-dec text-dec-secondary-1 text-dec-tl text-midnight font-extrabold mb-2">
                Dokumentasi UI
            </h2>
        </div>
    </div>

    {{-- Section 1 : Colors --}}
    <section>
        <div class="container mx-auto sm:px-4 mx-auto sm:px-4">

            <div class="flex flex-wrap  mb-5">
                <div class="xl:w-1/4 pr-4 pl-4">
                    <div
                        class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300 border">
                        <div class="flex-auto p-6 flex flex-col items-center">
                            <div class="img-fit img-fit-cover w-10rem h-10rem rounded-full bg-gray-900">
                                <img src="{{ asset('img/galery/1.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h3 class="font-boldest op-1">Divisi dan Pengurus</h3>
            <div class="divider my-5"></div>


            <h4 class="text-dec text-dec-warning-2 text-dec-tr text-midnight font-extrabold mb-2">
                Color Theme
            </h4>

            <h5 class="text-gray font-bold op-6 mb-2">Solid Color</h5>
            @php
                $colors = ['primary', 'secondary', 'warning', 'danger', 'midnight', 'gray', 'light', 'success', 'info', 'link', 'white'];
            @endphp
            <div class="flex flex-wrap  gutters-xs">
                @foreach ($colors as $color)
                    <div class="w-1/2 md:w-1/3 pr-4 pl-4 lg:w-1/4 pr-4 pl-4 xl:w-1/5 pr-4 pl-4 mb-1">
                        <div
                            class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300 bg-{{ $color }} border-md border-gray p-6 flex items-center justify-center">
                            @if ($color === 'midnight' || $color === 'gray' || $color === 'primary')
                                <h6 class="text-white font-bold">{{ $color }}</h6>
                            @else
                                <h6 class="font-bold">{{ $color }}</h6>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <h1 class="font-extrabold">contoh</h1>

            <h5 class="text-gray font-bold op-6 my-2">Gradient Color</h5>
            @php
                $colors = ['primary', 'secondary', 'info'];
            @endphp
            <div class="flex flex-wrap  gutters-xs">
                @foreach ($colors as $color)
                    <div class="w-1/2 md:w-1/3 pr-4 pl-4 lg:w-1/4 pr-4 pl-4 mb-1">
                        <div
                            class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300 bg-gradient-{{ $color }} border-md border-gray p-6 flex items-center justify-center">
                            <h6 class="text-white font-bold">{{ "gradient-$color" }}</h6>
                        </div>
                    </div>
                @endforeach
            </div>



            <div class="divider my-6"></div>
        </div>
    </section>

    {{-- Section 2 : Fonts Utilities --}}
    <section>
        <div class="container mx-auto sm:px-4 mx-auto sm:px-4">
            <h4 class="text-dec text-dec-warning-2 text-dec-tr text-midnight font-extrabold mb-2">
                Font Utilities
            </h4>


            <h5 class="text-gray font-bold op-6 mb-2">Sizing</h5>
            @php
                $fontSizes = [
                    'h1' => '4.8rem / 48px',
                    'h2' => '4.2rem / 42px',
                    'h3' => '3.6rem / 36px',
                    'h4' => '2.8rem / 28px',
                    'h5' => '2.4rem / 24px',
                    'h6' => '1.8rem /18px',
                    'p' => '1.6rem / 16px',
                    'div' => '1.4rem / 14px',
                ];
            @endphp
            <div class="flex flex-wrap  gutters-xs">
                @foreach ($fontSizes as $i => $size)
                    <div class="xl:w-1/2 pr-4 pl-4 mb-1">
                        <div
                            class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300 bg-white border-md border-gray p-1 h-full flex justify-center">
                            <{{ $i }}> <span class="font-bold">&lt;{{ $i }}&gt;</span> : <span
                                    class="text-gray">{{ $size }}</span> </{{ $i }}>
                        </div>
                    </div>
                @endforeach
            </div>

            <h5 class="text-gray font-bold op-6 my-2">Font Weight</h5>
            @php
                $fontWeights = [
                    'light' => '300',
                    'normal' => '400',
                    'semibold' => '600',
                    'bold' => '700',
                    'extrabold' => '800',
                    'boldest' => '900',
                ];
            @endphp
            <div class="flex flex-wrap  gutters-xs">
                @foreach ($fontWeights as $i => $weight)
                    <div class="xl:w-1/2 pr-4 pl-4 mb-1">
                        <div
                            class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300 bg-white border-md border-gray p-1 h-full">
                            <h6> <span class="font-{{ $i }}">{{ ".font-$i" }}</span> : <span
                                    class="text-gray">{{ $weight }}</span> </h6>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="divider my-6"></div>
        </div>
    </section>

    {{-- Section 3 : Custom Text --}}
    <section>
        <div class="container mx-auto sm:px-4 mx-auto sm:px-4">
            <h4 class="text-dec text-dec-warning-2 text-dec-tr text-midnight font-extrabold mb-2">
                Custom Component : Text Dec
            </h4> <br>

            <h6 class="text-gray font-bold op-6 my-2">Using on {{ '<h4></h4>' }}</h6>
            <div class="flex flex-wrap  gutters-xs">
                <div class="lg:w-1/3 pr-4 pl-4">
                    <h4 class="text-dec text-dec-info-1 text-dec-tl text-midnight font-extrabold">
                        {{ '<h4></h4>' }}
                    </h4>
                    <div class="my-3"></div>
                    <h4 class="text-dec text-dec-info-2 text-dec-tr text-midnight font-extrabold">
                        {{ '<h4></h4>' }}
                    </h4>
                </div>
                <div class="lg:w-1/3 pr-4 pl-4">
                    <h4 class="text-dec text-dec-secondary-1 text-dec-tl text-midnight font-extrabold">
                        {{ '<h4></h4>' }}
                    </h4>
                    <div class="my-3"></div>
                    <h4 class="text-dec text-dec-secondary-2 text-dec-tr text-midnight font-extrabold">
                        {{ '<h4></h4>' }}
                    </h4>
                </div>
                <div class="lg:w-1/3 pr-4 pl-4">
                    <h4 class="text-dec text-dec-warning-1 text-dec-tl text-midnight font-extrabold">
                        {{ '<h4></h4>' }}
                    </h4>
                    <div class="my-3"></div>
                    <h4 class="text-dec text-dec-warning-2 text-dec-tr text-midnight font-extrabold">
                        {{ '<h4></h4>' }}
                    </h4>
                </div>
            </div>

            <div class="divider my-6"></div>

        </div>
    </section>

    {{-- Section 4 : Grid System --}}
    <section>
        <div class="container mx-auto sm:px-4 mx-auto sm:px-4">
            <h4 class="text-dec text-dec-warning-2 text-dec-tr text-midnight font-extrabold mb-2">
                Grid Systems
            </h4>

            <h5 class="text-gray font-bold op-6 my-2">.row > .col-*</h5>
            <div class="flex flex-wrap ">
                @for ($i = 0; $i < 3; $i++)
                    <div class="w-1/3 mb-1">
                        <div
                            class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300 bg-gray-100 border-md border-gray p-6 h-full">
                        </div>
                    </div>
                @endfor
            </div>

            <h5 class="text-gray font-bold op-6 my-2">.row.gutters-xs > .col-*</h5>
            <div class="flex flex-wrap  gutters-xs">
                @for ($i = 0; $i < 3; $i++)
                    <div class="w-1/3 mb-1">
                        <div
                            class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300 bg-gray-100 border-md border-gray p-6 h-full">
                        </div>
                    </div>
                @endfor
            </div>

            <h5 class="text-gray font-bold op-6 my-2">.row.no-gutters > .col-*</h5>
            <div class="flex flex-wrap  no-gutters">
                @for ($i = 0; $i < 3; $i++)
                    <div class="w-1/3 mb-1">
                        <div
                            class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300 bg-gray-100 border-md border-gray p-6 h-full">
                        </div>
                    </div>
                @endfor
            </div>

            <div class="divider my-6"></div>
        </div>
    </section>

    {{-- Section 5 : Other Utilities --}}
    <section>
        <div class="container mx-auto sm:px-4 mx-auto sm:px-4">
            <h4 class="text-dec text-dec-warning-2 text-dec-tr text-midnight font-extrabold mb-2">
                Other Utilites
            </h4>

            <h5 class="text-gray font-bold op-6">Image Fit</h5>
            <div class="flex flex-wrap  mb-4">
                <div class="col-sm-auto">
                    <p class="text-gray font-bold op-6 my-2">.img-fit.img-fit-cover > img</p>
                    <div class="img-fit img-fit-cover bg-gray w-30rem h-30rem">
                        <img src="{{ asset('img/galery/3.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <p class="text-gray font-bold op-6 my-2">.img-fit.img-fit-contain > img</p>
                    <div class="img-fit img-fit-contain bg-gray w-30rem h-30rem">
                        <img src="{{ asset('img/galery/3.jpg') }}" alt="">
                    </div>
                </div>
            </div>

            <h5 class="text-gray font-bold op-6 my-2">divider</h5>
            <div class="flex flex-wrap ">
                <div class="lg:w-1/2 pr-4 pl-4 mb-1">
                    <p class="text-gray font-bold op-6 mb-1">.divider</p>
                    <div
                        class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300 bg-gray border-md border-gray p-1">
                        <div class="divider"></div>
                    </div>
                </div>
                <div class="lg:w-1/2 pr-4 pl-4 mb-1">
                    <p class="text-gray font-bold op-6 mb-1">.divider.divider-vertical (must add height ex: .h-10rem)</p>
                    <div
                        class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300 bg-gray border-md border-gray p-1 h-10rem">
                        <div class="divider divider-vertical"></div>
                    </div>
                </div>
            </div>

            <h5 class="text-gray font-bold op-6 my-5">Opacity</h5>
            <div class="flex flex-wrap  gutters-xs">
                @for ($i = 9; $i > 0; $i--)
                    <div class="xl:w-1/5 pr-4 pl-4 mb-1 op-{{ $i }}">
                        <div
                            class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300 bg-gray-100 border-md border-gray p-6">
                            <p class="font-bold">{{ ".op-$i" }}</p> Opactiy : .{{ $i }}
                        </div>
                    </div>
                @endfor
            </div>

            <div class="divider my-6"></div>

        </div>
    </section>

    {{-- Section 6 : Sizing --}}
    <section>
        <div class="container mx-auto sm:px-4 mx-auto sm:px-4">
            <h4 class="text-dec text-dec-warning-2 text-dec-tr text-midnight font-extrabold mb-2">
                Sizing Utilites (0 - 100rem)
            </h4>

            <h5 class="text-gray font-bold op-6 my-2">Rem Value</h5>
            <div class="flex flex-wrap  gutters-xs items-end">
                <div class="col-lg-auto mb-1">
                    <div
                        class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300 bg-gray-100 border-md border-gray w-10rem h-10rem flex flex-col items-center justify-center">
                        <span class="text-gray font-bold">.w-10rem</span>
                        <span class="text-gray font-bold">.h-10rem</span>
                    </div>
                </div>
                <div class="col-lg-auto mb-1">
                    <div
                        class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300 bg-gray-100 border-md border-gray w-15rem h-15rem flex flex-col items-center justify-center">
                        <span class="text-gray font-bold">.w-15rem</span>
                        <span class="text-gray font-bold">.h-15rem</span>
                    </div>
                </div>
                <div class="col-lg-auto mb-1">
                    <div
                        class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300 bg-gray-100 border-md border-gray w-20rem h-20rem flex flex-col items-center justify-center">
                        <span class="text-gray font-bold">.w-20rem</span>
                        <span class="text-gray font-bold">.h-20rem</span>
                    </div>
                </div>
            </div>

            <h5 class="text-gray font-bold op-6 my-2">Percent (%) Value</h5>
            <div class="flex flex-wrap  gutters-xs items-end">
                <div
                    class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300 bg-gray-100 border-md border-gray w-3/4 h-10rem flex flex-col items-center justify-center">
                    <span class="text-gray font-bold">.w-75</span>
                    <span class="text-gray font-bold">.h-10rem</span>
                </div>
                <div
                    class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300 bg-gray-100 border-md border-gray w-1/4 h-10rem flex flex-col items-center justify-center">
                    <span class="text-gray font-bold">.w-25</span>
                    <span class="text-gray font-bold">.h-10rem</span>
                </div>
            </div>



            <div class="divider my-6"></div>

        </div>
    </section>

@endsection
