<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penyewa extends Model
{
    protected $fillable = [
        'nama_lengkap', 'ktp', 'no_hp', 'kontak_darurat', 'pekerjaan',
        'kamar_id', 'tanggal_mulai_sewa', 'tanggal_berakhir_sewa', 'status', 'catatan'
    ];

    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }

    public function tagihans()
    {
        return $this->hasMany(Tagihan::class);
    }
}