<ul class="navbar-nav bg-gradient-white sidebar sidebar-light accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <img src="https://d2s1u1uyrl4yfi.cloudfront.net/birokesra/favicon/98701389f45528a5961e6cf539302550.webp"
            alt="Biro Kesra Logo" width="60" height="50">
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
     @if (Auth()->user()->role == 'admin')
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
    

        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
    @endif 
    <li class="nav-item ">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
    <li class="nav-item ">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-solid fa-book"></i>
                <span>Panduan Arsip</span></a>
        </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- sidebar item -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('tu') }}" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-folder"></i>
            <span>Tata Usaha</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('yandas') }}" aria-expanded="true"
            aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pelayanan Dasar</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('npd') }}" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-folder"></i>
            <span>Non-Pelayanan Dasar</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('bms') }}" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-folder"></i>
            <span>Bina Mental Speritual</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    @if (Auth()->user()->role == 'admin')
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.index') }}" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-user"></i>
                <span>Admin</span>
            </a>
        </li>
    @endif

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
