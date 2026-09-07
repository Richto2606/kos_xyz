<?php $__env->startSection('title', 'Manajemen Penyewa · Kos XYZ'); ?>

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
        box-shadow: 0 4px 14px rgba(180, 83, 9, 0.25);
    }
    .btn-modern-primary:hover {
        background: #92400e;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(180, 83, 9, 0.35);
    }

    .btn-modern-outline {
        background: transparent;
        color: #64748b;
        border: 1.5px solid #e2e8f0;
        padding: 8px 18px;
        border-radius: 10px;
        font-weight: 500;
        font-size: 0.85rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        text-decoration: none;
    }
    .btn-modern-outline:hover {
        border-color: #b45309;
        color: #b45309;
        background: #fef3c7;
    }

    /* Penyewa Grid */
    .penyewa-grid-modern {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 24px;
        margin-top: 10px;
    }

    .penyewa-card-modern {
        background: white;
        border-radius: 20px;
        border: 1px solid #f1f5f9;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0,0,0,0.02);
    }
    .penyewa-card-modern:hover {
        transform: translateY(-6px);
        border-color: #fed7aa;
        box-shadow: 0 12px 40px rgba(0,0,0,0.06);
    }

    .penyewa-card-modern .card-header {
        padding: 20px 20px 0;
        display: flex;
        align-items: center;
        gap: 16px;
    }
    .penyewa-card-modern .card-header .avatar {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: #fef3c7;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.6rem;
        font-weight: 700;
        color: #b45309;
        flex-shrink: 0;
    }
    .penyewa-card-modern .card-header .info h3 {
        font-size: 1.1rem;
        font-weight: 700;
        color: #0f172a;
    }
    .penyewa-card-modern .card-header .info .kamar {
        font-size: 0.85rem;
        color: #64748b;
    }
    .penyewa-card-modern .card-header .info .kamar i {
        color: #b45309;
        margin-right: 4px;
    }

    .penyewa-card-modern .card-body {
        padding: 14px 20px 18px;
    }
    .penyewa-card-modern .card-body .detail-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 8px 16px;
    }
    .penyewa-card-modern .card-body .detail-grid .item .label {
        font-size: 0.7rem;
        color: #94a3b8;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .penyewa-card-modern .card-body .detail-grid .item .value {
        font-size: 0.9rem;
        font-weight: 500;
        color: #0f172a;
    }

    .penyewa-card-modern .card-footer {
        padding: 12px 20px 18px;
        border-top: 1px solid #f1f5f9;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .penyewa-card-modern .card-footer .status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 14px;
        border-radius: 40px;
        font-size: 0.75rem;
        font-weight: 600;
    }
    .penyewa-card-modern .card-footer .status.aktif {
        background: #dcfce7;
        color: #15803d;
    }
    .penyewa-card-modern .card-footer .status.non-aktif {
        background: #fee2e2;
        color: #b91c1c;
    }
    .penyewa-card-modern .card-footer .status i {
        font-size: 0.6rem;
    }

    .penyewa-card-modern .card-footer .actions {
        display: flex;
        gap: 8px;
    }
    .penyewa-card-modern .card-footer .actions .btn-icon {
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
    .penyewa-card-modern .card-footer .actions .btn-icon.edit {
        background: #fef3c7;
        color: #92400e;
    }
    .penyewa-card-modern .card-footer .actions .btn-icon.edit:hover {
        background: #fde68a;
        transform: scale(1.05);
    }
    .penyewa-card-modern .card-footer .actions .btn-icon.delete {
        background: #fee2e2;
        color: #b91c1c;
    }
    .penyewa-card-modern .card-footer .actions .btn-icon.delete:hover {
        background: #fecaca;
        transform: scale(1.05);
    }

    .empty-state {
        grid-column: 1 / -1;
        text-align: center;
        padding: 60px 20px;
        background: white;
        border-radius: 20px;
        border: 2px dashed #e2e8f0;
    }
    .empty-state i {
        font-size: 3rem;
        color: #cbd5e1;
        display: block;
        margin-bottom: 16px;
    }
    .empty-state h3 {
        font-size: 1.2rem;
        color: #475569;
        margin-bottom: 6px;
    }
    .empty-state p {
        color: #94a3b8;
        font-size: 0.95rem;
    }

    @media (max-width: 768px) {
        .penyewa-grid-modern {
            grid-template-columns: 1fr 1fr;
        }
    }
    @media (max-width: 500px) {
        .penyewa-grid-modern {
            grid-template-columns: 1fr;
        }
        .penyewa-card-modern .card-body .detail-grid {
            grid-template-columns: 1fr;
        }
        .header-actions-modern .right {
            width: 100%;
        }
        .header-actions-modern .right .btn-modern-primary {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<!-- HEADER -->
<div class="header-actions-modern">
    <div class="left">
        <h1><i class="fas fa-users"></i> Manajemen Penyewa</h1>
        <p>Data diri, status, dan riwayat penyewa</p>
    </div>
    <div class="right">
        <a href="<?php echo e(route('admin.penyewa.create')); ?>" class="btn-modern-primary">
            <i class="fas fa-user-plus"></i> Tambah Penyewa
        </a>
    </div>
</div>

<!-- PENYEWA GRID -->
<div class="penyewa-grid-modern">
    <?php $__empty_1 = true; $__currentLoopData = $penyewas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $penyewa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="penyewa-card-modern">
        <!-- Header -->
        <div class="card-header">
            <div class="avatar">
                <?php echo e(strtoupper(substr($penyewa->nama_lengkap, 0, 1))); ?>

            </div>
            <div class="info">
                <h3><?php echo e($penyewa->nama_lengkap); ?></h3>
                <div class="kamar">
                    <i class="fas fa-door-open"></i> <?php echo e($penyewa->kamar->nama ?? 'Belum ditentukan'); ?>

                </div>
            </div>
        </div>

        <!-- Body -->
        <div class="card-body">
            <div class="detail-grid">
                <div class="item">
                    <div class="label">No. KTP</div>
                    <div class="value"><?php echo e($penyewa->ktp); ?></div>
                </div>
                <div class="item">
                    <div class="label">No. HP</div>
                    <div class="value"><?php echo e($penyewa->no_hp); ?></div>
                </div>
                <div class="item">
                    <div class="label">Kontak Darurat</div>
                    <div class="value"><?php echo e($penyewa->kontak_darurat ?? '-'); ?></div>
                </div>
                <div class="item">
                    <div class="label">Pekerjaan</div>
                    <div class="value"><?php echo e($penyewa->pekerjaan ?? '-'); ?></div>
                </div>
                <div class="item">
                    <div class="label">Mulai Sewa</div>
                    <div class="value"><?php echo e($penyewa->tanggal_mulai_sewa ? \Carbon\Carbon::parse($penyewa->tanggal_mulai_sewa)->format('d/m/Y') : '-'); ?></div>
                </div>
                <div class="item">
                    <div class="label">Berakhir Sewa</div>
                    <div class="value"><?php echo e($penyewa->tanggal_berakhir_sewa ? \Carbon\Carbon::parse($penyewa->tanggal_berakhir_sewa)->format('d/m/Y') : '-'); ?></div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="card-footer">
            <span class="status <?php echo e(strtolower($penyewa->status)); ?>">
                <i class="fas fa-circle"></i>
                <?php echo e($penyewa->status); ?>

            </span>
            <div class="actions">
                <a href="<?php echo e(route('admin.penyewa.edit', $penyewa)); ?>" class="btn-icon edit" title="Edit">
                    <i class="fas fa-edit"></i>
                </a>
                <form method="POST" action="<?php echo e(route('admin.penyewa.destroy', $penyewa)); ?>" style="display:inline;">
                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn-icon delete" title="Hapus" onclick="return confirm('Yakin hapus penyewa <?php echo e($penyewa->nama_lengkap); ?>?')">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="empty-state">
        <i class="fas fa-users"></i>
        <h3>Belum ada data penyewa</h3>
        <p>Klik tombol "Tambah Penyewa" untuk menambahkan penyewa baru</p>
    </div>
    <?php endif; ?>
</div>

<!-- Total Penyewa -->
<div style="margin-top: 20px; padding: 12px 0; color: #94a3b8; font-size: 0.85rem; text-align: center; border-top: 1px solid #f1f5f9;">
    <i class="fas fa-info-circle"></i> Total <strong style="color:#0f172a;"><?php echo e($penyewas->count()); ?></strong> penyewa terdaftar
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Kerjaan\kos_xyz-main\kos_xyz-main\resources\views/admin/penyewa/index.blade.php ENDPATH**/ ?>