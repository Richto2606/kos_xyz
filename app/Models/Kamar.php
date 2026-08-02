<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $fillable = ['nama', 'harga', 'fasilitas', 'deskripsi', 'status', 'gambar'];

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
}