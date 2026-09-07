<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $artikel->judul }} · Kos XYZ</title>
    <meta name="description" content="{{ $artikel->deskripsi_singkat ?? strip_tags(substr($artikel->isi, 0, 160)) }}" />
    
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

        /* ===== DETAIL ARTIKEL ===== */
        .artikel-detail {
            background: white;
            border-radius: 24px;
            padding: 40px;
            border: 1px solid #f1f5f9;
            margin-bottom: 40px;
        }
        .artikel-detail .kategori {
            display: inline-block;
            padding: 4px 16px;
            border-radius: 40px;
            font-size: 0.75rem;
            font-weight: 600;
            background: #fef3c7;
            color: #92400e;
            margin-bottom: 12px;
        }
        .artikel-detail h1 {
            font-size: 2.2rem;
            font-weight: 800;
            margin-bottom: 12px;
            color: #0f172a;
        }
        .artikel-detail .meta {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            color: #64748b;
            font-size: 0.9rem;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #f1f5f9;
        }
        .artikel-detail .gambar {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            border-radius: 16px;
            margin-bottom: 24px;
        }
        .artikel-detail .isi {
            font-size: 1.05rem;
            line-height: 1.8;
            color: #334155;
        }
        .artikel-detail .isi p {
            margin-bottom: 16px;
        }
        .artikel-detail .isi ul, .artikel-detail .isi ol {
            margin: 12px 0 16px 24px;
        }
        .artikel-detail .isi li {
            margin-bottom: 6px;
        }

        /* ===== ARTIKEL TERKAIT ===== */
        .terkait-section {
            margin: 30px 0 40px;
        }
        .terkait-section h3 {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .terkait-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 20px;
        }
        .terkait-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid #f1f5f9;
            transition: all 0.3s ease;
            text-decoration: none;
            color: #0f172a;
        }
        .terkait-card:hover {
            transform: translateY(-4px);
            border-color: #fed7aa;
            box-shadow: 0 8px 24px rgba(0,0,0,0.06);
        }
        .terkait-card .image {
            height: 140px;
            background: #f1f5f9;
            overflow: hidden;
        }
        .terkait-card .image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .terkait-card .content {
            padding: 14px 18px 18px;
        }
        .terkait-card .content .judul {
            font-weight: 600;
            font-size: 1rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .terkait-card .content .kategori-mini {
            font-size: 0.7rem;
            color: #b45309;
            font-weight: 600;
            display: block;
            margin-bottom: 4px;
        }

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

        @media (max-width: 600px) {
            .artikel-detail {
                padding: 20px;
            }
            .artikel-detail h1 {
                font-size: 1.6rem;
            }
            .terkait-grid {
                grid-template-columns: 1fr;
            }
            .navbar .container { flex-direction: column; gap: 12px; }
            .nav-links { justify-content: center; gap: 16px; }
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
                <a href="{{ route('public.blog') }}">Blog</a>
                <a href="https://wa.me/628123456789" class="btn-wa"><i class="fab fa-whatsapp"></i> Chat Admin</a>
            </div>
        </div>
    </nav>

    <div class="container">

        <!-- ===== BREADCRUMB ===== -->
        <div class="breadcrumb">
            <a href="{{ route('home') }}"><i class="fas fa-home"></i> Beranda</a>
            <span>/</span>
            <a href="{{ route('public.blog') }}">Blog</a>
            <span>/</span>
            <span>{{ $artikel->judul }}</span>
        </div>

        <!-- ===== DETAIL ARTIKEL ===== -->
        <div class="artikel-detail">
            <span class="kategori">{{ $artikel->kategori }}</span>
            <h1>{{ $artikel->judul }}</h1>
            <div class="meta">
                <span><i class="fas fa-user"></i> {{ $artikel->penulis }}</span>
                <span><i class="far fa-calendar-alt"></i> {{ $artikel->tanggal_publikasi->format('d M Y') }}</span>
                <span><i class="far fa-clock"></i> {{ $artikel->created_at->diffForHumans() }}</span>
            </div>

            <img src="{{ $artikel->gambar_url }}" alt="{{ $artikel->judul }}" class="gambar">

            <div class="isi">
                {!! $artikel->isi !!}
            </div>

            <a href="{{ route('public.blog') }}" style="display:inline-block; margin-top:20px; color:#b45309; text-decoration:none; font-weight:600;">
                <i class="fas fa-arrow-left"></i> Kembali ke Blog
            </a>
        </div>

        <!-- ===== ARTIKEL TERKAIT ===== -->
        @if($artikelTerbaru->count() > 0)
        <div class="terkait-section">
            <h3>📖 Artikel Lainnya</h3>
            <div class="terkait-grid">
                @foreach($artikelTerbaru as $artikelTerkait)
                <a href="{{ route('public.artikel.detail', $artikelTerkait->slug) }}" class="terkait-card">
                    <div class="image">
                        <img src="{{ $artikelTerkait->gambar_url }}" alt="{{ $artikelTerkait->judul }}">
                    </div>
                    <div class="content">
                        <span class="kategori-mini">{{ $artikelTerkait->kategori }}</span>
                        <div class="judul">{{ $artikelTerkait->judul }}</div>
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