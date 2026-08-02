@extends('layouts.admin')

@section('title', 'Manajemen Penyewa · Kos XYZ')

@section('content')
<h1 class="page-title"><i class="fas fa-users"></i> Manajemen Penyewa</h1>
<p class="page-sub">Data diri, status, dan riwayat penyewa</p>

<div class="table-wrap">
    <div class="header-actions">
        <h3>Daftar Penyewa</h3>
        <a href="{{ route('admin.penyewa.create') }}" class="btn-primary"><i class="fas fa-plus"></i> Tambah Penyewa</a>
    </div>
    <table>
        <thead>
            <tr><th>Nama</th><th>KTP</th><th>HP</th><th>Kamar</th><th>Status</th><th>Aksi</th></tr>
        </thead>
        <tbody>
            @forelse($penyewas as $penyewa)
            <tr>
                <td><strong>{{ $penyewa->nama_lengkap }}</strong></td>
                <td>{{ $penyewa->ktp }}</td>
                <td>{{ $penyewa->no_hp }}</td>
                <td>{{ $penyewa->kamar->nama ?? '-' }}</td>
                <td><span class="badge badge-success">{{ $penyewa->status }}</span></td>
                <td>
                    <a href="{{ route('admin.penyewa.edit', $penyewa) }}" class="btn-sm btn-edit"><i class="fas fa-edit"></i></a>
                    <form method="POST" action="{{ route('admin.penyewa.destroy', $penyewa) }}" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn-sm btn-delete" onclick="return confirm('Yakin hapus?')"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" style="text-align:center; color:#94a3b8; padding:30px;">Belum ada data penyewa</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection