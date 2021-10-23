@extends('_ui.frontpage.layouts.app-docs')

@section('title', 'Docs')
@section('content')
    
    <div class="container py-5">
        <div class="text-center">
            <h2 class="text-dec text-dec-secondary-1 text-dec-tl text-midnight font-extrabold mb-2">
                Dokumentasi UI
            </h2>
        </div>
    </div>

    {{-- Section 1 : Colors --}}
    <section>
        <div class="container">

            <div class="row mb-5">
                <div class="col-xl-3">
                    <div class="card border">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="img-fit img-fit-cover w-10rem h-10rem rounded-circle bg-dark">
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
                $colors = [ 
                    'primary', 'secondary', 'warning', 'danger', 'midnight', 
                    'gray', 'light', 'success', 'info', 'link', 'white',
                ];
            @endphp
            <div class="row gutters-xs">
                @foreach ($colors as $color)
                    <div class="col-6 col-md-4 col-lg-3 col-xl-2 mb-1">
                        <div class="card bg-{{ $color }} border-md border-gray p-4 d-flex align-items-center justify-content-center"> 
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
                $colors = [ 
                    'primary', 'secondary', 'info',
                ];
            @endphp
            <div class="row gutters-xs">
                @foreach ($colors as $color)
                    <div class="col-6 col-md-4 col-lg-3 mb-1">
                        <div class="card bg-gradient-{{ $color }} border-md border-gray p-4 d-flex align-items-center justify-content-center"> 
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
        <div class="container">
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
            <div class="row gutters-xs">
                @foreach ($fontSizes as $i => $size)
                <div class="col-xl-6 mb-1">
                    <div class="card bg-white border-md border-gray p-1 h-100 d-flex justify-content-center"> 
                        <{{ $i }}> <span class="font-bold">&lt;{{ $i }}&gt;</span> : <span class="text-gray">{{ $size }}</span> </{{ $i }}>
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
            <div class="row gutters-xs">
                @foreach ($fontWeights as $i => $weight)
                <div class="col-xl-6 mb-1">
                    <div class="card bg-white border-md border-gray p-1 h-100"> 
                        <h6> <span class="font-{{ $i }}">{{ ".font-$i" }}</span> : <span class="text-gray">{{ $weight }}</span> </h6>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="divider my-6"></div>
        </div>
    </section>

    {{-- Section 3 : Custom Text --}}
    <section>
        <div class="container">
            <h4 class="text-dec text-dec-warning-2 text-dec-tr text-midnight font-extrabold mb-2">
                Custom Component : Text Dec 
            </h4> <br>

            <h6 class="text-gray font-bold op-6 my-2">Using on {{ "<h4></h4>" }}</h6>
            <div class="row gutters-xs">
                <div class="col-lg-4">
                    <h4 class="text-dec text-dec-info-1 text-dec-tl text-midnight font-extrabold">
                        {{ "<h4></h4>" }}
                    </h4>
                    <div class="my-3"></div>
                    <h4 class="text-dec text-dec-info-2 text-dec-tr text-midnight font-extrabold">
                        {{ "<h4></h4>" }}
                    </h4>
                </div>
                <div class="col-lg-4">
                    <h4 class="text-dec text-dec-secondary-1 text-dec-tl text-midnight font-extrabold">
                        {{ "<h4></h4>" }}
                    </h4>
                    <div class="my-3"></div>
                    <h4 class="text-dec text-dec-secondary-2 text-dec-tr text-midnight font-extrabold">
                        {{ "<h4></h4>" }}
                    </h4>
                </div>
                <div class="col-lg-4">
                    <h4 class="text-dec text-dec-warning-1 text-dec-tl text-midnight font-extrabold">
                        {{ "<h4></h4>" }}
                    </h4>
                    <div class="my-3"></div>
                    <h4 class="text-dec text-dec-warning-2 text-dec-tr text-midnight font-extrabold">
                        {{ "<h4></h4>" }}
                    </h4>
                </div>
            </div>

            <div class="divider my-6"></div>
            
        </div>
    </section>

    {{-- Section 4 : Grid System --}}
    <section>
        <div class="container">
            <h4 class="text-dec text-dec-warning-2 text-dec-tr text-midnight font-extrabold mb-2">
                Grid Systems
            </h4>

            <h5 class="text-gray font-bold op-6 my-2">.row > .col-*</h5>
            <div class="row">
                @for ($i = 0; $i < 3; $i++)
                <div class="col-4 mb-1">
                    <div class="card bg-light border-md border-gray p-4 h-100"></div>
                </div>
                @endfor
            </div>

            <h5 class="text-gray font-bold op-6 my-2">.row.gutters-xs > .col-*</h5>
            <div class="row gutters-xs">
                @for ($i = 0; $i < 3; $i++)
                <div class="col-4 mb-1">
                    <div class="card bg-light border-md border-gray p-4 h-100"></div>
                </div>
                @endfor
            </div>

            <h5 class="text-gray font-bold op-6 my-2">.row.no-gutters > .col-*</h5>
            <div class="row no-gutters">
                @for ($i = 0; $i < 3; $i++)
                <div class="col-4 mb-1">
                    <div class="card bg-light border-md border-gray p-4 h-100"></div>
                </div>
                @endfor
            </div>

            <div class="divider my-6"></div>
        </div>
    </section>

    {{-- Section 5 : Other Utilities --}}
    <section>
        <div class="container">
            <h4 class="text-dec text-dec-warning-2 text-dec-tr text-midnight font-extrabold mb-2">
                Other Utilites
            </h4>

            <h5 class="text-gray font-bold op-6">Image Fit</h5>
            <div class="row mb-4">
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
            <div class="row">
                <div class="col-lg-6 mb-1">
                    <p class="text-gray font-bold op-6 mb-1">.divider</p>
                    <div class="card bg-gray border-md border-gray p-1"> 
                        <div class="divider"></div>
                    </div>
                </div>
                <div class="col-lg-6 mb-1">
                    <p class="text-gray font-bold op-6 mb-1">.divider.divider-vertical (must add height ex: .h-10rem)</p>
                    <div class="card bg-gray border-md border-gray p-1 h-10rem"> 
                        <div class="divider divider-vertical"></div>
                    </div>
                </div>
            </div>

            <h5 class="text-gray font-bold op-6 my-5">Opacity</h5>
            <div class="row gutters-xs">
                @for ($i = 9; $i > 0; $i--)
                <div class="col-xl-2 mb-1 op-{{ $i }}">
                    <div class="card bg-light border-md border-gray p-4">
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
        <div class="container">
            <h4 class="text-dec text-dec-warning-2 text-dec-tr text-midnight font-extrabold mb-2">
                Sizing Utilites (0 - 100rem)
            </h4>

            <h5 class="text-gray font-bold op-6 my-2">Rem Value</h5>
            <div class="row gutters-xs align-items-end">
                <div class="col-lg-auto mb-1">
                    <div class="card bg-light border-md border-gray w-10rem h-10rem d-flex flex-column align-items-center justify-content-center">
                        <span class="text-gray font-bold">.w-10rem</span> 
                        <span class="text-gray font-bold">.h-10rem</span>
                    </div>
                </div>
                <div class="col-lg-auto mb-1">
                    <div class="card bg-light border-md border-gray w-15rem h-15rem d-flex flex-column align-items-center justify-content-center">
                        <span class="text-gray font-bold">.w-15rem</span> 
                        <span class="text-gray font-bold">.h-15rem</span>
                    </div>
                </div>
                <div class="col-lg-auto mb-1">
                    <div class="card bg-light border-md border-gray w-20rem h-20rem d-flex flex-column align-items-center justify-content-center">
                        <span class="text-gray font-bold">.w-20rem</span> 
                        <span class="text-gray font-bold">.h-20rem</span>
                    </div>
                </div>
            </div>

            <h5 class="text-gray font-bold op-6 my-2">Percent (%) Value</h5>
            <div class="row gutters-xs align-items-end">
                <div class="card bg-light border-md border-gray w-75 h-10rem d-flex flex-column align-items-center justify-content-center">
                    <span class="text-gray font-bold">.w-75</span> 
                    <span class="text-gray font-bold">.h-10rem</span>
                </div>
                <div class="card bg-light border-md border-gray w-25 h-10rem d-flex flex-column align-items-center justify-content-center">
                    <span class="text-gray font-bold">.w-25</span> 
                    <span class="text-gray font-bold">.h-10rem</span>
                </div>
            </div>

            

            <div class="divider my-6"></div>
            
        </div>
    </section>

@endsection