<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kos XYZ · Yogyakarta</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <style>
        * { margin:0; padding:0; box-sizing:border-box; font-family:'Inter',sans-serif; }
        body { background:#f8fafc; color:#0f172a; }
        .container { max-width:1200px; margin:0 auto; padding:0 20px; }

        .navbar { background:white; padding:16px 0; box-shadow:0 2px 12px rgba(0,0,0,0.04); position:sticky; top:0; z-index:30; }
        .navbar .container { display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; }
        .brand { display:flex; align-items:center; gap:8px; font-weight:700; font-size:1.7rem; color:#0f172a; }
        .brand i { color:#b45309; }
        .brand span { background:#fef3c7; padding:2px 14px; border-radius:40px; font-size:0.8rem; color:#92400e; }
        .nav-links { display:flex; gap:28px; align-items:center; flex-wrap:wrap; }
        .nav-links a { text-decoration:none; color:#334155; font-weight:500; }
        .nav-links a:hover { color:#b45309; }
        .btn-wa { background:#25D366; color:white !important; padding:8px 22px; border-radius:40px; font-weight:600; display:inline-flex; align-items:center; gap:8px; }
        .btn-wa:hover { background:#1ebe57; }

        .hero { background:linear-gradient(135deg, #fef9f0, #fef0db); border-radius:32px; margin:28px 0 36px; padding:44px 36px; display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; }
        .hero-text { flex:1 1 260px; }
        .hero-text h1 { font-size:2.7rem; font-weight:800; line-height:1.2; }
        .hero-text h1 i { color:#b45309; }
        .hero-text .sub { font-size:1.1rem; margin-top:10px; color:#475569; display:flex; align-items:center; gap:8px; flex-wrap:wrap; }
        .hero-text .sub i { color:#b45309; width:22px; }
        .hero-text .address { margin-top:10px; background:white; padding:8px 20px; border-radius:60px; display:inline-block; font-weight:500; }
        .hero-map { flex:1 1 280px; min-height:180px; background:#e2e8f0; border-radius:20px; overflow:hidden; }
        .hero-map iframe { width:100%; height:100%; min-height:180px; border:0; }

        .section-title { font-size:2rem; font-weight:700; margin:48px 0 18px; display:flex; align-items:center; gap:12px; }
        .section-title i { color:#b45309; }
        .section-title small { font-size:0.9rem; font-weight:400; color:#64748b; }

        .kamar-grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(270px,1fr)); gap:28px; margin:16px 0 12px; }
        .kamar-card { background:white; border-radius:24px; padding:20px 18px 22px; border:1px solid #f1f5f9; transition:0.2s; }
        .kamar-card:hover { border-color:#fed7aa; box-shadow:0 8px 24px rgba(180,83,9,0.06); }
        .kamar-card .gambar { background:#eef2f6; height:120px; border-radius:16px; display:flex; align-items:center; justify-content:center; color:#94a3b8; font-size:2.8rem; margin-bottom:14px; }
        .kamar-card .nama-kamar { font-weight:700; font-size:1.4rem; }
        .kamar-card .harga { font-weight:700; color:#b45309; font-size:1.25rem; background:#fef3c7; padding:0 12px; border-radius:40px; display:inline-block; }
        .kamar-card .deskripsi { font-size:0.92rem; color:#334155; margin:10px 0 8px; line-height:1.4; }
        .kamar-card .fasilitas { font-size:0.85rem; color:#475569; margin:8px 0 10px; display:flex; flex-wrap:wrap; gap:12px; }
        .kamar-card .fasilitas i { width:18px; color:#b45309; }
        .badge { display:inline-block; padding:4px 16px; border-radius:40px; font-size:0.8rem; font-weight:600; }
        .badge-success { background:#dcfce7; color:#15803d; }
        .badge-danger { background:#fee2e2; color:#b91c1c; }
        .badge-warning { background:#fef9c3; color:#a16207; }

        .fasilitas-umum { display:flex; flex-wrap:wrap; gap:20px 32px; background:white; padding:24px 28px; border-radius:28px; margin:12px 0 20px; border:1px solid #f1f5f9; }
        .fasilitas-umum .item { display:flex; align-items:center; gap:12px; font-weight:500; }
        .fasilitas-umum .item i { font-size:1.6rem; width:32px; color:#b45309; }

        .sejarah { background:white; border-radius:28px; padding:28px 32px; margin:20px 0 30px; border:1px solid #f1f5f9; }
        .sejarah h3 { font-size:1.6rem; display:flex; align-items:center; gap:12px; margin-bottom:12px; }
        .sejarah h3 i { color:#b45309; }
        .sejarah p { color:#1e293b; font-size:1.02rem; line-height:1.7; max-width:800px; }
        .sejarah .highlight { background:#fef3c7; padding:2px 10px; border-radius:40px; font-weight:500; }

        .cta-section { background:#0f172a; border-radius:32px; padding:36px 40px; margin:40px 0 20px; color:white; display:flex; flex-wrap:wrap; justify-content:space-between; align-items:center; }
        .cta-section h3 { font-size:1.8rem; font-weight:600; }
        .cta-section p { color:#cbd5e1; margin-top:4px; }
        .cta-section .btn-wa-large { background:#25D366; padding:14px 36px; border-radius:60px; font-weight:700; color:white; text-decoration:none; display:inline-flex; align-items:center; gap:12px; font-size:1.2rem; box-shadow:0 8px 18px rgba(37,211,102,0.3); transition:0.2s; }
        .cta-section .btn-wa-large:hover { background:#1ebe57; transform:scale(1.02); }

        footer { text-align:center; padding:36px 0 24px; color:#94a3b8; border-top:1px solid #e9edf2; margin-top:30px; }
        footer i { color:#b45309; }

        @media (max-width:700px) { .navbar .container { flex-direction:column; gap:12px; } .nav-links { justify-content:center; gap:16px; } .hero { padding:28px 18px; flex-direction:column; } .hero-text h1 { font-size:2.2rem; } .section-title { font-size:1.6rem; } .cta-section { flex-direction:column; gap:20px; text-align:center; } }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="container">
            <div class="brand">
                <i class="fas fa-home"></i> Kos XYZ
                <span>Yogyakarta</span>
            </div>
            <div class="nav-links">
                <a href="#kamar">Kamar</a>
                <a href="#fasilitas">Fasilitas</a>
                <a href="#sejarah">Sejarah</a>
                <a href="https://wa.me/628123456789" class="btn-wa"><i class="fab fa-whatsapp"></i> Chat Admin</a>
            </div>
        </div>
    </nav>

    <div class="container">

        <!-- HERO -->
        <section class="hero">
            <div class="hero-text">
                <h1><i class="fas fa-map-pin"></i> Kos XYZ <br />Yogyakarta</h1>
                <div class="sub">
                    <i class="fas fa-map-marker-alt"></i> Jl. Kaliurang KM 5, Sleman, Yogyakarta
                </div>
                <div class="address">
                    <i class="fas fa-tag"></i> Harga kamar Rp 1.000.000 / bulan
                </div>
                <div style="margin-top:18px; display:flex; gap:12px; flex-wrap:wrap;">
                    <span style="background:#e2e8f0; padding:4px 16px; border-radius:40px;">☀️ AC</span>
                    <span style="background:#e2e8f0; padding:4px 16px; border-radius:40px;">🛏️ Tempat tidur</span>
                    <span style="background:#e2e8f0; padding:4px 16px; border-radius:40px;">📶 WiFi 100Mbps</span>
                </div>
            </div>
            <div class="hero-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63234.69101507878!2d110.35147820567435!3d-7.747417226056027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5787a34c416b%3A0x7a895d957daef76a!2sYogyakarta!5e0!3m2!1sid!2sid!4v1712987654321" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </section>

        <!-- KAMAR -->
        <h2 class="section-title" id="kamar"><i class="fas fa-door-open"></i> Kamar & Harga <small>· semua Rp 1.000.000</small></h2>
        <div class="kamar-grid">
            @forelse($kamars as $kamar)
            <div class="kamar-card">
                <div class="gambar"><i class="fas fa-bed"></i></div>
                <div class="nama-kamar">{{ $kamar->nama }}</div>
                <div>
                    <span class="harga">Rp {{ number_format($kamar->harga, 0, ',', '.') }}</span>
                    <span class="badge {{ $kamar->status == 'Tersedia' ? 'badge-success' : ($kamar->status == 'Penuh' ? 'badge-danger' : 'badge-warning') }}">
                        <i class="fas fa-{{ $kamar->status == 'Tersedia' ? 'check-circle' : ($kamar->status == 'Penuh' ? 'times-circle' : 'hammer') }}"></i> {{ $kamar->status }}
                    </span>
                </div>
                <div class="deskripsi">
                    <i class="fas fa-quote-left" style="color:#b45309; margin-right:4px;"></i> {{ $kamar->deskripsi ?? 'Kamar nyaman dengan fasilitas lengkap' }}
                </div>
                <div class="fasilitas">
                    @foreach(explode(',', $kamar->fasilitas ?? '') as $fas)
                    <span><i class="fas fa-check-circle"></i> {{ trim($fas) }}</span>
                    @endforeach
                </div>
            </div>
            @empty
            <p style="color:#94a3b8; padding:40px; text-align:center;">Belum ada data kamar</p>
            @endforelse
        </div>

        <!-- FASILITAS UMUM -->
        <h2 class="section-title" id="fasilitas"><i class="fas fa-concierge-bell"></i> Fasilitas Umum</h2>
        <div class="fasilitas-umum">
            <div class="item"><i class="fas fa-utensils"></i> Dapur bersama</div>
            <div class="item"><i class="fas fa-wifi"></i> WiFi 100 Mbps</div>
            <div class="item"><i class="fas fa-parking"></i> Parkir luas</div>
            <div class="item"><i class="fas fa-video"></i> CCTV 24 jam</div>
            <div class="item"><i class="fas fa-tint"></i> Ruang cuci</div>
            <div class="item"><i class="fas fa-shield-alt"></i> Keamanan 24 jam</div>
        </div>

        <!-- SEJARAH -->
        <div class="sejarah" id="sejarah">
            <h3><i class="fas fa-landmark"></i> Sejarah Asrama Kos XYZ</h3>
            <p>
                <span class="highlight">Kos XYZ</span> berdiri sejak tahun 1998 sebagai salah satu asrama mahasiswa pertama di kawasan Kaliurang. 
                Awalnya hanya berupa rumah tinggal dengan 5 kamar, kemudian berkembang menjadi 2 lantai dengan total 15 kamar pada tahun 2005. 
                Pada tahun 2015, dilakukan renovasi besar-besaran dengan menambahkan fasilitas AC, WiFi, dan kamar mandi dalam di setiap kamar. 
                Hingga kini, <strong>Kos XYZ</strong> dikenal sebagai tempat tinggal yang nyaman, aman, dan dekat dengan kampus serta pusat kuliner Yogyakarta. 
                Banyak alumni yang kini sukses dan masih menjalin silaturahmi dengan pengelola.
            </p>
            <p style="margin-top:12px;">
                <i class="fas fa-quote-left" style="color:#b45309; margin-right:6px;"></i> 
                <em>"Lebih dari sekadar kos, kami membangun komunitas dan keluarga."</em>
            </p>
        </div>

        <!-- CTA -->
        <div class="cta-section" id="kontak">
            <div>
                <h3><i class="fas fa-phone-alt" style="margin-right:12px;"></i>Hubungi Kami</h3>
                <p>Butuh info ketersediaan, mau booking, atau sekedar tanya? Chat langsung via WhatsApp.</p>
            </div>
            <a href="https://wa.me/628123456789" class="btn-wa-large"><i class="fab fa-whatsapp"></i> Chat Admin</a>
        </div>

    </div>

    <!-- FOOTER -->
    <footer>
        <p><i class="fas fa-home"></i> Kos XYZ · Yogyakarta &nbsp;|&nbsp; <i class="far fa-clock"></i> Ketersediaan diperbarui otomatis</p>
        <p style="margin-top:6px; font-size:0.9rem;">&copy; 2026 · Sistem Informasi Manajemen Kos</p>
    </footer>

</body>
</html>