<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $__env->yieldContent('title', 'Admin · Kos XYZ'); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <style>
        * { margin:0; padding:0; box-sizing:border-box; font-family:'Inter',sans-serif; }
        body { background:#f8fafc; color:#0f172a; }

        .sidebar { position:fixed; top:0; left:0; width:250px; height:100%; background:#0f172a; color:white; padding:24px 20px; overflow-y:auto; z-index:50; }
        .sidebar .brand { font-size:1.4rem; font-weight:700; margin-bottom:32px; display:flex; align-items:center; gap:10px; }
        .sidebar .brand i { color:#fbbf24; }
        .sidebar .menu { list-style:none; }
        .sidebar .menu a { display:flex; align-items:center; gap:14px; padding:12px 16px; border-radius:12px; margin-bottom:4px; text-decoration:none; color:#cbd5e1; font-weight:500; transition:0.2s; }
        .sidebar .menu a:hover { background:#1e293b; color:white; }
        .sidebar .menu a.active { background:#b45309; color:white; }
        .sidebar .menu a i { width:22px; text-align:center; }

        .sidebar .logout-btn { position:absolute; bottom:30px; left:20px; right:20px; }
        .sidebar .logout-btn button { width:100%; padding:12px; background:#1e293b; border:none; border-radius:12px; color:#94a3b8; cursor:pointer; transition:0.2s; font-weight:500; font-size:1rem; }
        .sidebar .logout-btn button:hover { background:#dc2626; color:white; }

        .main-content { margin-left:250px; padding:28px 36px; background:#f8fafc; min-height:100vh; }
        .page-title { font-size:2rem; font-weight:700; margin-bottom:8px; display:flex; align-items:center; gap:10px; }
        .page-title i { color:#b45309; }
        .page-sub { color:#64748b; margin-bottom:28px; }

        .badge { display:inline-block; padding:4px 14px; border-radius:40px; font-size:0.75rem; font-weight:600; }
        .badge-success { background:#dcfce7; color:#15803d; }
        .badge-danger { background:#fee2e2; color:#b91c1c; }
        .badge-warning { background:#fef9c3; color:#a16207; }

        .btn-primary { background:#b45309; color:white; border:none; padding:8px 20px; border-radius:40px; font-weight:600; cursor:pointer; transition:0.2s; display:inline-flex; align-items:center; gap:8px; font-size:0.9rem; text-decoration:none; }
        .btn-primary:hover { background:#92400e; }
    </style>
</head>
<body>
    <!-- SIDEBAR -->
    <nav class="sidebar">
        <div class="brand"><i class="fas fa-home"></i> Kos XYZ</div>
        <ul class="menu">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="<?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
                <i class="fas fa-chart-pie"></i> Ringkasan
            </a>
            <a href="<?php echo e(route('admin.kamar.index')); ?>" class="<?php echo e(request()->routeIs('admin.kamar.*') ? 'active' : ''); ?>">
                <i class="fas fa-door-open"></i> Manajemen Kamar
            </a>
            <a href="<?php echo e(route('admin.penyewa.index')); ?>" class="<?php echo e(request()->routeIs('admin.penyewa.*') ? 'active' : ''); ?>">
                <i class="fas fa-users"></i> Manajemen Penyewa
            </a>
            <a href="<?php echo e(route('admin.tagihan.index')); ?>" class="<?php echo e(request()->routeIs('admin.tagihan.*') ? 'active' : ''); ?>">
                <i class="fas fa-file-invoice"></i> Tagihan
            </a>
        </ul>
        <div class="logout-btn">
            <form method="POST" action="<?php echo e(route('admin.logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit"><i class="fas fa-sign-out-alt"></i> Keluar</button>
            </form>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\kos-xyz\resources\views/layouts/admin.blade.php ENDPATH**/ ?>