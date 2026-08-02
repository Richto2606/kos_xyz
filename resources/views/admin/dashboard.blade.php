@extends('layouts.admin')

@section('title', 'Dashboard · Kos XYZ')

@section('content')
<h1 class="page-title"><i class="fas fa-chart-pie"></i> Ringkasan Eksekutif</h1>
<p class="page-sub">Data real-time operasional kos</p>

<!-- ===== STATISTIK KAMAR ===== -->
<div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:20px; margin-bottom:32px;">
    <div style="background:white; border-radius:20px; padding:20px 22px; border:1px solid #f1f5f9; border-left:4px solid #3b82f6;">
        <div style="font-size:0.85rem; color:#64748b; font-weight:500;">🏠 Total Kamar</div>
        <div style="font-size:2rem; font-weight:700; margin-top:4px;">{{ $totalKamar }}</div>
    </div>
    <div style="background:white; border-radius:20px; padding:20px 22px; border:1px solid #f1f5f9; border-left:4px solid #22c55e;">
        <div style="font-size:0.85rem; color:#64748b; font-weight:500;">✅ Tersedia</div>
        <div style="font-size:2rem; font-weight:700; margin-top:4px; color:#22c55e;">{{ $tersedia ?? 0 }}</div>
    </div>
    <div style="background:white; border-radius:20px; padding:20px 22px; border:1px solid #f1f5f9; border-left:4px solid #ef4444;">
        <div style="font-size:0.85rem; color:#64748b; font-weight:500;">❌ Terisi (Penuh)</div>
        <div style="font-size:2rem; font-weight:700; margin-top:4px; color:#ef4444;">{{ $terisi ?? 0 }}</div>
    </div>
    <div style="background:white; border-radius:20px; padding:20px 22px; border:1px solid #f1f5f9; border-left:4px solid #f59e0b;">
        <div style="font-size:0.85rem; color:#64748b; font-weight:500;">🔧 Maintenance</div>
        <div style="font-size:2rem; font-weight:700; margin-top:4px; color:#f59e0b;">{{ $maintenance ?? 0 }}</div>
    </div>
</div>

<!-- ===== STATISTIK PEMBAYARAN ===== -->
<div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:20px; margin-bottom:32px;">
    <div style="background:white; border-radius:20px; padding:20px 22px; border:1px solid #f1f5f9; border-left:4px solid #22c55e;">
        <div style="font-size:0.85rem; color:#64748b; font-weight:500;">✅ Lunas Bulan Ini</div>
        <div style="font-size:2rem; font-weight:700; margin-top:4px; color:#22c55e;">{{ $lunas ?? 0 }}</div>
    </div>
    <div style="background:white; border-radius:20px; padding:20px 22px; border:1px solid #f1f5f9; border-left:4px solid #f59e0b;">
        <div style="font-size:0.85rem; color:#64748b; font-weight:500;">⏳ Belum Bayar</div>
        <div style="font-size:2rem; font-weight:700; margin-top:4px; color:#f59e0b;">{{ $belum ?? 0 }}</div>
    </div>
    <div style="background:white; border-radius:20px; padding:20px 22px; border:1px solid #f1f5f9; border-left:4px solid #ef4444;">
        <div style="font-size:0.85rem; color:#64748b; font-weight:500;">⚠️ Tunggak</div>
        <div style="font-size:2rem; font-weight:700; margin-top:4px; color:#ef4444;">{{ $tunggak ?? 0 }}</div>
    </div>
</div>

<!-- ===== STATISTIK PENDAPATAN ===== -->
<div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:20px; margin-bottom:32px;">
    <div style="background:white; border-radius:20px; padding:20px 22px; border:1px solid #f1f5f9; border-left:4px solid #b45309;">
        <div style="font-size:0.85rem; color:#64748b; font-weight:500;">💰 Pendapatan Bulan Ini</div>
        <div style="font-size:2rem; font-weight:700; margin-top:4px; color:#b45309;">Rp {{ number_format($pendapatanBulan ?? 0, 0, ',', '.') }}</div>
    </div>
    <div style="background:white; border-radius:20px; padding:20px 22px; border:1px solid #f1f5f9; border-left:4px solid #8b5cf6;">
        <div style="font-size:0.85rem; color:#64748b; font-weight:500;">📆 Pendapatan Tahunan</div>
        <div style="font-size:2rem; font-weight:700; margin-top:4px; color:#8b5cf6;">Rp {{ number_format($pendapatanTahunan ?? 0, 0, ',', '.') }}</div>
    </div>
