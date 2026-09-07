<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Booking extends Model
{
    protected $fillable = ['kode', 'kamar_id', 'nama_lengkap', 'no_hp', 'email', 'tanggal_masuk', 'durasi_bulan', 'status', 'catatan', 'alasan_penolakan'];

    protected $casts = ['tanggal_masuk' => 'date'];

    protected static function booted(): void
    {
        static::creating(function (Booking $booking) {
            $booking->kode ??= 'BK-' . now()->format('Ymd') . '-' . Str::upper(Str::random(5));
        });
    }

    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }
}
