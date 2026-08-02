@extends('layouts.admin')

@section('title', 'Dashboard · Kos XYZ')

@section('content')
<h1 class="page-title"><i class="fas fa-chart-pie"></i> Ringkasan Eksekutif</h1>
<p class="page-sub">Data real-time operasional kos</p>

<div class="stats-grid" style="display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:20px; margin-bottom:32px;">
    <div style="background:white; border-radius:20px; padding:20px 22px; border:1px solid #f1f5f9;">
        <div style="font-size:0.85rem; color:#64748b; font-weight:500;">Total Kamar</div>
        <div style="font-size:2rem; font-weight:700; margin-top:4px;">{{ $totalKamar }}</div>
    </div>
    <div style="background:white; border-radius:20px; padding:20px 22px; border:1px solid #f1f5f9;">
        <div style="font-size:0.85rem; color:#64748b; font-weight:500;">Terisi</div>
        <div style="font-size:2rem; font-weight:700; margin-top:4px; color:#22c55e;">{{ $terisi }}</div>
    </div>
    <div style="background:white; border-radius:20px; padding:20px 22px; border:1px solid #f1f5f9;">
        <div style="font-size:0.85rem; color:#64748b; font-weight:500;">Kosong</div>
        <div style="font-size:2rem; font-weight:700; margin-top:4px; color:#f59e0b;">{{ $kosong }}</div>
    </div>
    <div style="background:white; border-radius:20px; padding:20px 22px; border:1px solid #f1f5f9;">
        <div style="font-size:0.85rem; color:#64748b; font-weight:500;">Maintenance</div>
        <div style="font-size:2rem; font-weight:700; margin-top:4px; color:#ef4444;">{{ $maintenance }}</div>
    </div>
</div>

<div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:20px; margin-bottom:32px;">
    <div style="background:white; border-radius:20px; padding:20px 22px; border:1px solid #f1f5f9;">
        <div style="font-size:0.85rem; color:#64748b; font-weight:500;">✅ Lunas Bulan Ini</div>
        <div style="font-size:2rem; font-weight:700; margin-top:4px; color:#22c55e;">{{ $lunas }}</div>
    </div>
    <div style="background:white; border-radius:20px; padding:20px 22px; border:1px solid #f1f5f9;">
        <div style="font-size:0.85rem; color:#64748b; font-weight:500;">⏳ Belum Bayar</div>
        <div style="font-size:2rem; font-weight:700; margin-top:4px; color:#f59e0b;">{{ $belum }}</div>
    </div>
    <div style="background:white; border-radius:20px; padding:20px 22px; border:1px solid #f1f5f9;">
        <div style="font-size:0.85rem; color:#64748b; font-weight:500;">⚠️ Tunggak</div>
        <div style="font-size:2rem; font-weight:700; margin-top:4px; color:#ef4444;">{{ $tunggak }}</div>
    </div>
</div>

<div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:20px; margin-bottom:32px;">
    <div style="background:white; border-radius:20px; padding:20px 22px; border:1px solid #f1f5f9;">
        <div style="font-size:0.85rem; color:#64748b; font-weight:500;">💰 Pendapatan Bulan Ini</div>
        <div style="font-size:2rem; font-weight:700; margin-top:4px;">Rp {{ number_format($pendapatanBulan, 0, ',', '.') }}</div>
    </div>
    <div style="background:white; border-radius:20px; padding:20px 22px; border:1px solid #f1f5f9;">
        <div style="font-size:0.85rem; color:#64748b; font-weight:500;">📆 Pendapatan Tahunan</div>
        <div style="font-size:2rem; font-weight:700; margin-top:4px;">Rp {{ number_format($pendapatanTahunan, 0, ',', '.') }}</div>
    </div>
</div>

<!-- Grafik -->
<div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(320px,1fr)); gap:24px; margin-bottom:32px;">
    <div style="background:white; border-radius:20px; padding:24px 20px; border:1px solid #f1f5f9;">
        <h4 style="font-size:1rem; font-weight:600; margin-bottom:12px; color:#334155;"><i class="fas fa-door-open" style="color:#b45309; margin-right:6px;"></i> Status Kamar</h4>
        <canvas id="chartKamar"></canvas>
    </div>
    <div style="background:white; border-radius:20px; padding:24px 20px; border:1px solid #f1f5f9;">
        <h4 style="font-size:1rem; font-weight:600; margin-bottom:12px; color:#334155;"><i class="fas fa-credit-card" style="color:#b45309; margin-right:6px;"></i> Status Pembayaran</h4>
        <canvas id="chartPembayaran"></canvas>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Chart Status Kamar
    new Chart(document.getElementById('chartKamar'), {
        type: 'bar',
        data: {
            labels: ['Total', 'Terisi', 'Kosong', 'Maintenance'],
            datasets: [{
                label: 'Jumlah Kamar',
                data: [{{ $totalKamar }}, {{ $terisi }}, {{ $kosong }}, {{ $maintenance }}],
                backgroundColor: ['#3b82f6', '#22c55e', '#f59e0b', '#ef4444'],
                borderColor: ['#2563eb', '#16a34a', '#d97706', '#dc2626'],
                borderWidth: 2,
                borderRadius: 6
            }]
        },
        options: { responsive: true, plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } } }
    });

    // Chart Pembayaran
    new Chart(document.getElementById('chartPembayaran'), {
        type: 'bar',
        data: {
            labels: ['Lunas', 'Belum Bayar', 'Tunggak'],
            datasets: [{
                label: 'Jumlah Tagihan',
                data: [{{ $lunas }}, {{ $belum }}, {{ $tunggak }}],
                backgroundColor: ['#22c55e', '#f59e0b', '#ef4444'],
                borderColor: ['#16a34a', '#d97706', '#dc2626'],
                borderWidth: 2,
                borderRadius: 6
            }]
        },
        options: { responsive: true, plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } } }
    });
</script>
@endsection