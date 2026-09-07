

<?php $__env->startSection('title', 'Manajemen Kamar · Kos XYZ'); ?>

<?php $__env->startSection('content'); ?>
<style>
    .header-actions-modern {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 25px;
    }
    .header-actions-modern .left h1 {
        font-size: 1.8rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 4px;
    }
    .header-actions-modern .left h1 i {
        color: #b45309;
    }
    .header-actions-modern .left p {
        color: #64748b;
        font-size: 0.95rem;
    }
    .header-actions-modern .right {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .btn-modern-primary {
        background: #b45309;
        color: white;
        border: none;
        padding: 10px 24px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
        box-shadow: 0 4px 14px rgba(180,83,9,0.25);
    }
    .btn-modern-primary:hover {
        background: #92400e;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(180,83,9,0.35);
    }

    .kamar-grid-modern {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 24px;
        margin-top: 10px;
    }

    .kamar-card-modern {
        background: var(--bg-card);
        border-radius: 20px;
        border: 1px solid var(--border-color);
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0,0,0,0.02);
    }
    .kamar-card-modern:hover {
        transform: translateY(-6px);
        border-color: #fed7aa;
        box-shadow: 0 12px 40px rgba(0,0,0,0.06);
    }

    .kamar-card-modern .card-image {
        height: 160px;
        background: var(--bg-primary);
        position: relative;
        overflow: hidden;
    }
    .kamar-card-modern .card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }
    .kamar-card-modern .card-image .no-image {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        color: var(--text-muted);
        font-size: 3rem;
        background: var(--bg-primary);
    }

    .kamar-card-modern .card-body {
        padding: 18px 20px 20px;
    }
    .kamar-card-modern .card-body .card-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 8px;
    }
    .kamar-card-modern .card-body .card-top .nama {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--text-primary);
    }
    .kamar-card-modern .card-body .card-top .harga {
        font-weight: 700;
        color: #b45309;
        font-size: 1rem;
        background: #fef3c7;
        padding: 2px 14px;
        border-radius: 40px;
    }

    .kamar-card-modern .card-body .fasilitas-list {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
        margin: 10px 0 12px;
    }
    .kamar-card-modern .card-body .fasilitas-list .tag {
        background: var(--bg-primary);
        padding: 3px 12px;
        border-radius: 20px;
        font-size: 0.7rem;
        color: var(--text-secondary);
        border: 1px solid var(--border-color);
    }

    .kamar-card-modern .card-body .card-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 14px;
        border-top: 1px solid var(--border-color);
    }
    .kamar-card-modern .card-body .card-footer .status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 14px;
        border-radius: 40px;
        font-size: 0.75rem;
        font-weight: 600;
    }
    .kamar-card-modern .card-body .card-footer .status.tersedia { background: #dcfce7; color: #15803d; }
    .kamar-card-modern .card-body .card-footer .status.penuh { background: #fee2e2; color: #b91c1c; }
    .kamar-card-modern .card-body .card-footer .status.maintenance { background: #fef9c3; color: #a16207; }
    .kamar-card-modern .card-body .card-footer .status i { font-size: 0.6rem; }

    .kamar-card-modern .card-body .card-footer .actions {
        display: flex;
        gap: 8px;
    }
    .kamar-card-modern .card-body .card-footer .actions .btn-icon {
        width: 34px;
        height: 34px;
        border-radius: 10px;
        border: none;
        cursor: pointer;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.9rem;
    }
    .kamar-card-modern .card-body .card-footer .actions .btn-icon.edit {
        background: #fef3c7;
        color: #92400e;
    }
    .kamar-card-modern .card-body .card-footer .actions .btn-icon.edit:hover {
        background: #fde68a;
        transform: scale(1.05);
    }
    .kamar-card-modern .card-body .card-footer .actions .btn-icon.delete {
        background: #fee2e2;
        color: #b91c1c;
    }
    .kamar-card-modern .card-body .card-footer .actions .btn-icon.delete:hover {
        background: #fecaca;
        transform: scale(1.05);
    }

    .empty-state {
        grid-column: 1 / -1;
        text-align: center;
        padding: 60px 20px;
        background: var(--bg-card);
        border-radius: 20px;
        border: 2px dashed var(--border-color);
    }
    .empty-state i {
        font-size: 3rem;
        color: var(--text-muted);
        display: block;
        margin-bottom: 16px;
    }
    .empty-state h3 {
        font-size: 1.2rem;
        color: var(--text-secondary);
        margin-bottom: 6px;
    }
    .empty-state p {
        color: var(--text-muted);
        font-size: 0.95rem;
    }

    @media (max-width: 768px) {
        .kamar-grid-modern {
            grid-template-columns: 1fr 1fr;
        }
    }
    @media (max-width: 500px) {
        .kamar-grid-modern {
            grid-template-columns: 1fr;
        }
    }
</style>

<!-- HEADER -->
<div class="header-actions-modern">
    <div class="left">
        <h1><i class="fas fa-door-open"></i> Manajemen Kamar</h1>
        <p>Kelola data kamar, tarif, dan fasilitas</p>
    </div>
    <div class="right">
        <a href="<?php echo e(route('admin.kamar.create')); ?>" class="btn-modern-primary">
            <i class="fas fa-plus-circle"></i> Tambah Kamar
        </a>
    </div>
</div>

<!-- KAMAR GRID -->
<div class="kamar-grid-modern">
    <?php $__empty_1 = true; $__currentLoopData = $kamars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kamar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="kamar-card-modern">
        <div class="card-image">
            <?php if($kamar->gambar && file_exists(storage_path('app/public/kamar/' . $kamar->gambar))): ?>
                <img src="<?php echo e(asset('storage/kamar/' . $kamar->gambar)); ?>" alt="<?php echo e($kamar->nama); ?>">
            <?php else: ?>
                <div class="no-image">
                    <i class="fas fa-bed"></i>
                </div>
            <?php endif; ?>
        </div>
        <div class="card-body">
            <div class="card-top">
                <span class="nama"><?php echo e($kamar->nama); ?></span>
                <span class="harga">Rp <?php echo e(number_format($kamar->harga, 0, ',', '.')); ?></span>
            </div>
            <div class="fasilitas-list">
                <?php
                    $fasilitas = explode(',', $kamar->fasilitas ?? '');
                ?>
                <?php $__currentLoopData = array_slice($fasilitas, 0, 4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(trim($fas)): ?>
                        <span class="tag"><i class="fas fa-check-circle" style="color:#b45309; font-size:0.55rem;"></i> <?php echo e(trim($fas)); ?></span>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if(count($fasilitas) > 4): ?>
                    <span class="tag">+<?php echo e(count($fasilitas) - 4); ?></span>
                <?php endif; ?>
            </div>
            <div class="card-footer">
                <span class="status <?php echo e(strtolower($kamar->status)); ?>">
                    <i class="fas fa-circle"></i>
                    <?php echo e($kamar->status); ?>

                </span>
                <div class="actions">
                    <a href="<?php echo e(route('admin.kamar.edit', $kamar)); ?>" class="btn-icon edit" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form method="POST" action="<?php echo e(route('admin.kamar.destroy', $kamar)); ?>" style="display:inline;">
                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn-icon delete" title="Hapus" onclick="return confirm('Yakin hapus kamar <?php echo e($kamar->nama); ?>?')">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="empty-state">
        <i class="fas fa-door-open"></i>
        <h3>Belum ada data kamar</h3>
        <p>Klik tombol "Tambah Kamar" untuk menambahkan kamar baru</p>
    </div>
    <?php endif; ?>
</div>

<!-- Total Kamar -->
<div style="margin-top: 20px; padding: 12px 0; color: var(--text-muted); font-size: 0.85rem; text-align: center; border-top: 1px solid var(--border-color);">
    <i class="fas fa-info-circle"></i> Total <strong style="color:var(--text-primary);"><?php echo e($kamars->count()); ?></strong> kamar terdaftar
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\kos-xyz\resources\views/admin/kamar/index.blade.php ENDPATH**/ ?>