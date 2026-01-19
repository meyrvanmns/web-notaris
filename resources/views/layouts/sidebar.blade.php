<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
            {{-- Icon opsional --}}
        </div>
        <div class="sidebar-brand-text mx-3">NOTARIS</div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <!-- Pengelola Permohonan -->
    <li class="nav-item {{ request()->is('request-submissions*') ? 'active' : '' }}">
        <a class="nav-link" href="/request-submissions">
            <i class="fas fa-fw fa-folder-open"></i>
            <span>Pengelola Permohonan</span>
        </a>
    </li>

    <!-- Data Client -->
    <li class="nav-item {{ request()->is('clients*') ? 'active' : '' }}">
        <a class="nav-link" href="/clients">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Client</span>
        </a>
    </li>

    <!-- Jenis Layanan -->
    <li class="nav-item {{ request()->is('ppat-services*') || request()->is('notary-services*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-briefcase"></i>
            <span>Jenis Layanan</span>
        </a>
        <div id="collapseTwo" class="collapse">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pilih Layanan:</h6>
                <a class="collapse-item" href="/ppat-services">Layanan PPAT</a>
                <a class="collapse-item" href="/notary-services">Layanan Notaris</a>
            </div>
        </div>
    </li>

    <!-- Biaya Layanan -->
    <li class="nav-item {{ request()->is('service-fees*') ? 'active' : '' }}">
        <a class="nav-link" href="/service-fees">
            <i class="fas fa-fw fa-money-bill-wave"></i>
            <span>Biaya Layanan</span>
        </a>
    </li>

    <!-- Arsip Dokumen -->
    <li class="nav-item {{ request()->is('documents*') ? 'active' : '' }}">
        <a class="nav-link" href="/documents">
            <i class="fas fa-fw fa-archive"></i>
            <span>Arsip Dokumen</span>
        </a>
    </li>

    {{-- ===================== --}}
    {{-- USER MANAGEMENT --}}
    {{-- ADMIN & NOTARIS ONLY --}}
    {{-- ===================== --}}
    @if(auth()->check() && in_array(auth()->user()->role, ['admin', 'staff']))
        <li class="nav-item {{ request()->is('user-management*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('users.index') }}">
                <i class="fas fa-fw fa-user-cog"></i>
                <span>User Management</span>
            </a>
        </li>
    @endif

    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
