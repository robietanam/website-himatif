<nav class="relative flex flex-wrap items-center content-between py-3 px-4  main-navbar">
    <div class="flex flex-wrap  no-gutters w-full">
        <div class="relative flex-grow max-w-full flex-1 px-4">
            <ul class="flex flex-wrap list-reset pl-0 mb-0 mr-3">
                <li><a href="#" data-toggle="sidebar" class="inline-block py-2 px-4 no-underline nav-link-lg"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>
        </div>
        <div class="col-auto">
            <ul class="flex flex-wrap list-reset pl-0 mb-0 navbar-right">

                <li class="relative"><a href="#" data-bs-toggle="dropdown"
                        class="inline-block py-2 px-4 no-underline  inline-block w-0 h-0 ml-1 align border-b-0 border-t-1 border-r-1 border-l-1 nav-link-lg nav-link-user">
                        <div class="sm:hidden lg:inline-block">Hi, {{ \Auth::user()->name }}</div>
                    </a>
                    <div
                        class=" absolute left-0 z-50 float-left hidden list-reset	 py-2 mt-1 text-base bg-white border border-gray-300 rounded-md dropdown-menu-right">
                        {{-- <a href="features-profile.html" class="block w-full py-1 px-6 font-normal text-gray-900 whitespace-no-wrap border-0 has-icon">
                            <i class="far fa-user"></i> Profile
                        </a> --}}
                        {{-- <div class="h-0 my-2 overflow-hidden border-t-1 border-gray-300"></div> --}}
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="block w-full py-1 px-6 font-normal text-gray-900 whitespace-no-wrap border-0 has-icon text-12 text-red-600 flex items-center">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
