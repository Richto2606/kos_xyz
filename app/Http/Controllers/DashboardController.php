<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Penyewa;
use App\Models\Tagihan;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // ===== STATISTIK KAMAR =====
        $totalKamar = Kamar::count();
        $tersedia = Kamar::where('status', 'Tersedia')->count();
        $terisi = Kamar::where('status', 'Penuh')->count();
        $maintenance = Kamar::where('status', 'Maintenance')->count();

        // ===== AMBIL SEMUA KAMAR UNTUK TABEL =====
        $kamars = Kamar::all();

        // ===== STATISTIK PEMBAYARAN (BULAN INI) =====
        $bulanIni = Carbon::now()->format('F');
        $tahunIni = Carbon::now()->year;

        $lunas = Tagihan::where('bulan', $bulanIni)
            ->where('tahun', $tahunIni)
            ->where('status', 'Paid')
            ->count();

        $belum = Tagihan::where('bulan', $bulanIni)
            ->where('tahun', $tahunIni)
            ->where('status', 'Unpaid')
            ->count();

        $tunggak = Tagihan::where('bulan', $bulanIni)
            ->where('tahun', $tahunIni)
            ->where('status', 'Pending')
            ->count();

        // ===== PENDAPATAN =====
        $pendapatanBulan = Tagihan::where('bulan', $bulanIni)
            ->where('tahun', $tahunIni)
            ->where('status', 'Paid')
            ->sum('nominal');

        $pendapatanTahunan = Tagihan::where('tahun', $tahunIni)
            ->where('status', 'Paid')
            ->sum('nominal');

        return view('admin.dashboard', compact(
            'totalKamar', 'tersedia', 'terisi', 'maintenance',
            'kamars',
            'lunas', 'belum', 'tunggak',
            'pendapatanBulan', 'pendapatanTahunan'
        ));
    }
}