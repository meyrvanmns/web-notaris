<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document; 
use App\Models\Client;
use App\Models\ServiceFee;
use App\Models\RequestSubmission;

class DashboardController extends Controller
{
    public function index()
    {
        // Total arsip dokumen
        $total_dokumen = Document::count();

        // Total client
        $total_client = Client::count();

        // Total biaya layanan
        $total_biaya = ServiceFee::sum('total_amount'); // pastikan sesuai nama kolom di DB

        // Jumlah permohonan baru
        $total_permohonan = RequestSubmission::count();

        return view('pages.dashboard', compact(
            'total_dokumen', 
            'total_client', 
            'total_biaya', 
            'total_permohonan'
        ));
    }
}
