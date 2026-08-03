@extends('layouts.admin')

@section('title', 'Manajemen Tagihan · Kos XYZ')

@section('content')
<style>
    /* ===== STATISTIK TAGIHAN ===== */
    .tagihan-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 16px;
        margin-bottom: 24px;
    }
    .tagihan-stat-card {
        background: var(--bg-card);
        border-radius: 16px;
        padding: 16px 20px;
        border: 1px solid var(--border-color);
        text-align: center;
        transition: all 0.3s ease;
    }
    .tagihan-stat-card:hover {
        border-color: #fed7aa;
        transform: translateY(-2px);
    }
    .tagihan-stat-card .number {
        font-size: 2rem;
        font-weight: 800;
    }
    .tagihan-stat-card .label {
        font-size: 0.8rem;
        color: var(--text-muted);
        margin-top: 2px;
    }
    .tagihan-stat-card .number.green { color: #22c55e; }
    .tagihan-stat-card .number.yellow { color: #f59e0b; }
    .tagihan-stat-card .number.red { color: #ef4444; }
    .tagihan-stat-card .number.blue { color: #3b82f6; }
    .tagihan-stat-card .number.orange { color: #b45309; }

    /* ===== NOTIFIKASI ===== */
    .notif-section {
        background: var(--bg-card);
        border-radius: 20px;
        padding: 20px 24px;
        border: 1px solid var(--border-color);
        margin-bottom: 24px;
        transition: all 0.3s ease;
    }
    .notif-section:hover {
        border-color: #fed7aa;
    }
    .notif-section .notif-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        margin-bottom: 14px;
    }
    .notif-section .notif-header h3 {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--text-primary);
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .notif-section .notif-header h3 i {
        color: #b45309;
    }
    .notif-section .notif-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }
    .notif-section .notif-buttons .btn-notif {
        padding: 10px 24px;
        border-radius: 40px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 0.9rem;
        color: white;
    }
    .notif-section .notif-buttons .btn-notif.wa { background: #25D366; }
    .notif-section .notif-buttons .btn-notif.wa:hover { background: #1ebe57; transform: translateY(-2px); }
    .notif-section .notif-buttons .btn-notif.email { background: #3b82f6; }
    .notif-section .notif-buttons .btn-notif.email:hover { background: #2563eb; transform: translateY(-2px); }
    .notif-section .notif-buttons .btn-notif.reminder { background: #f59e0b; }
    .notif-section .notif-buttons .btn-notif.reminder:hover { background: #d97706; transform: translateY(-2px); }

    /* ===== TABEL ===== */
    .table-container {
        background: var(--bg-card);
        border-radius: 20px;
        padding: 20px 24px;
        border: 1px solid var(--border-color);
        margin-bottom: 28px;
        transition: all 0.3s ease;
    }
    .table-container:hover {
        border-color: #fed7aa;
    }
    .table-container .table-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        margin-bottom: 16px;
    }
    .table-container .table-header h3 {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--text-primary);
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .table-container .table-header h3 i {
        color: #b45309;
    }
    .table-container table {
        width: 100%;
        border-collapse: collapse;
    }
    .table-container th {
        text-align: left;
        padding: 12px 10px;
        border-bottom: 2px solid var(--border-color);
        color: var(--text-muted);
        font-weight: 600;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .table-container td {
        padding: 12px 10px;
        border-bottom: 1px solid var(--border-color);
        font-size: 0.9rem;
        color: var(--text-primary);
    }
    .table-container tr:hover td {
        background: var(--bg-primary);
    }
    .table-container tr:last-child td {
        border-bottom: none;
    }
    .table-container .status-badge {
        padding: 4px 14px;
        border-radius: 40px;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .table-container .status-badge.paid { background: #dcfce7; color: #15803d; }
    .table-container .status-badge.pending { background: #fef9c3; color: #a16207; }
    .table-container .status-badge.unpaid { background: #fee2e2; color: #b91c1c; }

    /* ===== CALENDAR ===== */
    .calendar-container {
        background: var(--bg-card);
        border-radius: 20px;
        padding: 24px;
        border: 1px solid var(--border-color);
        transition: all 0.3s ease;
    }
    .calendar-container:hover {
        border-color: #fed7aa;
    }

    .calendar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        flex-wrap: wrap;
        gap: 12px;
    }
    .calendar-header h3 {
        font-size: 1.2rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 10px;
        color: var(--text-primary);
    }
    .calendar-header h3 i {
        color: #b45309;
    }
    .calendar-nav {
        display: flex;
        gap: 8px;
        align-items: center;
    }
    .calendar-nav button {
        background: var(--bg-primary);
        border: 1px solid var(--border-color);
        color: var(--text-primary);
        padding: 8px 16px;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.2s;
        font-weight: 500;
        font-size: 0.9rem;
    }
    .calendar-nav button:hover {
        background: #b45309;
        color: white;
        border-color: #b45309;
    }
    .calendar-nav .month-label {
        font-weight: 600;
        font-size: 1.1rem;
        min-width: 160px;
        text-align: center;
        color: var(--text-primary);
    }

    .calendar-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 4px;
    }
    .calendar-grid .day-header {
        text-align: center;
        font-weight: 600;
        font-size: 0.8rem;
        color: var(--text-muted);
        padding: 8px 0;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .calendar-grid .day-cell {
        aspect-ratio: 1;
        min-height: 60px;
        background: var(--bg-primary);
        border-radius: 12px;
        padding: 4px;
        cursor: pointer;
        transition: all 0.2s ease;
        position: relative;
        border: 2px solid transparent;
    }
    .calendar-grid .day-cell:hover {
        border-color: #b45309;
        transform: scale(1.02);
        z-index: 2;
    }
    .calendar-grid .day-cell .day-number {
        font-weight: 500;
        font-size: 0.85rem;
        color: var(--text-primary);
        padding: 2px 6px;
        display: inline-block;
        border-radius: 50%;
        line-height: 1.4;
    }
    .calendar-grid .day-cell.today .day-number {
        background: #b45309;
        color: white;
        font-weight: 700;
    }
    .calendar-grid .day-cell.other-month .day-number {
        color: var(--text-muted);
        opacity: 0.5;
    }
    .calendar-grid .day-cell .event-dots {
        display: flex;
        flex-wrap: wrap;
        gap: 3px;
        margin-top: 2px;
        justify-content: center;
    }
    .calendar-grid .day-cell .event-dots .dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        display: inline-block;
    }
    .calendar-grid .day-cell .event-count {
        position: absolute;
        top: -4px;
        right: -4px;
        background: #b45309;
        color: white;
        font-size: 0.6rem;
        font-weight: 700;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* ===== CALENDAR LEGEND ===== */
    .calendar-legend {
        display: flex;
        flex-wrap: wrap;
        gap: 16px;
        margin-top: 16px;
        padding-top: 16px;
        border-top: 1px solid var(--border-color);
    }
    .calendar-legend .legend-item {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 0.85rem;
        color: var(--text-secondary);
    }
    .calendar-legend .legend-item .color-box {
        width: 16px;
        height: 16px;
        border-radius: 4px;
    }
    .calendar-legend .legend-item .color-box.paid { background: #22c55e; }
    .calendar-legend .legend-item .color-box.pending { background: #f59e0b; }
    .calendar-legend .legend-item .color-box.unpaid { background: #ef4444; }

    /* ===== EVENT DETAIL MODAL ===== */
    .event-detail-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        backdrop-filter: blur(4px);
        z-index: 999;
        justify-content: center;
        align-items: center;
    }
    .event-detail-modal.show {
        display: flex;
        animation: fadeIn 0.3s ease;
    }
    .event-detail-modal .modal-content {
        background: var(--bg-card);
        border-radius: 24px;
        padding: 32px;
        max-width: 480px;
        width: 90%;
        max-height: 80vh;
        overflow-y: auto;
        position: relative;
        box-shadow: 0 20px 60px rgba(0,0,0,0.2);
    }
    .event-detail-modal .modal-content .close-btn {
        position: absolute;
        top: 16px;
        right: 20px;
        background: none;
        border: none;
        font-size: 1.8rem;
        cursor: pointer;
        color: var(--text-muted);
        transition: color 0.2s;
    }
    .event-detail-modal .modal-content .close-btn:hover {
        color: var(--text-primary);
    }
    .event-detail-modal .modal-content h3 {
        font-size: 1.4rem;
        font-weight: 700;
        margin-bottom: 16px;
        color: var(--text-primary);
    }
    .event-detail-modal .modal-content .event-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }
    .event-detail-modal .modal-content .event-list .event-item {
        padding: 14px 16px;
        border-radius: 12px;
        border-left: 4px solid;
        background: var(--bg-primary);
    }
    .event-detail-modal .modal-content .event-list .event-item .name {
        font-weight: 600;
        color: var(--text-primary);
    }
    .event-detail-modal .modal-content .event-list .event-item .status-badge {
        font-size: 0.7rem;
        padding: 2px 10px;
        border-radius: 40px;
        font-weight: 600;
    }
    .event-detail-modal .modal-content .event-list .event-item .status-badge.paid { background: #dcfce7; color: #15803d; }
    .event-detail-modal .modal-content .event-list .event-item .status-badge.pending { background: #fef9c3; color: #a16207; }
    .event-detail-modal .modal-content .event-list .event-item .status-badge.unpaid { background: #fee2e2; color: #b91c1c; }
    .event-detail-modal .modal-content .event-list .event-item .nominal {
        font-weight: 600;
        color: #b45309;
    }
    .event-detail-modal .modal-content .empty-events {
        text-align: center;
        padding: 20px;
        color: var(--text-muted);
    }

    /* ===== MOBILE RESPONSIVE ===== */
    @media (max-width: 600px) {
        .calendar-grid .day-cell {
            min-height: 40px;
            padding: 2px;
        }
        .calendar-grid .day-cell .day-number {
            font-size: 0.7rem;
        }
        .calendar-grid .day-cell .event-dots .dot {
            width: 5px;
            height: 5px;
        }
        .calendar-grid .day-cell .event-count {
            width: 14px;
            height: 14px;
            font-size: 0.5rem;
            top: -2px;
            right: -2px;
        }
        .calendar-header h3 {
            font-size: 1rem;
        }
        .calendar-nav .month-label {
            font-size: 0.9rem;
            min-width: 120px;
        }
        .calendar-nav button {
            padding: 4px 12px;
            font-size: 0.8rem;
        }
        .event-detail-modal .modal-content {
            padding: 20px;
        }
        .tagihan-stats {
            grid-template-columns: 1fr 1fr;
        }
        .calendar-legend {
            gap: 8px;
        }
        .calendar-legend .legend-item {
            font-size: 0.75rem;
        }
        .notif-section .notif-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 12px;
        }
        .notif-section .notif-buttons {
            width: 100%;
        }
        .notif-section .notif-buttons .btn-notif {
            flex: 1;
            justify-content: center;
            padding: 8px 16px;
            font-size: 0.8rem;
        }
        .table-container {
            padding: 16px;
        }
        .table-container th, .table-container td {
            padding: 8px 6px;
            font-size: 0.8rem;
        }
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
    }
</style>

<!-- ===== HEADER ===== -->
<div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:12px; margin-bottom:24px;">
    <div>
        <h1 class="page-title" style="font-size:1.8rem; margin-bottom:2px;">
            <i class="fas fa-file-invoice" style="color:#b45309;"></i> Manajemen Tagihan
        </h1>
        <p class="page-sub" style="margin-bottom:0; font-size:0.95rem;">
            Auto-generate invoice, status pembayaran
        </p>
    </div>
    <div>
        <form method="POST" action="{{ route('admin.tagihan.generate') }}" style="display:inline;">
            @csrf
            <button type="submit" class="btn-primary" style="background:#22c55e; padding:10px 24px;">
                <i class="fas fa-sync-alt"></i> Generate Tagihan
            </button>
        </form>
    </div>
</div>

<!-- ===== STATISTIK TAGIHAN ===== -->
@php
    $totalTagihan = $tagihans->count();
    $paid = $tagihans->where('status', 'Paid')->count();
    $unpaid = $tagihans->where('status', 'Unpaid')->count();
    $pending = $tagihans->where('status', 'Pending')->count();
    $totalNominal = $tagihans->where('status', 'Paid')->sum('nominal');
@endphp

<div class="tagihan-stats">
    <div class="tagihan-stat-card">
        <div class="number blue">{{ $totalTagihan }}</div>
        <div class="label">📋 Total Tagihan</div>
    </div>
    <div class="tagihan-stat-card">
        <div class="number green">{{ $paid }}</div>
        <div class="label">✅ Lunas</div>
    </div>
    <div class="tagihan-stat-card">
        <div class="number yellow">{{ $pending }}</div>
        <div class="label">⏳ Pending</div>
    </div>
    <div class="tagihan-stat-card">
        <div class="number red">{{ $unpaid }}</div>
        <div class="label">❌ Belum Bayar</div>
    </div>
    <div class="tagihan-stat-card">
        <div class="number orange">Rp {{ number_format($totalNominal, 0, ',', '.') }}</div>
        <div class="label">💰 Total Pendapatan</div>
    </div>
</div>

<!-- ===== NOTIFIKASI ===== -->
<div class="notif-section">
    <div class="notif-header">
        <h3><i class="fas fa-bell"></i> Kirim Notifikasi</h3>
        <div class="notif-buttons">
            <form method="POST" action="{{ route('admin.notifikasi.wa') }}" style="display:inline;">
                @csrf
                <button type="submit" class="btn-notif wa"><i class="fab fa-whatsapp"></i> Kirim WA</button>
            </form>
            <form method="POST" action="{{ route('admin.notifikasi.email') }}" style="display:inline;">
                @csrf
                <button type="submit" class="btn-notif email"><i class="fas fa-envelope"></i> Kirim Email</button>
            </form>
            <form method="POST" action="{{ route('admin.notifikasi.reminder') }}" style="display:inline;">
                @csrf
                <button type="submit" class="btn-notif reminder"><i class="fas fa-clock"></i> Auto-Reminder (H-3)</button>
            </form>
        </div>
    </div>
    @if(session('success'))
    <div style="padding:12px 18px; background:#dcfce7; border-radius:12px; color:#15803d; font-weight:500; display:flex; align-items:center; gap:8px;">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
    </div>
    @endif
</div>

<!-- ===== DAFTAR TAGIHAN ===== -->
<div class="table-container">
    <div class="table-header">
        <h3><i class="fas fa-list"></i> Daftar Tagihan</h3>
    </div>
    <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th>Penyewa</th>
                    <th>Bulan</th>
                    <th>Nominal</th>
                    <th>Jatuh Tempo</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tagihans as $tagihan)
                <tr>
                    <td><strong>{{ $tagihan->penyewa->nama_lengkap ?? '-' }}</strong></td>
                    <td>{{ $tagihan->bulan }} {{ $tagihan->tahun }}</td>
                    <td>Rp {{ number_format($tagihan->nominal, 0, ',', '.') }}</td>
                    <td>
                        @php
                            $jatuhTempo = $tagihan->jatuh_tempo;
                            if ($jatuhTempo instanceof \Carbon\Carbon) {
                                echo $jatuhTempo->format('d/m/Y');
                            } elseif ($jatuhTempo) {
                                echo \Carbon\Carbon::parse($jatuhTempo)->format('d/m/Y');
                            } else {
                                echo '-';
                            }
                        @endphp
                    </td>
                    <td>
                        @if($tagihan->status == 'Paid')
                            <span class="status-badge paid"><i class="fas fa-check-circle"></i> Lunas</span>
                        @elseif($tagihan->status == 'Pending')
                            <span class="status-badge pending"><i class="fas fa-clock"></i> Pending</span>
                        @else
                            <span class="status-badge unpaid"><i class="fas fa-times-circle"></i> Belum Bayar</span>
                        @endif
                    </td>
                    <td>
                        <form method="POST" action="{{ route('admin.tagihan.updateStatus', $tagihan->id) }}" style="display:inline;">
                            @csrf
                            <button type="submit" style="background:#dbeafe; color:#1e40af; border:none; padding:6px 14px; border-radius:40px; font-weight:600; font-size:0.75rem; cursor:pointer; transition:0.2s;">
                                <i class="fas fa-sync-alt"></i> Update
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align:center; padding:30px; color:var(--text-muted);">Belum ada tagihan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- ===== CALENDAR VIEW ===== -->
<div class="calendar-container" id="calendarContainer">
    <div class="calendar-header">
        <h3><i class="fas fa-calendar-alt"></i> Kalender Tagihan</h3>
        <div class="calendar-nav">
            <button onclick="changeMonth(-1)"><i class="fas fa-chevron-left"></i></button>
            <span class="month-label" id="monthLabel">{{ \Carbon\Carbon::now()->translatedFormat('F Y') }}</span>
            <button onclick="changeMonth(1)"><i class="fas fa-chevron-right"></i></button>
            <button onclick="goToToday()" style="background:#b45309; color:white; border-color:#b45309;">Hari Ini</button>
        </div>
    </div>

    <div class="calendar-grid" id="calendarGrid">
        <!-- Day headers akan di-generate oleh JS -->
    </div>

    <div class="calendar-legend">
        <span class="legend-item"><span class="color-box paid"></span> Lunas (Paid)</span>
        <span class="legend-item"><span class="color-box pending"></span> Pending</span>
        <span class="legend-item"><span class="color-box unpaid"></span> Belum Bayar (Unpaid)</span>
    </div>
</div>

<!-- ===== EVENT DETAIL MODAL ===== -->
<div class="event-detail-modal" id="eventModal">
    <div class="modal-content">
        <button class="close-btn" onclick="closeModal()">&times;</button>
        <h3 id="modalDate">Detail Tagihan</h3>
        <div class="event-list" id="eventList">
            <!-- Diisi oleh JS -->
        </div>
    </div>
</div>

<!-- ===== JAVASCRIPT ===== -->
<script>
    // ============================================================
    // ===== CALENDAR DATA =====
    // ============================================================
    const events = @json($events);
    let currentMonth = {{ \Carbon\Carbon::now()->month }};
    let currentYear = {{ \Carbon\Carbon::now()->year }};

    const monthNames = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    const dayNames = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];

    // ============================================================
    // ===== RENDER CALENDAR =====
    // ============================================================
    function renderCalendar(month, year) {
        const grid = document.getElementById('calendarGrid');
        const label = document.getElementById('monthLabel');
        
        label.textContent = monthNames[month - 1] + ' ' + year;

        const firstDay = new Date(year, month - 1, 1).getDay();
        const daysInMonth = new Date(year, month, 0).getDate();
        const daysInPrevMonth = new Date(year, month - 1, 0).getDate();
        const today = new Date();
        const todayDate = today.getDate();
        const todayMonth = today.getMonth() + 1;
        const todayYear = today.getFullYear();

        let html = '';
        
        // Day headers
        dayNames.forEach(day => {
            html += `<div class="day-header">${day}</div>`;
        });

        // Previous month days
        const startOffset = firstDay === 0 ? 6 : firstDay - 1;
        for (let i = startOffset - 1; i >= 0; i--) {
            const day = daysInPrevMonth - i;
            html += `<div class="day-cell other-month"><span class="day-number">${day}</span></div>`;
        }

        // Current month days
        for (let day = 1; day <= daysInMonth; day++) {
            const dateStr = `${year}-${String(month).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
            const dayEvents = events.filter(e => e.start === dateStr);
            const isToday = (day === todayDate && month === todayMonth && year === todayYear);
            const hasEvents = dayEvents.length > 0;

            let eventDots = '';
            let eventCount = '';
            if (hasEvents) {
                const dots = dayEvents.slice(0, 3);
                dots.forEach(e => {
                    eventDots += `<span class="dot" style="background:${e.color};"></span>`;
                });
                if (dayEvents.length > 3) {
                    eventDots += `<span class="dot" style="background:#94a3b8; font-size:0.5rem; display:flex; align-items:center; justify-content:center;">+${dayEvents.length - 3}</span>`;
                }
                eventCount = `<span class="event-count">${dayEvents.length}</span>`;
            }

            html += `
                <div class="day-cell ${isToday ? 'today' : ''}" onclick="showDayEvents('${dateStr}')">
                    <span class="day-number">${day}</span>
                    ${eventCount}
                    ${hasEvents ? `<div class="event-dots">${eventDots}</div>` : ''}
                </div>
            `;
        }

        // Next month days
        const totalCells = startOffset + daysInMonth;
        const remainingCells = (7 - (totalCells % 7)) % 7;
        for (let day = 1; day <= remainingCells; day++) {
            html += `<div class="day-cell other-month"><span class="day-number">${day}</span></div>`;
        }

        grid.innerHTML = html;
    }

    // ============================================================
    // ===== CHANGE MONTH =====
    // ============================================================
    function changeMonth(delta) {
        currentMonth += delta;
        if (currentMonth > 12) {
            currentMonth = 1;
            currentYear++;
        } else if (currentMonth < 1) {
            currentMonth = 12;
            currentYear--;
        }
        renderCalendar(currentMonth, currentYear);
    }

    function goToToday() {
        const today = new Date();
        currentMonth = today.getMonth() + 1;
        currentYear = today.getFullYear();
        renderCalendar(currentMonth, currentYear);
    }

    // ============================================================
    // ===== SHOW DAY EVENTS =====
    // ============================================================
    function showDayEvents(dateStr) {
        const modal = document.getElementById('eventModal');
        const eventList = document.getElementById('eventList');
        const modalDate = document.getElementById('modalDate');

        const dayEvents = events.filter(e => e.start === dateStr);
        
        modalDate.textContent = dayEvents.length > 0 
            ? `📅 ${dayEvents[0].start} - ${dayEvents.length} tagihan` 
            : `📅 ${dateStr} - Tidak ada tagihan`;

        if (dayEvents.length === 0) {
            eventList.innerHTML = `
                <div class="empty-events">
                    <i class="fas fa-calendar-check" style="font-size:2rem; display:block; margin-bottom:8px; color:var(--text-muted);"></i>
                    <p>Tidak ada tagihan pada tanggal ini</p>
                </div>
            `;
        } else {
            let html = '';
            dayEvents.forEach(e => {
                const statusClass = e.status.toLowerCase();
                const statusLabel = e.status === 'Paid' ? '✅ Lunas' : e.status === 'Pending' ? '⏳ Pending' : '❌ Belum Bayar';
                html += `
                    <div class="event-item" style="border-left-color: ${e.color};">
                        <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap;">
                            <span class="name">${e.title}</span>
                            <span class="nominal">Rp ${new Intl.NumberFormat('id-ID').format(e.total)}</span>
                        </div>
                        <div style="display:flex; justify-content:space-between; align-items:center; margin-top:4px; flex-wrap:wrap;">
                            <span class="status-badge ${statusClass}">${statusLabel}</span>
                            <span style="font-size:0.75rem; color:var(--text-muted);">ID: #${e.id}</span>
                        </div>
                    </div>
                `;
            });
            eventList.innerHTML = html;
        }

        modal.classList.add('show');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        const modal = document.getElementById('eventModal');
        modal.classList.remove('show');
        document.body.style.overflow = 'auto';
    }

    // Close modal when clicking outside
    document.getElementById('eventModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });

    // Close modal with ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });

    // ============================================================
    // ===== INIT CALENDAR =====
    // ============================================================
    renderCalendar(currentMonth, currentYear);
</script>

@endsection