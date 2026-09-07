@extends('layouts.admin')
@section('title', 'Booking · Kos XYZ')
@section('content')
<h1 class="page-title"><i class="fas fa-calendar-check"></i> Booking Masuk</h1>
<p style="color:var(--text-muted);margin-bottom:20px">Cari dan kelola status booking dari satu halaman.</p>
<form method="GET" action="{{ route('admin.booking.index') }}" style="display:flex;gap:8px;flex-wrap:wrap;margin-bottom:20px">
    <input name="kode" placeholder="Kode booking" value="{{ request('kode') }}">
    <input name="no_hp" placeholder="Nomor HP" value="{{ request('no_hp') }}">
    <select name="status"><option value="">Semua status</option>@foreach(['Menunggu','Dikonfirmasi','Ditolak','Selesai'] as $status)<option value="{{ $status }}" @selected(request('status') === $status)>{{ $status }}</option>@endforeach</select>
    <button type="submit">Cek Status</button>
    <a href="{{ route('admin.booking.index') }}">Reset</a>
</form>
<div style="display:grid;gap:16px">
@forelse($bookings as $booking)
<div style="background:var(--bg-card);padding:20px;border-radius:16px;border:1px solid var(--border-color)">
<strong>{{ $booking->kode }} · {{ $booking->nama_lengkap }}</strong> <span>{{ $booking->status }}</span>
<p style="color:var(--text-muted);margin:8px 0">{{ $booking->kamar->nama }} · {{ $booking->no_hp }} · {{ $booking->tanggal_masuk->format('d M Y') }} · {{ $booking->durasi_bulan }} bulan</p>
<form method="POST" action="{{ route('admin.booking.updateStatus', $booking) }}" style="display:flex;gap:8px;flex-wrap:wrap;margin-top:12px">
@csrf @method('PATCH')
<select name="status">@foreach(['Menunggu','Dikonfirmasi','Ditolak','Selesai'] as $status)<option @selected($booking->status === $status)>{{ $status }}</option>@endforeach</select>
<input name="alasan_penolakan" placeholder="Alasan jika ditolak" value="{{ $booking->alasan_penolakan }}">
<button type="submit">Simpan Status</button>
<a href="https://wa.me/{{ preg_replace('/\D+/', '', $booking->no_hp) }}?text={{ urlencode('Halo '.$booking->nama_lengkap.', status booking '.$booking->kode.' adalah '.$booking->status.'.') }}" target="_blank">WhatsApp</a>
</form>
</div>
@empty <p>Booking tidak ditemukan.</p> @endforelse
</div>
@endsection
