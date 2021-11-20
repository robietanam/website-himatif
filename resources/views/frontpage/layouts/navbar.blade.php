<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/logo.png') }}" class="navbar-brand-image mr-1" alt="Logo Himatif">
            <div class="navbar-brand-title">HIMATIF</div>
        </a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbar-top">
            <i class="text-md fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbar-top">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/') }}">BERANDA</a>
                </li>
                <li class="nav-item {{ Request::is('tentang') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/tentang') }}">TENTANG</a>
                </li>
                {{-- <li class="nav-item {{ Request::is('pengurus') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/pengurus') }}">DIVISI & PENGURUS</a>
                </li> --}}
                <li class="nav-item {{ Request::is('pengurus') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/pengurus') }}">DIVISI & PENGURUS</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#">PROKER</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="#">BERITA</a>
                </li>
                {{-- <div class="nav-item">
                    <a href="" class="btn btn-block btn-outline-info">HIMATIF HELPER</a>
                </div> --}}
            </ul>
        </div>
    </div>
</nav>
