@extends('layouts.admin')

@section('title', 'Manajemen Tagihan · Kos XYZ')

@section('content')
<h1 class="page-title"><i class="fas fa-file-invoice"></i> Manajemen Tagihan</h1>
<p class="page-sub">Auto-generate invoice, status pembayaran</p>

<div class="table-wrap">
    <div class="header-actions">
        <h3>Daftar Tagihan</h3>
        <div>
            <form method="POST" action="{{ route('admin.tagihan.generate') }}" style="display:inline;">
                @csrf
                <button type="submit" class="btn-primary"><i class="fas fa-sync"></i> Generate Tagihan</button>
            </form>
        </div>
    </div>
    <table>
        <thead>
            <tr><th>Penyewa</th><th>Bulan</th><th>Nominal</th><th>Biaya Tambahan</th><th>Status</th><th>Aksi</th></tr>
        </thead>
        <tbody>
            @forelse($tagihans as $tagihan)
            <tr>
                <td>{{ $tagihan->penyewa->nama_lengkap ?? '-' }}</td>
                <td>{{ $tagihan->bulan }} {{ $tagihan->tahun }}</td>
                <td>Rp {{ number_format($tagihan->nominal, 0, ',', '.') }}</td>
                <td>{{ $tagihan->biaya_tambahan > 0 ? 'Rp '.number_format($tagihan->biaya_tambahan, 0, ',', '.') : '-' }}</td>
                <td>
                    <span class="badge {{ $tagihan->status == 'Paid' ? 'badge-success' : ($tagihan->status == 'Pending' ? 'badge-warning' : 'badge-danger') }}">
                        {{ $tagihan->status }}
                    </span>
                </td>
                <td>
                    <form method="POST" action="{{ route('admin.tagihan.updateStatus', $tagihan->id) }}" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn-sm btn-status"><i class="fas fa-sync"></i> Update</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" style="text-align:center; color:#94a3b8; padding:30px;">Belum ada tagihan</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Notifikasi -->
<div class="table-wrap">
    <h3>Kirim Notifikasi</h3>
    <div style="display:flex; flex-wrap:wrap; gap:16px; margin-top:12px;">
        <form method="POST" action="{{ route('admin.notifikasi.wa') }}">
            @csrf
            <button type="submit" class="btn-primary"><i class="fab fa-whatsapp"></i> Kirim WA</button>
        </form>
        <form method="POST" action="{{ route('admin.notifikasi.email') }}">
            @csrf
            <button type="submit" class="btn-primary"><i class="fas fa-envelope"></i> Kirim Email</button>
        </form>
        <form method="POST" action="{{ route('admin.notifikasi.reminder') }}">
            @csrf
            <button type="submit" class="btn-primary"><i class="fas fa-clock"></i> Auto-Reminder (H-3)</button>
        </form>
    </div>
</div>
@endsection