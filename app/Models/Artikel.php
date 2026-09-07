<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Artikel extends Model
{
    protected $fillable = [
        'judul', 'slug', 'deskripsi_singkat', 'isi',
        'gambar', 'kategori', 'penulis', 'tanggal_publikasi', 'is_active'
    ];

    protected $casts = [
        'tanggal_publikasi' => 'date',
        'is_active' => 'boolean',
    ];

    public function getGambarUrlAttribute()
    {
        if ($this->gambar && filter_var($this->gambar, FILTER_VALIDATE_URL)) {
            return $this->gambar;
        }

        if ($this->gambar && Storage::disk('public')->exists('artikel/' . $this->gambar)) {
            return Storage::disk('public')->url('artikel/' . $this->gambar);
        }

        return asset('images/artikel-default.jpg');
    }
}