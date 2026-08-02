<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $fillable = ['nama', 'harga', 'fasilitas', 'deskripsi', 'status', 'gambar'];

    protected $appends = ['gambar_url'];

    public function penyewas()
    {
        return $this->hasMany(Penyewa::class);
    }

    public function getStatusBadgeAttribute()
    {
        $colors = [
            'Tersedia' => 'success',
            'Penuh' => 'danger',
            'Maintenance' => 'warning'
        ];
        return $colors[$this->status] ?? 'secondary';
    }

    // Helper untuk mendapatkan URL gambar
    public function getGambarUrlAttribute()
    {
        if ($this->gambar && file_exists(storage_path('app/public/kamar/' . $this->gambar))) {
            return asset('storage/kamar/' . $this->gambar);
        }
        // Gambar default jika tidak ada
        return asset('images/kamar-default.jpg');
    }
}