<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Admin · Kos XYZ')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

        .toast { position:fixed; bottom:30px; right:30px; background:#0f172a; color:white; padding:14px 28px; border-radius:60px; box-shadow:0 8px 30px rgba(0,0,0,0.2); font-weight:500; z-index:9999; display:none; animation:slideUp 0.3s ease; }
        .toast.show { display:block; }
        @keyframes slideUp { from { opacity:0; transform:translateY(20px); } to { opacity:1; transform:translateY(0); } }

        .alert-success { background:#dcfce7; color:#15803d; padding:14px 20px; border-radius:12px; margin-bottom:20px; }
        .alert-danger { background:#fee2e2; color:#b91c1c; padding:14px 20px; border-radius:12px; margin-bottom:20px; }

        .btn-primary { background:#b45309; color:white; border:none; padding:8px 20px; border-radius:40px; font-weight:600; cursor:pointer; transition:0.2s; display:inline-flex; align-items:center; gap:8px; font-size:0.9rem; text-decoration:none; }
        .btn-primary:hover { background:#92400e; }
        .btn-sm { padding:4px 12px; border-radius:40px; font-size:0.8rem; font-weight:600; border:none; cursor:pointer; text-decoration:none; display:inline-block; }
        .btn-edit { background:#fef3c7; color:#92400e; }
        .btn-edit:hover { background:#fde68a; }
        .btn-delete { background:#fee2e2; color:#b91c1c; }
        .btn-delete:hover { background:#fecaca; }
        .btn-status { background:#dbeafe; color:#1e40af; }
        .btn-status:hover { background:#bfdbfe; }

        .table-wrap { background:white; border-radius:20px; padding:20px 24px; border:1px solid #f1f5f9; margin-bottom:28px; overflow-x:auto; }
        .table-wrap .header-actions { display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; margin-bottom:16px; }
        .table-wrap .header-actions h3 { font-size:1.2rem; font-weight:600; }

        table { width:100%; border-collapse:collapse; font-size:0.9rem; }
        th { text-align:left; padding:12px 8px; border-bottom:2px solid #f1f5f9; color:#475569; font-weight:600; }
        td { padding:12px 8px; border-bottom:1px solid #f1f5f9; }
        tr:hover td { background:#faf8f5; }

        .badge { display:inline-block; padding:2px 14px; border-radius:40px; font-size:0.75rem; font-weight:600; }
        .badge-success { background:#dcfce7; color:#15803d; }
        .badge-warning { background:#fef9c3; color:#a16207; }
        .badge-danger { background:#fee2e2; color:#b91c1c; }
        .badge-info { background:#dbeafe; color:#1e40af; }

        .form-group { margin-bottom:16px; }
        .form-group label { display:block; font-weight:600; margin-bottom:4px; color:#334155; }
        .form-group input, .form-group select, .form-group textarea { width:100%; padding:10px 14px; border:1px solid #e2e8f0; border-radius:12px; background:#f8fafc; transition:0.2s; }
        .form-group input:focus, .form-group select:focus, .form-group textarea:focus { outline:none; border-color:#b45309; box-shadow:0 0 0 3px rgba(180,83,9,0.1); background:white; }

        .form-actions { display:flex; gap:12px; margin-top:20px; }
        .btn-cancel { background:#e2e8f0; color:#334155; padding:10px 28px; border:none; border-radius:40px; font-weight:600; cursor:pointer; text-decoration:none; display:inline-block; }
        .btn-cancel:hover { background:#cbd5e1; }

        @media (max-width:768px) { .sidebar { width:200px; padding:16px; } .main-content { margin-left:200px; padding:20px; } }
        @media (max-width:550px) { .sidebar { width:0; padding:0; overflow:hidden; } .main-content { margin-left:0; padding:16px; } }
    </style>
</head>
<body>
    <!-- SIDEBAR -->
    <nav class="sidebar">
        <div class="brand"><i class="fas fa-home"></i> Kos XYZ</div>
        <ul class="menu">
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-chart-pie"></i> Ringkasan
            </a>
            <a href="{{ route('admin.kamar.index') }}" class="{{ request()->routeIs('admin.kamar.*') ? 'active' : '' }}">
                <i class="fas fa-door-open"></i> Manajemen Kamar
            </a>
            <a href="{{ route('admin.penyewa.index') }}" class="{{ request()->routeIs('admin.penyewa.*') ? 'active' : '' }}">
                <i class="fas fa-users"></i> Manajemen Penyewa
            </a>
            <a href="{{ route('admin.tagihan.index') }}" class="{{ request()->routeIs('admin.tagihan.*') ? 'active' : '' }}">
                <i class="fas fa-file-invoice"></i> Tagihan
            </a>
        </ul>
        <div class="logout-btn">
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit"><i class="fas fa-sign-out-alt"></i> Keluar</button>
            </form>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <div class="main-content">
        @yield('content')
    </div>

    <div class="toast" id="toast"></div>

    <script>
        // Show toast jika ada session flash
        @if(session('success'))
            showToast('{{ session('success') }}');
        @endif

        function showToast(msg) {
            const t = document.getElementById('toast');
            t.textContent = msg;
            t.classList.add('show');
            setTimeout(() => t.classList.remove('show'), 3000);
        }
    </script>
</body>
</html>