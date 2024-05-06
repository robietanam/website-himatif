<footer class="footer">
    <div class="container mx-auto sm:px-4">
        <div class="flex flex-wrap justify-between py-5">
            <div class="lg:w-1/3 pr-4 pl-4">
                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/logo.png') }}" alt="" width="70px" class="mr-1">
                    <h3 class="text-dec text-dec-warning-2 text-dec-tr text-white font-bold mb-0">
                        HIMATIF
                    </h3>
                </div>
                <h6 class="text-link font-weight-semibold mb-6">
                    Jalan. Kalimantan No. 37, Kampus
                    Tegalboto, Jember, Jawa Timur,
                    68121, Indonesia
                </h6>

                <h5 class="text-white font-bold mb-5">SOCIAL</h5>
                <div class="flex flex-wrap  gutters-xs mb-1">
                    <div class="col-auto"><img src="{{ asset('img/icons/instagram.svg') }}" alt=""></div>
                    <div class="relative flex-grow max-w-full flex-1 px-4">
                        <h6 class="text-white font-weight-semibold">
                            <a href="https://www.instagram.com/himatifunej/" target="_blank">@himatifunej</a>
                        </h6>
                    </div>
                </div>
                <div class="flex flex-wrap  gutters-xs mb-1">
                    <div class="col-auto"><img src="{{ asset('img/icons/youtube.svg') }}" alt=""></div>
                    <div class="relative flex-grow max-w-full flex-1 px-4">
                        {{-- <h6 class="text-white font-weight-semibold">himatifilkom</h6> --}}
                        <h6 class="text-white font-weight-semibold">
                            <a href="https://www.youtube.com/@himatifunej3573" target="_blank">Himatif
                                Unej</a>
                        </h6>
                    </div>
                </div>
                <div class="flex flex-wrap  gutters-xs mb-1">
                    <div class="col-auto"><img src="{{ asset('img/icons/tiktok.svg') }}" alt=""></div>
                    <div class="relative flex-grow max-w-full flex-1 px-4">
                        {{-- <h6 class="text-white font-weight-semibold">himatifilkom</h6> --}}
                        <h6 class="text-white font-weight-semibold">
                            <a href="https://www.tiktok.com/@himatifunej" target="_blank">@himatifunej</a>
                        </h6>
                    </div>
                </div>
                <div class="flex flex-wrap  gutters-xs mb-1">
                    <div class="col-auto"><img src="{{ asset('img/icons/linkedin.svg') }}" alt=""></div>
                    <div class="relative flex-grow max-w-full flex-1 px-4">
                        {{-- <h6 class="text-white font-weight-semibold">himatifilkom</h6> --}}
                        <h6 class="text-white font-weight-semibold">
                            <a href="https://www.linkedin.com/company/himatifunej" target="_blank">Himatif Unej</a>
                        </h6>
                    </div>
                </div>
            </div>
            {{-- divider --}}
            <div class="w-full lg:hidden py-5 px-3">
                <div class="divider bg-white opacity-50 my-1"></div>
            </div>

            <div class="md:w-1/2 lg:w-1/4 pr-4 pl-4 lg:mx-1/6 py-4">
                <h5 class="text-white font-extrabold mb-2">NAVIGASI</h5>
                <ul class="flex flex-wrap list-none pl-0 mb-0 flex-col">
                    <li class="">
                        <a class="inline-block py-2 px-4 no-underline text-white font-weight-semibold pl-0 active"
                            href="{{ route('frontpage.homepage') }}">BERANDA</a>
                    </li>
                    <li class="">
                        <a class="inline-block py-2 px-4 no-underline text-white font-weight-semibold pl-0 active"
                            href="{{ route('frontpage.about') }}">TENTANG</a>
                    </li>
                    <li class="">
                        <a class="inline-block py-2 px-4 no-underline text-white font-weight-semibold pl-0 active"
                            href="{{ route('frontpage.pengurus') }}">DIVISI & PENGURUS</a>
                    </li>
                    <li class="">
                        <a class="inline-block py-2 px-4 no-underline  text-white font-weight-semibold pl-0"
                            href="{{ route('frontpage.proker') }}">PROKER</a>
                    </li>
                    <li class="">
                        <a class="inline-block py-2 px-4 no-underline  text-white font-weight-semibold pl-0"
                            href="{{ route('frontpage.berita') }}">BERITA</a>
                    </li>
                </ul>
            </div>
            {{-- divider --}}
            <div class="w-full lg:hidden py-5 px-3">
                <div class="divider bg-white opacity-50 my-1"></div>
            </div>

            <div class="md:w-1/2 pr-4 pl-4 lg:w-1/3 pr-4 pl-4 pt-2">
                <h5 class="text-white font-weight-extrabold mb-2">BERITA TERBARU</h5>

                {{-- list new info --}}
                @foreach (\App\Models\Post::take(3)->get() as $post)
                    <div class="flex flex-wrap  gutters-sm items-center mb-1">
                        <div class="col-auto">
                            <div
                                class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300">
                                <div class="flex-auto p-6" style="padding: .5rem">
                                    <div class="img-fit img-fit-cover w-[3rem] h-[3rem]">
                                        @if ($post->photo)
                                            <img src="{{ asset('storage/' . $post->photo) }}" alt="">
                                        @else
                                            <img src="{{ asset('img/placeholder/product-image-default.svg') }}"
                                                alt="">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="relative flex-grow max-w-full flex-1 px-4">
                            <a href="{{ route('frontpage.berita.show', $post->slug) }}"
                                class="text-14 text-link font-semibold">
                                {{ substr(strip_tags($post->title), 0, 20) . (strlen(strip_tags($post->title)) > 20 ? '...' : '') }}
                            </a>
                            <div class="text-sm font-light text-link op-7">
                                {{ substr(strip_tags($post->title), 0, 30) . (strlen(strip_tags($post->title)) > 30 ? '...' : '') }}
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- end of list new info --}}
                <div class="flex items-center text-white font-weight-semibold mt-2">
                    <a href="{{ route('frontpage.berita') }}" class="text-white">
                        Lihat Semua Blog
                    </a>
                    <i class="fas fa-arrow-right text-height-0 ml-1"></i>
                </div>

            </div>
        </div>

        <div class="w-full lg:hidden py-5 px-3">
            <div class="divider bg-white opacity-50 my-1"></div>
        </div>
        <div class="text-link text-center font-bold">Copyright &copy; {{ date('Y') }}. Himatif, All rights
            reserved </div>
    </div>
</footer>
