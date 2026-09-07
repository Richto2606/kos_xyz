<?php $__env->startSection('title', 'Tambah Kamar · Kos XYZ'); ?>

<?php $__env->startSection('content'); ?>
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
    <h2><i class="fas fa-plus-circle"></i> Tambah Kamar</h2>
    <p class="sub">Isi data kamar baru dengan lengkap</p>

    <form method="POST" action="<?php echo e(route('admin.kamar.store')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <div class="form-group-modern">
            <label for="nama">Nama Kamar <span class="required">*</span></label>
            <input type="text" id="nama" name="nama" required value="<?php echo e(old('nama')); ?>" placeholder="Contoh: Kamar F" />
        </div>

        <div class="form-group-modern">
            <label for="harga">Harga <span class="required">*</span></label>
            <input type="number" id="harga" name="harga" required value="<?php echo e(old('harga', 1000000)); ?>" />
            <div class="helper">Masukkan harga dalam Rupiah (tanpa titik atau koma)</div>
        </div>

        <div class="form-group-modern">
            <label for="fasilitas">Fasilitas</label>
            <input type="text" id="fasilitas" name="fasilitas" value="<?php echo e(old('fasilitas', 'AC, KM Dalam, Meja, Kursi, Lemari, Tempat Tidur')); ?>" placeholder="Pisahkan dengan koma" />
            <div class="helper">Contoh: AC, KM Dalam, WiFi, TV</div>
        </div>

        <div class="form-group-modern">
            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" rows="3"><?php echo e(old('deskripsi', 'Kamar nyaman dengan fasilitas lengkap')); ?></textarea>
        </div>

        <div class="form-group-modern">
            <label for="status">Status <span class="required">*</span></label>
            <select id="status" name="status">
                <option value="Tersedia" <?php echo e(old('status') == 'Tersedia' ? 'selected' : ''); ?>>Tersedia</option>
                <option value="Penuh" <?php echo e(old('status') == 'Penuh' ? 'selected' : ''); ?>>Penuh</option>
                <option value="Maintenance" <?php echo e(old('status') == 'Maintenance' ? 'selected' : ''); ?>>Maintenance</option>
            </select>
        </div>

        <div class="form-group-modern">
            <label for="gambar">Gambar Kamar</label>
            <input type="file" id="gambar" name="gambar" accept="image/*" />
            <div class="helper">Format: jpg, png, jpeg (max 2MB)</div>
        </div>

        <div class="form-actions-modern">
            <button type="submit" class="btn-save"><i class="fas fa-save"></i> Simpan</button>
            <a href="<?php echo e(route('admin.kamar.index')); ?>" class="btn-cancel-modern"><i class="fas fa-times"></i> Batal</a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Kerjaan\kos_xyz-main\kos_xyz-main\resources\views\admin\kamar\create.blade.php ENDPATH**/ ?>