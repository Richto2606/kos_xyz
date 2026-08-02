<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Tagihan;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalKamar = Kamar::count();
        $terisi = Kamar::where('status', 'Penuh')->count();
        $kosong = Kamar::where('status', 'Tersedia')->count();
        $maintenance = Kamar::where('status', 'Maintenance')->count();

        $bulanIni = Carbon::now()->format('F');
        $tahunIni = Carbon::now()->year;

        $lunas = Tagihan::where('bulan', $bulanIni)->where('tahun', $tahunIni)->where('status', 'Paid')->count();
        $belum = Tagihan::where('bulan', $bulanIni)->where('tahun', $tahunIni)->where('status', 'Unpaid')->count();
        $tunggak = Tagihan::where('bulan', $bulanIni)->where('tahun', $tahunIni)->where('status', 'Pending')->count();

        $pendapatanBulan = Tagihan::where('bulan', $bulanIni)->where('tahun', $tahunIni)->where('status', 'Paid')->sum('nominal');
        $pendapatanTahunan = Tagihan::where('tahun', $tahunIni)->where('status', 'Paid')->sum('nominal');

        return view('admin.dashboard', compact(
            'totalKamar', 'terisi', 'kosong', 'maintenance',
            'lunas', 'belum', 'tunggak',
            'pendapatanBulan', 'pendapatanTahunan'
        ));
    }
}