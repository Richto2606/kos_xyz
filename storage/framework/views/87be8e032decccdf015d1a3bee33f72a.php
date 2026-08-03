

<?php $__env->startSection('title', 'Dashboard · Kos XYZ'); ?>

<?php $__env->startSection('content'); ?>
<style>
    /* ===== DASHBOARD MODERN ===== */
    .dashboard-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }
    .stat-card {
        background: white;
        border-radius: 20px;
        padding: 24px 22px;
        border: 1px solid #f1f5f9;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        cursor: default;
    }
    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        border-radius: 20px 20px 0 0;
    }
    .stat-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 40px rgba(0,0,0,0.08);
        border-color: #fed7aa;
    }
    .stat-card .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        margin-bottom: 12px;
    }
    .stat-card .stat-label {
        font-size: 0.85rem;
        color: #64748b;
        font-weight: 500;
        letter-spacing: 0.3px;
    }
    .stat-card .stat-value {
        font-size: 2.2rem;
        font-weight: 800;
        margin-top: 4px;
        letter-spacing: -0.5px;
    }
    .stat-card .stat-sub {
        font-size: 0.75rem;
        color: #94a3b8;
        margin-top: 6px;
    }

    .stat-card.blue::before { background: #3b82f6; }
    .stat-card.blue .stat-icon { background: #eff6ff; color: #3b82f6; }
    .stat-card.blue .stat-value { color: #1e40af; }

    .stat-card.green::before { background: #22c55e; }
    .stat-card.green .stat-icon { background: #f0fdf4; color: #22c55e; }
    .stat-card.green .stat-value { color: #15803d; }

    .stat-card.red::before { background: #ef4444; }
    .stat-card.red .stat-icon { background: #fef2f2; color: #ef4444; }
    .stat-card.red .stat-value { color: #b91c1c; }

    .stat-card.yellow::before { background: #f59e0b; }
    .stat-card.yellow .stat-icon { background: #fffbeb; color: #f59e0b; }
    .stat-card.yellow .stat-value { color: #b45309; }

    .stat-card.orange::before { background: #b45309; }
    .stat-card.orange .stat-icon { background: #fff7ed; color: #b45309; }
    .stat-card.orange .stat-value { color: #92400e; }

    .stat-card.purple::before { background: #8b5cf6; }
    .stat-card.purple .stat-icon { background: #f5f3ff; color: #8b5cf6; }
    .stat-card.purple .stat-value { color: #6d28d9; }

    /* ===== TARGET PROGRESS ===== */
    .target-card {
        background: white;
        border-radius: 20px;
        padding: 24px 28px;
        border: 1px solid #f1f5f9;
        margin-bottom: 30px;
        transition: all 0.3s ease;
    }
    .target-card:hover {
        border-color: #fed7aa;
    }
    .target-card .target-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        margin-bottom: 12px;
    }
    .target-card .target-header h3 {
        font-size: 1.1rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .target-card .target-header h3 i {
        color: #b45309;
    }
    .target-card .target-header .target-info {
        font-size: 0.9rem;
        color: #64748b;
    }
    .target-card .target-header .target-info strong {
        color: #0f172a;
    }
    .progress-bar {
        width: 100%;
        height: 12px;
        background: #f1f5f9;
        border-radius: 40px;
        overflow: hidden;
        margin-top: 8px;
    }
    .progress-bar .progress-fill {
        height: 100%;
        border-radius: 40px;
        transition: width 1s ease;
        background: linear-gradient(90deg, #b45309, #f59e0b);
    }
    .progress-bar .progress-fill.green {
        background: linear-gradient(90deg, #22c55e, #4ade80);
    }
    .progress-bar .progress-fill.orange {
        background: linear-gradient(90deg, #b45309, #f59e0b);
    }
    .progress-bar .progress-fill.red {
        background: linear-gradient(90deg, #ef4444, #f87171);
    }

    /* ===== NOTIFIKASI & AKTIVITAS ===== */
    .activity-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 24px;
        margin-bottom: 30px;
    }
    .activity-card {
        background: white;
        border-radius: 20px;
        padding: 20px 24px;
        border: 1px solid #f1f5f9;
        transition: all 0.3s ease;
    }
    .activity-card:hover {
        border-color: #fed7aa;
    }
    .activity-card .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 16px;
    }
    .activity-card .card-header h4 {
        font-size: 1rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .activity-card .card-header h4 i {
        color: #b45309;
    }
    .activity-card .card-header .badge-count {
        background: #fef3c7;
        color: #92400e;
        padding: 2px 12px;
        border-radius: 40px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    /* ===== NOTIFIKASI LIST ===== */
    .notif-list {
        max-height: 250px;
        overflow-y: auto;
    }
    .notif-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        padding: 10px 0;
        border-bottom: 1px solid #f8fafc;
        transition: background 0.2s;
    }
    .notif-item:hover {
        background: #faf8f5;
        margin: 0 -8px;
        padding: 10px 8px;
        border-radius: 8px;
    }
    .notif-item .notif-icon {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.9rem;
        flex-shrink: 0;
    }
    .notif-item .notif-icon.green { background: #dcfce7; color: #15803d; }
    .notif-item .notif-icon.blue { background: #dbeafe; color: #1e40af; }
    .notif-item .notif-icon.yellow { background: #fef9c3; color: #a16207; }
    .notif-item .notif-icon.red { background: #fee2e2; color: #b91c1c; }
    .notif-item .notif-content { flex: 1; }
    .notif-item .notif-content .text { font-size: 0.9rem; color: #0f172a; }
    .notif-item .notif-content .text strong { color: #b45309; }
    .notif-item .notif-content .time { font-size: 0.75rem; color: #94a3b8; }

    /* ===== CHART ===== */
    .chart-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
        gap: 24px;
        margin-bottom: 30px;
    }
    .chart-box {
        background: white;
        border-radius: 20px;
        padding: 24px 20px 20px;
        border: 1px solid #f1f5f9;
        transition: all 0.3s ease;
    }
    .chart-box:hover {
        border-color: #fed7aa;
        box-shadow: 0 8px 30px rgba(0,0,0,0.04);
    }
    .chart-box h4 {
        font-size: 0.95rem;
        font-weight: 600;
        color: #334155;
        margin-bottom: 14px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .chart-box h4 i {
        color: #b45309;
    }
    .chart-box canvas {
        max-height: 200px;
        width: 100% !important;
    }

    /* ===== TABEL ===== */
    .table-modern {
        background: white;
        border-radius: 20px;
        padding: 20px 24px 24px;
        border: 1px solid #f1f5f9;
        transition: all 0.3s ease;
    }
    .table-modern:hover {
        border-color: #fed7aa;
    }
    .table-modern .table-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        margin-bottom: 16px;
    }
    .table-modern .table-header h3 {
        font-size: 1.1rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .table-modern .table-header h3 i {
        color: #b45309;
    }
    .table-modern .table-header .actions {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }
    .table-modern table {
        width: 100%;
        border-collapse: collapse;
    }
    .table-modern th {
        text-align: left;
        padding: 12px 10px;
        border-bottom: 2px solid #f1f5f9;
        color: #475569;
        font-weight: 600;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .table-modern td {
        padding: 12px 10px;
        border-bottom: 1px solid #f8fafc;
        font-size: 0.9rem;
    }
    .table-modern tr:hover td {
        background: #faf8f5;
    }
    .table-modern tr:last-child td {
        border-bottom: none;
    }

    .badge-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 14px;
        border-radius: 40px;
        font-size: 0.75rem;
        font-weight: 600;
    }
    .badge-status i { font-size: 0.6rem; }
    .badge-status.tersedia { background: #dcfce7; color: #15803d; }
    .badge-status.penuh { background: #fee2e2; color: #b91c1c; }
    .badge-status.maintenance { background: #fef9c3; color: #a16207; }

    .btn-outline-orange {
        background: transparent;
        color: #b45309;
        border: 2px solid #b45309;
        padding: 6px 18px;
        border-radius: 40px;
        font-weight: 600;
        font-size: 0.85rem;
        text-decoration: none;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .btn-outline-orange:hover {
        background: #b45309;
        color: white;
    }

    /* ===== DROPDOWN EXPORT ===== */
    .btn-export-dropdown {
        cursor: pointer;
        background: #0f172a;
        color: white;
        border: none;
        padding: 8px 20px;
        border-radius: 40px;
        font-weight: 600;
        font-size: 0.85rem;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.2s;
    }
    .btn-export-dropdown:hover {
        background: #1e293b;
        transform: translateY(-2px);
    }

    .export-dropdown-menu {
        display: none;
        position: absolute;
        right: 0;
        top: 45px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 8px 30px rgba(0,0,0,0.15);
        border: 1px solid #f1f5f9;
        z-index: 100;
        min-width: 180px;
        overflow: hidden;
    }
    .export-dropdown-menu.show {
        display: block;
        animation: dropdownFadeIn 0.2s ease;
    }
    @keyframes dropdownFadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .export-dropdown-menu a {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 18px;
        text-decoration: none;
        color: #0f172a;
        transition: background 0.2s;
        border-bottom: 1px solid #f1f5f9;
    }
    .export-dropdown-menu a:last-child {
        border-bottom: none;
    }
    .export-dropdown-menu a:hover {
        background: #f8fafc;
    }
    .export-dropdown-menu a .icon-pdf {
        color: #dc2626;
        font-size: 1.1rem;
    }
    .export-dropdown-menu a .icon-excel {
        color: #22c55e;
        font-size: 1.1rem;
    }
    .export-dropdown-menu a .label {
        font-weight: 600;
    }
    .export-dropdown-menu a .desc {
        font-size: 0.7rem;
        color: #94a3b8;
    }

    @media (max-width: 768px) {
        .activity-grid {
            grid-template-columns: 1fr;
        }
        .chart-grid {
            grid-template-columns: 1fr;
        }
    }
    @media (max-width: 500px) {
        .dashboard-stats {
            grid-template-columns: 1fr 1fr;
        }
        .stat-card .stat-value {
            font-size: 1.6rem;
        }
        .target-card .target-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 6px;
        }
        .export-dropdown-menu {
            left: 0;
            right: auto;
            min-width: 160px;
        }
    }
</style>

<div style="padding: 0 0 10px 0;">

    <!-- HEADER -->
    <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; margin-bottom:8px;">
        <div>
            <h1 class="page-title" style="font-size:1.8rem; margin-bottom:2px;">
                <i class="fas fa-chart-pie" style="color:#b45309;"></i> Ringkasan Eksekutif
            </h1>
            <p class="page-sub" style="margin-bottom:0; font-size:0.95rem;">
                <i class="far fa-calendar-alt" style="color:#b45309;"></i> 
                <?php echo e(\Carbon\Carbon::now()->translatedFormat('l, d F Y')); ?>

            </p>
        </div>
        <div style="display:flex; gap:10px; align-items:center; flex-wrap:wrap;">
            <span style="background:#fef3c7; padding:6px 16px; border-radius:40px; font-size:0.8rem; font-weight:600; color:#92400e;">
                <i class="fas fa-sync-alt"></i> Live
            </span>
            
            <!-- ===== DROPDOWN EXPORT ===== -->
            <div style="position:relative; display:inline-block;">
                <button onclick="toggleExportDropdown()" class="btn-export-dropdown">
                    <i class="fas fa-download"></i> Export <i class="fas fa-chevron-down" style="font-size:0.7rem;"></i>
                </button>
                <div id="exportDropdown" class="export-dropdown-menu">
                    <a href="<?php echo e(route('admin.export.pdf')); ?>" target="_blank">
                        <i class="fas fa-file-pdf icon-pdf"></i>
                        <div>
                            <div class="label">PDF</div>
                            <div class="desc">Download laporan PDF</div>
                        </div>
                    </a>
                    <a href="<?php echo e(route('admin.export.excel')); ?>" target="_blank">
                        <i class="fas fa-file-excel icon-excel"></i>
                        <div>
                            <div class="label">Excel</div>
                            <div class="desc">Download laporan Excel</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== STATISTIK KAMAR ===== -->
    <div class="dashboard-stats">
        <div class="stat-card blue">
            <div class="stat-icon"><i class="fas fa-home"></i></div>
            <div class="stat-label">Total Kamar</div>
            <div class="stat-value"><?php echo e($totalKamar ?? 0); ?></div>
            <div class="stat-sub">Seluruh kamar terdaftar</div>
        </div>
        <div class="stat-card green">
            <div class="stat-icon"><i class="fas fa-check-circle"></i></div>
            <div class="stat-label">Tersedia</div>
            <div class="stat-value"><?php echo e($tersedia ?? 0); ?></div>
            <div class="stat-sub">Kamar siap huni</div>
        </div>
        <div class="stat-card red">
            <div class="stat-icon"><i class="fas fa-times-circle"></i></div>
            <div class="stat-label">Penuh</div>
            <div class="stat-value"><?php echo e($terisi ?? 0); ?></div>
            <div class="stat-sub">Sudah ditempati</div>
        </div>
        <div class="stat-card yellow">
            <div class="stat-icon"><i class="fas fa-tools"></i></div>
            <div class="stat-label">Maintenance</div>
            <div class="stat-value"><?php echo e($maintenance ?? 0); ?></div>
            <div class="stat-sub">Dalam perbaikan</div>
        </div>
    </div>

    <!-- ===== TARGET PENDAPATAN ===== -->
    <?php
        $targetBulanan = 5000000; // Target Rp 5.000.000
        $pendapatanBulan = $pendapatanBulan ?? 0;
        $persentase = $targetBulanan > 0 ? min(100, round(($pendapatanBulan / $targetBulanan) * 100)) : 0;
        $progressColor = $persentase >= 80 ? 'green' : ($persentase >= 50 ? 'orange' : 'red');
    ?>

    <div class="target-card">
        <div class="target-header">
            <h3><i class="fas fa-bullseye"></i> Target Pendapatan Bulanan</h3>
            <div class="target-info">
                <strong>Rp <?php echo e(number_format($pendapatanBulan, 0, ',', '.')); ?></strong> 
                dari Rp <?php echo e(number_format($targetBulanan, 0, ',', '.')); ?>

                <span style="font-weight:700; color:#b45309; margin-left:8px;"><?php echo e($persentase); ?>%</span>
            </div>
        </div>
        <div class="progress-bar">
            <div class="progress-fill <?php echo e($progressColor); ?>" style="width: <?php echo e($persentase); ?>%;"></div>
        </div>
        <div style="display:flex; justify-content:space-between; font-size:0.75rem; color:#94a3b8; margin-top:4px;">
            <span>0%</span>
            <span><?php echo e($persentase >= 80 ? '✅ Target hampir tercapai!' : ($persentase >= 50 ? '🚀 Semangat!' : '💪 Ayo tingkatkan!')); ?></span>
            <span>100%</span>
        </div>
    </div>

    <!-- ===== NOTIFIKASI & AKTIVITAS ===== -->
    <div class="activity-grid">
        <!-- Notifikasi -->
        <div class="activity-card">
            <div class="card-header">
                <h4><i class="fas fa-bell"></i> Notifikasi Terbaru</h4>
                <span class="badge-count">
                    <?php echo e($notifikasiCount ?? 0); ?> baru
                </span>
            </div>
            <div class="notif-list">
                <?php $__empty_1 = true; $__currentLoopData = ($notifikasi ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="notif-item">
                    <div class="notif-icon <?php echo e($notif['type'] ?? 'blue'); ?>">
                        <i class="fas <?php echo e($notif['icon'] ?? 'fa-info-circle'); ?>"></i>
                    </div>
                    <div class="notif-content">
                        <div class="text"><?php echo $notif['text'] ?? 'Tidak ada notifikasi'; ?></div>
                        <div class="time"><?php echo e($notif['time'] ?? 'Baru saja'); ?></div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div style="text-align:center; padding:30px 0; color:#94a3b8;">
                    <i class="fas fa-check-circle" style="font-size:2rem; display:block; margin-bottom:8px; color:#22c55e;"></i>
                    <p>Semua dalam keadaan baik!</p>
                    <p style="font-size:0.85rem;">Tidak ada notifikasi baru</p>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Aktivitas Terakhir -->
        <div class="activity-card">
            <div class="card-header">
                <h4><i class="fas fa-clock"></i> Aktivitas Terakhir</h4>
            </div>
            <div class="notif-list">
                <?php $__empty_1 = true; $__currentLoopData = ($aktivitas ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aktivitasItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="notif-item">
                    <div class="notif-icon <?php echo e($aktivitasItem['type'] ?? 'blue'); ?>" style="width:30px; height:30px; font-size:0.7rem;">
                        <i class="fas <?php echo e($aktivitasItem['icon'] ?? 'fa-user'); ?>"></i>
                    </div>
                    <div class="notif-content">
                        <div class="text" style="font-size:0.85rem;"><?php echo $aktivitasItem['text'] ?? 'Aktivitas'; ?></div>
                        <div class="time"><?php echo e($aktivitasItem['time'] ?? 'Baru saja'); ?></div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div style="text-align:center; padding:20px 0; color:#94a3b8; font-size:0.9rem;">
                    <i class="fas fa-inbox" style="font-size:1.5rem; display:block; margin-bottom:6px;"></i>
                    Belum ada aktivitas
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- ===== STATISTIK PEMBAYARAN ===== -->
    <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(180px,1fr)); gap:16px; margin-bottom:28px;">
        <div style="background:white; border-radius:16px; padding:16px 20px; border:1px solid #f1f5f9; text-align:center;">
            <div style="font-size:0.8rem; color:#64748b;">✅ Lunas</div>
            <div style="font-size:2rem; font-weight:700; color:#22c55e;"><?php echo e($lunas ?? 0); ?></div>
        </div>
        <div style="background:white; border-radius:16px; padding:16px 20px; border:1px solid #f1f5f9; text-align:center;">
            <div style="font-size:0.8rem; color:#64748b;">⏳ Belum Bayar</div>
            <div style="font-size:2rem; font-weight:700; color:#f59e0b;"><?php echo e($belum ?? 0); ?></div>
        </div>
        <div style="background:white; border-radius:16px; padding:16px 20px; border:1px solid #f1f5f9; text-align:center;">
            <div style="font-size:0.8rem; color:#64748b;">⚠️ Tunggak</div>
            <div style="font-size:2rem; font-weight:700; color:#ef4444;"><?php echo e($tunggak ?? 0); ?></div>
        </div>
        <div style="background:white; border-radius:16px; padding:16px 20px; border:1px solid #f1f5f9; text-align:center;">
            <div style="font-size:0.8rem; color:#64748b;">💰 Pendapatan</div>
            <div style="font-size:1.6rem; font-weight:700; color:#b45309;">Rp <?php echo e(number_format($pendapatanBulan ?? 0, 0, ',', '.')); ?></div>
        </div>
    </div>

    <!-- ===== GRAFIK ===== -->
    <div class="chart-grid">
        <div class="chart-box">
            <h4><i class="fas fa-door-open"></i> Status Kamar</h4>
            <canvas id="chartKamar"></canvas>
        </div>
        <div class="chart-box">
            <h4><i class="fas fa-credit-card"></i> Status Pembayaran</h4>
            <canvas id="chartPembayaran"></canvas>
        </div>
    </div>

    <!-- ===== DAFTAR KAMAR ===== -->
    <div class="table-modern">
        <div class="table-header">
            <h3><i class="fas fa-door-open"></i> Daftar Kamar</h3>
            <div class="actions">
                <a href="<?php echo e(route('admin.kamar.index')); ?>" class="btn-outline-orange">
                    Lihat Semua <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kamar</th>
                    <th>Harga</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = ($kamars ?? [])->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kamar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><strong><?php echo e($kamar->nama); ?></strong></td>
                    <td>Rp <?php echo e(number_format($kamar->harga, 0, ',', '.')); ?></td>
                    <td>
                        <?php if($kamar->status == 'Tersedia'): ?>
                            <span class="badge-status tersedia"><i class="fas fa-circle"></i> Tersedia</span>
                        <?php elseif($kamar->status == 'Penuh'): ?>
                            <span class="badge-status penuh"><i class="fas fa-circle"></i> Penuh</span>
                        <?php else: ?>
                            <span class="badge-status maintenance"><i class="fas fa-circle"></i> Maintenance</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="4" style="text-align:center; padding:30px; color:#94a3b8;">
                        <i class="fas fa-inbox" style="font-size:2rem; display:block; margin-bottom:10px;"></i>
                        Belum ada data kamar
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

<!-- ===== CHART.JS ===== -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // ===== CHART STATUS KAMAR =====
        const ctx1 = document.getElementById('chartKamar');
        if (ctx1) {
            new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: ['Tersedia', 'Penuh', 'Maintenance'],
                    datasets: [{
                        label: 'Jumlah Kamar',
                        data: [<?php echo e($tersedia ?? 0); ?>, <?php echo e($terisi ?? 0); ?>, <?php echo e($maintenance ?? 0); ?>],
                        backgroundColor: ['#22c55e', '#ef4444', '#f59e0b'],
                        borderColor: ['#16a34a', '#dc2626', '#d97706'],
                        borderWidth: 2,
                        borderRadius: 8,
                        barPercentage: 0.6,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: { legend: { display: false } },
                    scales: {
                        y: { beginAtZero: true, ticks: { stepSize: 1 }, grid: { color: '#f1f5f9' } },
                        x: { grid: { display: false } }
                    }
                }
            });
        }

        // ===== CHART PEMBAYARAN =====
        const ctx2 = document.getElementById('chartPembayaran');
        if (ctx2) {
            new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: ['Lunas', 'Belum Bayar', 'Tunggak'],
                    datasets: [{
                        label: 'Jumlah Tagihan',
                        data: [<?php echo e($lunas ?? 0); ?>, <?php echo e($belum ?? 0); ?>, <?php echo e($tunggak ?? 0); ?>],
                        backgroundColor: ['#22c55e', '#f59e0b', '#ef4444'],
                        borderColor: ['#16a34a', '#d97706', '#dc2626'],
                        borderWidth: 2,
                        borderRadius: 8,
                        barPercentage: 0.6,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: { legend: { display: false } },
                    scales: {
                        y: { beginAtZero: true, ticks: { stepSize: 1 }, grid: { color: '#f1f5f9' } },
                        x: { grid: { display: false } }
                    }
                }
            });
        }
    });

    // ===== TOGGLE EXPORT DROPDOWN =====
    function toggleExportDropdown() {
        const dropdown = document.getElementById('exportDropdown');
        if (dropdown) {
            dropdown.classList.toggle('show');
        }
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        const dropdown = document.getElementById('exportDropdown');
        const button = event.target.closest('.btn-export-dropdown');
        if (!button && dropdown) {
            dropdown.classList.remove('show');
        }
    });

    // Close dropdown with ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const dropdown = document.getElementById('exportDropdown');
            if (dropdown) {
                dropdown.classList.remove('show');
            }
        }
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\kos-xyz\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>