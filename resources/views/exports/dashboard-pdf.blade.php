<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Kos XYZ</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; padding: 20px; }
        .header { text-align: center; border-bottom: 3px solid #b45309; padding-bottom: 15px; margin-bottom: 20px; }
        .header h1 { color: #b45309; margin: 0; }
        .header p { color: #64748b; margin: 5px 0; }
        .section-title { background: #fef3c7; padding: 8px 12px; margin: 20px 0 10px; font-weight: bold; color: #92400e; }
        table { width: 100%; border-collapse: collapse; margin: 10px 0; }
        table th { background: #0f172a; color: white; padding: 8px 10px; text-align: left; font-size: 11px; }
        table td { padding: 6px 10px; border-bottom: 1px solid #f1f5f9; font-size: 11px; }
        table tr:nth-child(even) { background: #f8fafc; }
        .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px; margin: 15px 0; }
        .stat-box { background: #f8fafc; padding: 12px; border-radius: 8px; text-align: center; border: 1px solid #f1f5f9; }
        .stat-box .number { font-size: 20px; font-weight: bold; }
        .stat-box .label { font-size: 11px; color: #64748b; }
        .stat-box .number.green { color: #22c55e; }
        .stat-box .number.red { color: #ef4444; }
        .stat-box .number.yellow { color: #f59e0b; }
        .stat-box .number.orange { color: #b45309; }
        .badge { display: inline-block; padding: 2px 10px; border-radius: 20px; font-size: 10px; font-weight: bold; }
        .badge-success { background: #dcfce7; color: #15803d; }
        .badge-danger { background: #fee2e2; color: #b91c1c; }
        .badge-warning { background: #fef9c3; color: #a16207; }
        .footer { text-align: center; margin-top: 30px; padding-top: 15px; border-top: 1px solid #f1f5f9; color: #94a3b8; font-size: 10px; }
        .payment-box { padding: 10px; border-radius: 8px; text-align: center; display: inline-block; width: 30%; margin: 5px; }
        .payment-box.green { background: #dcfce7; color: #15803d; }
        .payment-box.yellow { background: #fef9c3; color: #a16207; }
        .payment-box.red { background: #fee2e2; color: #b91c1c; }
        .payment-box .number { font-size: 18px; font-weight: bold; }
        .revenue-box { background: #fff7ed; padding: 12px 16px; border-radius: 8px; margin: 10px 0; display: flex; justify-content: space-between; }
        .revenue-box .amount { font-size: 18px; color: #b45309; }
        .revenue-box .amount.purple { color: #8b5cf6; }
    </style>
</head>
<body>

    <!-- HEADER -->
    <div class="header">
        <h1>🏠 Kos XYZ · Yogyakarta</h1>
        <p>Laporan Dashboard - {{ $bulanIni ?? 'Agustus' }} {{ $tahunIni ?? '2026' }}</p>
        <p style="font-size:10px; color:#94a3b8;">Dicetak: {{ \Carbon\Carbon::now()->format('d/m/Y H:i:s') }}</p>
    </div>

    <!-- STATISTIK KAMAR -->
    <div class="stats-grid">
        <div class="stat-box">
            <div class="number">{{ $totalKamar ?? 0 }}</div>
            <div class="label">Total Kamar</div>
        </div>
        <div class="stat-box">
            <div class="number green">{{ $tersedia ?? 0 }}</div>
            <div class="label">Tersedia</div>
        </div>
        <div class="stat-box">
            <div class="number red">{{ $terisi ?? 0 }}</div>
            <div class="label">Penuh</div>
        </div>
        <div class="stat-box">
            <div class="number yellow">{{ $maintenance ?? 0 }}</div>
            <div class="label">Maintenance</div>
        </div>
    </div>

    <!-- PEMBAYARAN -->
    <div style="text-align:center; margin:15px 0;">
        <div class="payment-box green">
            <div class="number">{{ $lunas ?? 0 }}</div>
            <div>✅ Lunas</div>
        </div>
        <div class="payment-box yellow">
            <div class="number">{{ $belum ?? 0 }}</div>
            <div>⏳ Belum Bayar</div>
        </div>
        <div class="payment-box red">
            <div class="number">{{ $tunggak ?? 0 }}</div>
            <div>⚠️ Tunggak</div>
        </div>
    </div>

    <!-- PENDAPATAN -->
    <div class="revenue-box">
        <div>
            <strong>💰 Pendapatan Bulan Ini</strong>
            <div class="amount">Rp {{ number_format($pendapatanBulan ?? 0, 0, ',', '.') }}</div>
        </div>
        <div style="text-align:right;">
            <strong>📆 Pendapatan Tahunan</strong>
            <div class="amount purple">Rp {{ number_format($pendapatanTahunan ?? 0, 0, ',', '.') }}</div>
        </div>
    </div>

    <!-- DAFTAR KAMAR -->
    <div class="section-title">📋 Daftar Kamar</div>
    <table>
        <thead>
            <tr><th>No</th><th>Nama</th><th>Harga</th><th>Fasilitas</th><th>Status</th></tr>
        </thead>
        <tbody>
            @forelse(($kamars ?? []) as $k)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><strong>{{ $k->nama }}</strong></td>
                <td>Rp {{ number_format($k->harga, 0, ',', '.') }}</td>
                <td>{{ $k->fasilitas ?? '-' }}</td>
                <td>
                    @if($k->status == 'Tersedia')
                        <span class="badge badge-success">Tersedia</span>
                    @elseif($k->status == 'Penuh')
                        <span class="badge badge-danger">Penuh</span>
                    @else
                        <span class="badge badge-warning">Maintenance</span>
                    @endif
                </td>
            </tr>
            @empty
            <tr><td colspan="5" style="text-align:center; color:#94a3b8;">Belum ada data</td></tr>
            @endforelse
        </tbody>
    </table>

    <!-- DAFTAR PENYEWA -->
    <div class="section-title">👥 Daftar Penyewa</div>
    <table>
        <thead>
            <tr><th>No</th><th>Nama</th><th>KTP</th><th>HP</th><th>Kamar</th><th>Status</th></tr>
        </thead>
        <tbody>
            @forelse(($penyewas ?? []) as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><strong>{{ $p->nama_lengkap }}</strong></td>
                <td>{{ $p->ktp }}</td>
                <td>{{ $p->no_hp }}</td>
                <td>{{ $p->kamar_nama ?? '-' }}</td>
                <td>{{ $p->status }}</td>
            </tr>
            @empty
            <tr><td colspan="6" style="text-align:center; color:#94a3b8;">Belum ada penyewa</td></tr>
            @endforelse
        </tbody>
    </table>

    <!-- FOOTER -->
    <div class="footer">
        <p>Kos XYZ · Jl. Kaliurang KM 5, Sleman, Yogyakarta</p>
        <p>Sistem Informasi Manajemen Kos &copy; {{ date('Y') }}</p>
    </div>

</body>
</html>