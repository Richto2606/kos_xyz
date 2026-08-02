@extends('layouts.admin')

@section('title', 'Tambah Penyewa · Kos XYZ')

@section('content')
<h1 class="page-title"><i class="fas fa-user-plus"></i> Tambah Penyewa</h1>
<p class="page-sub">Isi data penyewa baru</p>

<div style="background:white; border-radius:20px; padding:24px; border:1px solid #f1f5f9; max-width:600px;">
    <form method="POST" action="{{ route('admin.penyewa.store') }}">
        @csrf
        <div class="form-group">
            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" id="nama_lengkap" name="nama_lengkap" required value="{{ old('nama_lengkap') }}" />
        </div>
        <div class="form-group">
            <label for="ktp">No. KTP</label>
            <input type="text" id="ktp" name="ktp" required value="{{ old('ktp') }}" />
        </div>
        <div class="form-group">
            <label for="no_hp">No. HP</label>
            <input type="text" id="no_hp" name="no_hp" required value="{{ old('no_hp') }}" />
        </div>
        <div class="form-group">
            <label for="kontak_darurat">Kontak Darurat</label>
            <input type="text" id="kontak_darurat" name="kontak_darurat" value="{{ old('kontak_darurat') }}" />
        </div>
        <div class="form-group">
            <label for="pekerjaan">Pekerjaan</label>
            <input type="text" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') }}" />
        </div>
        <div class="form-group">
            <label for="kamar_id">Kamar</label>
            <select id="kamar_id" name="kamar_id" required>
                <option value="">Pilih Kamar</option>
                @foreach($kamars as $kamar)
                <option value="{{ $kamar->id }}">{{ $kamar->nama }} - Rp {{ number_format($kamar->harga, 0, ',', '.') }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal_mulai_sewa">Tanggal Mulai Sewa</label>
            <input type="date" id="tanggal_mulai_sewa" name="tanggal_mulai_sewa" required value="{{ old('tanggal_mulai_sewa', date('Y-m-d')) }}" />
        </div>
        <div class="form-group">
            <label for="tanggal_berakhir_sewa">Tanggal Berakhir Sewa (Opsional)</label>
            <input type="date" id="tanggal_berakhir_sewa" name="tanggal_berakhir_sewa" value="{{ old('tanggal_berakhir_sewa') }}" />
        </div>
        <div class="form-actions">
            <button type="submit" class="btn-primary"><i class="fas fa-save"></i> Simpan</button>
            <a href="{{ route('admin.penyewa.index') }}" class="btn-cancel">Batal</a>
        </div>
    </form>
</div>
@endsection