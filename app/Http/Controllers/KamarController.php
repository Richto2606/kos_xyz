<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KamarController extends Controller
{
    public function index()
    {
        $kamars = Kamar::all();
        return view('admin.kamar.index', compact('kamars'));
    }

    public function create()
    {
        return view('admin.kamar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:20',
            'harga' => 'required|numeric|min:0',
            'fasilitas' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:Tersedia,Penuh,Maintenance',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $filename = Str::slug($request->nama) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/kamar', $filename);
            $data['gambar'] = $filename;
        }

        Kamar::create($data);
        return redirect()->route('admin.kamar.index')->with('success', 'Kamar berhasil ditambahkan!');
    }

    public function edit(Kamar $kamar)
    {
        return view('admin.kamar.edit', compact('kamar'));
    }

    public function update(Request $request, Kamar $kamar)
    {
        $request->validate([
            'nama' => 'required|string|max:20',
            'harga' => 'required|numeric|min:0',
            'fasilitas' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:Tersedia,Penuh,Maintenance',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            if ($kamar->gambar && file_exists(storage_path('app/public/kamar/' . $kamar->gambar))) {
                unlink(storage_path('app/public/kamar/' . $kamar->gambar));
            }

            $image = $request->file('gambar');
            $filename = Str::slug($request->nama) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/kamar', $filename);
            $data['gambar'] = $filename;
        }

        $kamar->update($data);
        return redirect()->route('admin.kamar.index')->with('success', 'Kamar berhasil diupdate!');
    }

    public function destroy(Kamar $kamar)
    {
        if ($kamar->gambar && file_exists(storage_path('app/public/kamar/' . $kamar->gambar))) {
            unlink(storage_path('app/public/kamar/' . $kamar->gambar));
        }
        
        $kamar->delete();
        return redirect()->route('admin.kamar.index')->with('success', 'Kamar berhasil dihapus!');
    }
}