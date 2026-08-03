<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Penyewa;
use App\Models\Tagihan;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExportController extends Controller
{
    public function exportPDF()
    {
        try {
            $data = $this->getDashboardData();
            
            // Debug: cek apakah view exists
            if (!view()->exists('exports.dashboard-pdf')) {
                $viewPath = resource_path('views/exports/dashboard-pdf.blade.php');
                if (!file_exists($viewPath)) {
                    return response()->json([
                        'error' => 'File view tidak ditemukan di: ' . $viewPath,
                        'message' => 'Pastikan file resources/views/exports/dashboard-pdf.blade.php ada'
                    ]);
                }
                return response()->json([
                    'error' => 'View exports.dashboard-pdf tidak terdaftar di Laravel',
                    'message' => 'Coba jalankan: php artisan view:clear'
                ]);
            }
            
            $pdf = Pdf::loadView('exports.dashboard-pdf', $data);
            $pdf->setPaper('A4', 'landscape');
            
            return $pdf->download('Laporan_Kos_XYZ_' . date('Y-m-d') . '.pdf');
            
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ]);
        }
    }

    public function exportExcel()
    {
        try {
            return Excel::download(new LaporanExport(), 'Laporan_Kos_XYZ_' . date('Y-m-d') . '.xlsx');
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ]);
        }
    }
    public function exportExcelTest()
{
    try {
        return Excel::download(new \App\Exports\SimpleExport(), 'test-excel.xlsx');
    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'line' => $e->getLine(),
            'file' => $e->getFile()
        ]);
    }
}

    private function getDashboardData()
    {
        // ===== DATA KAMAR =====
        $totalKamar = Kamar::count();
        $tersedia = Kamar::where('status', 'Tersedia')->count();
        $terisi = Kamar::where('status', 'Penuh')->count();
        $maintenance = Kamar::where('status', 'Maintenance')->count();
        $kamars = Kamar::all();

        // ===== DATA TAGIHAN =====
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

        // ===== DATA PENYEWA (DENGAN JOIN MANUAL AGAR AMAN) =====
        $penyewas = DB::table('penyewas')
            ->leftJoin('kamars', 'penyewas.kamar_id', '=', 'kamars.id')
            ->select(
                'penyewas.*',
                'kamars.nama as kamar_nama',
                'kamars.harga as kamar_harga'
            )
            ->get();

        return compact(
            'totalKamar', 'tersedia', 'terisi', 'maintenance',
            'kamars', 'penyewas',
            'lunas', 'belum', 'tunggak',
            'pendapatanBulan', 'pendapatanTahunan',
            'bulanIni', 'tahunIni'
        );
    }
}

