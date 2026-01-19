@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-3">Manajemen User</h3>

    <a href="{{ route('users.create') }}" class="btn btn-success mb-3">
        <i class="fas fa-user-plus"></i> Tambah User
    </a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Dibuat</th>
                    <th width="120">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $u)
                    <tr>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>
                            <span class="badge 
                                {{ $u->role === 'admin' ? 'bg-danger' : ($u->role === 'staff' ? 'bg-warning text-dark' : 'bg-secondary') }}">
                                {{ ucfirst($u->role) }}
                            </span>
                        </td>
                        <td>{{ $u->created_at->format('d M Y') }}</td>
                        <td>
                            <div class="d-flex gap-1">

                                {{-- Admin saja yang boleh hapus --}}
                                @if(auth()->user()->role === 'admin')

                                    {{-- Tidak bisa hapus akun sendiri --}}
                                    @if(auth()->id() !== $u->id)
                                        <form action="{{ route('users.destroy', $u->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-muted small">Akun Anda</span>
                                    @endif

                                @else
                                    {{-- Staff hanya bisa melihat --}}
                                    <span class="text-muted small">View only</span>
                                @endif

                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            Data user belum tersedia
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
