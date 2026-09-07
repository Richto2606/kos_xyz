<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detail {{ $kamar->nama }} · Kos XYZ</title>
    <meta name="description" content="Detail kamar {{ $kamar->nama }} di Kos XYZ Yogyakarta. Harga Rp {{ number_format($kamar->harga, 0, ',', '.') }}/bulan. Fasilitas: {{ $kamar->fasilitas }}." />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    
    <style>
        * { margin:0; padding:0; box-sizing:border-box; font-family:'Inter',sans-serif; }
        body { background:#f8fafc; color:#0f172a; }

        .container { max-width:1200px; margin:0 auto; padding:0 20px; }

        /* ===== NAVBAR ===== */
        .navbar {
            background: white;
            padding: 16px 0;
            box-shadow: 0 2px 12px rgba(0,0,0,0.04);
            position: sticky;
            top: 0;
            z-index: 30;
            border-bottom: 1px solid #f1f5f9;
        }
        .navbar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }
        .brand {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 700;
            font-size: 1.7rem;
            color: #0f172a;
            text-decoration: none;
        }
        .brand i { color: #b45309; }
        .brand span {
            background: #fef3c7;
            padding: 2px 14px;
            border-radius: 40px;
            font-size: 0.8rem;
            color: #92400e;
        }
        .nav-links {
            display: flex;
            gap: 28px;
            align-items: center;
            flex-wrap: wrap;
        }
        .nav-links a {
            text-decoration: none;
            color: #334155;
            font-weight: 500;
            transition: color 0.2s;
        }
        .nav-links a:hover { color: #b45309; }
        .btn-wa {
            background: #25D366;
            color: white !important;
            padding: 8px 22px;
            border-radius: 40px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .btn-wa:hover { background: #1ebe57; }

        /* ===== BREADCRUMB ===== */
        .breadcrumb {
            padding: 20px 0 10px;
            font-size: 0.9rem;
            color: #94a3b8;
        }
        .breadcrumb a {
            color: #b45309;
            text-decoration: none;
        }
        .breadcrumb a:hover { text-decoration: underline; }
        .breadcrumb span { margin: 0 6px; }

        /* ===== DETAIL KAMAR ===== */
        .detail-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin: 20px 0 40px;
        }

        /* Gambar */
        .detail-image {
            border-radius: 20px;
            overflow: hidden;
            background: #f1f5f9;
            position: relative;
            height: 450px;
        }
        .detail-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .detail-image .status-badge {
            position: absolute;
            top: 16px;
            right: 16px;
            padding: 6px 18px;
            border-radius: 40px;
            font-weight: 700;
            font-size: 0.85rem;
            background: rgba(0,0,0,0.7);
            color: white;
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255,255,255,0.2);
        }
        .detail-image .status-badge.tersedia { background: rgba(34, 197, 94, 0.9); color: white; }
        .detail-image .status-badge.penuh { background: rgba(239, 68, 68, 0.9); color: white; }
        .detail-image .status-badge.maintenance { background: rgba(245, 158, 11, 0.9); color: white; }
        .detail-image .status-badge i { margin-right: 6px; }

        /* Informasi Kamar */
        .detail-info { padding: 10px 0; }
        .detail-info .nama-kamar {
            font-size: 2.2rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 4px;
        }
        .detail-info .alamat {
            color: #64748b;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 16px;
        }
        .detail-info .alamat i { color: #b45309; }

        .detail-info .harga-box {
            background: #fef3c7;
            padding: 16px 24px;
            border-radius: 16px;
            display: inline-block;
            margin-bottom: 20px;
        }
        .detail-info .harga-box .harga {
            font-size: 2rem;
            font-weight: 800;
            color: #b45309;
        }
        .detail-info .harga-box .per-bulan {
            font-size: 0.9rem;
            color: #92400e;
            font-weight: 500;
        }

        .detail-info .deskripsi {
            color: #475569;
            line-height: 1.7;
            margin-bottom: 24px;
            font-size: 1.05rem;
        }

        /* Fasilitas */
        .fasilitas-detail {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 24px;
            padding: 16px 0;
            border-top: 1px solid #f1f5f9;
            border-bottom: 1px solid #f1f5f9;
        }
        .fasilitas-detail .tag {
            background: #f8fafc;
            padding: 6px 16px;
            border-radius: 40px;
            font-size: 0.85rem;
            color: #334155;
            border: 1px solid #f1f5f9;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .fasilitas-detail .tag i { color: #b45309; }

        /* Info Grid */
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 24px;
        }
        .info-grid .item {
            background: #f8fafc;
            padding: 12px 16px;
            border-radius: 12px;
        }
        .info-grid .item .label {
            font-size: 0.7rem;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .info-grid .item .value {
            font-weight: 600;
            color: #0f172a;
            margin-top: 2px;
        }

        /* Tombol Aksi */
        .action-buttons {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 8px;
        }
        .btn-booking {
            background: #25D366;
            color: white;
            padding: 14px 32px;
            border-radius: 60px;
            font-weight: 700;
            font-size: 1.05rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 16px rgba(37, 211, 102, 0.3);
        }
        .btn-booking:hover {
            background: #1ebe57;
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(37, 211, 102, 0.4);
        }
        .btn-back {
            background: #f1f5f9;
            color: #475569;
            padding: 14px 28px;
            border-radius: 60px;
            font-weight: 600;
            font-size: 1rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
        }
        .btn-back:hover {
            background: #e2e8f0;
            transform: translateY(-2px);
        }

        /* ===== KAMAR LAINNYA ===== */
        .rekomendasi-section {
            margin: 50px 0 30px;
        }
        .rekomendasi-section h2 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .rekomendasi-section h2 i { color: #b45309; }

        .kamar-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 24px;
        }
        .kamar-card-mini {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid #f1f5f9;
            transition: all 0.3s ease;
            text-decoration: none;
            color: #0f172a;
        }
        .kamar-card-mini:hover {
            transform: translateY(-4px);
            border-color: #fed7aa;
            box-shadow: 0 8px 24px rgba(180,83,9,0.06);
        }
        .kamar-card-mini .img {
            height: 150px;
            background: #f1f5f9;
            overflow: hidden;
        }
        .kamar-card-mini .img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .kamar-card-mini .body {
            padding: 14px 16px 16px;
        }
        .kamar-card-mini .body .nama {
            font-weight: 700;
            font-size: 1.05rem;
        }
        .kamar-card-mini .body .harga {
            color: #b45309;
            font-weight: 700;
            font-size: 0.95rem;
        }
        .kamar-card-mini .body .badge-mini {
            display: inline-block;
            padding: 2px 12px;
            border-radius: 40px;
            font-size: 0.7rem;
            font-weight: 600;
        }
        .badge-mini.success { background: #dcfce7; color: #15803d; }
        .badge-mini.danger { background: #fee2e2; color: #b91c1c; }
        .badge-mini.warning { background: #fef9c3; color: #a16207; }

        /* ===== FOOTER ===== */
        footer {
            text-align: center;
            padding: 36px 0 24px;
            color: #94a3b8;
            border-top: 1px solid #f1f5f9;
            margin-top: 30px;
        }
        footer i { color: #b45309; }
        footer .admin-link {
            color: #b45309;
            text-decoration: none;
        }
        footer .admin-link:hover { text-decoration: underline; }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 900px) {
            .detail-grid {
                grid-template-columns: 1fr;
                gap: 24px;
            }
            .detail-image {
                height: 300px;
            }
        }
        @media (max-width: 600px) {
            .navbar .container { flex-direction: column; gap: 12px; }
            .nav-links { justify-content: center; gap: 16px; }
            .detail-info .nama-kamar { font-size: 1.6rem; }
            .detail-info .harga-box .harga { font-size: 1.6rem; }
            .info-grid { grid-template-columns: 1fr; }
            .action-buttons { flex-direction: column; }
            .action-buttons .btn-booking,
            .action-buttons .btn-back { justify-content: center; }
            .kamar-grid { grid-template-columns: 1fr 1fr; }
        }
        @media (max-width: 400px) {
            .kamar-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    <!-- ===== NAVBAR ===== -->
    <nav class="navbar">
        <div class="container">
            <a href="{{ route('home') }}" class="brand">
                <i class="fas fa-home"></i> Kos XYZ
                <span>Yogyakarta</span>
            </a>
            <div class="nav-links">
                <a href="{{ route('home') }}#kamar">Kamar</a>
                <a href="{{ route('home') }}#fasilitas">Fasilitas</a>
                <a href="{{ route('home') }}#sejarah">Sejarah</a>
                <a href="https://wa.me/628123456789" class="btn-wa"><i class="fab fa-whatsapp"></i> Chat Admin</a>
            </div>
        </div>
    </nav>

    <div class="container">

        <!-- ===== BREADCRUMB ===== -->
        <div class="breadcrumb">
            <a href="{{ route('home') }}"><i class="fas fa-home"></i> Beranda</a>
            <span>/</span>
            <a href="{{ route('home') }}#kamar">Kamar</a>
            <span>/</span>
            <span>{{ $kamar->nama }}</span>
        </div>

        <!-- ===== DETAIL KAMAR ===== -->
        <div class="detail-grid">
            <!-- GAMBAR -->
            <div class="detail-image">
                @if($kamar->gambar && file_exists(storage_path('app/public/kamar/' . $kamar->gambar)))
                    <img src="{{ asset('storage/kamar/' . $kamar->gambar) }}" alt="{{ $kamar->nama }}">
                @else
                    <img src="{{ asset('images/kamar-default.jpg') }}" alt="{{ $kamar->nama }}">
                @endif
                <span class="status-badge {{ strtolower($kamar->status) }}">
                    <i class="fas fa-{{ $kamar->status == 'Tersedia' ? 'check-circle' : ($kamar->status == 'Penuh' ? 'times-circle' : 'hammer') }}"></i>
                    {{ $kamar->status }}
                </span>
            </div>

            <!-- INFORMASI -->
            <div class="detail-info">
                <h1 class="nama-kamar">{{ $kamar->nama }}</h1>
                <div class="alamat">
                    <i class="fas fa-map-marker-alt"></i> Jl. Kaliurang KM 5, Sleman, Yogyakarta
                </div>

                <div class="harga-box">
                    <span class="harga">Rp {{ number_format($kamar->harga, 0, ',', '.') }}</span>
                    <span class="per-bulan"> / bulan</span>
                </div>

                <p class="deskripsi">{{ $kamar->deskripsi ?? 'Kamar nyaman dengan fasilitas lengkap untuk mendukung aktivitas sehari-hari.' }}</p>

                <!-- Fasilitas -->
                <div class="fasilitas-detail">
                    @foreach(explode(',', $kamar->fasilitas ?? '') as $fas)
                        @if(trim($fas))
                        <span class="tag"><i class="fas fa-check-circle"></i> {{ trim($fas) }}</span>
                        @endif
                    @endforeach
                </div>

                <!-- Info Grid -->
                <div class="info-grid">
                    <div class="item">
                        <div class="label">Status</div>
                        <div class="value">{{ $kamar->status }}</div>
                    </div>
                    <div class="item">
                        <div class="label">Harga</div>
                        <div class="value">Rp {{ number_format($kamar->harga, 0, ',', '.') }}</div>
                    </div>
                    <div class="item">
                        <div class="label">Fasilitas</div>
                        <div class="value">{{ count(explode(',', $kamar->fasilitas ?? '')) }} fasilitas</div>
                    </div>
                    <div class="item">
                        <div class="label">Lokasi</div>
                        <div class="value">Kaliurang, Yogyakarta</div>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="action-buttons">
                    @if($kamar->status == 'Tersedia')
<a href="{{ route('booking.create', ['kamar_id' => $kamar->id]) }}" class="btn-booking">
                             <i class="fas fa-calendar-check"></i> Booking Sekarang
                         </a>
                    @else
<a href="{{ route('booking.create') }}" class="btn-booking" style="background:#f59e0b; box-shadow:0 4px 16px rgba(245,158,11,0.3);">
                             <i class="fas fa-calendar-check"></i> Pilih Kamar Lain
                         </a>
                    @endif
                    <a href="{{ route('home') }}#kamar" class="btn-back">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>

        <!-- ===== KAMAR LAINNYA ===== -->
        @if(isset($kamars) && $kamars->count() > 1)
        <div class="rekomendasi-section">
            <h2><i class="fas fa-thumbs-up"></i> Kamar Lainnya</h2>
            <div class="kamar-grid">
                @foreach($kamars->where('id', '!=', $kamar->id)->take(4) as $k)
                <a href="{{ route('public.kamar.detail', $k->id) }}" class="kamar-card-mini">
                    <div class="img">
                        @if($k->gambar && file_exists(storage_path('app/public/kamar/' . $k->gambar)))
                            <img src="{{ asset('storage/kamar/' . $k->gambar) }}" alt="{{ $k->nama }}">
                        @else
                            <img src="{{ asset('images/kamar-default.jpg') }}" alt="{{ $k->nama }}">
                        @endif
                    </div>
                    <div class="body">
                        <div style="display:flex; justify-content:space-between; align-items:center;">
                            <span class="nama">{{ $k->nama }}</span>
                            <span class="badge-mini {{ $k->status == 'Tersedia' ? 'success' : ($k->status == 'Penuh' ? 'danger' : 'warning') }}">
                                {{ $k->status }}
                            </span>
                        </div>
                        <div class="harga">Rp {{ number_format($k->harga, 0, ',', '.') }}</div>
                        <div style="font-size:0.8rem; color:#94a3b8; margin-top:4px;">
                            <i class="fas fa-tag"></i> {{ count(explode(',', $k->fasilitas ?? '')) }} fasilitas
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif

    </div>

    <!-- ===== FOOTER ===== -->
    <footer>
        <p>
            <i class="fas fa-home"></i> Kos XYZ · Yogyakarta &nbsp;|&nbsp;
            <i class="far fa-clock"></i> Ketersediaan diperbarui otomatis
        </p>
        <p style="margin-top:6px; font-size:0.9rem;">
            &copy; 2026 · Sistem Informasi Manajemen Kos &nbsp;|&nbsp;
            <a href="{{ route('admin.login') }}" class="admin-link">
                <i class="fas fa-lock"></i> Admin
            </a>
        </p>
    </footer>

</body>
</html>