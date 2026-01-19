<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Exception;

class ClientController extends Controller
{
    public function index()
    {
        // Mengambil data terbaru agar perubahan langsung terlihat di tabel
        $clients = Client::latest()->get();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'            => 'required|string|max:255',
            'identity_number' => 'required|string|max:100|unique:clients,identity_number',
            'address'         => 'required|string',
            'phone'           => 'nullable|string|max:20',
            'email'           => 'nullable|email',
            'status'          => 'required|in:aktif,non-aktif',
        ]);

        try {
            Client::create($validated);
            return redirect()->route('clients.index')->with('success', 'Data client berhasil disimpan.');
        } catch (Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.show', compact('client'));
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'            => 'required|string|max:255',
            'identity_number' => 'required|string|max:100|unique:clients,identity_number,'.$id,
            'address'         => 'required|string',
            'phone'           => 'required|string|max:20',
            'email'           => 'required|email',
            'status'          => 'required|in:aktif,non-aktif' // Disamakan dengan store
        ]);

        try {
            $client = Client::findOrFail($id);
            $client->update($validated);
            return redirect()->route('clients.index')->with('success', 'Data klien berhasil diperbarui.');
        } catch (Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data.');
        }
    }

    public function destroy($id)
    {
        try {
            $client = Client::findOrFail($id);
            $client->delete();
            return redirect()->route('clients.index')->with('success', 'Data klien berhasil dihapus.');
        } catch (Exception $e) {
            return redirect()->route('clients.index')->with('error', 'Gagal menghapus data.');
        }
    }
}