@extends('layouts.admin')

@section('title', 'Edit Kamar · Kos XYZ')

@section('content')
<h1 class="page-title"><i class="fas fa-edit"></i> Edit Kamar</h1>
<p class="page-sub">Ubah data kamar</p>

<div style="background:white; border-radius:20px; padding:24px; border:1px solid #f1f5f9; max-width:600px;">
    <form method="POST" action="{{ route('admin.kamar.update', $kamar) }}">
        @csrf @method('PUT')
        <div class="form-group">
            <label for="nama">Nama Kamar</label>
            <input type="text" id="nama" name="nama" required value="{{ old('nama', $kamar->nama) }}" />
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" id="harga" name="harga" required value="{{ old('harga', $kamar->harga) }}" />
        </div>
        <div class="form-group">
            <label for="fasilitas">Fasilitas</label>
            <input type="text" id="fasilitas" name="fasilitas" value="{{ old('fasilitas', $kamar->fasilitas) }}" />
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', $kamar->deskripsi) }}</textarea>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status">
                <option value="Tersedia" {{ $kamar->status == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="Penuh" {{ $kamar->status == 'Penuh' ? 'selected' : '' }}>Penuh</option>
                <option value="Maintenance" {{ $kamar->status == 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
            </select>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn-primary"><i class="fas fa-save"></i> Update</button>
            <a href="{{ route('admin.kamar.index') }}" class="btn-cancel">Batal</a>
        </div>
    </form>
</div>
@endsection