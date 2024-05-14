<nav class="navbar navbar-expand-lg main-navbar">
    <div class="row no-gutters w-100">
        <div class="col">
            <ul class="navbar-nav mr-3">
                <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </div>
        <div class="col-auto">
            <ul class="navbar-nav navbar-right">
                <li class="dropdown"><a href="#" data-bs-toggle="dropdown"
                        class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <div class="d-sm-none d-lg-inline-block">Hi, {{ \Auth::user()->name }}</div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        {{-- <a href="features-profile.html" class="dropdown-item has-icon">
                            <i class="far fa-user"></i> Profile
                        </a> --}}
                        {{-- <div class="dropdown-divider"></div> --}}
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="dropdown-item has-icon text-12 text-danger d-flex align-items-center">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
