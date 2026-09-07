<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::latest()->get();

        return view('admin.artikel.index', compact('artikels'));
    }

    public function create()
    {
        return view('admin.artikel.create');
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);
        $data['slug'] = $this->uniqueSlug($data['judul']);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $this->storeImage($request);
        }

        Artikel::create($data);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil ditambahkan!');
    }

    public function edit(Artikel $artikel)
    {
        return view('admin.artikel.edit', compact('artikel'));
    }

    public function update(Request $request, Artikel $artikel)
    {
        $data = $this->validatedData($request);
        $data['slug'] = $this->uniqueSlug($data['judul'], $artikel->id);

        if ($request->hasFile('gambar')) {
            if ($artikel->gambar && !filter_var($artikel->gambar, FILTER_VALIDATE_URL)) {
                Storage::disk('public')->delete('artikel/' . $artikel->gambar);
            }

            $data['gambar'] = $this->storeImage($request);
        }

        $artikel->update($data);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    public function destroy(Artikel $artikel)
    {
        if ($artikel->gambar && !filter_var($artikel->gambar, FILTER_VALIDATE_URL)) {
            Storage::disk('public')->delete('artikel/' . $artikel->gambar);
        }

        $artikel->delete();

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil dihapus!');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi_singkat' => 'nullable|string',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'kategori' => 'required|string|max:100',
            'penulis' => 'required|string|max:100',
            'tanggal_publikasi' => 'required|date',
            'is_active' => 'nullable|boolean',
        ]) + ['is_active' => $request->boolean('is_active')];
    }

    private function storeImage(Request $request): string
    {
        $filename = Str::slug($request->judul) . '-' . time() . '.' . $request->file('gambar')->getClientOriginalExtension();

        $request->file('gambar')->storeAs('artikel', $filename, 'public');

        return $filename;
    }

    private function uniqueSlug(string $judul, ?int $ignoreId = null): string
    {
        $base = Str::slug($judul);
        $slug = $base;
        $counter = 1;

        while (Artikel::where('slug', $slug)->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))->exists()) {
            $slug = $base . '-' . $counter++;
        }

        return $slug;
    }
}
