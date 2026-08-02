<?php

namespace App\Http\Controllers;

use App\Models\Penyewa;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
        // VALIDASI
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'ktp' => 'required|string|unique:penyewas,ktp|max:20',
            'no_hp' => 'required|string|max:15',
            'kontak_darurat' => 'nullable|string|max:15',
            'pekerjaan' => 'nullable|string|max:100',
            'kamar_id' => 'required|exists:kamars,id',
            'tanggal_mulai_sewa' => 'required|date',
            'tanggal_berakhir_sewa' => 'nullable|date|after:tanggal_mulai_sewa',
        ]);

        // CEK APAKAH KAMAR SUDAH DIPENUHI
        $kamar = Kamar::find($request->kamar_id);
        if ($kamar->status == 'Penuh') {
            return back()->withErrors(['kamar_id' => 'Kamar ini sudah penuh!'])->withInput();
        }

        try {
            // SIMPAN DATA
            $penyewa = Penyewa::create([
                'nama_lengkap' => $request->nama_lengkap,
                'ktp' => $request->ktp,
                'no_hp' => $request->no_hp,
                'kontak_darurat' => $request->kontak_darurat,
                'pekerjaan' => $request->pekerjaan,
                'kamar_id' => $request->kamar_id,
                'tanggal_mulai_sewa' => $request->tanggal_mulai_sewa,
                'tanggal_berakhir_sewa' => $request->tanggal_berakhir_sewa,
                'status' => 'Aktif',
            ]);

            // UPDATE STATUS KAMAR MENJADI PENUH
            $kamar->update(['status' => 'Penuh']);

            return redirect()->route('admin.penyewa.index')->with('success', 'Penyewa berhasil ditambahkan!');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()])->withInput();
        }
    }

    public function edit(Penyewa $penyewa)
    {
        $kamars = Kamar::all();
        return view('admin.penyewa.edit', compact('penyewa', 'kamars'));
    }

    public function update(Request $request, Penyewa $penyewa)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'ktp' => 'required|string|max:20|unique:penyewas,ktp,' . $penyewa->id,
            'no_hp' => 'required|string|max:15',
            'kontak_darurat' => 'nullable|string|max:15',
            'pekerjaan' => 'nullable|string|max:100',
            'kamar_id' => 'required|exists:kamars,id',
            'tanggal_mulai_sewa' => 'required|date',
            'tanggal_berakhir_sewa' => 'nullable|date|after:tanggal_mulai_sewa',
        ]);

        try {
            // UPDATE DATA
            $penyewa->update([
                'nama_lengkap' => $request->nama_lengkap,
                'ktp' => $request->ktp,
                'no_hp' => $request->no_hp,
                'kontak_darurat' => $request->kontak_darurat,
                'pekerjaan' => $request->pekerjaan,
                'kamar_id' => $request->kamar_id,
                'tanggal_mulai_sewa' => $request->tanggal_mulai_sewa,
                'tanggal_berakhir_sewa' => $request->tanggal_berakhir_sewa,
            ]);

            return redirect()->route('admin.penyewa.index')->with('success', 'Penyewa berhasil diupdate!');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()])->withInput();
        }
    }

    public function destroy(Penyewa $penyewa)
    {
        try {
            // UPDATE STATUS KAMAR MENJADI TERSEDIA
            $kamar = Kamar::find($penyewa->kamar_id);
            if ($kamar) {
                $kamar->update(['status' => 'Tersedia']);
            }
            
            $penyewa->delete();
            return redirect()->route('admin.penyewa.index')->with('success', 'Penyewa berhasil dihapus!');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
}