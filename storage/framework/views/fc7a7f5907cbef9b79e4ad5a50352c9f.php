<?php $__env->startSection('title', 'Manajemen Artikel · Kos XYZ'); ?>

<?php $__env->startSection('content'); ?>
<style>
    .header-actions-modern { display:flex; justify-content:space-between; align-items:center; gap:15px; margin-bottom:25px; }
    .header-actions-modern h1 { font-size:1.8rem; display:flex; gap:10px; align-items:center; }
    .header-actions-modern h1 i { color:#b45309; }
    .header-actions-modern p { color:#64748b; margin-top:4px; }
    .btn-modern-primary { background:#b45309; color:white; padding:10px 24px; border-radius:12px; text-decoration:none; font-weight:600; }
    .artikel-grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(280px,1fr)); gap:24px; }
    .artikel-card { background:var(--bg-card); border:1px solid var(--border-color); border-radius:20px; overflow:hidden; }
    .artikel-card .image { height:170px; background:var(--bg-primary); }
    .artikel-card img { width:100%; height:100%; object-fit:cover; }
    .artikel-card .body { padding:18px; }
    .artikel-card h2 { font-size:1.05rem; margin:8px 0; }
    .artikel-card p { color:var(--text-muted); font-size:.85rem; min-height:42px; }
    .meta { color:var(--text-muted); font-size:.8rem; }
    .actions { display:flex; gap:8px; margin-top:16px; }
    .actions a, .actions button { border:0; border-radius:9px; padding:8px 12px; cursor:pointer; text-decoration:none; }
    .edit { background:#fef3c7; color:#92400e; }
    .delete { background:#fee2e2; color:#b91c1c; }
    .empty { padding:50px; text-align:center; color:var(--text-muted); grid-column:1/-1; }
    @media (max-width:600px) { .header-actions-modern { align-items:flex-start; flex-direction:column; } }
</style>

<div class="header-actions-modern">
    <div>
        <h1><i class="fas fa-newspaper"></i> Manajemen Artikel</h1>
        <p>Kelola artikel dan foto yang tampil di landing page</p>
    </div>
    <a href="<?php echo e(route('admin.artikel.create')); ?>" class="btn-modern-primary"><i class="fas fa-plus"></i> Tambah Artikel</a>
</div>

<div class="artikel-grid">
    <?php $__empty_1 = true; $__currentLoopData = $artikels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artikel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <article class="artikel-card">
            <div class="image"><img src="<?php echo e($artikel->gambar_url); ?>" alt="<?php echo e($artikel->judul); ?>"></div>
            <div class="body">
                <div class="meta"><?php echo e($artikel->kategori); ?> · <?php echo e($artikel->is_active ? 'Aktif' : 'Draft'); ?></div>
                <h2><?php echo e($artikel->judul); ?></h2>
                <p><?php echo e($artikel->deskripsi_singkat ?: Str::limit(strip_tags($artikel->isi), 100)); ?></p>
                <div class="meta"><?php echo e($artikel->tanggal_publikasi->format('d M Y')); ?> · <?php echo e($artikel->penulis); ?></div>
                <div class="actions">
                    <a href="<?php echo e(route('admin.artikel.edit', $artikel)); ?>" class="edit"><i class="fas fa-edit"></i> Edit</a>
                    <form method="POST" action="<?php echo e(route('admin.artikel.destroy', $artikel)); ?>" onsubmit="return confirm('Hapus artikel ini?')">
                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                        <button class="delete" type="submit"><i class="fas fa-trash"></i> Hapus</button>
                    </form>
                </div>
            </div>
        </article>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="empty"><i class="fas fa-newspaper"></i><p>Belum ada artikel.</p></div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Kerjaan\kos_xyz-main\kos_xyz-main\resources\views/admin/artikel/index.blade.php ENDPATH**/ ?>