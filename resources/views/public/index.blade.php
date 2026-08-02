<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- ===== META TAG UNTUK SEO (Update #7) ===== -->
    <title>Kos XYZ · Yogyakarta - Tempat Tinggal Nyaman & Strategis</title>
    <meta name="description" content="Kos XYZ Yogyakarta - Tempat tinggal nyaman, dekat kampus, dengan fasilitas lengkap. Kamar mulai Rp 1.000.000/bulan. Tersedia AC, WiFi, CCTV 24 jam." />
    <meta name="keywords" content="kos yogyakarta, kos murah, kos dekat kampus, tempat tinggal mahasiswa, kos kaliurang, kos sleman" />
    <meta name="robots" content="index, follow" />
    <meta property="og:title" content="Kos XYZ · Yogyakarta - Tempat Tinggal Nyaman" />
    <meta property="og:description" content="Kos nyaman dengan fasilitas lengkap di Yogyakarta. Harga mulai Rp 1.000.000/bulan." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ asset('images/logo-kos.png') }}" />
    <meta name="twitter:card" content="summary_large_image" />
    <!-- ===== END META TAG SEO ===== -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    
    <style>
        /* ===== CSS VARIABLES UNTUK DARK MODE (Update #8) ===== */
        :root {
            --bg-primary: #f8fafc;
            --bg-card: #ffffff;
            --bg-navbar: #ffffff;
            --bg-hero: linear-gradient(135deg, #fef9f0, #fef0db);
            --bg-footer: #ffffff;
            --text-primary: #0f172a;
            --text-secondary: #334155;
            --text-muted: #64748b;
            --border-color: #f1f5f9;
            --shadow-color: rgba(0,0,0,0.04);
            --shadow-hover: rgba(180,83,9,0.06);
            --transition-speed: 0.3s;
        }

        /* Dark Mode */
        [data-theme="dark"] {
            --bg-primary: #0f172a;
            --bg-card: #1e293b;
            --bg-navbar: #1e293b;
            --bg-hero: linear-gradient(135deg, #1a1a2e, #16213e);
            --bg-footer: #1e293b;
            --text-primary: #f8fafc;
            --text-secondary: #cbd5e1;
            --text-muted: #94a3b8;
            --border-color: #334155;
            --shadow-color: rgba(255,255,255,0.02);
            --shadow-hover: rgba(180,83,9,0.15);
        }

        * { margin:0; padding:0; box-sizing:border-box; font-family:'Inter',sans-serif; }
        body { 
            background: var(--bg-primary); 
            color: var(--text-primary);
            transition: background var(--transition-speed), color var(--transition-speed);
        }
        .container { max-width:1200px; margin:0 auto; padding:0 20px; }

        /* ===== NAVBAR ===== */
        .navbar { 
            background: var(--bg-navbar); 
            padding:16px 0; 
            box-shadow:0 2px 12px var(--shadow-color); 
            position:sticky; 
            top:0; 
            z-index:30;
            transition: background var(--transition-speed);
            border-bottom: 1px solid var(--border-color);
        }
        .navbar .container { display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; }
        .brand { display:flex; align-items:center; gap:8px; font-weight:700; font-size:1.7rem; color:var(--text-primary); }
        .brand i { color:#b45309; }
        .brand span { background:#fef3c7; padding:2px 14px; border-radius:40px; font-size:0.8rem; color:#92400e; }
        .nav-links { display:flex; gap:28px; align-items:center; flex-wrap:wrap; }
        .nav-links a { text-decoration:none; color:var(--text-secondary); font-weight:500; transition:color 0.2s; }
        .nav-links a:hover { color:#b45309; }
        .btn-wa { background:#25D366; color:white !important; padding:8px 22px; border-radius:40px; font-weight:600; display:inline-flex; align-items:center; gap:8px; }
        .btn-wa:hover { background:#1ebe57; color:white !important; }

        /* Dark Mode Toggle Button */
        .theme-toggle {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            color: var(--text-primary);
            padding: 8px 14px;
            border-radius: 40px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: all var(--transition-speed);
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .theme-toggle:hover {
            border-color: #b45309;
            background: var(--bg-primary);
        }

        /* ===== HERO ===== */
        .hero { 
            background: var(--bg-hero); 
            border-radius:32px; 
            margin:28px 0 36px; 
            padding:44px 36px; 
            display:flex; 
            flex-wrap:wrap; 
            align-items:center; 
            justify-content:space-between;
            transition: background var(--transition-speed);
            border: 1px solid var(--border-color);
        }
        .hero-text { flex:1 1 260px; }
        .hero-text h1 { font-size:2.7rem; font-weight:800; line-height:1.2; color:var(--text-primary); }
        .hero-text h1 i { color:#b45309; }
        .hero-text .sub { font-size:1.1rem; margin-top:10px; color:var(--text-secondary); display:flex; align-items:center; gap:8px; flex-wrap:wrap; }
        .hero-text .sub i { color:#b45309; width:22px; }
        .hero-text .address { margin-top:10px; background:var(--bg-card); padding:8px 20px; border-radius:60px; display:inline-block; font-weight:500; color:var(--text-primary); border:1px solid var(--border-color); }
        .hero-map { flex:1 1 280px; min-height:180px; background:#e2e8f0; border-radius:20px; overflow:hidden; }
        .hero-map iframe { width:100%; height:100%; min-height:180px; border:0; }

        /* ===== SECTION TITLE ===== */
        .section-title { font-size:2rem; font-weight:700; margin:48px 0 18px; display:flex; align-items:center; gap:12px; color:var(--text-primary); }
        .section-title i { color:#b45309; }
        .section-title small { font-size:0.9rem; font-weight:400; color:var(--text-muted); }

        /* ===== BREADCRUMB (Update #6) ===== */
        .breadcrumb {
            font-size:0.9rem;
            color:var(--text-muted);
            margin-bottom:16px;
            padding:8px 0;
        }
        .breadcrumb a {
            color:#b45309;
            text-decoration:none;
        }
        .breadcrumb a:hover {
            text-decoration:underline;
        }
        .breadcrumb span {
            margin:0 6px;
        }

        /* ===== SEARCH FORM (Update #5) ===== */
        .search-form {
            display:flex;
            gap:10px;
            max-width:400px;
            margin-bottom:24px;
        }
        .search-form input {
            flex:1;
            padding:10px 16px;
            border:1px solid var(--border-color);
            border-radius:12px;
            font-size:1rem;
            background:var(--bg-card);
            color:var(--text-primary);
            transition:border-color 0.2s;
        }
        .search-form input:focus {
            outline:none;
            border-color:#b45309;
            box-shadow:0 0 0 3px rgba(180,83,9,0.1);
        }
        .search-form input::placeholder {
            color:var(--text-muted);
        }

        /* ===== KAMAR GRID ===== */
        .kamar-grid { 
            display:grid; 
            grid-template-columns:repeat(auto-fill,minmax(270px,1fr)); 
            gap:28px; 
            margin:16px 0 12px; 
        }
        .kamar-card { 
            background:var(--bg-card); 
            border-radius:24px; 
            padding:20px 18px 22px; 
            border:1px solid var(--border-color); 
            transition: all var(--transition-speed);
            color:var(--text-primary);
        }
        .kamar-card:hover { 
            border-color:#fed7aa; 
            box-shadow:0 8px 24px var(--shadow-hover);
            transform:translateY(-4px);
        }
        
        .kamar-card .gambar { 
            background:var(--bg-primary); 
            height:120px; 
            border-radius:16px; 
            display:flex; 
            align-items:center; 
            justify-content:center; 
            color:#94a3b8; 
            font-size:2.8rem; 
            margin-bottom:14px;
            overflow:hidden;
            position:relative;
            border:1px solid var(--border-color);
        }
        .kamar-card .gambar img {
            width:100%;
            height:100%;
            object-fit:cover;
            transition:transform 0.3s ease;
        }
        .kamar-card .gambar img:hover {
            transform:scale(1.05);
        }

        /* ===== LOADING SKELETON (Update #3) ===== */
        .skeleton {
            background: var(--bg-primary);
            background: linear-gradient(90deg, var(--bg-primary) 25%, var(--border-color) 50%, var(--bg-primary) 75%);
            background-size: 200% 100%;
            animation: shimmer 1.5s infinite;
            border-radius:8px;
        }
        @keyframes shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }

        .kamar-card .nama-kamar { font-weight:700; font-size:1.4rem; }
        .kamar-card .harga { font-weight:700; color:#b45309; font-size:1.25rem; background:#fef3c7; padding:0 12px; border-radius:40px; display:inline-block; }
        .kamar-card .deskripsi { font-size:0.92rem; color:var(--text-secondary); margin:10px 0 8px; line-height:1.4; }
        .kamar-card .fasilitas { font-size:0.85rem; color:var(--text-secondary); margin:8px 0 10px; display:flex; flex-wrap:wrap; gap:12px; }
        .kamar-card .fasilitas i { width:18px; color:#b45309; }

        /* ===== BADGE ===== */
        .badge { display:inline-block; padding:4px 16px; border-radius:40px; font-size:0.8rem; font-weight:600; }
        .badge-success { background:#dcfce7; color:#15803d; }
        .badge-danger { background:#fee2e2; color:#b91c1c; }
        .badge-warning { background:#fef9c3; color:#a16207; }

        /* ===== TOMBOL DETAIL (Update #4) ===== */
        .btn-detail {
            display:inline-block;
            margin-top:12px;
            color:#b45309;
            font-weight:600;
            text-decoration:none;
            transition: all 0.2s;
            font-size:0.9rem;
        }
        .btn-detail:hover {
            color:#92400e;
            transform:translateX(4px);
        }

        /* ===== FASILITAS UMUM ===== */
        .fasilitas-umum { 
            display:flex; 
            flex-wrap:wrap; 
            gap:20px 32px; 
            background:var(--bg-card); 
            padding:24px 28px; 
            border-radius:28px; 
            margin:12px 0 20px; 
            border:1px solid var(--border-color);
            transition: background var(--transition-speed);
        }
        .fasilitas-umum .item { display:flex; align-items:center; gap:12px; font-weight:500; color:var(--text-primary); }
        .fasilitas-umum .item i { font-size:1.6rem; width:32px; color:#b45309; }

        /* ===== SEJARAH ===== */
        .sejarah { 
            background:var(--bg-card); 
            border-radius:28px; 
            padding:28px 32px; 
            margin:20px 0 30px; 
            border:1px solid var(--border-color);
            transition: background var(--transition-speed);
        }
        .sejarah h3 { font-size:1.6rem; display:flex; align-items:center; gap:12px; margin-bottom:12px; color:var(--text-primary); }
        .sejarah h3 i { color:#b45309; }
        .sejarah p { color:var(--text-secondary); font-size:1.02rem; line-height:1.7; max-width:800px; }
        .sejarah .highlight { background:#fef3c7; padding:2px 10px; border-radius:40px; font-weight:500; color:#92400e; }

        /* ===== CTA SECTION ===== */
        .cta-section { 
            background:#0f172a; 
            border-radius:32px; 
            padding:36px 40px; 
            margin:40px 0 20px; 
            color:white; 
            display:flex; 
            flex-wrap:wrap; 
            justify-content:space-between; 
            align-items:center; 
        }
        .cta-section h3 { font-size:1.8rem; font-weight:600; }
        .cta-section p { color:#cbd5e1; margin-top:4px; }
        .cta-section .btn-wa-large { 
            background:#25D366; 
            padding:14px 36px; 
            border-radius:60px; 
            font-weight:700; 
            color:white; 
            text-decoration:none; 
            display:inline-flex; 
            align-items:center; 
            gap:12px; 
            font-size:1.2rem; 
            box-shadow:0 8px 18px rgba(37,211,102,0.3); 
            transition:0.2s; 
        }
        .cta-section .btn-wa-large:hover { background:#1ebe57; transform:scale(1.02); }

        /* ===== FOOTER (Update #2) ===== */
        footer { 
            text-align:center; 
            padding:36px 0 24px; 
            color:var(--text-muted); 
            border-top:1px solid var(--border-color); 
            margin-top:30px;
            background:var(--bg-footer);
            transition: background var(--transition-speed);
        }
        footer i { color:#b45309; }
        footer .admin-link {
            color:#b45309;
            text-decoration:none;
            transition:color 0.2s;
        }
        footer .admin-link:hover {
            color:#92400e;
            text-decoration:underline;
        }

        /* ===== ANIMASI FADE IN (Update #1) ===== */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }
        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width:700px) { 
            .navbar .container { flex-direction:column; gap:12px; } 
            .nav-links { justify-content:center; gap:16px; } 
            .hero { padding:28px 18px; flex-direction:column; } 
            .hero-text h1 { font-size:2.2rem; } 
            .section-title { font-size:1.6rem; } 
            .cta-section { flex-direction:column; gap:20px; text-align:center; }
            .search-form { max-width:100%; }
        }
    </style>
</head>
<body>

    <!-- ===== NAVBAR ===== -->
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
                <!-- ===== DARK MODE TOGGLE (Update #8) ===== -->
                <button class="theme-toggle" onclick="toggleTheme()" id="themeToggle">
                    <i class="fas fa-moon"></i> <span id="themeLabel">Mode Gelap</span>
                </button>
            </div>
        </div>
    </nav>

    <div class="container">

        <!-- ===== HERO ===== -->
        <section class="hero fade-in">
            <div class="hero-text">
                <h1><i class="fas fa-map-pin"></i> Kos XYZ <br />Yogyakarta</h1>
                <div class="sub">
                    <i class="fas fa-map-marker-alt"></i> Jl. Kaliurang KM 5, Sleman, Yogyakarta
                </div>
                <div class="address">
                    <i class="fas fa-tag"></i> Harga kamar Rp 1.000.000 / bulan
                </div>
                <div style="margin-top:18px; display:flex; gap:12px; flex-wrap:wrap;">
                    <span style="background:var(--bg-card); padding:4px 16px; border-radius:40px; border:1px solid var(--border-color); color:var(--text-primary);">☀️ AC</span>
                    <span style="background:var(--bg-card); padding:4px 16px; border-radius:40px; border:1px solid var(--border-color); color:var(--text-primary);">🛏️ Tempat tidur</span>
                    <span style="background:var(--bg-card); padding:4px 16px; border-radius:40px; border:1px solid var(--border-color); color:var(--text-primary);">📶 WiFi 100Mbps</span>
                </div>
            </div>
            <div class="hero-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63234.69101507878!2d110.35147820567435!3d-7.747417226056027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5787a34c416b%3A0x7a895d957daef76a!2sYogyakarta!5e0!3m2!1sid!2sid!4v1712987654321" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </section>

        <!-- ===== KAMAR & HARGA ===== -->
        <div class="fade-in">
            <!-- ===== BREADCRUMB (Update #6) ===== -->
            <nav class="breadcrumb">
                <a href="{{ route('home') }}"><i class="fas fa-home"></i> Beranda</a>
                <span>/</span>
                <span>Kamar</span>
                @if(request('search'))
                    <span>/</span>
                    <span>Hasil pencarian: "{{ request('search') }}"</span>
                @endif
            </nav>

            <h2 class="section-title" id="kamar">
                <i class="fas fa-door-open"></i> Kamar & Harga 
                <small>· semua Rp 1.000.000</small>
            </h2>

            <!-- ===== SEARCH FORM (Update #5) ===== -->
            <form method="GET" action="{{ route('home') }}" class="search-form">
                <input type="text" name="search" placeholder="Cari kamar..." value="{{ request('search') }}" />
                <button type="submit" class="btn-wa" style="background:#b45309; border:none; padding:10px 20px; border-radius:12px; color:white; font-weight:600; cursor:pointer;">
                    <i class="fas fa-search"></i> Cari
                </button>
            </form>

            <div class="kamar-grid">
                @forelse($kamars as $kamar)
                <div class="kamar-card">
                    <!-- ===== GAMBAR KAMAR ===== -->
                    <div class="gambar">
                        @php
                            $gambarPath = storage_path('app/public/kamar/' . $kamar->gambar);
                            $gambarExists = $kamar->gambar && file_exists($gambarPath);
                        @endphp
                        @if($gambarExists)
                            <img src="{{ asset('storage/kamar/' . $kamar->gambar) }}" 
                                 alt="Foto {{ $kamar->nama }}" 
                                 loading="lazy">
                        @else
                            <i class="fas fa-bed"></i>
                        @endif
                    </div>

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
                    <!-- ===== TOMBOL DETAIL (Update #4) ===== -->
                    <a href="{{ route('public.kamar.detail', $kamar->id) }}" class="btn-detail">
                        Lihat Detail <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                @empty
                <p style="color:var(--text-muted); padding:40px; text-align:center; grid-column:1/-1;">
                    @if(request('search'))
                        Tidak ada kamar dengan nama "{{ request('search') }}"
                    @else
                        Belum ada data kamar
                    @endif
                </p>
                @endforelse
            </div>
        </div>

        <!-- ===== FASILITAS UMUM ===== -->
        <h2 class="section-title fade-in" id="fasilitas"><i class="fas fa-concierge-bell"></i> Fasilitas Umum</h2>
        <div class="fasilitas-umum fade-in">
            <div class="item"><i class="fas fa-utensils"></i> Dapur bersama</div>
            <div class="item"><i class="fas fa-wifi"></i> WiFi 100 Mbps</div>
            <div class="item"><i class="fas fa-parking"></i> Parkir luas</div>
            <div class="item"><i class="fas fa-video"></i> CCTV 24 jam</div>
            <div class="item"><i class="fas fa-tint"></i> Ruang cuci</div>
            <div class="item"><i class="fas fa-shield-alt"></i> Keamanan 24 jam</div>
        </div>

        <!-- ===== SEJARAH ===== -->
        <div class="sejarah fade-in" id="sejarah">
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

        <!-- ===== CTA ===== -->
        <div class="cta-section fade-in" id="kontak">
            <div>
                <h3><i class="fas fa-phone-alt" style="margin-right:12px;"></i>Hubungi Kami</h3>
                <p>Butuh info ketersediaan, mau booking, atau sekedar tanya? Chat langsung via WhatsApp.</p>
            </div>
            <a href="https://wa.me/628123456789" class="btn-wa-large"><i class="fab fa-whatsapp"></i> Chat Admin</a>
        </div>

    </div>

    <!-- ===== FOOTER ===== -->
    <footer>
        <p>
            <i class="fas fa-home"></i> Kos XYZ · Yogyakarta &nbsp;|&nbsp; 
            <i class="far fa-clock"></i> Ketersediaan diperbarui otomatis
        </p>
        <p style="margin-top:6px; font-size:0.9rem;">
            &copy; 2026 · Sistem Informasi Manajemen Kos &nbsp;|&nbsp;
            <!-- ===== LINK ADMIN (Update #2) ===== -->
            <a href="{{ route('admin.login') }}" class="admin-link">
                <i class="fas fa-lock"></i> Admin
            </a>
        </p>
    </footer>

    <!-- ===== JAVASCRIPT ===== -->
    <script>
        // ===== DARK MODE TOGGLE (Update #8) =====
        function toggleTheme() {
            const html = document.documentElement;
            const currentTheme = html.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            html.setAttribute('data-theme', newTheme);
            
            // Simpan preferensi di localStorage
            localStorage.setItem('theme', newTheme);
            
            // Update tombol
            const toggleBtn = document.getElementById('themeToggle');
            const label = document.getElementById('themeLabel');
            if (newTheme === 'dark') {
                toggleBtn.innerHTML = '<i class="fas fa-sun"></i> <span id="themeLabel">Mode Terang</span>';
            } else {
                toggleBtn.innerHTML = '<i class="fas fa-moon"></i> <span id="themeLabel">Mode Gelap</span>';
            }
        }

        // ===== LOAD DARK MODE PREFERENCE =====
        (function() {
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme) {
                document.documentElement.setAttribute('data-theme', savedTheme);
                // Update tombol
                const toggleBtn = document.getElementById('themeToggle');
                const label = document.getElementById('themeLabel');
                if (savedTheme === 'dark') {
                    toggleBtn.innerHTML = '<i class="fas fa-sun"></i> <span id="themeLabel">Mode Terang</span>';
                }
            }
        })();

        // ===== ANIMASI FADE IN (Update #1) =====
        document.addEventListener('DOMContentLoaded', function() {
            const fadeElements = document.querySelectorAll('.fade-in');
            
            // Jika sudah terlihat di awal, langsung tampilkan
            fadeElements.forEach(el => {
                const rect = el.getBoundingClientRect();
                if (rect.top < window.innerHeight) {
                    el.classList.add('visible');
                }
            });

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });

            fadeElements.forEach(el => observer.observe(el));
        });
    </script>

</body>
</html>