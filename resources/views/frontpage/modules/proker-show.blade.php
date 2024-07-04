@extends('frontpage.layouts.app-frontpage')

@php
    $timeline_active = -1;

@endphp

@section('title', 'PROKER DETAIL')

@section('pageClass', 'proker')


@section('content')

    <main class="py-5 py-md-6 bg-gray-100">
        <div class="container mx-auto sm:px-4">
            <div class="flex flex-wrap justify-center">
                <div class="lg:w-2/3 pr-4 pl-4">
                    <div
                        class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300">
                        <div class="flex-auto p-6">
                            <h6 class="text-gray-500 mb-1">Detail Proker :</h6>
                            <h4 class="text-midnight font-semibold">{{ $proker->name }}</h4>

                            @if ($proker->is_registration_open === '1')
                                <div
                                    class="inline-block p-1 text-center font-semibold text-sm align-baseline leading-none rounded-md badge-lg bg-green-500 text-white hover:green-600">
                                    Pendaftaran Dibuka</div>
                            @endif

                            <div class="my-2 ">
                                <div class="img-fit object-contain py-5 w-[12rem] md:w-[18rem] rounded-sm">
                                    @if ($proker->logo)
                                        <img src="{{ asset('storage/' . $proker->logo) }}" alt="">
                                    @else
                                        <img src="{{ asset('img/placeholder/product-image-default.svg') }}" alt="">
                                    @endif
                                </div>

                            </div>

                            <div class="proker-desc [&>p]:text-lg max-md:[&>p]:text-sm text-gray-500">
                                {!! $proker->description !!}
                            </div>
                            <div class="flex justify-between mt-3">
                                <div class="flex">
                                    @if (isset($proker->link_instagram) && !empty($proker->link_instagram))
                                        <div class="col-auto mr-1 ">
                                            <a target="_blank" href="{{ $proker->link_instagram }} "
                                                class="flex flex-row justify-center items-center space-x-3 text-center select-none border font-normal whitespace-no-wrap rounded-md py-2 px-3 max-md:p-2 leading-normal no-underline text-[#e4405f] border-[#e4405f] bg-gradient-to-r  hover:from-pink-500 hover:to-yellow-500  hover:text-white bg-white hover:bg-red-700">

                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="w-5 h-5 max-md:w-[32px] max-md:h-[31px] " fill="currentColor"
                                                    class="bi bi-instagram" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334">
                                                    </path>
                                                </svg>
                                                <p class="text-lg max-md:hidden">

                                                    Instagram
                                                </p>
                                            </a>
                                        </div>
                                    @endif

                                    @if (isset($proker->link_contact_person) && !empty($proker->link_contact_person))
                                        <div class="col-auto">
                                            <a target="_blank"
                                                href="//wa.me/+62{{ substr($proker->link_contact_person, 1) }} "
                                                class="flex flex-row justify-center items-center space-x-3 text-center select-none border font-normal whitespace-no-wrap rounded-md py-2 px-3 max-md:p-2 leading-normal no-underline text-[#25D366] border-[#25D366] bg-gradient-to-r  hover:from-[#22bb5a] hover:to-[#25D366]  hover:text-white bg-white hover:bg-red-700">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="w-5 h-5 max-md:w-[32px] max-md:h-[31px] " fill="currentColor"
                                                    class="bi bi-whatsapp" viewBox="0 0 16 16">
                                                    <path
                                                        d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232">
                                                    </path>
                                                </svg>
                                                <p class="text-lg max-md:hidden">
                                                    Contact Person
                                                </p>
                                            </a>
                                        </div>
                                    @endif
                                </div>

                                <div class="flex space-x-4">
                                    @if (isset($proker->link_storage_certificate) && !empty($proker->link_storage_certificate))
                                        <div class="col-auto mr-1 ">
                                            <a target="_blank" href="{{ $proker->link_storage_certificate }} "
                                                class=" inline-block align-middle text-center select-none font-normal whitespace-no-wrap text-white 
                                                bg-gradient-to-r from-blue-800 to-blue-600 hover:bg-none hover:text-blue-800 hover:border hover:border-blue-700 rounded-md py-3 px-4 leading-normal no-underline 
                                                transition ease-in-out  hover:scale-110 duration-300">
                                                Sertifikat </a>
                                        </div>
                                    @endif

                                    @if ($proker->is_registration_open === '1')
                                        @if ($proker->id !== 3)
                                            <div class="col-auto">
                                                <a href="{{ $proker->link_registration }}" target="_blank"
                                                    class="inline-block align-middle text-center select-none font-normal whitespace-no-wrap text-white 
                                                bg-gradient-to-r from-purple-800 to-purple-600 hover:bg-none hover:text-purple-800 hover:border hover:border-purple-700 rounded-md py-3 px-4 leading-normal no-underline 
                                                transition ease-in-out  hover:scale-110 duration-300">Daftar
                                                    Sekarang</a>
                                            </div>
                                        @else
                                            <a href="https://docs.google.com/forms/d/e/1FAIpQLSfRNSQsVUxeGHhCY-bpuXDBddUsuh9Q6GOrt4BWepngBrIihw/viewform?usp=sf_link"
                                                target="_blank"
                                                class="inline-block align-middle text-center select-none font-normal whitespace-no-wrap text-white 
                                            bg-gradient-to-r from-purple-800 to-purple-600 hover:bg-none hover:text-purple-800 hover:border hover:border-purple-700 rounded-md py-3 px-4 leading-normal no-underline 
                                            transition ease-in-out  hover:scale-110 duration-300">Series
                                                1
                                            </a>
                                            <a href="https://docs.google.com/forms/d/e/1FAIpQLSf1skE0H14lAbR0nKBqEghjwmpr-XDXTJTRaJi-_ry5yECMQg/viewform?usp=sf_link "
                                                target="_blank"
                                                class="inline-block align-middle text-center select-none font-normal whitespace-no-wrap text-white 
                                        bg-gradient-to-r from-purple-800 to-purple-600 hover:bg-none hover:text-purple-800 hover:border hover:border-purple-700 rounded-md py-3 px-4 leading-normal no-underline 
                                        transition ease-in-out  hover:scale-110 duration-300">Series
                                                2
                                            </a>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>

                    <div id="accordion-flush" data-accordion="open" class="px-2"
                        data-active-classes="bg-none text-gray-900" data-inactive-classes="text-gray-500">
                        @if ($proker->is_timeline_open)


                            <h6 id="accordion-flush-heading-1">
                                <button type="button"
                                    class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 gap-3"
                                    data-accordion-target="#accordion-flush-body-1" aria-expanded="true"
                                    aria-controls="accordion-flush-body-1">
                                    <span>Timeline {{ $proker->name === 'ITEC' ? 'UI/UX' : '' }}</span>
                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M9 5 5 1 1 5" />
                                    </svg>
                                </button>
                            </h6>
                            <div id="accordion-flush-body-1" class="hidden px-4"
                                aria-labelledby="accordion-flush-heading-1">
                                <div class="py-5 border-b border-gray-200">
                                    <ol class="relative border-s border-gray-200">
                                        @foreach ($proker->timeline as $key => $timeline)
                                            @if (date('Y-m-d H:i:s') < date('Y-m-d H:i:s', strtotime($timeline[2])))
                                                @php
                                                    if ($timeline_active == -1) {
                                                        $timeline_active = $key;
                                                    }
                                                @endphp

                                                @if ($key == $timeline_active)
                                                    <li class="mb-10 ms-4">
                                                        <div
                                                            class="absolute w-3 h-3 bg-green-600 rounded-full mt-1.5 -start-1.5 border border-white">
                                                        </div>
                                                        <time class="mb-1 text-sm font-normal leading-none text-gray-400">
                                                            @if (date('d-m-Y', strtotime($timeline[2])) === date('d-m-Y', strtotime($timeline[1])))
                                                                {{ tgl_indo(date('d-m-Y', strtotime($timeline[2]))) }}
                                                            @else
                                                                {{ tgl_indo(date(date('Y', strtotime($timeline[1])) == date('Y', strtotime($timeline[2])) ? 'd-m ' : 'd-m-Y', strtotime($timeline[1]))) }}
                                                                -
                                                                {{ tgl_indo(date('d-m-Y', strtotime($timeline[2]))) }}
                                                            @endif
                                                        </time>
                                                        <h3 class="text-lg font-semibold text-gray-900">
                                                            {{ $timeline[0] }}</h3>
                                                        {{-- <p class="mb-4 text-base font-normal text-gray-500">
                                                        Get
                                                        access to over 20+ pages including a dashboard layout, charts,
                                                        kanban board,
                                                        calendar, and pre-order E-commerce & Marketing pages.</p>
                                                    <a href="#"
                                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-100 focus:text-blue-700">Learn
                                                        more <svg class="w-3 h-3 ms-2 rtl:rotate-180" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 14 10">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                                                        </svg></a> --}}
                                                    </li>
                                                @else
                                                    <li class="mb-10 ms-4">
                                                        <div
                                                            class="absolute w-3 h-3 bg-yellow-400 rounded-full mt-1.5 -start-1.5 border border-white">
                                                        </div>
                                                        <time class="mb-1 text-sm font-normal leading-none text-gray-400">
                                                            @if (date('d-m-Y', strtotime($timeline[2])) === date('d-m-Y', strtotime($timeline[1])))
                                                                {{ tgl_indo(date('d-m-Y', strtotime($timeline[2]))) }}
                                                            @else
                                                                {{ tgl_indo(date(date('Y', strtotime($timeline[1])) == date('Y', strtotime($timeline[2])) ? 'd-m ' : 'd-m-Y', strtotime($timeline[1]))) }}
                                                                -
                                                                {{ tgl_indo(date('d-m-Y', strtotime($timeline[2]))) }}
                                                            @endif
                                                        </time>
                                                        <h3 class="text-lg font-semibold text-gray-900">
                                                            {{ $timeline[0] }}</h3>
                                                        {{-- <p class="mb-4 text-base font-normal text-gray-500">
                                                        Get
                                                        access to over 20+ pages including a dashboard layout, charts,
                                                        kanban board,
                                                        calendar, and pre-order E-commerce & Marketing pages.</p>
                                                    <a href="#"
                                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-100 focus:text-blue-700">Learn
                                                        more <svg class="w-3 h-3 ms-2 rtl:rotate-180" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 14 10">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                                                        </svg></a> --}}
                                                    </li>
                                                @endif
                                            @else
                                                <li class="mb-10 ms-4">
                                                    <div
                                                        class="absolute w-3 h-3 bg-red-400 rounded-full mt-1.5 -start-1.5 border border-white">
                                                    </div>
                                                    <time class="mb-1 text-sm font-normal leading-none text-gray-400">
                                                        @if (date('d-m-Y', strtotime($timeline[2])) === date('d-m-Y', strtotime($timeline[1])))
                                                            {{ tgl_indo(date('d-m-Y', strtotime($timeline[2]))) }}
                                                        @else
                                                            {{ tgl_indo(date(date('Y', strtotime($timeline[1])) == date('Y', strtotime($timeline[2])) ? 'd-m ' : 'd-m-Y', strtotime($timeline[1]))) }}
                                                            -
                                                            {{ tgl_indo(date('d-m-Y', strtotime($timeline[2]))) }}
                                                        @endif
                                                    </time>
                                                    <h3 class="text-lg font-semibold text-gray-900">
                                                        {{ $timeline[0] }}</h3>
                                                    {{-- <p class="mb-4 text-base font-normal text-gray-500">
                                                        Get
                                                        access to over 20+ pages including a dashboard layout, charts,
                                                        kanban board,
                                                        calendar, and pre-order E-commerce & Marketing pages.</p>
                                                    <a href="#"
                                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-100 focus:text-blue-700">Learn
                                                        more <svg class="w-3 h-3 ms-2 rtl:rotate-180" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 14 10">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                                                        </svg></a> --}}
                                                </li>
                                            @endif
                                        @endforeach

                                    </ol>

                                </div>
                            </div>
                            @if ($proker->name === 'ITEC')
                                <h6 id="accordion-flush-heading-99">
                                    <button type="button"
                                        class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 gap-3"
                                        data-accordion-target="#accordion-flush-body-99" aria-expanded="true"
                                        aria-controls="accordion-flush-body-2">
                                        <span>Timeline Data Mining</span>
                                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M9 5 5 1 1 5" />
                                        </svg>
                                    </button>
                                </h6>
                                <div id="accordion-flush-body-99" class="hidden px-4"
                                    aria-labelledby="accordion-flush-heading-99">
                                    <div class="py-5 border-b border-gray-200">
                                        <ol class="relative border-s border-gray-200">
                                            @php
                                                $sementara = [['Pendaftaran dan Pengumpulan Proposal Full Paper', '2024-02-24T17:05', '2024-03-18T19:18'], ['Pengumuman lolos/Babak Final', '2024-03-25T19:30', '2024-03-25T19:30'], ['TM dan Pengundian Nomor Urut', '2024-03-29T09:31', '2024-03-29T09:31'], ['Final dan Presentasi', '2024-03-30T09:31', '2024-03-30T09:31']];
                                            @endphp
                                            @foreach ($sementara as $key => $timeline)
                                                @if (date('Y-m-d H:i:s') < date('Y-m-d H:i:s', strtotime($timeline[2])))
                                                    @php
                                                        if ($timeline_active == -1) {
                                                            $timeline_active = $key;
                                                        }
                                                    @endphp

                                                    @if ($key == $timeline_active)
                                                        <li class="mb-10 ms-4">
                                                            <div
                                                                class="absolute w-3 h-3 bg-green-600 rounded-full mt-1.5 -start-1.5 border border-white">
                                                            </div>
                                                            <time
                                                                class="mb-1 text-sm font-normal leading-none text-gray-400">
                                                                @if (date('d-m-Y', strtotime($timeline[2])) === date('d-m-Y', strtotime($timeline[1])))
                                                                    {{ tgl_indo(date('d-m-Y', strtotime($timeline[2]))) }}
                                                                @else
                                                                    {{ tgl_indo(date(date('Y', strtotime($timeline[1])) == date('Y', strtotime($timeline[2])) ? 'd-m ' : 'd-m-Y', strtotime($timeline[1]))) }}
                                                                    -
                                                                    {{ tgl_indo(date('d-m-Y', strtotime($timeline[2]))) }}
                                                                @endif
                                                            </time>
                                                            <h3 class="text-lg font-semibold text-gray-900">
                                                                {{ $timeline[0] }}</h3>
                                                            {{-- <p class="mb-4 text-base font-normal text-gray-500">
                                                        Get
                                                        access to over 20+ pages including a dashboard layout, charts,
                                                        kanban board,
                                                        calendar, and pre-order E-commerce & Marketing pages.</p>
                                                    <a href="#"
                                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-100 focus:text-blue-700">Learn
                                                        more <svg class="w-3 h-3 ms-2 rtl:rotate-180" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 14 10">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                                                        </svg></a> --}}
                                                        </li>
                                                    @else
                                                        <li class="mb-10 ms-4">
                                                            <div
                                                                class="absolute w-3 h-3 bg-yellow-400 rounded-full mt-1.5 -start-1.5 border border-white">
                                                            </div>
                                                            <time
                                                                class="mb-1 text-sm font-normal leading-none text-gray-400">
                                                                @if (date('d-m-Y', strtotime($timeline[2])) === date('d-m-Y', strtotime($timeline[1])))
                                                                    {{ tgl_indo(date('d-m-Y', strtotime($timeline[2]))) }}
                                                                @else
                                                                    {{ tgl_indo(date(date('Y', strtotime($timeline[1])) == date('Y', strtotime($timeline[2])) ? 'd-m ' : 'd-m-Y', strtotime($timeline[1]))) }}
                                                                    -
                                                                    {{ tgl_indo(date('d-m-Y', strtotime($timeline[2]))) }}
                                                                @endif
                                                            </time>
                                                            <h3 class="text-lg font-semibold text-gray-900">
                                                                {{ $timeline[0] }}</h3>
                                                            {{-- <p class="mb-4 text-base font-normal text-gray-500">
                                                        Get
                                                        access to over 20+ pages including a dashboard layout, charts,
                                                        kanban board,
                                                        calendar, and pre-order E-commerce & Marketing pages.</p>
                                                    <a href="#"
                                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-100 focus:text-blue-700">Learn
                                                        more <svg class="w-3 h-3 ms-2 rtl:rotate-180" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 14 10">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                                                        </svg></a> --}}
                                                        </li>
                                                    @endif
                                                @else
                                                    <li class="mb-10 ms-4">
                                                        <div
                                                            class="absolute w-3 h-3 bg-red-400 rounded-full mt-1.5 -start-1.5 border border-white">
                                                        </div>
                                                        <time class="mb-1 text-sm font-normal leading-none text-gray-400">
                                                            @if (date('d-m-Y', strtotime($timeline[2])) === date('d-m-Y', strtotime($timeline[1])))
                                                                {{ tgl_indo(date('d-m-Y', strtotime($timeline[2]))) }}
                                                            @else
                                                                {{ tgl_indo(date(date('Y', strtotime($timeline[1])) == date('Y', strtotime($timeline[2])) ? 'd-m ' : 'd-m-Y', strtotime($timeline[1]))) }}
                                                                -
                                                                {{ tgl_indo(date('d-m-Y', strtotime($timeline[2]))) }}
                                                            @endif
                                                        </time>
                                                        <h3 class="text-lg font-semibold text-gray-900">
                                                            {{ $timeline[0] }}</h3>
                                                        {{-- <p class="mb-4 text-base font-normal text-gray-500">
                                                        Get
                                                        access to over 20+ pages including a dashboard layout, charts,
                                                        kanban board,
                                                        calendar, and pre-order E-commerce & Marketing pages.</p>
                                                    <a href="#"
                                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-100 focus:text-blue-700">Learn
                                                        more <svg class="w-3 h-3 ms-2 rtl:rotate-180" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 14 10">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                                                        </svg></a> --}}
                                                    </li>
                                                @endif
                                            @endforeach

                                        </ol>

                                    </div>
                                </div>
                            @endif


                        @endif

                        @if ($proker->dokumentasi && $proker->is_dokumentasi_open)
                            <h6 id="accordion-flush-heading-2">
                                <button type="button"
                                    class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 gap-3"
                                    data-accordion-target="#accordion-flush-body-2" aria-expanded="true"
                                    aria-controls="accordion-flush-body-2">
                                    <span>Galeri</span>
                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M9 5 5 1 1 5" />
                                    </svg>
                                </button>
                            </h6>
                            <div id="accordion-flush-body-2" class="hidden px-4"
                                aria-labelledby="accordion-flush-heading-2">
                                <div class="py-5 border-b border-gray-200">
                                    <div id="gallery" class="relative w-full" data-carousel="slide">
                                        <!-- Carousel wrapper -->
                                        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                                            @foreach ($proker->dokumentasi as $key => $dokumentasi)
                                                <div class="hidden h-full w-full duration-700 ease-in-out"
                                                    data-carousel-item>
                                                    <img src="{{ asset('storage/' . $dokumentasi) }}"
                                                        alt="Dokumetasi {{ $key }}"
                                                        class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                                </div>
                                            @endforeach

                                        </div>
                                        <!-- Slider controls -->
                                        <button type="button"
                                            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                            data-carousel-prev>
                                            <span
                                                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30/30 group-hover:bg-white/50/60 group-focus:ring-4 group-focus:ring-white/70 group-focus:outline-none">
                                                <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                                                </svg>
                                                <span class="sr-only">Previous</span>
                                            </span>
                                        </button>
                                        <button type="button"
                                            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                            data-carousel-next>
                                            <span
                                                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30/30 group-hover:bg-white/50/60 group-focus:ring-4 group-focus:ring-white/70 group-focus:outline-none">
                                                <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                                </svg>
                                                <span class="sr-only">Next</span>
                                            </span>
                                        </button>
                                    </div>

                                </div>
                            </div>


                        @endif
                    </div>


                </div>
            </div>
        </div>
        </div>
        </div>
    </main>


@endsection
@section('style')
    <style>
        .proker-desc ul {
            padding-left: 2rem;
        }

        .proker-desc ul li {
            list-style: disc;

        }

        .proker-desc ol {
            padding-left: 2rem;

        }

        .proker-desc ol li {
            list-style: decimal;

        }
    </style>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

@endsection
