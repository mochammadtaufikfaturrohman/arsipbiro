<ul class="navbar-nav bg-gradient-white sidebar sidebar-light accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <img src="https://d2s1u1uyrl4yfi.cloudfront.net/birokesra/favicon/98701389f45528a5961e6cf539302550.webp"
            alt="Biro Kesra Logo" width="60" height="50">
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-chart-area"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('panduan') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('panduan') }}">
            <i class="fas fa-fw fa-solid fa-book"></i>
            <span>Panduan Arsip</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Items -->
    <li class="nav-item {{ request()->routeIs('tu') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('tu') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Tata Usaha</span>
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('yandas') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('yandas') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pelayanan Dasar</span>
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('npd') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('npd') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Non-Pelayanan Dasar</span>
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('bms') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('bms') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Bina Mental Spiritual</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    @if (Auth()->user()->role == 'admin')
        <li class="nav-item {{ request()->routeIs('admin.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.index') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>Admin</span>
            </a>
        </li>
    @endif

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
