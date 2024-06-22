<nav class="bg-[#f3f2eb] border-[#ffc107] border-b-2 relative z-40 px-8 py-4">
    <div class="navbar ">
        <div class="navbar-start">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </div>
                <ul tabindex="0" class=" dropdown-content mt-3  p-2 shadow bg-white rounded-box w-52 px-5">
                    <li class="text-sm max-lg:py-3">
                        <a class="relative w-fit block  after:block after:content-[''] after:absolute after:h-[3px] 
                            after:bg-[#ffc107] after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-center 
                            {{ Request::is('/') ? 'after:scale-x-100' : '' }}"
                            href="{{ url('/') }}">BERANDA</a>

                    </li>
                    <li class="text-sm max-lg:py-3">
                        <a class="relative w-fit block after:block after:content-[''] after:absolute after:h-[3px] 
                            after:bg-[#ffc107] after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-center 
                            {{ Request::is('tentang') ? 'after:scale-x-100' : '' }}"
                            href="{{ url('/tentang') }}">TENTANG</a>
                    </li>
                    <li class="text-sm max-lg:py-3 ">
                        <a class="relative w-fit block after:block after:content-[''] after:absolute after:h-[3px] 
                        after:bg-[#ffc107] after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-center 
                        {{ Request::is('pengurus') ? 'after:scale-x-100' : '' }}"
                            href="{{ url('/pengurus') }}">DIVISI & PENGURUS</a>
                    </li>
                    <li class="text-sm max-lg:py-3">
                        <a class="relative w-fit block after:block after:content-[''] after:absolute after:h-[3px] 
                        after:bg-[#ffc107] after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-center 
                        {{ Request::is('proker*') ? 'after:scale-x-100' : '' }}"
                            href="{{ url('/proker') }}">PROKER</a>
                    </li>
                    <li class="text-sm max-lg:py-3">
                        <a class="relative w-fit block after:block after:content-[''] after:absolute after:h-[3px] 
                        after:bg-[#ffc107] after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-center 
                        {{ Request::is('berita*') ? 'after:scale-x-100' : '' }}"
                            href="{{ url('/berita') }}">BERITA</a>
                    </li>
                    <li class="text-sm max-lg:py-3 group ">
                        <a
                            class="z-30 text-black cursor-pointer relative w-fit block after:block after:content-[''] after:absolute after:h-[3px] 
                            after:bg-[#ffc107] after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-center 
                            {{ Request::is('nim-checker') || Request::is('CakapxHimatif') ? 'after:scale-x-100' : '' }}">
                            LAINNYA
                        </a>
                        <ul class="p-2 ">
                            <li><a class="py-3 mx-2 text-black cursor-pointer relative w-fit block after:block after:content-[''] after:absolute after:h-[3px] 
                                    after:bg-[#ffc107] after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-center 
                                    {{ Request::is('nim-checker') ? 'after:scale-x-100' : '' }}"
                                    href="{{ url('/nim-checker') }}">
                                    NIM CHECKER
                                </a>
                            </li>
                            <li><a class="py-3 mx-2 text-black cursor-pointer relative w-fit block after:block after:content-[''] after:absolute after:h-[3px] 
                                after:bg-[#ffc107] after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-center 
                                {{ Request::is('CakapxHimatif') ? 'after:scale-x-100' : '' }}"
                                    href="{{ url('/CakapxHimatif') }}">
                                    CAKAPxHIMATIF
                                </a>
                            </li>
                        </ul>

                    </li>

                </ul>
            </div>
            <a class="flex items-center space-x-2 rtl:space-x-reverse" href="{{ route('frontpage.homepage') }}">
                <img src="{{ asset('img/logo.png') }}" class="navbar-brand-image h-8" alt="Logo Himatif">
                <div class="self-center text-xl font-semibold whitespace-nowrap ">HIMATIF</div>
            </a>
        </div>
        <div class="navbar-center hidden bg-transparent lg:flex">
            <ul
                class="flex flex-col font-medium p-6 md:p-0 mt-4 border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0  ">
                <li class="text-sm max-md:py-3">
                    <a class="relative w-fit block after:block after:content-[''] after:absolute after:h-[3px] 
                            after:bg-[#ffc107] after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-center 
                            {{ Request::is('/') ? 'after:scale-x-100' : '' }}"
                        href="{{ url('/') }}">BERANDA</a>

                </li>
                <li class="text-sm max-md:py-3">
                    <a class="relative w-fit block after:block after:content-[''] after:absolute after:h-[3px] 
                            after:bg-[#ffc107] after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-center 
                            {{ Request::is('tentang') ? 'after:scale-x-100' : '' }}"
                        href="{{ url('/tentang') }}">TENTANG</a>
                </li>
                <li class="text-sm max-md:py-3 ">
                    <a class="relative w-fit block after:block after:content-[''] after:absolute after:h-[3px] 
                        after:bg-[#ffc107] after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-center 
                        {{ Request::is('pengurus') ? 'after:scale-x-100' : '' }}"
                        href="{{ url('/pengurus') }}">DIVISI & PENGURUS</a>
                </li>
                <li class="text-sm max-md:py-3">
                    <a class="relative w-fit block after:block after:content-[''] after:absolute after:h-[3px] 
                        after:bg-[#ffc107] after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-center 
                        {{ Request::is('proker*') ? 'after:scale-x-100' : '' }}"
                        href="{{ url('/proker') }}">PROKER</a>
                </li>
                <li class="text-sm max-md:py-3">
                    <a class="relative w-fit block after:block after:content-[''] after:absolute after:h-[3px] 
                        after:bg-[#ffc107] after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-center 
                        {{ Request::is('berita*') ? 'after:scale-x-100' : '' }}"
                        href="{{ url('/berita') }}">BERITA</a>
                </li>
                <li class="text-sm max-md:py-3 group ">
                    <a
                        class="z-30 text-black cursor-pointer relative w-fit block after:block after:content-[''] after:absolute after:h-[3px] 
                        after:bg-[#ffc107] after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-center 
                        {{ Request::is('nim-checker') || Request::is('CakapxHimatif') ? 'after:scale-x-100' : '' }}">
                        LAINNYA
                    </a>

                    <ul class="hidden group-hover:block absolute  -ml-24 ">
                        <div class="h-2"></div>
                        <div class="bg-white rounded-lg z-20 shadow-md py-2 px-4 flex flex-col gap-2">
                            <li>
                                <a class="pt-2 w-32 text-center text-black cursor-pointer relative  block after:block after:content-[''] after:absolute after:h-[3px] 
                                    after:bg-[#ffc107] after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-center 
                                    {{ Request::is('nim-checker') ? 'after:scale-x-100' : '' }}"
                                    href="{{ url('/nim-checker') }}">
                                    NIM CHECKER
                                </a>
                            </li>
                            <li>
                                <a class="py-2 w-32 text-center text-black cursor-pointer relative block after:block after:content-[''] after:absolute after:h-[3px] 
                                after:bg-[#ffc107] after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-center 
                                {{ Request::is('CakapxHimatif') ? 'after:scale-x-100' : '' }}"
                                    href="{{ url('/CakapxHimatif') }}">
                                    CAKAPxHIMATIF
                                </a>
                            </li>
                        </div>


                    </ul>

                </li>
            </ul>
        </div>

    </div>
    {{-- <div class="max-w-screen-xl flex flex-wrap items-center justify-between  space-x-5 mx-auto p-6">
        <a class="flex items-center space-x-2 rtl:space-x-reverse" href="{{ route('frontpage.homepage') }}">
            <img src="{{ asset('img/logo.png') }}" class="navbar-brand-image h-8" alt="Logo Himatif">
            <div class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">HIMATIF</div>
        </a>

        <button data-collapse-toggle="navbar-dropdown" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-dropdown" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 mb-2 font-medium leading-tight text-lg" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>

        <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
            <ul
                class="flex flex-col font-medium p-6 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li class="text-sm max-md:py-3">
                    <a class="relative w-fit block after:block after:content-[''] after:absolute after:h-[3px] 
                            after:bg-[#ffc107] after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-center 
                            {{ Request::is('/') ? 'after:scale-x-100' : '' }}"
                        href="{{ url('/') }}">BERANDA</a>

                </li>
                <li class="text-sm max-md:py-3">
                    <a class="relative w-fit block after:block after:content-[''] after:absolute after:h-[3px] 
                            after:bg-[#ffc107] after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-center 
                            {{ Request::is('tentang') ? 'after:scale-x-100' : '' }}"
                        href="{{ url('/tentang') }}">TENTANG</a>
                </li>
                <li class="text-sm max-md:py-3 ">
                    <a class="relative w-fit block after:block after:content-[''] after:absolute after:h-[3px] 
                        after:bg-[#ffc107] after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-center 
                        {{ Request::is('pengurus') ? 'after:scale-x-100' : '' }}"
                        href="{{ url('/pengurus') }}">DIVISI & PENGURUS</a>
                </li>
                <li class="text-sm max-md:py-3">
                    <a class="relative w-fit block after:block after:content-[''] after:absolute after:h-[3px] 
                        after:bg-[#ffc107] after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-center 
                        {{ Request::is('proker*') ? 'after:scale-x-100' : '' }}"
                        href="{{ url('/proker') }}">PROKER</a>
                </li>
                <li class="text-sm max-md:py-3">
                    <a class="relative w-fit block after:block after:content-[''] after:absolute after:h-[3px] 
                        after:bg-[#ffc107] after:w-full after:scale-x-0 after:hover:scale-x-100 after:transition after:duration-300 after:origin-center 
                        {{ Request::is('berita*') ? 'after:scale-x-100' : '' }}"
                        href="{{ url('/berita') }}">BERITA</a>
                </li>
            </ul>
        </div>
    </div> --}}
</nav>
