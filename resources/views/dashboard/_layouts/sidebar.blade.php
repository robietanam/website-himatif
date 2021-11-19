<div class="main-sidebar">
    <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html">Stisla</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li>
            <a href="#" class="nav-link">
                <i class="fas fa-fire"></i> <span>Dashboard</span>
            </a>
        </li>

        <li class="menu-header">Opearasi Organisasi</li>
        {{-- <li class="nav-item {{ Request::is('dashboard/admin/keanggotaan*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.admin.keanggotaan.index') }}" class="nav-link">
                <i class="fas fa-users"></i> <span>Keanggotaan</span>
            </a>
        </li> --}}
        <li class="nav-item {{ Request::is('dashboard/admin/posts*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.admin.posts.index') }}" class="nav-link">
                <i class="fas fa-image"></i> <span>Post</span>
            </a>
        </li>

        <li class="menu-header">Pages</li>
        <li class="nav-item {{ Request::is("dashboard/admin/page-contents*") ? 'active' : '' }}">
            <a href="{{ url('/dashboard/admin/page-contents') }}" class="nav-link">
                <i class="fas fa-image"></i> <span>Atur Konten</span>
            </a>
        </li>
    </aside>
</div>
