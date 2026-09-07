<?php ($editing = $artikel !== null); ?>
<style>
    .form-container { max-width:800px; margin:auto; background:var(--bg-card); padding:28px; border-radius:20px; }
    .form-container h1 { font-size:1.5rem; margin-bottom:22px; }
    .form-group { margin-bottom:16px; }
    .form-group label { display:block; font-weight:600; margin-bottom:6px; }
    .form-group input, .form-group textarea, .form-group select { width:100%; padding:11px 13px; border:1px solid var(--border-color); border-radius:10px; background:var(--bg-input); color:var(--text-primary); }
    .form-group textarea { min-height:180px; resize:vertical; }
    .helper { color:var(--text-muted); font-size:.8rem; margin-top:5px; }
    .preview { max-width:260px; max-height:160px; object-fit:cover; border-radius:10px; margin-bottom:8px; }
    .actions { display:flex; gap:10px; margin-top:22px; }
    .actions button, .actions a { border:0; border-radius:10px; padding:10px 20px; text-decoration:none; cursor:pointer; }
    .save { background:#b45309; color:white; }
    .cancel { background:#e2e8f0; color:#334155; }
</style>

<div class="form-container">
    <h1><i class="fas fa-newspaper" style="color:#b45309"></i> <?php echo e($editing ? 'Edit Artikel' : 'Tambah Artikel'); ?></h1>
    <form method="POST" action="<?php echo e($formAction); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php if($formMethod !== 'POST'): ?> <?php echo method_field($formMethod); ?> <?php endif; ?>

        <div class="form-group">
            <label for="judul">Judul</label>
            <input id="judul" name="judul" required value="<?php echo e(old('judul', $artikel?->judul)); ?>">
        </div>
        <div class="form-group">
            <label for="kategori">Kategori</label>
            <select id="kategori" name="kategori" required>
                <?php $__currentLoopData = ['Tips', 'Wisata', 'Event', 'Kuliner', 'Lainnya']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($kategori); ?>" <?php if(old('kategori', $artikel?->kategori ?? 'Tips') === $kategori): echo 'selected'; endif; ?>><?php echo e($kategori); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group">
            <label for="penulis">Penulis</label>
            <input id="penulis" name="penulis" required value="<?php echo e(old('penulis', $artikel?->penulis ?? 'Admin Kos XYZ')); ?>">
        </div>
        <div class="form-group">
            <label for="tanggal_publikasi">Tanggal Publikasi</label>
            <input type="date" id="tanggal_publikasi" name="tanggal_publikasi" required value="<?php echo e(old('tanggal_publikasi', $artikel?->tanggal_publikasi?->format('Y-m-d') ?? now()->format('Y-m-d'))); ?>">
        </div>
        <div class="form-group">
            <label for="deskripsi_singkat">Deskripsi Singkat</label>
            <textarea id="deskripsi_singkat" name="deskripsi_singkat" rows="3"><?php echo e(old('deskripsi_singkat', $artikel?->deskripsi_singkat)); ?></textarea>
        </div>
        <div class="form-group">
            <label for="isi">Isi Artikel</label>
            <textarea id="isi" name="isi" required><?php echo e(old('isi', $artikel?->isi)); ?></textarea>
            <div class="helper">HTML sederhana seperti &lt;p&gt;, &lt;strong&gt;, &lt;ul&gt; diperbolehkan.</div>
        </div>
        <div class="form-group">
            <label for="gambar">Foto Artikel</label>
            <?php if($artikel?->gambar): ?>
                <img class="preview" src="<?php echo e($artikel->gambar_url); ?>" alt="<?php echo e($artikel->judul); ?>">
            <?php endif; ?>
            <input type="file" id="gambar" name="gambar" accept="image/jpeg,image/png,image/jpg,image/gif,image/webp">
            <div class="helper">JPG, PNG, GIF, WEBP. Maksimal 2MB. Kosongkan saat edit untuk mempertahankan foto.</div>
        </div>
        <div class="form-group">
            <label><input type="checkbox" name="is_active" value="1" <?php if(old('is_active', $artikel?->is_active ?? true)): echo 'checked'; endif; ?>> Tampilkan di landing page</label>
        </div>
        <div class="actions">
            <button class="save" type="submit"><i class="fas fa-save"></i> <?php echo e($submitLabel); ?></button>
            <a class="cancel" href="<?php echo e(route('admin.artikel.index')); ?>">Batal</a>
        </div>
    </form>
</div>
<?php /**PATH E:\Kerjaan\kos_xyz-main\kos_xyz-main\resources\views\admin\artikel\form.blade.php ENDPATH**/ ?>