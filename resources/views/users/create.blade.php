@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Tambah User Baru</h3>

    {{-- Route sudah disesuaikan dengan web.php --}}
    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        {{-- Nama Lengkap --}}
        <div class="mb-3">
            <label class="form-label">Nama Lengkap</label>
            <input 
                type="text" 
                name="full_name" 
                class="form-control @error('full_name') is-invalid @enderror" 
                value="{{ old('full_name') }}" 
                required
            >
            @error('full_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Role --}}
        <div class="mb-3">
            <label class="form-label">Role</label>
            <select 
                name="role" 
                class="form-control @error('role') is-invalid @enderror" 
                required
            >
                <option value="">-- Pilih Role --</option>

                {{-- Semua (Admin & Notaris) boleh buat User --}}
                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>
                    User
                </option>

                {{-- HANYA ADMIN --}}
                @if(auth()->user()->role === 'admin')
                    <option value="staff" {{ old('role') == 'staff' ? 'selected' : '' }}>
                        Staff / Notaris
                    </option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>
                        Admin
                    </option>
                @endif
            </select>

            @error('role')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Email --}}
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input 
                type="email" 
                name="email" 
                class="form-control @error('email') is-invalid @enderror" 
                value="{{ old('email') }}" 
                required
            >
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Username --}}
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input 
                type="text" 
                name="username" 
                class="form-control @error('username') is-invalid @enderror" 
                value="{{ old('username') }}" 
                required
            >
            @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Password --}}
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input 
                type="password" 
                name="password" 
                class="form-control @error('password') is-invalid @enderror" 
                required
            >
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Konfirmasi Password --}}
        <div class="mb-3">
            <label class="form-label">Konfirmasi Password</label>
            <input 
                type="password" 
                name="password_confirmation" 
                class="form-control @error('password_confirmation') is-invalid @enderror" 
                required
            >
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Status --}}
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select 
                name="status" 
                class="form-control @error('status') is-invalid @enderror" 
                required
            >
                <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>
                    Aktif
                </option>
                <option value="non-aktif" {{ old('status') == 'non-aktif' ? 'selected' : '' }}>
                    Non-Aktif
                </option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Button --}}
        <div class="d-flex justify-content-end">
            <a href="{{ route('users.index') }}" class="btn btn-secondary me-2">
                Kembali
            </a>
            <button type="submit" class="btn btn-primary">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
