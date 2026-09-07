<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Admin · Kos XYZ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <style>
        * { margin:0; padding:0; box-sizing:border-box; font-family:'Inter',sans-serif; }
        body { background:linear-gradient(135deg, #fef9f0, #fef0db); display:flex; justify-content:center; align-items:center; min-height:100vh; }
        .login-box { background:white; padding:40px 36px; border-radius:32px; box-shadow:0 20px 50px rgba(0,0,0,0.06); width:100%; max-width:400px; border:1px solid #f1f5f9; }
        .login-box h2 { font-size:1.8rem; font-weight:700; margin-bottom:8px; }
        .login-box h2 i { color:#b45309; }
        .login-box .sub { color:#64748b; margin-bottom:28px; }
        .login-box label { font-weight:600; font-size:0.9rem; display:block; margin-top:16px; }
        .login-box input { width:100%; padding:12px 16px; border:1px solid #e2e8f0; border-radius:12px; margin-top:6px; font-size:1rem; background:#f8fafc; }
        .login-box input:focus { outline:none; border-color:#b45309; box-shadow:0 0 0 3px rgba(180,83,9,0.1); background:white; }
        .login-box .btn-login { width:100%; padding:14px; background:#b45309; color:white; border:none; border-radius:60px; font-weight:700; font-size:1rem; margin-top:24px; cursor:pointer; transition:0.2s; }
        .login-box .btn-login:hover { background:#92400e; }
        .alert-danger { color:#dc2626; font-size:0.9rem; margin-top:12px; background:#fee2e2; padding:10px 16px; border-radius:12px; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2><i class="fas fa-home"></i> Kos XYZ</h2>
        <p class="sub">Admin Panel · Masuk ke dashboard</p>
        <?php if($errors->any()): ?>
            <div class="alert-danger"><?php echo e($errors->first()); ?></div>
        <?php endif; ?>
        <form method="POST" action="<?php echo e(route('admin.login.post')); ?>">
            <?php echo csrf_field(); ?>
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="admin" value="admin" />
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="••••••••" value="admin123" />
            <button type="submit" class="btn-login"><i class="fas fa-arrow-right-to-bracket"></i> Masuk</button>
        </form>
        <p style="margin-top:16px; font-size:0.85rem; color:#94a3b8; text-align:center;">Default: admin / admin123</p>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\kos-xyz\resources\views/admin/login.blade.php ENDPATH**/ ?>