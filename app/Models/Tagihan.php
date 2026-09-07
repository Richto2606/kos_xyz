<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    protected $fillable = [
        'penyewa_id', 'bulan', 'tahun', 'nominal',
        'biaya_tambahan', 'keterangan_tambahan', 'status', 'jatuh_tempo', 'tanggal_bayar'
    ];

    // ===== TAMBAHKAN INI =====
    protected $casts = [
        'jatuh_tempo' => 'date',
        'tanggal_bayar' => 'date',
    ];

    public function penyewa()
    {
        return $this->belongsTo(Penyewa::class);
    }

    public function getTotalAttribute()
    {
        return $this->nominal + $this->biaya_tambahan;
    }
}