

<?php $__env->startSection('title', 'Dashboard · Kos XYZ'); ?>

<?php $__env->startSection('content'); ?>
<style>
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

    /* Warna card */
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

    /* Section header */
    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 30px 0 18px;
    }
    .section-header h3 {
        font-size: 1.2rem;
        font-weight: 700;
        color: #0f172a;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .section-header h3 i {
        color: #b45309;
    }

    /* Chart container */
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

    /* Tabel */
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
    .badge-status i {
        font-size: 0.7rem;
    }
    .badge-status.tersedia {
        background: #dcfce7;
        color: #15803d;
    }
    .badge-status.penuh {
        background: #fee2e2;
        color: #b91c1c;
    }
    .badge-status.maintenance {
        background: #fef9c3;
        color: #a16207;
    }

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
</style>

<div style="padding: 0 0 10px 0;">

    <!-- Header -->
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
        <div style="display:flex; gap:10px; align-items:center;">
            <span style="background:#fef3c7; padding:6px 16px; border-radius:40px; font-size:0.8rem; font-weight:600; color:#92400e;">
                <i class="fas fa-sync-alt"></i> Live
            </span>
        </div>
    </div>

    <!-- ===== STATISTIK KAMAR ===== -->
    <div class="dashboard-stats">
        <div class="stat-card blue">
            <div class="stat-icon"><i class="fas fa-home"></i></div>
            <div class="stat-label">Total Kamar</div>
            <div class="stat-value"><?php echo e($totalKamar ?? 0); ?></div>
            <div class="stat-sub">Seluruh kamar yang terdaftar</div>
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

    <!-- ===== STATISTIK PEMBAYARAN ===== -->
    <div class="section-header">
        <h3><i class="fas fa-credit-card"></i> Status Pembayaran</h3>
        <span style="font-size:0.8rem; color:#94a3b8;">Bulan: <?php echo e(\Carbon\Carbon::now()->translatedFormat('F Y')); ?></span>
    </div>
    <div class="dashboard-stats">
        <div class="stat-card green">
            <div class="stat-icon"><i class="fas fa-check-double"></i></div>
            <div class="stat-label">Lunas</div>
            <div class="stat-value"><?php echo e($lunas ?? 0); ?></div>
            <div class="stat-sub">Pembayaran selesai</div>
        </div>
        <div class="stat-card yellow">
            <div class="stat-icon"><i class="fas fa-clock"></i></div>
            <div class="stat-label">Belum Bayar</div>
            <div class="stat-value"><?php echo e($belum ?? 0); ?></div>
            <div class="stat-sub">Menunggu pembayaran</div>
        </div>
        <div class="stat-card red">
            <div class="stat-icon"><i class="fas fa-exclamation-triangle"></i></div>
            <div class="stat-label">Tunggak</div>
            <div class="stat-value"><?php echo e($tunggak ?? 0); ?></div>
            <div class="stat-sub">Melewati jatuh tempo</div>
        </div>
    </div>

    <!-- ===== PENDAPATAN ===== -->
    <div class="section-header">
        <h3><i class="fas fa-coins"></i> Pendapatan</h3>
    </div>
    <div class="dashboard-stats">
        <div class="stat-card orange">
            <div class="stat-icon"><i class="fas fa-calendar-day"></i></div>
            <div class="stat-label">Pendapatan Bulan Ini</div>
            <div class="stat-value">Rp <?php echo e(number_format($pendapatanBulan ?? 0, 0, ',', '.')); ?></div>
            <div class="stat-sub"><?php echo e(\Carbon\Carbon::now()->translatedFormat('F Y')); ?></div>
        </div>
        <div class="stat-card purple">
            <div class="stat-icon"><i class="fas fa-calendar-alt"></i></div>
            <div class="stat-label">Pendapatan Tahunan</div>
            <div class="stat-value">Rp <?php echo e(number_format($pendapatanTahunan ?? 0, 0, ',', '.')); ?></div>
            <div class="stat-sub"><?php echo e(\Carbon\Carbon::now()->year); ?></div>
        </div>
    </div>

    <!-- ===== GRAFIK ===== -->
    <div class="section-header">
        <h3><i class="fas fa-chart-bar"></i> Visualisasi Data</h3>
    </div>
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
    <div class="section-header">
        <h3><i class="fas fa-door-open"></i> Daftar Kamar</h3>
        <a href="<?php echo e(route('admin.kamar.index')); ?>" class="btn-outline-orange">
            Lihat Semua <i class="fas fa-arrow-right"></i>
        </a>
    </div>
    <div class="table-modern">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kamar</th>
                    <th>Harga</th>
                    <th>Fasilitas</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = ($kamars ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kamar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><strong style="color:#0f172a;"><?php echo e($kamar->nama); ?></strong></td>
                    <td>Rp <?php echo e(number_format($kamar->harga, 0, ',', '.')); ?></td>
                    <td style="max-width:180px;">
                        <?php
                            $fasilitas = explode(',', $kamar->fasilitas ?? '');
                            $firstThree = array_slice($fasilitas, 0, 3);
                        ?>
                        <?php $__currentLoopData = $firstThree; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span style="display:inline-block; background:#f8fafc; padding:2px 10px; border-radius:20px; font-size:0.7rem; color:#475569; margin:2px;">
                                <?php echo e(trim($fas)); ?>

                            </span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if(count($fasilitas) > 3): ?>
                            <span style="font-size:0.7rem; color:#94a3b8;">+<?php echo e(count($fasilitas) - 3); ?></span>
                        <?php endif; ?>
                    </td>
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
                    <td colspan="5" style="text-align:center; padding:30px; color:#94a3b8;">
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
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: { stepSize: 1, font: { size: 11 } },
                            grid: { color: '#f1f5f9' }
                        },
                        x: {
                            grid: { display: false }
                        }
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
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: { stepSize: 1, font: { size: 11 } },
                            grid: { color: '#f1f5f9' }
                        },
                        x: {
                            grid: { display: false }
                        }
                    }
                }
            });
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\kos-xyz\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>