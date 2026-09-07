<?php $__env->startSection('title', 'Edit Artikel · Kos XYZ'); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.artikel.form', ['artikel' => $artikel, 'formAction' => route('admin.artikel.update', $artikel), 'formMethod' => 'PUT', 'submitLabel' => 'Update'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Kerjaan\kos_xyz-main\kos_xyz-main\resources\views\admin\artikel\edit.blade.php ENDPATH**/ ?>