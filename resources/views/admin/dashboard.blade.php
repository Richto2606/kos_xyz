@extends('layouts.admin')

@section('title', 'Dashboard · Kos XYZ')

@section('content')
<style>
    /* ===== DASHBOARD MODERN ===== */
    
    /* Welcome Section */
    .welcome-section {
        background: linear-gradient(135deg, #b45309, #f59e0b);
        border-radius: 24px;
        padding: 32px 36px;
        margin-bottom: 30px;
        color: white;
        position: relative;
        overflow: hidden;
    }
    .welcome-section::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 300px;
        height: 300px;
        background: rgba(255,255,255,0.05);
        border-radius: 50%;
    }
    .welcome-section::after {
        content: '';
        position: absolute;
        bottom: -40%;
        left: 20%;
        width: 200px;
        height: 200px;
        background: rgba(255,255,255,0.05);
        border-radius: 50%;
    }
    .welcome-section h1 {
        font-size: 2rem;
        font-weight: 800;
        position: relative;
        z-index: 1;
    }
    .welcome-section p {
        opacity: 0.85;
        margin-top: 4px;
        position: relative;
        z-index: 1;
    }
    .welcome-section .welcome-icon {
        position: absolute;
        right: 30px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 4rem;
        opacity: 0.15;
        z-index: 0;
    }

    /* Stats Grid */
    .dashboard-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }
    .stat-card {
        background: var(--bg-card);
        border-radius: 20px;
        padding: 24px 22px;
        border: 1px solid var(--border-color);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
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
    .stat-card::after {
        content: '';
        position: absolute;
        top: -50%;
        right: -30%;
        width: 120px;
        height: 120px;
        border-radius: 50%;
        opacity: 0.05;
        transition: all 0.5s ease;
    }
    .stat-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 16px 48px rgba(0,0,0,0.08);
        border-color: #fed7aa;
    }
    .stat-card:hover::after {
        transform: scale(1.5);
    }
    .stat-card .stat-icon {
        width: 52px;
        height: 52px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-bottom: 14px;
        transition: transform 0.3s ease;
    }
    .stat-card:hover .stat-icon {
        transform: scale(1.05) rotate(-3deg);
    }
    .stat-card .stat-label {
        font-size: 0.85rem;
        color: var(--text-muted);
        font-weight: 500;
        letter-spacing: 0.3px;
    }
    .stat-card .stat-value {
        font-size: 2.4rem;
        font-weight: 800;
        margin-top: 4px;
        letter-spacing: -0.5px;
    }
    .stat-card .stat-sub {
        font-size: 0.75rem;
        color: var(--text-muted);
        margin-top: 6px;
    }
    .stat-card .stat-change {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        font-size: 0.7rem;
        font-weight: 600;
        padding: 2px 10px;
        border-radius: 40px;
        margin-top: 8px;
    }
    .stat-card .stat-change.up {
        background: #dcfce7;
        color: #15803d;
    }
    .stat-card .stat-change.down {
        background: #fee2e2;
        color: #b91c1c;
    }
    .stat-card .stat-change.neutral {
        background: #f1f5f9;
        color: #64748b;
    }

    .stat-card.blue::before { background: linear-gradient(90deg, #3b82f6, #60a5fa); }
    .stat-card.blue .stat-icon { background: #eff6ff; color: #3b82f6; }
    .stat-card.blue .stat-value { color: #1e40af; }
    .stat-card.blue::after { background: #3b82f6; }

    .stat-card.green::before { background: linear-gradient(90deg, #22c55e, #4ade80); }
    .stat-card.green .stat-icon { background: #f0fdf4; color: #22c55e; }
    .stat-card.green .stat-value { color: #15803d; }
    .stat-card.green::after { background: #22c55e; }

    .stat-card.red::before { background: linear-gradient(90deg, #ef4444, #f87171); }
    .stat-card.red .stat-icon { background: #fef2f2; color: #ef4444; }
    .stat-card.red .stat-value { color: #b91c1c; }
    .stat-card.red::after { background: #ef4444; }

    .stat-card.yellow::before { background: linear-gradient(90deg, #f59e0b, #fbbf24); }
    .stat-card.yellow .stat-icon { background: #fffbeb; color: #f59e0b; }
    .stat-card.yellow .stat-value { color: #b45309; }
    .stat-card.yellow::after { background: #f59e0b; }

    .stat-card.orange::before { background: linear-gradient(90deg, #b45309, #f59e0b); }
    .stat-card.orange .stat-icon { background: #fff7ed; color: #b45309; }
    .stat-card.orange .stat-value { color: #92400e; }
    .stat-card.orange::after { background: #b45309; }

    .stat-card.purple::before { background: linear-gradient(90deg, #8b5cf6, #a78bfa); }
    .stat-card.purple .stat-icon { background: #f5f3ff; color: #8b5cf6; }
    .stat-card.purple .stat-value { color: #6d28d9; }
    .stat-card.purple::after { background: #8b5cf6; }

    /* ===== TARGET PROGRESS ===== */
    .target-card {
        background: var(--bg-card);
        border-radius: 20px;
        padding: 24px 28px;
        border: 1px solid var(--border-color);
        margin-bottom: 30px;
        transition: all 0.3s ease;
    }
    .target-card:hover {
        border-color: #fed7aa;
        box-shadow: 0 8px 24px rgba(0,0,0,0.04);
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
        color: var(--text-primary);
    }
    .target-card .target-header h3 i {
        color: #b45309;
    }
    .target-card .target-header .target-info {
        font-size: 0.9rem;
        color: var(--text-muted);
    }
    .target-card .target-header .target-info strong {
        color: var(--text-primary);
    }
    .progress-bar {
        width: 100%;
        height: 10px;
        background: var(--border-color);
        border-radius: 40px;
        overflow: hidden;
        margin-top: 8px;
    }
    .progress-bar .progress-fill {
        height: 100%;
        border-radius: 40px;
        transition: width 1.2s cubic-bezier(0.4, 0, 0.2, 1);
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
    .progress-label {
        display: flex;
        justify-content: space-between;
        font-size: 0.75rem;
        color: var(--text-muted);
        margin-top: 6px;
    }
    .progress-label .status-text {
        font-weight: 500;
    }

    /* ===== NOTIFIKASI & AKTIVITAS ===== */
    .activity-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 24px;
        margin-bottom: 30px;
    }
    .activity-card {
        background: var(--bg-card);
        border-radius: 20px;
        padding: 20px 24px;
        border: 1px solid var(--border-color);
        transition: all 0.3s ease;
    }
    .activity-card:hover {
        border-color: #fed7aa;
        box-shadow: 0 8px 24px rgba(0,0,0,0.04);
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
        color: var(--text-primary);
    }
    .activity-card .card-header h4 i {
        color: #b45309;
    }
    .activity-card .card-header .badge-count {
        background: var(--badge-bg);
        color: var(--badge-text);
        padding: 2px 12px;
        border-radius: 40px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    /* ===== NOTIFIKASI LIST ===== */
    .notif-list {
        max-height: 280px;
        overflow-y: auto;
    }
    .notif-list::-webkit-scrollbar {
        width: 4px;
    }
    .notif-list::-webkit-scrollbar-track {
        background: var(--border-color);
        border-radius: 10px;
    }
    .notif-list::-webkit-scrollbar-thumb {
        background: #b45309;
        border-radius: 10px;
    }
    .notif-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        padding: 10px 0;
        border-bottom: 1px solid var(--border-color);
        transition: background 0.2s;
    }
    .notif-item:last-child {
        border-bottom: none;
    }
    .notif-item:hover {
        background: var(--bg-primary);
        margin: 0 -8px;
        padding: 10px 8px;
        border-radius: 8px;
    }
    .notif-item .notif-icon {
        width: 38px;
        height: 38px;
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
    .notif-item .notif-content .text { 
        font-size: 0.9rem; 
        color: var(--text-primary);
    }
    .notif-item .notif-content .text strong { color: #b45309; }
    .notif-item .notif-content .time { 
        font-size: 0.75rem; 
        color: var(--text-muted);
    }

    /* ===== MINI CALENDAR ===== */
    .mini-calendar {
        background: var(--bg-card);
        border-radius: 20px;
        padding: 20px 24px;
        border: 1px solid var(--border-color);
        margin-bottom: 30px;
        transition: all 0.3s ease;
    }
    .mini-calendar:hover {
        border-color: #fed7aa;
        box-shadow: 0 8px 24px rgba(0,0,0,0.04);
    }
    .mini-calendar .mini-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        margin-bottom: 12px;
    }
    .mini-calendar .mini-header h4 {
        font-size: 1rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
        color: var(--text-primary);
    }
    .mini-calendar .mini-header h4 i {
        color: #b45309;
    }
    .mini-calendar .mini-header a {
        color: #b45309;
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 500;
    }
    .mini-calendar .mini-header a:hover {
        text-decoration: underline;
    }

    .mini-stats {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 12px;
        margin-bottom: 12px;
    }
    .mini-stats .stat-box {
        text-align: center;
        padding: 8px;
        background: var(--bg-primary);
        border-radius: 12px;
    }
    .mini-stats .stat-box .number {
        font-size: 1.2rem;
        font-weight: 700;
    }
    .mini-stats .stat-box .number.blue { color: #3b82f6; }
    .mini-stats .stat-box .number.green { color: #22c55e; }
    .mini-stats .stat-box .number.yellow { color: #f59e0b; }
    .mini-stats .stat-box .number.red { color: #ef4444; }
    .mini-stats .stat-box .label {
        font-size: 0.7rem;
        color: var(--text-muted);
    }

    .mini-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 2px;
    }
    .mini-grid .day-label {
        text-align: center;
        font-size: 0.6rem;
        font-weight: 600;
        color: var(--text-muted);
        padding: 4px 0;
    }
    .mini-grid .day-cell {
        padding: 4px;
        text-align: center;
        font-size: 0.7rem;
        font-weight: 400;
        border-radius: 8px;
        position: relative;
        color: var(--text-primary);
        background: transparent;
    }
    .mini-grid .day-cell.today {
        background: #b45309;
        color: white;
        font-weight: 700;
    }
    .mini-grid .day-cell.other-month {
        color: var(--text-muted);
        opacity: 0.3;
    }
    .mini-grid .day-cell .event-dot {
        width: 5px;
        height: 5px;
        border-radius: 50%;
        margin: 2px auto 0;
    }
    .mini-grid .day-cell .event-dot.paid { background: #22c55e; }
    .mini-grid .day-cell .event-dot.pending { background: #f59e0b; }
    .mini-grid .day-cell .event-dot.unpaid { background: #ef4444; }

    .mini-legend {
        display: flex;
        gap: 12px;
        margin-top: 10px;
        flex-wrap: wrap;
        justify-content: center;
    }
    .mini-legend .legend-item {
        display: flex;
        align-items: center;
        gap: 4px;
        font-size: 0.7rem;
        color: var(--text-muted);
    }
    .mini-legend .legend-item .dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
    }
    .mini-legend .legend-item .dot.paid { background: #22c55e; }
    .mini-legend .legend-item .dot.pending { background: #f59e0b; }
    .mini-legend .legend-item .dot.unpaid { background: #ef4444; }

    /* ===== CHART ===== */
    .chart-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
        gap: 24px;
        margin-bottom: 30px;
    }
    .chart-box {
        background: var(--bg-card);
        border-radius: 20px;
        padding: 24px 20px 20px;
        border: 1px solid var(--border-color);
        transition: all 0.3s ease;
    }
    .chart-box:hover {
        border-color: #fed7aa;
        box-shadow: 0 8px 30px rgba(0,0,0,0.04);
    }
    .chart-box h4 {
        font-size: 0.95rem;
        font-weight: 600;
        color: var(--text-secondary);
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
        background: var(--bg-card);
        border-radius: 20px;
        padding: 20px 24px 24px;
        border: 1px solid var(--border-color);
        transition: all 0.3s ease;
    }
    .table-modern:hover {
        border-color: #fed7aa;
        box-shadow: 0 8px 30px rgba(0,0,0,0.04);
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
        color: var(--text-primary);
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
        border-bottom: 2px solid var(--border-color);
        color: var(--text-muted);
        font-weight: 600;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .table-modern td {
        padding: 12px 10px;
        border-bottom: 1px solid var(--border-color);
        font-size: 0.9rem;
        color: var(--text-primary);
    }
    .table-modern tr:hover td {
        background: var(--bg-primary);
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
    .badge-status i { font-size: 0.5rem; }
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
        background: var(--bg-card);
        color: var(--text-primary);
        border: 1px solid var(--border-color);
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
        border-color: #b45309;
        background: var(--bg-primary);
        transform: translateY(-2px);
    }

    .export-dropdown-menu {
        display: none;
        position: absolute;
        right: 0;
        top: 45px;
        background: var(--bg-card);
        border-radius: 12px;
        box-shadow: 0 8px 30px rgba(0,0,0,0.15);
        border: 1px solid var(--border-color);
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
        color: var(--text-primary);
        transition: background 0.2s;
        border-bottom: 1px solid var(--border-color);
    }
    .export-dropdown-menu a:last-child {
        border-bottom: none;
    }
    .export-dropdown-menu a:hover {
        background: var(--bg-primary);
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
        color: var(--text-muted);
    }

    @media (max-width: 768px) {
        .activity-grid {
            grid-template-columns: 1fr;
        }
        .chart-grid {
            grid-template-columns: 1fr;
        }
        .welcome-section {
            padding: 24px 20px;
        }
        .welcome-section h1 {
            font-size: 1.5rem;
        }
        .welcome-section .welcome-icon {
            font-size: 3rem;
        }
        .mini-stats {
            grid-template-columns: repeat(2, 1fr);
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

    <!-- ===== WELCOME SECTION ===== -->
    <div class="welcome-section">
        <div class="welcome-icon">
            <i class="fas fa-home"></i>
        </div>
        <h1>
            <i class="fas fa-hand-wave" style="margin-right: 8px;"></i>
            Selamat Datang, Admin!
        </h1>
        <p>
            <i class="far fa-calendar-alt" style="margin-right: 8px;"></i>
            {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
            &nbsp;·&nbsp;
            <span style="display:inline-flex; align-items:center; gap:4px;">
                <i class="fas fa-circle" style="font-size:0.5rem; color:#22c55e;"></i>
                Sistem berjalan normal
            </span>
        </p>
    </div>

    <!-- ===== STATISTIK KAMAR ===== -->
    <div class="dashboard-stats">
        <div class="stat-card blue">
            <div class="stat-icon"><i class="fas fa-home"></i></div>
            <div class="stat-label">Total Kamar</div>
            <div class="stat-value">{{ $totalKamar ?? 0 }}</div>
            <div class="stat-sub">Seluruh kamar terdaftar</div>
            <div class="stat-change neutral"><i class="fas fa-minus"></i> Stabil</div>
        </div>
        <div class="stat-card green">
            <div class="stat-icon"><i class="fas fa-check-circle"></i></div>
            <div class="stat-label">Tersedia</div>
            <div class="stat-value">{{ $tersedia ?? 0 }}</div>
            <div class="stat-sub">Kamar siap huni</div>
            <div class="stat-change up"><i class="fas fa-arrow-up"></i> 12%</div>
        </div>
        <div class="stat-card red">
            <div class="stat-icon"><i class="fas fa-times-circle"></i></div>
            <div class="stat-label">Penuh</div>
            <div class="stat-value">{{ $terisi ?? 0 }}</div>
            <div class="stat-sub">Sudah ditempati</div>
            <div class="stat-change down"><i class="fas fa-arrow-down"></i> 5%</div>
        </div>
        <div class="stat-card yellow">
            <div class="stat-icon"><i class="fas fa-tools"></i></div>
            <div class="stat-label">Maintenance</div>
            <div class="stat-value">{{ $maintenance ?? 0 }}</div>
            <div class="stat-sub">Dalam perbaikan</div>
            <div class="stat-change neutral"><i class="fas fa-minus"></i> 0%</div>
        </div>
    </div>

    <!-- ===== TARGET PENDAPATAN ===== -->
    @php
        $targetBulanan = 5000000;
        $pendapatanBulan = $pendapatanBulan ?? 0;
        $persentase = $targetBulanan > 0 ? min(100, round(($pendapatanBulan / $targetBulanan) * 100)) : 0;
        $progressColor = $persentase >= 80 ? 'green' : ($persentase >= 50 ? 'orange' : 'red');
    @endphp

    <div class="target-card">
        <div class="target-header">
            <h3><i class="fas fa-bullseye"></i> Target Pendapatan Bulanan</h3>
            <div class="target-info">
                <strong>Rp {{ number_format($pendapatanBulan, 0, ',', '.') }}</strong> 
                dari Rp {{ number_format($targetBulanan, 0, ',', '.') }}
                <span style="font-weight:700; color:#b45309; margin-left:8px;">{{ $persentase }}%</span>
            </div>
        </div>
        <div class="progress-bar">
            <div class="progress-fill {{ $progressColor }}" style="width: {{ $persentase }}%;"></div>
        </div>
        <div class="progress-label">
            <span>0%</span>
            <span class="status-text">
                @if($persentase >= 80)
                    <i class="fas fa-trophy" style="color:#f59e0b;"></i> Target hampir tercapai!
                @elseif($persentase >= 50)
                    <i class="fas fa-rocket" style="color:#3b82f6;"></i> Semangat!
                @else
                    <i class="fas fa-bullseye" style="color:#b45309;"></i> Ayo tingkatkan!
                @endif
            </span>
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
                    {{ $notifikasiCount ?? 0 }} baru
                </span>
            </div>
            <div class="notif-list">
                @forelse(($notifikasi ?? []) as $notif)
                <div class="notif-item">
                    <div class="notif-icon {{ $notif['type'] ?? 'blue' }}">
                        <i class="fas {{ $notif['icon'] ?? 'fa-info-circle' }}"></i>
                    </div>
                    <div class="notif-content">
                        <div class="text">{!! $notif['text'] ?? 'Tidak ada notifikasi' !!}</div>
                        <div class="time"><i class="far fa-clock"></i> {{ $notif['time'] ?? 'Baru saja' }}</div>
                    </div>
                </div>
                @empty
                <div style="text-align:center; padding:30px 0; color:var(--text-muted);">
                    <i class="fas fa-check-circle" style="font-size:2rem; display:block; margin-bottom:8px; color:#22c55e;"></i>
                    <p>Semua dalam keadaan baik!</p>
                    <p style="font-size:0.85rem;">Tidak ada notifikasi baru</p>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Aktivitas Terakhir -->
        <div class="activity-card">
            <div class="card-header">
                <h4><i class="fas fa-clock"></i> Aktivitas Terakhir</h4>
            </div>
            <div class="notif-list">
                @forelse(($aktivitas ?? []) as $aktivitasItem)
                <div class="notif-item">
                    <div class="notif-icon {{ $aktivitasItem['type'] ?? 'blue' }}" style="width:30px; height:30px; font-size:0.7rem;">
                        <i class="fas {{ $aktivitasItem['icon'] ?? 'fa-user' }}"></i>
                    </div>
                    <div class="notif-content">
                        <div class="text" style="font-size:0.85rem;">{!! $aktivitasItem['text'] ?? 'Aktivitas' !!}</div>
                        <div class="time"><i class="far fa-clock"></i> {{ $aktivitasItem['time'] ?? 'Baru saja' }}</div>
                    </div>
                </div>
                @empty
                <div style="text-align:center; padding:20px 0; color:var(--text-muted); font-size:0.9rem;">
                    <i class="fas fa-inbox" style="font-size:1.5rem; display:block; margin-bottom:6px;"></i>
                    Belum ada aktivitas
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- ===== MINI CALENDAR ===== -->
    <div class="mini-calendar">
        <div class="mini-header">
            <h4><i class="fas fa-calendar-alt"></i> Ringkasan Tagihan Bulan Ini</h4>
            <a href="{{ route('admin.tagihan.index') }}">Lihat Semua <i class="fas fa-arrow-right"></i></a>
        </div>

        @php
            $bulanIni = \Carbon\Carbon::now();
            $tagihansBulanIni = \App\Models\Tagihan::whereMonth('jatuh_tempo', $bulanIni->month)
                ->whereYear('jatuh_tempo', $bulanIni->year)
                ->get();

            $totalMini = $tagihansBulanIni->count();
            $paidMini = $tagihansBulanIni->where('status', 'Paid')->count();
            $pendingMini = $tagihansBulanIni->where('status', 'Pending')->count();
            $unpaidMini = $tagihansBulanIni->where('status', 'Unpaid')->count();

            $firstDay = $bulanIni->copy()->startOfMonth()->dayOfWeek;
            $daysInMonth = $bulanIni->daysInMonth;
            $today = \Carbon\Carbon::now()->day;
            $startOffset = $firstDay === 0 ? 6 : $firstDay - 1;
        @endphp

        <div class="mini-stats">
            <div class="stat-box">
                <div class="number blue">{{ $totalMini }}</div>
                <div class="label">📋 Total</div>
            </div>
            <div class="stat-box">
                <div class="number green">{{ $paidMini }}</div>
                <div class="label">✅ Lunas</div>
            </div>
            <div class="stat-box">
                <div class="number yellow">{{ $pendingMini }}</div>
                <div class="label">⏳ Pending</div>
            </div>
            <div class="stat-box">
                <div class="number red">{{ $unpaidMini }}</div>
                <div class="label">❌ Belum</div>
            </div>
        </div>

        <div class="mini-grid">
            @foreach(['Min','Sen','Sel','Rab','Kam','Jum','Sab'] as $day)
                <div class="day-label">{{ $day }}</div>
            @endforeach

            @for($i = 0; $i < $startOffset; $i++)
                <div class="day-cell other-month"></div>
            @endfor

            @for($day = 1; $day <= $daysInMonth; $day++)
                @php
                    $dateStr = $bulanIni->format('Y') . '-' . str_pad($bulanIni->month, 2, '0', STR_PAD_LEFT) . '-' . str_pad($day, 2, '0', STR_PAD_LEFT);
                    $dayEvents = $tagihansBulanIni->filter(function($t) use ($dateStr) {
                        return $t->jatuh_tempo && $t->jatuh_tempo->format('Y-m-d') === $dateStr;
                    });
                    $isToday = $day === $today;
                    $hasEvents = $dayEvents->count() > 0;
                    $statusClass = '';
                    if ($hasEvents) {
                        $status = $dayEvents->first()->status;
                        $statusClass = strtolower($status);
                    }
                @endphp
                <div class="day-cell {{ $isToday ? 'today' : '' }}">
                    {{ $day }}
                    @if($hasEvents)
                        <div class="event-dot {{ $statusClass }}"></div>
                    @endif
                </div>
            @endfor
        </div>

        <div class="mini-legend">
            <span class="legend-item">
                <span class="dot paid"></span> Lunas
            </span>
            <span class="legend-item">
                <span class="dot pending"></span> Pending
            </span>
            <span class="legend-item">
                <span class="dot unpaid"></span> Belum Bayar
            </span>
        </div>
    </div>

    <!-- ===== STATISTIK PEMBAYARAN ===== -->
    <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(180px,1fr)); gap:16px; margin-bottom:28px;">
        <div style="background:var(--bg-card); border-radius:16px; padding:16px 20px; border:1px solid var(--border-color); text-align:center; transition: all 0.3s ease;">
            <div style="font-size:0.8rem; color:var(--text-muted);">✅ Lunas</div>
            <div style="font-size:2rem; font-weight:700; color:#22c55e;">{{ $lunas ?? 0 }}</div>
        </div>
        <div style="background:var(--bg-card); border-radius:16px; padding:16px 20px; border:1px solid var(--border-color); text-align:center; transition: all 0.3s ease;">
            <div style="font-size:0.8rem; color:var(--text-muted);">⏳ Belum Bayar</div>
            <div style="font-size:2rem; font-weight:700; color:#f59e0b;">{{ $belum ?? 0 }}</div>
        </div>
        <div style="background:var(--bg-card); border-radius:16px; padding:16px 20px; border:1px solid var(--border-color); text-align:center; transition: all 0.3s ease;">
            <div style="font-size:0.8rem; color:var(--text-muted);">⚠️ Tunggak</div>
            <div style="font-size:2rem; font-weight:700; color:#ef4444;">{{ $tunggak ?? 0 }}</div>
        </div>
        <div style="background:var(--bg-card); border-radius:16px; padding:16px 20px; border:1px solid var(--border-color); text-align:center; transition: all 0.3s ease;">
            <div style="font-size:0.8rem; color:var(--text-muted);">💰 Pendapatan</div>
            <div style="font-size:1.6rem; font-weight:700; color:#b45309;">Rp {{ number_format($pendapatanBulan ?? 0, 0, ',', '.') }}</div>
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
                <a href="{{ route('admin.kamar.index') }}" class="btn-outline-orange">
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
                @forelse(($kamars ?? [])->take(5) as $kamar)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><strong>{{ $kamar->nama }}</strong></td>
                    <td>Rp {{ number_format($kamar->harga, 0, ',', '.') }}</td>
                    <td>
                        @if($kamar->status == 'Tersedia')
                            <span class="badge-status tersedia"><i class="fas fa-circle"></i> Tersedia</span>
                        @elseif($kamar->status == 'Penuh')
                            <span class="badge-status penuh"><i class="fas fa-circle"></i> Penuh</span>
                        @else
                            <span class="badge-status maintenance"><i class="fas fa-circle"></i> Maintenance</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="text-align:center; padding:30px; color:var(--text-muted);">
                        <i class="fas fa-inbox" style="font-size:2rem; display:block; margin-bottom:10px;"></i>
                        Belum ada data kamar
                    </td>
                </tr>
                @endforelse
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
                        data: [{{ $tersedia ?? 0 }}, {{ $terisi ?? 0 }}, {{ $maintenance ?? 0 }}],
                        backgroundColor: ['rgba(34, 197, 94, 0.8)', 'rgba(239, 68, 68, 0.8)', 'rgba(245, 158, 11, 0.8)'],
                        borderColor: ['#22c55e', '#ef4444', '#f59e0b'],
                        borderWidth: 2,
                        borderRadius: 8,
                        barPercentage: 0.6,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: { 
                        legend: { display: false },
                    },
                    scales: {
                        y: { 
                            beginAtZero: true, 
                            ticks: { stepSize: 1, font: { size: 11 } }, 
                            grid: { color: 'var(--border-color)' } 
                        },
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
                        data: [{{ $lunas ?? 0 }}, {{ $belum ?? 0 }}, {{ $tunggak ?? 0 }}],
                        backgroundColor: ['rgba(34, 197, 94, 0.8)', 'rgba(245, 158, 11, 0.8)', 'rgba(239, 68, 68, 0.8)'],
                        borderColor: ['#22c55e', '#f59e0b', '#ef4444'],
                        borderWidth: 2,
                        borderRadius: 8,
                        barPercentage: 0.6,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: { 
                        legend: { display: false },
                    },
                    scales: {
                        y: { 
                            beginAtZero: true, 
                            ticks: { stepSize: 1, font: { size: 11 } }, 
                            grid: { color: 'var(--border-color)' } 
                        },
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

@endsection