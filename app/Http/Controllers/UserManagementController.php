<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserManagementController extends Controller
{
    /**
     * Admin & Staff: lihat daftar user
     */
    public function index()
    {
        $authUser = Auth::user();

        if (!in_array($authUser->role, ['admin', 'staff'])) {
            abort(403);
        }

        $users = User::latest()->get();

        return view('users.index', compact('users'));
    }

    /**
     * Admin & Staff: form tambah user
     */
    public function create()
    {
        $authUser = Auth::user();

        if (!in_array($authUser->role, ['admin', 'staff'])) {
            abort(403);
        }

        return view('users.create');
    }

    /**
     * Simpan user baru
     */
    public function store(Request $request)
    {
        $authUser = Auth::user();

        if (!in_array($authUser->role, ['admin', 'staff'])) {
            abort(403);
        }

        $allowedRoles = $authUser->role === 'admin'
            ? ['admin', 'staff', 'user']
            : ['user'];

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email'     => 'required|email|unique:users',
            'username'  => 'required|unique:users',
            'role'      => 'required|in:' . implode(',', $allowedRoles),
            'password'  => 'required|min:6|confirmed', // pastikan ada password_confirmation di form
            'status'    => 'required|in:aktif,non-aktif',
        ]);

        // Hash password
        $validated['password'] = Hash::make($validated['password']);

        // Simpan user
        User::create($validated);

        return redirect()->route('users.index') // route name sudah sesuai web.php
            ->with('success', 'User berhasil ditambahkan');
    }

    /**
     * Form edit user
     */
    public function edit(User $user)
    {
        $authUser = Auth::user();

        if (!in_array($authUser->role, ['admin', 'staff'])) {
            abort(403);
        }

        if ($authUser->role === 'staff' && $user->role !== 'user') {
            abort(403);
        }

        return view('users.edit', compact('user'));
    }

    /**
     * Update user
     */
    public function update(Request $request, User $user)
    {
        $authUser = Auth::user();

        if (!in_array($authUser->role, ['admin', 'staff'])) {
            abort(403);
        }

        if ($authUser->role === 'staff' && $user->role !== 'user') {
            abort(403);
        }

        $allowedRoles = $authUser->role === 'admin'
            ? ['admin', 'staff', 'user']
            : ['user'];

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email,' . $user->id,
            'username'  => 'required|unique:users,username,' . $user->id,
            'role'      => 'required|in:' . implode(',', $allowedRoles),
            'password'  => 'nullable|min:6|confirmed',
            'status'    => 'required|in:aktif,non-aktif',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('users.index')
            ->with('success', 'User berhasil diperbarui');
    }

    /**
     * Hapus user (ADMIN ONLY)
     */
    public function destroy(User $user)
    {
        $authUser = Auth::user();

        if ($authUser->role !== 'admin') {
            abort(403);
        }

        if ($authUser->id === $user->id) {
            abort(403); // tidak boleh hapus diri sendiri
        }

        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User berhasil dihapus');
    }
}
