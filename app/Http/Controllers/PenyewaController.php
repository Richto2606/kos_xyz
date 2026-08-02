<?php

namespace App\Http\Controllers;

use App\Models\Penyewa;
use App\Models\Kamar;
use Illuminate\Http\Request;

class PenyewaController extends Controller
{
    public function index()
    {
        $penyewas = Penyewa::with('kamar')->get();
        return view('admin.penyewa.index', compact('penyewas'));
    }

    public function create()
    {
        $kamars = Kamar::where('status', 'Tersedia')->get();
        return view('admin.penyewa.create', compact('kamars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string',
            'ktp' => 'required|string|unique:penyewas',
            'no_hp' => 'required|string',
            'kamar_id' => 'required|exists:kamars,id',
            'tanggal_mulai_sewa' => 'required|date',
        ]);

        Penyewa::create($request->all());
        
        // Update status kamar menjadi Penuh
        Kamar::find($request->kamar_id)->update(['status' => 'Penuh']);

        return redirect()->route('admin.penyewa.index')->with('success', 'Penyewa berhasil ditambahkan!');
    }

    public function destroy(Penyewa $penyewa)
    {
        // Update status kamar menjadi Tersedia
        Kamar::find($penyewa->kamar_id)->update(['status' => 'Tersedia']);
        
        $penyewa->delete();
        return redirect()->route('admin.penyewa.index')->with('success', 'Penyewa berhasil dihapus!');
    }
}