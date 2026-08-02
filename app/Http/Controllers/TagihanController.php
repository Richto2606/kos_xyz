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
        $tagihans = Tagihan::with('penyewa')->get();
        return view('admin.tagihan.index', compact('tagihans'));
    }

    public function generate()
    {
        $bulan = Carbon::now()->format('F');
        $tahun = Carbon::now()->year;
        $jatuhTempo = Carbon::now()->addDays(7);

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
                    'nominal' => 1000000,
                    'biaya_tambahan' => 0,
                    'status' => 'Unpaid',
                    'jatuh_tempo' => $jatuhTempo,
                ]);
            }
        }

        return redirect()->route('admin.tagihan.index')->with('success', 'Tagihan berhasil digenerate!');
    }

    public function updateStatus($id)
    {
        $tagihan = Tagihan::findOrFail($id);
        $statuses = ['Unpaid', 'Pending', 'Paid'];
        $idx = array_search($tagihan->status, $statuses);
        $tagihan->status = $statuses[($idx + 1) % count($statuses)];
        
        if ($tagihan->status === 'Paid') {
            $tagihan->tanggal_bayar = Carbon::now();
        }
        
        $tagihan->save();

        return redirect()->route('admin.tagihan.index')->with('success', 'Status tagihan diupdate menjadi ' . $tagihan->status);
    }
}