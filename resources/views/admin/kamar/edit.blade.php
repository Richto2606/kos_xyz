@extends('layouts.admin')

@section('title', 'Edit Kamar · Kos XYZ')

@section('content')
<style>
    .form-container {
        background: white;
        border-radius: 20px;
        padding: 30px 32px;
        border: 1px solid #f1f5f9;
        max-width: 700px;
        margin: 0 auto;
    }
    .form-container h2 {
        font-size: 1.4rem;
        font-weight: 700;
        margin-bottom: 6px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .form-container h2 i {
        color: #b45309;
    }
    .form-container .sub {
        color: #64748b;
        font-size: 0.95rem;
        margin-bottom: 24px;
    }

    .form-group-modern {
        margin-bottom: 18px;
    }
    .form-group-modern label {
        display: block;
        font-weight: 600;
        font-size: 0.85rem;
        color: #334155;
        margin-bottom: 4px;
    }
    .form-group-modern label .required {
        color: #ef4444;
    }
    .form-group-modern input,
    .form-group-modern select,
    .form-group-modern textarea {
        width: 100%;
        padding: 10px 14px;
        border: 1.5px solid #e2e8f0;
        border-radius: 12px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background: #fafbfc;
    }
    .form-group-modern input:focus,
    .form-group-modern select:focus,
    .form-group-modern textarea:focus {
        outline: none;
        border-color: #b45309;
        box-shadow: 0 0 0 3px rgba(180, 83, 9, 0.08);
        background: white;
    }
    .form-group-modern .helper {
        font-size: 0.75rem;
        color: #94a3b8;
        margin-top: 4px;
    }

    .preview-image {
        margin: 10px 0;
        border-radius: 12px;
        overflow: hidden;
        border: 2px solid #f1f5f9;
        max-width: 200px;
    }
    .preview-image img {
        width: 100%;
        height: 120px;
        object-fit: cover;
        display: block;
    }

    .form-actions-modern {
        display: flex;
        gap: 12px;
        margin-top: 24px;
        padding-top: 20px;
        border-top: 1px solid #f1f5f9;
    }
    .btn-save {
        background: #b45309;
        color: white;
        border: none;
        padding: 10px 32px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 0.95rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    .btn-save:hover {
        background: #92400e;
        transform: translateY(-2px);
        box-shadow: 0 4px 14px rgba(180, 83, 9, 0.25);
    }
    .btn-cancel-modern {
        background: #f1f5f9;
        color: #475569;
        border: none;
        padding: 10px 28px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 0.95rem;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .btn-cancel-modern:hover {
        background: #e2e8f0;
    }
</style>

<div class="form-container">
    <h2><i class="fas fa-edit"></i> Edit Kamar</h2>
    <p class="sub">Ubah data kamar <strong>{{ $kamar->nama }}</strong></p>

    <form method="POST" action="{{ route('admin.kamar.update', $kamar) }}" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="form-group-modern">
            <label for="nama">Nama Kamar <span class="required">*</span></label>
            <input type="text" id="nama" name="nama" required value="{{ old('nama', $kamar->nama) }}" />
        </div>

        <div class="form-group-modern">
            <label for="harga">Harga <span class="required">*</span></label>
            <input type="number" id="harga" name="harga" required value="{{ old('harga', $kamar->harga) }}" />
        </div>

        <div class="form-group-modern">
            <label for="fasilitas">Fasilitas</label>
            <input type="text" id="fasilitas" name="fasilitas" value="{{ old('fasilitas', $kamar->fasilitas) }}" placeholder="Pisahkan dengan koma" />
        </div>

        <div class="form-group-modern">
            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', $kamar->deskripsi) }}</textarea>
        </div>

        <div class="form-group-modern">
            <label for="status">Status <span class="required">*</span></label>
            <select id="status" name="status">
                <option value="Tersedia" {{ $kamar->status == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="Penuh" {{ $kamar->status == 'Penuh' ? 'selected' : '' }}>Penuh</option>
                <option value="Maintenance" {{ $kamar->status == 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
            </select>
        </div>

        <div class="form-group-modern">
            <label>Gambar Saat Ini</label>
            @if($kamar->gambar && file_exists(storage_path('app/public/kamar/' . $kamar->gambar)))
                <div class="preview-image">
                    <img src="{{ $kamar->gambar_url }}" alt="{{ $kamar->nama }}">
                </div>
            @else
                <p style="color:#94a3b8; font-size:0.9rem;">Belum ada gambar</p>
            @endif
        </div>

        <div class="form-group-modern">
            <label for="gambar">Ganti Gambar</label>
            <input type="file" id="gambar" name="gambar" accept="image/*" />
            <div class="helper">Kosongkan jika tidak ingin mengganti gambar</div>
        </div>

        <div class="form-actions-modern">
            <button type="submit" class="btn-save"><i class="fas fa-save"></i> Update</button>
            <a href="{{ route('admin.kamar.index') }}" class="btn-cancel-modern"><i class="fas fa-times"></i> Batal</a>
        </div>
    </form>
</div>
@endsection