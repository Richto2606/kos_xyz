<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detail <?php echo e($kamar->nama); ?> · Kos XYZ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <style>
        * { margin:0; padding:0; box-sizing:border-box; font-family:'Inter',sans-serif; }
        body { background:#f8fafc; color:#0f172a; }
        .container { max-width:800px; margin:40px auto; padding:0 20px; }
        .back-link { color:#b45309; text-decoration:none; font-weight:500; display:inline-block; margin-bottom:20px; }
        .back-link:hover { text-decoration:underline; }
        .detail-card { background:white; border-radius:24px; padding:30px; border:1px solid #f1f5f9; box-shadow:0 4px 12px rgba(0,0,0,0.02); }
        .detail-card h1 { font-size:2rem; font-weight:700; margin-bottom:16px; }
        .detail-card .gambar-detail { width:100%; max-height:400px; object-fit:cover; border-radius:16px; margin:16px 0; border:1px solid #f1f5f9; }
        .detail-card .info { display:grid; grid-template-columns:1fr 1fr; gap:12px; margin:16px 0; }
        .detail-card .info-item { background:#f8fafc; padding:12px 16px; border-radius:12px; }
        .detail-card .info-item .label { font-size:0.85rem; color:#64748b; }
        .detail-card .info-item .value { font-weight:600; margin-top:4px; }
        .btn-wa { display:inline-block; margin-top:20px; padding:12px 28px; background:#25D366; color:white; border-radius:40px; text-decoration:none; font-weight:600; transition:0.2s; }
        .btn-wa:hover { background:#1ebe57; transform:scale(1.02); }
        .badge { display:inline-block; padding:4px 16px; border-radius:40px; font-size:0.8rem; font-weight:600; }
        .badge-success { background:#dcfce7; color:#15803d; }
        .badge-danger { background:#fee2e2; color:#b91c1c; }
        .badge-warning { background:#fef9c3; color:#a16207; }
        @media (max-width:600px) { .detail-card .info { grid-template-columns:1fr; } }
    </style>
</head>
<body>
    <div class="container">
        <a href="<?php echo e(route('home')); ?>" class="back-link">
            <i class="fas fa-arrow-left"></i> Kembali ke Beranda
        </a>
        
        <div class="detail-card">
            <h1><?php echo e($kamar->nama); ?></h1>
            
            <div>
                <img src="<?php echo e($kamar->gambar_url); ?>" alt="<?php echo e($kamar->nama); ?>" class="gambar-detail">
            </div>
            
            <div class="info">
                <div class="info-item">
                    <div class="label">💰 Harga</div>
                    <div class="value">Rp <?php echo e(number_format($kamar->harga, 0, ',', '.')); ?> / bulan</div>
                </div>
                <div class="info-item">
                    <div class="label">📊 Status</div>
                    <div class="value">
                        <span class="badge <?php echo e($kamar->status == 'Tersedia' ? 'badge-success' : ($kamar->status == 'Penuh' ? 'badge-danger' : 'badge-warning')); ?>">
                            <?php echo e($kamar->status); ?>

                        </span>
                    </div>
                </div>
                <div class="info-item" style="grid-column:1/-1;">
                    <div class="label">📝 Deskripsi</div>
                    <div class="value"><?php echo e($kamar->deskripsi ?? 'Kamar nyaman dengan fasilitas lengkap'); ?></div>
                </div>
                <div class="info-item" style="grid-column:1/-1;">
                    <div class="label">🛋️ Fasilitas</div>
                    <div class="value" style="display:flex; flex-wrap:wrap; gap:8px; margin-top:4px;">
                        <?php $__currentLoopData = explode(',', $kamar->fasilitas ?? ''); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span style="background:#fef3c7; padding:4px 12px; border-radius:40px; font-size:0.85rem; color:#92400e;">
                            <i class="fas fa-check-circle" style="color:#b45309;"></i> <?php echo e(trim($fas)); ?>

                        </span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            
            <a href="https://wa.me/628123456789?text=Halo%20Kos%20XYZ%2C%20saya%20tertarik%20dengan%20<?php echo e(urlencode($kamar->nama)); ?>" 
               class="btn-wa">
                <i class="fab fa-whatsapp"></i> Pesan Sekarang
            </a>
        </div>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\kos-xyz\resources\views/public/detail.blade.php ENDPATH**/ ?>