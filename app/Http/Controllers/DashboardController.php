<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Penyewa;
use App\Models\Tagihan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // ===== STATISTIK KAMAR =====
        $totalKamar = Kamar::count();
        $tersedia = Kamar::where('status', 'Tersedia')->count();
        $terisi = Kamar::where('status', 'Penuh')->count();
        $maintenance = Kamar::where('status', 'Maintenance')->count();
        $kamars = Kamar::all();

        // ===== STATISTIK PEMBAYARAN =====
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

        $pendapatanBulan = Tagihan::where('bulan', $bulanIni)
            ->where('tahun', $tahunIni)
            ->where('status', 'Paid')
            ->sum('nominal');

        $pendapatanTahunan = Tagihan::where('tahun', $tahunIni)
            ->where('status', 'Paid')
            ->sum('nominal');

        // ===== NOTIFIKASI DUMMY =====
        $notifikasi = [
            [
                'type' => 'green',
                'icon' => 'fa-user-plus',
                'text' => 'Penyewa baru: <strong>Ahmad Fauzi</strong> mendaftar',
                'time' => '10 menit lalu'
            ],
            [
                'type' => 'blue',
                'icon' => 'fa-money-bill-wave',
                'text' => 'Pembayaran dari <strong>Siti Rahayu</strong> telah dikonfirmasi',
                'time' => '1 jam lalu'
            ],
            [
                'type' => 'yellow',
                'icon' => 'fa-exclamation-triangle',
                'text' => 'Tagihan <strong>Budi Santoso</strong> jatuh tempo besok',
                'time' => '3 jam lalu'
            ],
            [
                'type' => 'green',
                'icon' => 'fa-check-circle',
                'text' => 'Kamar <strong>Kamar C</strong> berhasil disewakan',
                'time' => '5 jam lalu'
            ],
        ];

        // ===== AKTIVITAS DUMMY =====
        $aktivitas = [
            [
                'type' => 'blue',
                'icon' => 'fa-edit',
                'text' => 'Admin mengubah data kamar <strong>Kamar D</strong>',
                'time' => '2 jam lalu'
            ],
            [
                'type' => 'green',
                'icon' => 'fa-plus-circle',
                'text' => 'Admin menambahkan penyewa baru',
                'time' => '4 jam lalu'
            ],
            [
                'type' => 'yellow',
                'icon' => 'fa-sync-alt',
                'text' => 'Status tagihan <strong>Budi</strong> diupdate',
                'time' => '6 jam lalu'
            ],
        ];

        // ===== HITUNG JUMLAH NOTIFIKASI (TAMBAHKAN INI) =====
        $notifikasiCount = count($notifikasi);

        return view('admin.dashboard', compact(
            'totalKamar', 'tersedia', 'terisi', 'maintenance',
            'kamars',
            'lunas', 'belum', 'tunggak',
            'pendapatanBulan', 'pendapatanTahunan',
            'notifikasi', 'aktivitas', 'notifikasiCount' // <- TAMBAHKAN notifikasiCount
        ));
    }
}