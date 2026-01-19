<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion shadow-lg" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center my-3" href="/dashboard">
        <div class="sidebar-brand-icon">
            <i class="fas fa-balance-scale fa-2x"></i> </div>
        <div class="sidebar-brand-text mx-3">SI NOTARIS</div>
    </a>

    <hr class="sidebar-divider my-0">

    <div class="sidebar-heading mt-3" style="font-size: 0.65rem; opacity: 0.7;">
        MAIN NAVIGATION
    </div>

    <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
        <a class="nav-link py-2" href="/dashboard">
            <i class="fas fa-fw fa-th-large"></i> <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading" style="font-size: 0.65rem; opacity: 0.7;">
        OFFICE MANAGEMENT
    </div>

    <li class="nav-item {{ request()->is('request-submissions*') ? 'active' : '' }}">
        <a class="nav-link py-2" href="/request-submissions">
            <i class="fas fa-fw fa-file-signature"></i> <span>Pengelolaan Permohonan</span>
        </a>
    </li>

    <li class="nav-item {{ request()->is('clients*') ? 'active' : '' }}">
        <a class="nav-link py-2" href="/clients">
            <i class="fas fa-fw fa-address-book"></i>
            <span>Data Client</span>
        </a>
    </li>

    <li class="nav-item {{ request()->is('ppat-services*') || request()->is('notary-services*') ? 'active' : '' }}">
        <a class="nav-link py-2 collapsed" href="#" data-toggle="collapse" data-target="#collapseLayanan"
           aria-expanded="true" aria-controls="collapseLayanan">
            <i class="fas fa-fw fa-layer-group"></i>
            <span>Katalog Layanan</span>
        </a>
        <div id="collapseLayanan" class="collapse {{ request()->is('ppat-services*') || request()->is('notary-services*') ? 'show' : '' }}">
            <div class="bg-white py-2 collapse-inner rounded shadow-sm">
                <a class="collapse-item {{ request()->is('ppat-services*') ? 'active' : '' }}" href="/ppat-services">Layanan PPAT</a>
                <a class="collapse-item {{ request()->is('notary-services*') ? 'active' : '' }}" href="/notary-services">Layanan Notaris</a>
            </div>
        </div>
    </li>

    <li class="nav-item {{ request()->is('service-fees*') ? 'active' : '' }}">
        <a class="nav-link py-2" href="/service-fees">
            <i class="fas fa-fw fa-wallet"></i>
            <span>Biaya Layanan</span>
        </a>
    </li>

    <li class="nav-item {{ request()->is('documents*') ? 'active' : '' }}">
        <a class="nav-link py-2" href="/documents">
            <i class="fas fa-fw fa-file-invoice"></i>
            <span>Arsip Dokumen</span>
        </a>
    </li>

    {{-- SYSTEM CONTROL --}}
    @if(auth()->check() && in_array(auth()->user()->role, ['admin', 'staff']))
        <hr class="sidebar-divider">
        <div class="sidebar-heading" style="font-size: 0.65rem; opacity: 0.7;">
            SETTINGS
        </div>
        <li class="nav-item {{ request()->is('user-management*') ? 'active' : '' }}">
            <a class="nav-link py-2" href="{{ route('users.index') }}">
                <i class="fas fa-fw fa-user-shield"></i>
                <span>User Management</span>
            </a>
        </li>
    @endif

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline mt-4">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>