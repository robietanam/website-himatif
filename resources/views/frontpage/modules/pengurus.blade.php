@extends('frontpage.layouts.app-frontpage')

@section('title', 'PENGURUS')

@section('pageClass', 'pengurus')
@section('content')

    {{-- Header --}}
    <header>
        <div class="container text-center">
            <h3 class="text-midnight text-dec text-dec-secondary-3 text-dec-tr font-extrabold mb-2">
                {{ $header['1-text']->content }}
            </h3>
            <h6 class="text-gray font-light">
                {{ $header['2-text2']->content }}
            </h6>
        </div>
    </header>
    {{-- End of Header --}}

    <section id="section-1">
        <div class="container">
            <div class="row gutters-xs gutters-lg-md justify-content-around justify-content-lg-center">

                @foreach ($divisions as $division)
                    <div class="col-12 mt-3 mb-1">
                        <h4 class="text-midnight text-center font-extrabold mb-2">
                            {{ $division->name }}
                        </h4>
                    </div>

                    @foreach ($division->users as $user)
                        @if ($user->status === '1')
                            <div class="col-auto col-md-4 col-lg-3 mb-2">
                                <div class="card card-member shadow-midnight-sm">
                                    <div class="card-body text-center">
                                        @if ($user->photo)
                                            <div class="img-wrapper">
                                                <img src="{{ asset('storage/'.$user->photo) }}" alt="">
                                            </div>
                                        @else
                                            <div class="img-wrapper">
                                                <img src="{{ asset('img/placeholder/product-image-default.svg') }}" alt="">
                                            </div>
                                        @endif
                                        <div class="text-title">{{ $user->name }}</div>
                                        <div class="text-subtitle">{{ $user->position }}</div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div></div>
                        @endif
                    @endforeach
                    @foreach ($division->subDivisions as $subdivsion)
                        @foreach ($subdivsion->users as $user)
                            @if ($user->status === '1')
                                <div class="col-auto col-md-4 col-lg-3 mb-2">
                                    <div class="card card-member shadow-midnight-sm">
                                        <div class="card-body text-center">
                                            @if ($user->photo)
                                                <div class="img-wrapper">
                                                    <img src="{{ asset('storage/'.$user->photo) }}" alt="">
                                                </div>
                                            @else
                                                <div class="img-wrapper">
                                                    <img src="{{ asset('img/placeholder/product-image-default.svg') }}" alt="">
                                                </div>
                                            @endif
                                            <div class="text-title">{{ $user->name }}</div>
                                            <div class="text-subtitle">{{ $user->position }}</div>
                                        </div>
                                    </div>
                                </div>
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
