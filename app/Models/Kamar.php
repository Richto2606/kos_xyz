<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
        if ($this->gambar && filter_var($this->gambar, FILTER_VALIDATE_URL)) {
            return $this->gambar;
        }

        if ($this->gambar && Storage::disk('public')->exists('kamar/' . $this->gambar)) {
            return Storage::disk('public')->url('kamar/' . $this->gambar);
        }

        return asset('images/kamar-default.jpg');
    }
}