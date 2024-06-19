<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <style>
            .sidebar-brand a {
                color: #000;
                /* Warna teks */
                text-decoration: none;
                /* Menghilangkan garis bawah pada tautan */
                font-weight: bold;
                /* Menambah ketebalan pada font */
                transition: color 0.3s;
                /* Efek transisi perubahan warna selama 0.3 detik */
            }

            .sidebar-brand a:hover {
                color: #007bff;
                /* Warna teks saat dihover */
            }
        </style>
        <div class="sidebar-brand">
            <a href="{{ route('frontpage.homepage') }}">Kembali Ke Beranda</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">HMTF</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>

            {{-- Sidebar user logic --}}
            @if (\Auth::user()->role->slug === 'admin')
                <li class="nav-item {{ Request::is('dashboard/admin') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.admin.index') }}" class="nav-link">
                        <i class="fas fa-fire"></i> <span>Dashboard</span>
                    </a>
                </li>

                <li class="menu-header">Opearasi Organisasi</li>
                <li class="nav-item {{ Request::is('dashboard/admin/users*') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.admin.users.index') }}" class="nav-link">
                        <i class="fas fa-users"></i> <span>Keanggotaan</span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('dashboard/admin/divisions*') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.admin.divisions.index') }}" class="nav-link">
                        <i class="fas fa-users-cog"></i> <span>Divisi</span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('dashboard/admin/prokers*') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.admin.prokers.index') }}" class="nav-link">
                        <i class="fas fa-briefcase"></i> <span>Proker</span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('dashboard/admin/posts*') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.admin.posts.index') }}" class="nav-link">
                        <i class="fas fa-image"></i> <span>Post</span>
                    </a>
                </li>

                <li class="menu-header">Pages</li>
                <li class="nav-item {{ Request::is('dashboard/admin/page-contents*') ? 'active' : '' }}">
                    <a href="{{ url('/dashboard/admin/page-contents') }}" class="nav-link">
                        <i class="fas fa-pager"></i> <span>Atur Konten</span>
                    </a>
                </li>

                <li class="menu-header">Lainnya</li>
                <li class="nav-item {{ Request::is('dashboard/admin/nim-checker') ? 'active' : '' }}">
                    <a href="{{ url('/dashboard/admin/nim-checker') }}" class="nav-link">
                        <i class="fas fa-pager"></i> <span>NIM Checker</span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('dashboard/admin/cakap') ? 'active' : '' }}">
                    <a href="{{ url('/dashboard/admin/cakap?status=0') }}" class="nav-link">
                        <i class="fas fa-pager"></i> <span>CakapXHimatif</span>
                    </a>
                </li>
            @else
                <li class="nav-item {{ Request::is('dashboard/pengurus') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.pengurus.index') }}" class="nav-link">
                        <i class="fas fa-fire"></i> <span>Dashboard</span>
                    </a>
                </li>

                <li class="menu-header">Opearasi Organisasi</li>
                <li class="nav-item {{ Request::is('dashboard/pengurus/prokers*') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.pengurus.prokers.index') }}" class="nav-link">
                        <i class="fas fa-briefcase"></i> <span>Proker Saya</span>
                    </a>
                </li>
            @endif
    </aside>
</div>
