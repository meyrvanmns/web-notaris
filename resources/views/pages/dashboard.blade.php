@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Dashboard Utama</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm px-3">
            <i class="fas fa-download fa-sm text-white-50 mr-2"></i> Generate Laporan
        </a>
    </div>

    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Arsip Dokumen</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_dokumen ?? '0' }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-invoice fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Client</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_client ?? '0' }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Biaya Layanan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                Rp {{ number_format($total_biaya ?? 0, 0, ',', '.') }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-wallet fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Permohonan Baru</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_permohonan ?? '0' }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-envelope-open-text fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card shadow mb-4 border-0">
                <div class="card-header py-3 bg-white">
                    <h6 class="m-0 font-weight-bold text-primary">Selamat Datang, {{ Auth::guard('web')->user()->full_name }}!</h6>
                </div>
                <div class="card-body text-center py-5">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 15rem;" 
                         src="{{ asset('template/img/undraw_posting_photo.svg') }}" alt="Welcome Image">
                    <h4 class="font-weight-bold text-dark">Sistem Informasi Notaris & PPAT</h4>
                    <p class="text-muted px-lg-5">Kelola dokumen, client, dan biaya layanan kantor Anda dalam satu dashboard terintegrasi yang aman dan efisien.</p>
                    <a href="/request-submissions" class="btn btn-primary rounded-pill px-4 shadow-sm">
                        <i class="fas fa-plus mr-2"></i> Kelola Permohonan
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            <div class="card shadow mb-4 border-0">
                <div class="card-header py-3 bg-white">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Sesi</h6>
                </div>
                <div class="card-body">
                    <div class="text-center mb-3">
                        <img class="img-profile rounded-circle border shadow-sm" style="width: 80px; height: 80px;" src="{{ asset('template/img/undraw_profile.svg') }}">
                    </div>
                    <p class="mb-1 text-center"><strong>{{ Auth::guard('web')->user()->full_name }}</strong></p>
                    <p class="text-center mb-3">
                        @php $role = Auth::guard('web')->user()->role; @endphp
                        @if($role == 'admin')
                            <span class="badge badge-danger px-3 py-2">Administrator Aktif</span>
                        @elseif($role == 'staff')
                            <span class="badge badge-primary px-3 py-2">Staff Notaris Aktif</span>
                        @else
                            <span class="badge badge-success px-3 py-2">{{ ucfirst($role) }} Aktif</span>
                        @endif
                    </p>
                    
                    <hr>
                    <div class="alert alert-info border-0 small">
                        <i class="fas fa-info-circle mr-1"></i> 
                        Sesi login Anda terpantau aman. Gunakan tombol logout jika ingin meninggalkan perangkat ini.
                    </div>
                    
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-block btn-sm mt-3">
                            <i class="fas fa-sign-out-alt mr-1"></i> Log Keluar Aplikasi
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection