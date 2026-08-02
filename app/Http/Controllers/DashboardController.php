<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Tagihan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data kamar
        $kamars = Kamar::all();
        
        // Data statistik
        $totalKamar = $kamars->count();
        $tersedia = $kamars->where('status', 'Tersedia')->count();
        $terisi = $kamars->where('status', 'Penuh')->count();
        $maintenance = $kamars->where('status', 'Maintenance')->count();
        
        // Data tagihan bulan ini
        $bulanIni = Carbon::now()->format('F');
        $tahunIni = Carbon::now()->year;
        
        $tagihans = Tagihan::where('bulan', $bulanIni)
            ->where('tahun', $tahunIni)
            ->get();
            
        $lunas = $tagihans->where('status', 'Paid')->count();
        $belum = $tagihans->where('status', 'Unpaid')->count();
        $tunggak = $tagihans->where('status', 'Pending')->count();
        $pendapatanBulan = $tagihans->where('status', 'Paid')->sum('nominal');
        
        $pendapatanTahunan = Tagihan::where('tahun', $tahunIni)
            ->where('status', 'Paid')
            ->sum('nominal');

        return view('admin.dashboard', compact(
            'kamars',
            'totalKamar',
            'tersedia',
            'terisi',
            'maintenance',
            'lunas',
            'belum',
            'tunggak',
            'pendapatanBulan',
            'pendapatanTahunan'
        ));
    }
}