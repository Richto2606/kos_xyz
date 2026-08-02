@extends('layouts.admin')

@section('title', 'Manajemen Kamar · Kos XYZ')

@section('content')
<h1 class="page-title"><i class="fas fa-door-open"></i> Manajemen Kamar</h1>
<p class="page-sub">CRUD kamar, tarif, dan fasilitas</p>

<div class="table-wrap">
    <div class="header-actions">
        <h3>Daftar Kamar</h3>
        <a href="{{ route('admin.kamar.create') }}" class="btn-primary"><i class="fas fa-plus"></i> Tambah Kamar</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Fasilitas</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kamars as $kamar)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <img src="{{ $kamar->gambar_url }}" alt="{{ $kamar->nama }}" 
                         style="width:60px; height:45px; object-fit:cover; border-radius:8px;">
                </td>
                <td><strong>{{ $kamar->nama }}</strong></td>
                <td>Rp {{ number_format($kamar->harga, 0, ',', '.') }}</td>
                <td>{{ $kamar->fasilitas ?? '-' }}</td>
                <td>
                    <span class="badge {{ $kamar->status == 'Tersedia' ? 'badge-success' : ($kamar->status == 'Penuh' ? 'badge-danger' : 'badge-warning') }}">
                        {{ $kamar->status }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('admin.kamar.edit', $kamar) }}" class="btn-sm btn-edit"><i class="fas fa-edit"></i></a>
                    <form method="POST" action="{{ route('admin.kamar.destroy', $kamar) }}" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn-sm btn-delete" onclick="return confirm('Yakin hapus?')"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" style="text-align:center; color:#94a3b8; padding:30px;">Belum ada data kamar</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection