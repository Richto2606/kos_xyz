

<?php $__env->startSection('title', 'Manajemen Tagihan · Kos XYZ'); ?>

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
        flex-wrap: wrap;
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

    .btn-modern-success {
        background: #22c55e;
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
        box-shadow: 0 4px 14px rgba(34, 197, 94, 0.25);
    }
    .btn-modern-success:hover {
        background: #16a34a;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(34, 197, 94, 0.35);
    }

    /* Statistik Tagihan */
    .tagihan-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 16px;
        margin-bottom: 28px;
    }
    .tagihan-stat-card {
        background: white;
        border-radius: 16px;
        padding: 18px 20px;
        border: 1px solid #f1f5f9;
        text-align: center;
        transition: all 0.3s ease;
    }
    .tagihan-stat-card:hover {
        border-color: #fed7aa;
        transform: translateY(-2px);
        box-shadow: 0 4px 16px rgba(0,0,0,0.04);
    }
    .tagihan-stat-card .number {
        font-size: 2rem;
        font-weight: 800;
    }
    .tagihan-stat-card .label {
        font-size: 0.8rem;
        color: #64748b;
        margin-top: 2px;
    }
    .tagihan-stat-card .number.green { color: #22c55e; }
    .tagihan-stat-card .number.yellow { color: #f59e0b; }
    .tagihan-stat-card .number.red { color: #ef4444; }
    .tagihan-stat-card .number.blue { color: #3b82f6; }

    /* Tagihan Grid */
    .tagihan-grid-modern {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
        gap: 20px;
        margin-top: 10px;
    }

    .tagihan-card-modern {
        background: white;
        border-radius: 16px;
        border: 1px solid #f1f5f9;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0,0,0,0.02);
    }
    .tagihan-card-modern:hover {
        transform: translateY(-4px);
        border-color: #fed7aa;
        box-shadow: 0 8px 30px rgba(0,0,0,0.06);
    }

    .tagihan-card-modern .card-header {
        padding: 16px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #f1f5f9;
        background: #fafbfc;
    }
    .tagihan-card-modern .card-header .penyewa {
        font-weight: 700;
        font-size: 1.05rem;
        color: #0f172a;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .tagihan-card-modern .card-header .penyewa i {
        color: #b45309;
    }
    .tagihan-card-modern .card-header .periode {
        font-size: 0.85rem;
        color: #64748b;
        background: #f1f5f9;
        padding: 2px 14px;
        border-radius: 40px;
    }

    .tagihan-card-modern .card-body {
        padding: 16px 20px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 8px 16px;
    }
    .tagihan-card-modern .card-body .item .label {
        font-size: 0.7rem;
        color: #94a3b8;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }
    .tagihan-card-modern .card-body .item .value {
        font-size: 1rem;
        font-weight: 600;
        color: #0f172a;
    }
    .tagihan-card-modern .card-body .item .value.total {
        color: #b45309;
        font-size: 1.2rem;
    }

    .tagihan-card-modern .card-footer {
        padding: 12px 20px 16px;
        border-top: 1px solid #f1f5f9;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #fafbfc;
    }
    .tagihan-card-modern .card-footer .status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 16px;
        border-radius: 40px;
        font-size: 0.75rem;
        font-weight: 600;
    }
    .tagihan-card-modern .card-footer .status.paid {
        background: #dcfce7;
        color: #15803d;
    }
    .tagihan-card-modern .card-footer .status.unpaid {
        background: #fee2e2;
        color: #b91c1c;
    }
    .tagihan-card-modern .card-footer .status.pending {
        background: #fef9c3;
        color: #a16207;
    }
    .tagihan-card-modern .card-footer .status i {
        font-size: 0.6rem;
    }

    .tagihan-card-modern .card-footer .actions .btn-icon {
        width: 34px;
        height: 34px;
        border-radius: 10px;
        border: none;
        cursor: pointer;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 0.85rem;
        background: #dbeafe;
        color: #1e40af;
    }
    .tagihan-card-modern .card-footer .actions .btn-icon:hover {
        background: #bfdbfe;
        transform: scale(1.05);
    }

    /* Notifikasi Section */
    .notifikasi-section {
        background: white;
        border-radius: 16px;
        padding: 24px 28px;
        border: 1px solid #f1f5f9;
        margin-top: 28px;
    }
    .notifikasi-section h3 {
        font-size: 1.1rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 14px;
    }
    .notifikasi-section h3 i {
        color: #b45309;
    }
    .notifikasi-section .notif-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }
    .notifikasi-section .notif-buttons .btn-notif {
        padding: 8px 20px;
        border-radius: 40px;
        font-weight: 600;
        font-size: 0.85rem;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
    }
    .notifikasi-section .notif-buttons .btn-notif.wa {
        background: #25D366;
        color: white;
    }
    .notifikasi-section .notif-buttons .btn-notif.wa:hover {
        background: #1ebe57;
        transform: translateY(-2px);
    }
    .notifikasi-section .notif-buttons .btn-notif.email {
        background: #3b82f6;
        color: white;
    }
    .notifikasi-section .notif-buttons .btn-notif.email:hover {
        background: #2563eb;
        transform: translateY(-2px);
    }
    .notifikasi-section .notif-buttons .btn-notif.reminder {
        background: #f59e0b;
        color: white;
    }
    .notifikasi-section .notif-buttons .btn-notif.reminder:hover {
        background: #d97706;
        transform: translateY(-2px);
    }

    .empty-state {
        grid-column: 1 / -1;
        text-align: center;
        padding: 50px 20px;
        background: white;
        border-radius: 16px;
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

    .toast-notif {
        position: fixed;
        bottom: 30px;
        right: 30px;
        background: #0f172a;
        color: white;
        padding: 14px 28px;
        border-radius: 12px;
        box-shadow: 0 8px 30px rgba(0,0,0,0.2);
        font-weight: 500;
        z-index: 9999;
        display: none;
        animation: slideUp 0.3s ease;
    }
    .toast-notif.show {
        display: block;
    }
    @keyframes slideUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 600px) {
        .tagihan-grid-modern {
            grid-template-columns: 1fr;
        }
        .tagihan-card-modern .card-body {
            grid-template-columns: 1fr;
        }
        .header-actions-modern .right {
            width: 100%;
        }
        .header-actions-modern .right .btn-modern-primary,
        .header-actions-modern .right .btn-modern-success {
            width: 100%;
            justify-content: center;
        }
        .tagihan-stats {
            grid-template-columns: 1fr 1fr;
        }
    }
</style>

<!-- HEADER -->
<div class="header-actions-modern">
    <div class="left">
        <h1><i class="fas fa-file-invoice"></i> Manajemen Tagihan</h1>
        <p>Auto-generate invoice, status pembayaran</p>
    </div>
    <div class="right">
        <form method="POST" action="<?php echo e(route('admin.tagihan.generate')); ?>" style="display:inline;">
            <?php echo csrf_field(); ?>
            <button type="submit" class="btn-modern-success">
                <i class="fas fa-sync-alt"></i> Generate Tagihan
            </button>
        </form>
    </div>
</div>

<!-- STATISTIK TAGIHAN -->
<?php
    $totalTagihan = $tagihans->count();
    $paid = $tagihans->where('status', 'Paid')->count();
    $unpaid = $tagihans->where('status', 'Unpaid')->count();
    $pending = $tagihans->where('status', 'Pending')->count();
    $totalNominal = $tagihans->where('status', 'Paid')->sum('nominal');
?>

<div class="tagihan-stats">
    <div class="tagihan-stat-card">
        <div class="number blue"><?php echo e($totalTagihan); ?></div>
        <div class="label">📋 Total Tagihan</div>
    </div>
    <div class="tagihan-stat-card">
        <div class="number green"><?php echo e($paid); ?></div>
        <div class="label">✅ Lunas</div>
    </div>
    <div class="tagihan-stat-card">
        <div class="number yellow"><?php echo e($pending); ?></div>
        <div class="label">⏳ Pending</div>
    </div>
    <div class="tagihan-stat-card">
        <div class="number red"><?php echo e($unpaid); ?></div>
        <div class="label">❌ Belum Bayar</div>
    </div>
    <div class="tagihan-stat-card">
        <div class="number" style="color:#b45309;">Rp <?php echo e(number_format($totalNominal, 0, ',', '.')); ?></div>
        <div class="label">💰 Total Pendapatan</div>
    </div>
</div>

<!-- TAGIHAN GRID -->
<div class="tagihan-grid-modern">
    <?php $__empty_1 = true; $__currentLoopData = $tagihans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tagihan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="tagihan-card-modern">
        <div class="card-header">
            <span class="penyewa">
                <i class="fas fa-user-circle"></i>
                <?php echo e($tagihan->penyewa->nama_lengkap ?? 'Tidak diketahui'); ?>

            </span>
            <span class="periode"><?php echo e($tagihan->bulan); ?> <?php echo e($tagihan->tahun); ?></span>
        </div>
        <div class="card-body">
            <div class="item">
                <div class="label">Nominal</div>
                <div class="value total">Rp <?php echo e(number_format($tagihan->nominal, 0, ',', '.')); ?></div>
            </div>
            <div class="item">
                <div class="label">Biaya Tambahan</div>
                <div class="value"><?php echo e($tagihan->biaya_tambahan > 0 ? 'Rp '.number_format($tagihan->biaya_tambahan, 0, ',', '.') : '-'); ?></div>
            </div>
            <div class="item" style="grid-column: 1 / -1;">
                <div class="label">Total</div>
                <div class="value total">Rp <?php echo e(number_format($tagihan->nominal + $tagihan->biaya_tambahan, 0, ',', '.')); ?></div>
            </div>
            <?php if($tagihan->keterangan_tambahan): ?>
            <div class="item" style="grid-column: 1 / -1;">
                <div class="label">Keterangan</div>
                <div class="value" style="font-size:0.85rem; font-weight:400; color:#64748b;"><?php echo e($tagihan->keterangan_tambahan); ?></div>
            </div>
            <?php endif; ?>
        </div>
        <div class="card-footer">
            <span class="status <?php echo e(strtolower($tagihan->status)); ?>">
                <i class="fas fa-circle"></i>
                <?php if($tagihan->status == 'Paid'): ?>
                    ✅ Lunas
                <?php elseif($tagihan->status == 'Pending'): ?>
                    ⏳ Pending
                <?php else: ?>
                    ❌ Belum Bayar
                <?php endif; ?>
            </span>
            <div class="actions">
                <form method="POST" action="<?php echo e(route('admin.tagihan.updateStatus', $tagihan->id)); ?>" style="display:inline;">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn-icon" title="Update Status">
                        <i class="fas fa-sync-alt"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="empty-state">
        <i class="fas fa-file-invoice"></i>
        <h3>Belum ada tagihan</h3>
        <p>Klik tombol "Generate Tagihan" untuk membuat tagihan baru</p>
    </div>
    <?php endif; ?>
</div>

<!-- NOTIFIKASI -->
<div class="notifikasi-section">
    <h3><i class="fas fa-bell"></i> Kirim Notifikasi</h3>
    <div class="notif-buttons">
        <form method="POST" action="<?php echo e(route('admin.notifikasi.wa')); ?>" style="display:inline;">
            <?php echo csrf_field(); ?>
            <button type="submit" class="btn-notif wa">
                <i class="fab fa-whatsapp"></i> Kirim WA
            </button>
        </form>
        <form method="POST" action="<?php echo e(route('admin.notifikasi.email')); ?>" style="display:inline;">
            <?php echo csrf_field(); ?>
            <button type="submit" class="btn-notif email">
                <i class="fas fa-envelope"></i> Kirim Email
            </button>
        </form>
        <form method="POST" action="<?php echo e(route('admin.notifikasi.reminder')); ?>" style="display:inline;">
            <?php echo csrf_field(); ?>
            <button type="submit" class="btn-notif reminder">
                <i class="fas fa-clock"></i> Auto-Reminder (H-3)
            </button>
        </form>
    </div>
    <?php if(session('success')): ?>
    <div style="margin-top: 14px; padding: 12px 18px; background: #dcfce7; border-radius: 10px; color: #15803d; font-weight:500; display:flex; align-items:center; gap:8px;">
        <i class="fas fa-check-circle"></i> <?php echo e(session('success')); ?>

    </div>
    <?php endif; ?>
</div>

<!-- Toast -->
<div class="toast-notif" id="toastNotif"></div>

<script>
    // Show toast jika ada session flash
    <?php if(session('success')): ?>
        showToast('<?php echo e(session('success')); ?>');
    <?php endif; ?>

    function showToast(msg) {
        const t = document.getElementById('toastNotif');
        t.textContent = msg;
        t.classList.add('show');
        setTimeout(() => t.classList.remove('show'), 3000);
    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\kos-xyz\resources\views/admin/tagihan/index.blade.php ENDPATH**/ ?>