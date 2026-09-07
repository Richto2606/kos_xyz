<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use App\Models\Penyewa;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    public function index()
    {
        $tagihans = Tagihan::with('penyewa')->orderBy('created_at', 'desc')->get();
        
        // ===== DATA UNTUK CALENDAR =====
        $events = [];
        foreach ($tagihans as $tagihan) {
            // ===== PERBAIKI DI SINI (LINE 28) =====
            // Cek apakah jatuh_tempo adalah objek Carbon, jika tidak parse
            $jatuhTempo = $tagihan->jatuh_tempo instanceof \Carbon\Carbon 
                ? $tagihan->jatuh_tempo->format('Y-m-d') 
                : ($tagihan->jatuh_tempo ? Carbon::parse($tagihan->jatuh_tempo)->format('Y-m-d') : date('Y-m-d'));
            
            $color = match($tagihan->status) {
                'Paid' => '#22c55e',
                'Pending' => '#f59e0b',
                default => '#ef4444',
            };
            
            $events[] = [
                'id' => $tagihan->id,
                'title' => $tagihan->penyewa->nama_lengkap ?? 'Tidak diketahui',
                'start' => $jatuhTempo,
                'status' => $tagihan->status,
                'nominal' => $tagihan->nominal,
                'biaya_tambahan' => $tagihan->biaya_tambahan,
                'total' => $tagihan->nominal + $tagihan->biaya_tambahan,
                'color' => $color,
                'className' => 'event-' . strtolower($tagihan->status),
            ];
        }

        return view('admin.tagihan.index', compact('tagihans', 'events'));
    }

    public function generate()
    {
        $bulan = Carbon::now()->format('F');
        $tahun = Carbon::now()->year;
        $penyewas = Penyewa::where('status', 'Aktif')->get();

        foreach ($penyewas as $penyewa) {
            $exists = Tagihan::where('penyewa_id', $penyewa->id)
                ->where('bulan', $bulan)
                ->where('tahun', $tahun)
                ->exists();

            if (!$exists) {
                Tagihan::create([
                    'penyewa_id' => $penyewa->id,
                    'bulan' => $bulan,
                    'tahun' => $tahun,
                    'nominal' => $penyewa->kamar->harga ?? 1000000,
                    'biaya_tambahan' => 0,
                    'status' => 'Unpaid',
                    'jatuh_tempo' => Carbon::now()->addDays(10),
                ]);
            }
        }

        return redirect()->route('admin.tagihan.index')->with('success', 'Tagihan berhasil digenerate!');
    }

    public function updateStatus($id)
    {
        $tagihan = Tagihan::findOrFail($id);
        $statuses = ['Unpaid', 'Pending', 'Paid'];
        $currentIndex = array_search($tagihan->status, $statuses);
        $nextIndex = ($currentIndex + 1) % count($statuses);
        $tagihan->status = $statuses[$nextIndex];
        
        if ($tagihan->status === 'Paid') {
            $tagihan->tanggal_bayar = Carbon::now();
        }
        
        $tagihan->save();

        return redirect()->route('admin.tagihan.index')->with('success', 'Status tagihan diupdate!');
    }

    // ===== GET EVENTS UNTUK AJAX (Opsional) =====
    public function getEvents(Request $request)
    {
        $month = $request->get('month', Carbon::now()->month);
        $year = $request->get('year', Carbon::now()->year);

        $tagihans = Tagihan::with('penyewa')
            ->whereMonth('jatuh_tempo', $month)
            ->whereYear('jatuh_tempo', $year)
            ->get();

        $events = [];
        foreach ($tagihans as $tagihan) {
            $color = match($tagihan->status) {
                'Paid' => '#22c55e',
                'Pending' => '#f59e0b',
                default => '#ef4444',
            };

            $jatuhTempo = $tagihan->jatuh_tempo instanceof \Carbon\Carbon 
                ? $tagihan->jatuh_tempo->format('Y-m-d') 
                : ($tagihan->jatuh_tempo ? Carbon::parse($tagihan->jatuh_tempo)->format('Y-m-d') : date('Y-m-d'));

            $events[] = [
                'id' => $tagihan->id,
                'title' => $tagihan->penyewa->nama_lengkap ?? 'Tidak diketahui',
                'start' => $jatuhTempo,
                'status' => $tagihan->status,
                'nominal' => $tagihan->nominal,
                'total' => $tagihan->nominal + $tagihan->biaya_tambahan,
                'color' => $color,
            ];
        }

        return response()->json($events);
    }
}