</div>

<!-- ===== GRAFIK ===== -->
<div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(320px,1fr)); gap:24px; margin-bottom:32px;">
    <div style="background:white; border-radius:20px; padding:24px 20px; border:1px solid #f1f5f9;">
        <h4 style="font-size:1rem; font-weight:600; margin-bottom:12px; color:#334155;">
            <i class="fas fa-door-open" style="color:#b45309; margin-right:6px;"></i> Status Kamar
        </h4>
        <canvas id="chartKamar"></canvas>
    </div>
    <div style="background:white; border-radius:20px; padding:24px 20px; border:1px solid #f1f5f9;">
        <h4 style="font-size:1rem; font-weight:600; margin-bottom:12px; color:#334155;">
            <i class="fas fa-credit-card" style="color:#b45309; margin-right:6px;"></i> Status Pembayaran
        </h4>
        <canvas id="chartPembayaran"></canvas>
    </div>
</div>

<!-- ===== TABEL KAMAR TERBARU ===== -->
<div style="background:white; border-radius:20px; padding:20px 24px; border:1px solid #f1f5f9; margin-bottom:28px;">
    <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; margin-bottom:16px;">
        <h3 style="font-size:1.2rem; font-weight:600;"><i class="fas fa-door-open" style="color:#b45309;"></i> Daftar Kamar</h3>
        <a href="{{ route('admin.kamar.index') }}" class="btn-primary" style="padding:6px 16px; font-size:0.85rem;">
            Lihat Semua <i class="fas fa-arrow-right"></i>
        </a>
    </div>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kamars ?? [] as $kamar)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><strong>{{ $kamar->nama }}</strong></td>
                <td>Rp {{ number_format($kamar->harga, 0, ',', '.') }}</td>
                <td>
                    @if($kamar->status == 'Tersedia')
                        <span class="badge badge-success"><i class="fas fa-check-circle"></i> Tersedia</span>
                    @elseif($kamar->status == 'Penuh')
                        <span class="badge badge-danger"><i class="fas fa-times-circle"></i> Penuh</span>
                    @else
                        <span class="badge badge-warning"><i class="fas fa-tools"></i> Maintenance</span>
                    @endif
                </td>
            </tr>
            @empty
            <tr><td colspan="4" style="text-align:center; color:#94a3b8; padding:20px;">Belum ada data kamar</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection

@section('scripts')
<script>
    // ===== CHART STATUS KAMAR =====
    const ctx1 = document.getElementById('chartKamar').getContext('2d');
    new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: ['Tersedia', 'Penuh', 'Maintenance'],
            datasets: [{
                label: 'Jumlah Kamar',
                data: [{{ $tersedia ?? 0 }}, {{ $terisi ?? 0 }}, {{ $maintenance ?? 0 }}],
                backgroundColor: ['#22c55e', '#ef4444', '#f59e0b'],
                borderColor: ['#16a34a', '#dc2626', '#d97706'],
                borderWidth: 2,
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 1 }
                }
            }
        }
    });

    // ===== CHART PEMBAYARAN =====
    const ctx2 = document.getElementById('chartPembayaran').getContext('2d');
    new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ['Lunas', 'Belum Bayar', 'Tunggak'],
            datasets: [{
                label: 'Jumlah Tagihan',
                data: [{{ $lunas ?? 0 }}, {{ $belum ?? 0 }}, {{ $tunggak ?? 0 }}],
                backgroundColor: ['#22c55e', '#f59e0b', '#ef4444'],
                borderColor: ['#16a34a', '#d97706', '#dc2626'],
                borderWidth: 2,
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 1 }
                }
            }
        }
    });
</script>
@endsection