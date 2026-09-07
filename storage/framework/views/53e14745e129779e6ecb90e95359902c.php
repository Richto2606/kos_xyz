<?php $__env->startSection('title', 'Tambah Artikel · Kos XYZ'); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.artikel.form', ['artikel' => null, 'formAction' => route('admin.artikel.store'), 'formMethod' => 'POST', 'submitLabel' => 'Simpan'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Kerjaan\kos_xyz-main\kos_xyz-main\resources\views\admin\artikel\create.blade.php ENDPATH**/ ?>