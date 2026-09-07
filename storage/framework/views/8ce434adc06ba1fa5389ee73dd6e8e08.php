<?php $__env->startSection('title', 'Booking · Kos XYZ'); ?>
<?php $__env->startSection('content'); ?>
<h1 class="page-title"><i class="fas fa-calendar-check"></i> Booking Masuk</h1>
<p style="color:var(--text-muted);margin-bottom:20px">Cari dan kelola status booking dari satu halaman.</p>
<form method="GET" action="<?php echo e(route('admin.booking.index')); ?>" style="display:flex;gap:8px;flex-wrap:wrap;margin-bottom:20px">
    <input name="kode" placeholder="Kode booking" value="<?php echo e(request('kode')); ?>">
    <input name="no_hp" placeholder="Nomor HP" value="<?php echo e(request('no_hp')); ?>">
    <select name="status"><option value="">Semua status</option><?php $__currentLoopData = ['Menunggu','Dikonfirmasi','Ditolak','Selesai']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($status); ?>" <?php if(request('status') === $status): echo 'selected'; endif; ?>><?php echo e($status); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select>
    <button type="submit">Cek Status</button>
    <a href="<?php echo e(route('admin.booking.index')); ?>">Reset</a>
</form>
<div style="display:grid;gap:16px">
<?php $__empty_1 = true; $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<div style="background:var(--bg-card);padding:20px;border-radius:16px;border:1px solid var(--border-color)">
<strong><?php echo e($booking->kode); ?> · <?php echo e($booking->nama_lengkap); ?></strong> <span><?php echo e($booking->status); ?></span>
<p style="color:var(--text-muted);margin:8px 0"><?php echo e($booking->kamar->nama); ?> · <?php echo e($booking->no_hp); ?> · <?php echo e($booking->tanggal_masuk->format('d M Y')); ?> · <?php echo e($booking->durasi_bulan); ?> bulan</p>
<form method="POST" action="<?php echo e(route('admin.booking.updateStatus', $booking)); ?>" style="display:flex;gap:8px;flex-wrap:wrap;margin-top:12px">
<?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
<select name="status"><?php $__currentLoopData = ['Menunggu','Dikonfirmasi','Ditolak','Selesai']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option <?php if($booking->status === $status): echo 'selected'; endif; ?>><?php echo e($status); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select>
<input name="alasan_penolakan" placeholder="Alasan jika ditolak" value="<?php echo e($booking->alasan_penolakan); ?>">
<button type="submit">Simpan Status</button>
<a href="https://wa.me/<?php echo e(preg_replace('/\D+/', '', $booking->no_hp)); ?>?text=<?php echo e(urlencode('Halo '.$booking->nama_lengkap.', status booking '.$booking->kode.' adalah '.$booking->status.'.')); ?>" target="_blank">WhatsApp</a>
</form>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> <p>Booking tidak ditemukan.</p> <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Kerjaan\kos_xyz-main\kos_xyz-main\resources\views/admin/booking/index.blade.php ENDPATH**/ ?>