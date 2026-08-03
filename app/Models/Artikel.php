<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        if ($this->gambar && file_exists(storage_path('app/public/artikel/' . $this->gambar))) {
            return asset('storage/artikel/' . $this->gambar);
        }
        return asset('images/artikel-default.jpg');
    }
}