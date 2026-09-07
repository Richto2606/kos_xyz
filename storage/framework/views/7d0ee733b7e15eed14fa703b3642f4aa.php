<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $__env->yieldContent('title', 'Admin · Kos XYZ'); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <style>
        /* ===== CSS VARIABLES ===== */
        :root {
            --bg-primary: #f8fafc;
            --bg-secondary: #ffffff;
            --bg-sidebar: #0f172a;
            --bg-card: #ffffff;
            --bg-input: #fafbfc;
            --text-primary: #0f172a;
            --text-secondary: #334155;
            --text-muted: #64748b;
            --text-sidebar: #cbd5e1;
            --border-color: #f1f5f9;
            --shadow-color: rgba(0,0,0,0.04);
            --shadow-hover: rgba(180,83,9,0.06);
            --transition-speed: 0.3s;
            --badge-bg: #fef3c7;
            --badge-text: #92400e;
        }

        /* ===== DARK MODE ===== */
        [data-theme="dark"] {
            --bg-primary: #0f172a;
            --bg-secondary: #1e293b;
            --bg-sidebar: #0b1120;
            --bg-card: #1e293b;
            --bg-input: #2d3748;
            --text-primary: #f8fafc;
            --text-secondary: #cbd5e1;
            --text-muted: #94a3b8;
            --text-sidebar: #94a3b8;
            --border-color: #334155;
            --shadow-color: rgba(0,0,0,0.3);
            --shadow-hover: rgba(180,83,9,0.15);
            --badge-bg: #1e293b;
            --badge-text: #fbbf24;
        }

        * { margin:0; padding:0; box-sizing:border-box; font-family:'Inter',sans-serif; }
        body { 
            background: var(--bg-primary); 
            color: var(--text-primary);
            transition: background var(--transition-speed), color var(--transition-speed);
        }

        /* ===== SIDEBAR ===== */
        .sidebar { 
            position:fixed; 
            top:0; 
            left:0; 
            width:250px; 
            height:100%; 
            background: var(--bg-sidebar); 
            color:white; 
            padding:24px 20px; 
            overflow-y:auto; 
            z-index:50;
            transition: background var(--transition-speed);
        }
        .sidebar .brand { 
            font-size:1.4rem; 
            font-weight:700; 
            margin-bottom:32px; 
            display:flex; 
            align-items:center; 
            gap:10px; 
            color: white;
        }
        .sidebar .brand i { color:#fbbf24; }
        .sidebar .menu { list-style:none; }
        .sidebar .menu a { 
            display:flex; 
            align-items:center; 
            gap:14px; 
            padding:12px 16px; 
            border-radius:12px; 
            margin-bottom:4px; 
            text-decoration:none; 
            color: var(--text-sidebar); 
            font-weight:500; 
            transition:0.2s; 
        }
        .sidebar .menu a:hover { background:#1e293b; color:white; }
        .sidebar .menu a.active { background:#b45309; color:white; }
        .sidebar .menu a i { width:22px; text-align:center; }

        .sidebar .logout-btn { position:absolute; bottom:30px; left:20px; right:20px; }
        .sidebar .logout-btn button { 
            width:100%; 
            padding:12px; 
            background:#1e293b; 
            border:none; 
            border-radius:12px; 
            color:#94a3b8; 
            cursor:pointer; 
            transition:0.2s; 
            font-weight:500; 
            font-size:1rem; 
        }
        .sidebar .logout-btn button:hover { background:#dc2626; color:white; }

        /* ===== THEME TOGGLE ===== */
        .theme-toggle-admin {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 16px;
            margin: 10px 0 20px;
            border-radius: 12px;
            background: #1e293b;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            width: 100%;
            color: #cbd5e1;
            font-size: 0.9rem;
            font-weight: 500;
        }
        .theme-toggle-admin:hover {
            background: #2d3748;
        }
        .theme-toggle-admin .toggle-track {
            width: 40px;
            height: 22px;
            background: #475569;
            border-radius: 40px;
            position: relative;
            transition: all 0.3s ease;
            flex-shrink: 0;
        }
        .theme-toggle-admin .toggle-track .toggle-thumb {
            width: 18px;
            height: 18px;
            background: white;
            border-radius: 50%;
            position: absolute;
            top: 2px;
            left: 2px;
            transition: all 0.3s ease;
        }
        [data-theme="dark"] .theme-toggle-admin .toggle-track {
            background: #b45309;
        }
        [data-theme="dark"] .theme-toggle-admin .toggle-track .toggle-thumb {
            left: 20px;
        }
        .theme-toggle-admin .toggle-label {
            flex: 1;
            text-align: left;
        }
        .theme-toggle-admin .toggle-icon {
            font-size: 1.1rem;
        }

        /* ===== MAIN CONTENT ===== */
        .main-content { 
            margin-left:250px; 
            padding:28px 36px; 
            background: var(--bg-primary); 
            min-height:100vh;
            transition: background var(--transition-speed);
        }
        .page-title { 
            font-size:2rem; 
            font-weight:700; 
            margin-bottom:8px; 
            display:flex; 
            align-items:center; 
            gap:10px; 
            color: var(--text-primary);
        }
        .page-title i { color:#b45309; }
        .page-sub { color: var(--text-muted); margin-bottom:28px; }

        .badge { display:inline-block; padding:4px 14px; border-radius:40px; font-size:0.75rem; font-weight:600; }
        .badge-success { background:#dcfce7; color:#15803d; }
        .badge-danger { background:#fee2e2; color:#b91c1c; }
        .badge-warning { background:#fef9c3; color:#a16207; }

        .btn-primary { background:#b45309; color:white; border:none; padding:8px 20px; border-radius:40px; font-weight:600; cursor:pointer; transition:0.2s; display:inline-flex; align-items:center; gap:8px; font-size:0.9rem; text-decoration:none; }
        .btn-primary:hover { background:#92400e; }

        /* ===== TOAST NOTIFICATION ===== */
        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            gap: 10px;
            max-width: 380px;
            width: 100%;
            pointer-events: none;
        }
        .toast-item {
            background: var(--bg-card);
            border-radius: 16px;
            padding: 16px 20px;
            box-shadow: 0 12px 40px rgba(0,0,0,0.15);
            border-left: 5px solid #b45309;
            display: flex;
            align-items: flex-start;
            gap: 14px;
            transform: translateX(120%);
            animation: slideIn 0.5s ease forwards;
            pointer-events: auto;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            color: var(--text-primary);
        }
        .toast-item.hide {
            animation: slideOut 0.4s ease forwards;
        }
        .toast-item .toast-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
        }
        .toast-item .toast-icon.success { background: #dcfce7; color: #15803d; }
        .toast-item .toast-icon.error { background: #fee2e2; color: #b91c1c; }
        .toast-item .toast-icon.warning { background: #fef9c3; color: #a16207; }
        .toast-item .toast-icon.info { background: #dbeafe; color: #1e40af; }
        .toast-item .toast-content { flex: 1; }
        .toast-item .toast-content .title {
            font-weight: 700;
            font-size: 0.9rem;
            color: var(--text-primary);
            margin-bottom: 2px;
        }
        .toast-item .toast-content .message {
            font-size: 0.85rem;
            color: var(--text-muted);
            line-height: 1.4;
        }
        .toast-item .toast-close {
            background: none;
            border: none;
            color: var(--text-muted);
            cursor: pointer;
            font-size: 1.1rem;
            padding: 4px;
            transition: color 0.2s;
            flex-shrink: 0;
        }
        .toast-item .toast-close:hover { color: var(--text-primary); }
        .toast-item .toast-progress {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 3px;
            background: #b45309;
            border-radius: 0 0 0 16px;
            animation: progress 4s linear forwards;
        }
        .toast-item .toast-progress.success { background: #22c55e; }
        .toast-item .toast-progress.error { background: #ef4444; }
        .toast-item .toast-progress.warning { background: #f59e0b; }
        .toast-item .toast-progress.info { background: #3b82f6; }

        @keyframes slideIn {
            from { transform: translateX(120%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes slideOut {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(120%); opacity: 0; }
        }
        @keyframes progress {
            from { width: 100%; }
            to { width: 0%; }
        }

        @media (max-width: 500px) {
            .toast-container {
                top: 10px;
                right: 10px;
                left: 10px;
                max-width: none;
            }
            .toast-item {
                padding: 14px 16px;
            }
        }

        @media (max-width: 768px) {
            .sidebar { width: 200px; padding: 16px; }
            .main-content { margin-left: 200px; padding: 20px; }
        }
        @media (max-width: 550px) {
            .sidebar { width: 0; padding: 0; overflow: hidden; }
            .main-content { margin-left: 0; padding: 16px; }
        }
    </style>
</head>
<body>
    <!-- SIDEBAR -->
    <nav class="sidebar">
        <div class="brand"><i class="fas fa-home"></i> Kos XYZ</div>
        
        <!-- ===== DARK MODE TOGGLE ===== -->
        <button class="theme-toggle-admin" onclick="toggleAdminTheme()">
            <span class="toggle-icon">
                <i class="fas fa-moon" id="adminThemeIcon"></i>
            </span>
            <span class="toggle-label" id="adminThemeLabel">Mode Gelap</span>
            <span class="toggle-track">
                <span class="toggle-thumb"></span>
            </span>
        </button>

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
            <a href="<?php echo e(route('admin.artikel.index')); ?>" class="<?php echo e(request()->routeIs('admin.artikel.*') ? 'active' : ''); ?>">
                <i class="fas fa-newspaper"></i> Artikel
            </a>
            <a href="<?php echo e(route('admin.booking.index')); ?>" class="<?php echo e(request()->routeIs('admin.booking.*') ? 'active' : ''); ?>">
                <i class="fas fa-calendar-check"></i> Booking
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

    <!-- ===== TOAST CONTAINER ===== -->
    <div class="toast-container" id="toastContainer"></div>

    <!-- ===== JAVASCRIPT ===== -->
    <script>
        // ============================================================
        // ===== TOAST NOTIFICATION =====
        // ============================================================
        function showToast(title, message, type = 'info', duration = 4000) {
            const container = document.getElementById('toastContainer');
            if (!container) return;

            const icons = {
                success: '<i class="fas fa-check-circle"></i>',
                error: '<i class="fas fa-exclamation-circle"></i>',
                warning: '<i class="fas fa-exclamation-triangle"></i>',
                info: '<i class="fas fa-info-circle"></i>'
            };

            const toast = document.createElement('div');
            toast.className = 'toast-item';
            toast.innerHTML = `
                <div class="toast-icon ${type}">${icons[type] || icons.info}</div>
                <div class="toast-content">
                    <div class="title">${title}</div>
                    <div class="message">${message}</div>
                </div>
                <button class="toast-close" onclick="this.closest('.toast-item').remove()">
                    <i class="fas fa-times"></i>
                </button>
                <div class="toast-progress ${type}"></div>
            `;

            container.appendChild(toast);

            setTimeout(() => {
                if (toast.parentNode) {
                    toast.classList.add('hide');
                    setTimeout(() => {
                        if (toast.parentNode) toast.remove();
                    }, 400);
                }
            }, duration);
        }

        // ============================================================
        // ===== DARK MODE ADMIN =====
        // ============================================================
        function toggleAdminTheme() {
            const html = document.documentElement;
            const currentTheme = html.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            html.setAttribute('data-theme', newTheme);
            
            localStorage.setItem('admin_theme', newTheme);
            updateAdminThemeUI(newTheme);
        }

        function updateAdminThemeUI(theme) {
            const icon = document.getElementById('adminThemeIcon');
            const label = document.getElementById('adminThemeLabel');
            
            if (theme === 'dark') {
                icon.className = 'fas fa-sun';
                label.textContent = 'Mode Terang';
            } else {
                icon.className = 'fas fa-moon';
                label.textContent = 'Mode Gelap';
            }
        }

        // Load saved theme
        (function() {
            const savedTheme = localStorage.getItem('admin_theme');
            if (savedTheme) {
                document.documentElement.setAttribute('data-theme', savedTheme);
                updateAdminThemeUI(savedTheme);
            }
        })();

        // ===== SHOW TOAST FROM SESSION =====
        <?php if(session('success')): ?>
            showToast('✅ Berhasil!', '<?php echo e(session('success')); ?>', 'success');
        <?php endif; ?>

        <?php if(session('error')): ?>
            showToast('❌ Gagal!', '<?php echo e(session('error')); ?>', 'error');
        <?php endif; ?>

        <?php if(session('warning')): ?>
            showToast('⚠️ Peringatan', '<?php echo e(session('warning')); ?>', 'warning');
        <?php endif; ?>

        <?php if(session('info')): ?>
            showToast('ℹ️ Informasi', '<?php echo e(session('info')); ?>', 'info');
        <?php endif; ?>
    </script>

</body>
</html><?php /**PATH E:\Kerjaan\kos_xyz-main\kos_xyz-main\resources\views/layouts/admin.blade.php ENDPATH**/ ?>