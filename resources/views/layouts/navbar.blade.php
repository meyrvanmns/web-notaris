<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow-sm">

    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars text-primary"></i>
    </button>

    <div class="d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100">
        <h6 class="mb-0 text-gray-600">Sistem Informasi Notaris & PPAT</h6>
        <small class="text-muted">{{ date('d F Y') }}</small>
    </div>

    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown">
                <i class="fas fa-bell fa-fw text-gray-400"></i>
                <span class="badge badge-danger badge-counter">3+</span>
            </a>
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in">
                <h6 class="dropdown-header">Pusat Notifikasi</h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">Baru Saja</div>
                        <span class="font-weight-bold">Permohonan akta baru dari Klien: Budi Santoso</span>
                    </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Lihat Semua Notifikasi</a>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <div class="d-flex flex-column align-items-end mr-3">
                    @auth('web')
                        <span class="text-gray-800 small font-weight-bold">
                            {{ Auth::guard('web')->user()->full_name }}
                        </span>
                        <span class="text-gray-500 mb-0" style="font-size: 10px; text-transform: uppercase;">
                            {{ Auth::guard('web')->user()->role ?? 'Staff' }}
                        </span>
                    @endauth
                </div>
                <div class="position-relative">
                    <img class="img-profile rounded-circle border" src="{{ asset('template/img/undraw_profile.svg') }}">
                    <div class="bg-success position-absolute" style="width: 12px; height: 12px; border-radius: 50%; bottom: 0; right: 0; border: 2px solid white;"></div>
                </div>
            </a>

            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profil Saya
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Log Aktivitas
                </a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger font-weight-bold">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                        Keluar Aplikasi
                    </button>
                </form>
            </div>
        </li>
    </ul>

</nav>