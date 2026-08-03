<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penyewa extends Model
{
    protected $fillable = [
        'nama_lengkap', 'ktp', 'no_hp', 'kontak_darurat', 'pekerjaan',
        'kamar_id', 'tanggal_mulai_sewa', 'tanggal_berakhir_sewa', 'status', 'catatan', 'foto'
    ];

    // ===== INI YANG HARUS DITAMBAHKAN =====
    protected $casts = [
        'tanggal_mulai_sewa' => 'date',
        'tanggal_berakhir_sewa' => 'date',
    ];

    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }

    public function tagihans()
    {
        return $this->hasMany(Tagihan::class);
    }

    public function getFotoUrlAttribute()
    {
        if ($this->foto && file_exists(storage_path('app/public/penyewa/' . $this->foto))) {
            return asset('storage/penyewa/' . $this->foto);
        }
        return null;
    }

    public function getInitialAttribute()
    {
        $words = explode(' ', $this->nama_lengkap);
        $initial = '';
        foreach ($words as $word) {
            if (!empty($word)) {
                $initial .= strtoupper(substr($word, 0, 1));
            }
        }
        return substr($initial, 0, 2);
    }
}