<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Pastikan Model-model ini sudah dibuat filenya di folder app/Models
use App\Models\Document; 
use App\Models\Client;
use App\Models\ServiceFee;
use App\Models\RequestSubmission;

class DashboardController extends Controller
{
    public function index()
    {
        // Menggunakan query builder langsung untuk memastikan data terbaru dari database
        
        // 1. Menghitung total arsip dokumen
        $total_dokumen = Document::count() ?? 0;

        // 2. Menghitung total client yang terdaftar
        $total_client = Client::count() ?? 0;

        // 3. Menghitung total uang/biaya layanan yang masuk
        // Ganti 'amount' dengan nama kolom nominal uang di tabel service_fees Anda
        $total_biaya = ServiceFee::sum('amount') ?? 0; 

        // 4. Menghitung jumlah permohonan baru
        $total_permohonan = RequestSubmission::count() ?? 0;

        // Pastikan path view sesuai dengan struktur folder Anda: resources/views/pages/dashboard.blade.php
        return view('pages.dashboard', compact(
            'total_dokumen', 
            'total_client', 
            'total_biaya', 
            'total_permohonan'
        ));
    }
}