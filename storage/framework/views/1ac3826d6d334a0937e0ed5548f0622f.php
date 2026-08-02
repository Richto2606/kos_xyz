

<?php $__env->startSection('title', 'Test Layout'); ?>

<?php $__env->startSection('content'); ?>
<div style="padding:20px;">
    <h1 style="font-size:2rem; font-weight:700; margin-bottom:20px;">
        <i class="fas fa-check-circle" style="color:#22c55e;"></i> Test Layout Admin
    </h1>
    <div style="background:white; border-radius:12px; padding:30px; border:1px solid #f1f5f9;">
        <p style="font-size:1.1rem;">✅ Jika ini muncul, layout admin berfungsi!</p>
        <p style="color:#64748b; margin-top:10px;">Total Kamar: <strong><?php echo e($totalKamar ?? 0); ?></strong></p>
        <hr style="margin:20px 0; border-color:#f1f5f9;">
        <p style="color:#94a3b8; font-size:0.9rem;">
            <a href="<?php echo e(route('admin.dashboard')); ?>" style="color:#b45309; text-decoration:none;">Kembali ke Dashboard</a>
        </p>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\kos-xyz\resources\views/admin/dashboard-test-layout.blade.php ENDPATH**/ ?>