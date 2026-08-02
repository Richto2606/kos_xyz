@extends('layouts.admin')

@section('title', 'Tambah Kamar · Kos XYZ')

@section('content')
<h1 class="page-title"><i class="fas fa-plus-circle"></i> Tambah Kamar</h1>
<p class="page-sub">Isi data kamar baru</p>

<div style="background:white; border-radius:20px; padding:24px; border:1px solid #f1f5f9; max-width:600px;">
    <form method="POST" action="{{ route('admin.kamar.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Kamar</label>
            <input type="text" id="nama" name="nama" required value="{{ old('nama') }}" placeholder="Kamar F" />
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" id="harga" name="harga" required value="{{ old('harga', 1000000) }}" />
        </div>
        <div class="form-group">
            <label for="fasilitas">Fasilitas</label>
            <input type="text" id="fasilitas" name="fasilitas" value="{{ old('fasilitas', 'AC, KM Dalam, Meja, Kursi, Lemari, Tempat Tidur') }}" />
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', 'Kamar nyaman dengan fasilitas lengkap') }}</textarea>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status">
                <option value="Tersedia">Tersedia</option>
                <option value="Penuh">Penuh</option>
                <option value="Maintenance">Maintenance</option>
            </select>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar Kamar</label>
            <input type="file" id="gambar" name="gambar" accept="image/*" />
            <small style="color:#94a3b8;">Format: jpg, png, jpeg (max 2MB)</small>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn-primary"><i class="fas fa-save"></i> Simpan</button>
            <a href="{{ route('admin.kamar.index') }}" class="btn-cancel">Batal</a>
        </div>
    </form>
</div>
@endsection