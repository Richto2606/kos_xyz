<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- ===== META TAG UNTUK SEO ===== -->
    <title>Kos XYZ · Yogyakarta - Tempat Tinggal Nyaman & Strategis</title>
    <meta name="description" content="Kos XYZ Yogyakarta - Tempat tinggal nyaman, dekat kampus, dengan fasilitas lengkap. Kamar mulai Rp 1.000.000/bulan. Tersedia AC, WiFi, CCTV 24 jam." />
    <meta name="keywords" content="kos yogyakarta, kos murah, kos dekat kampus, tempat tinggal mahasiswa, kos kaliurang, kos sleman" />
    <meta name="robots" content="index, follow" />
    <meta property="og:title" content="Kos XYZ · Yogyakarta - Tempat Tinggal Nyaman" />
    <meta property="og:description" content="Kos nyaman dengan fasilitas lengkap di Yogyakarta. Harga mulai Rp 1.000.000/bulan." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo e(url()->current()); ?>" />
    <meta property="og:image" content="<?php echo e(asset('images/logo-kos.png')); ?>" />
    <meta name="twitter:card" content="summary_large_image" />
    <!-- ===== END META TAG SEO ===== -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    
    <style>
        /* ===== CSS VARIABLES UNTUK DARK MODE ===== */
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

        /* ===== LOADING ANIMATION ===== */
        #loader-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--bg-primary);
            z-index: 9999;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }
        #loader-wrapper.hidden {
            opacity: 0;
            visibility: hidden;
        }
        .loader {
            width: 50px;
            height: 50px;
            border: 4px solid var(--border-color);
            border-top: 4px solid #b45309;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .loader-text {
            margin-top: 16px;
            font-size: 0.9rem;
            color: var(--text-muted);
            font-weight: 500;
            animation: pulse 1.5s ease-in-out infinite;
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        /* ===== SMOOTH SCROLL ===== */
        html {
            scroll-behavior: smooth;
        }

        /* ===== TYPING EFFECT ===== */
        .typing-text {
            border-right: 3px solid #b45309;
            white-space: nowrap;
            overflow: hidden;
            animation: blink-caret 0.75s step-end infinite;
        }
        @keyframes blink-caret {
            from, to { border-color: transparent; }
            50% { border-color: #b45309; }
        }
        @media (max-width: 600px) {
            .typing-text {
                white-space: normal;
                border-right: none;
            }
        }

        /* ===== REVEAL ON SCROLL ===== */
        .reveal {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }
        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ===== VIDEO HERO ===== */
        .hero-video-wrapper {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            overflow: hidden;
            border-radius: 32px;
        }
        .hero-video-wrapper video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .hero-video-wrapper .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 23, 42, 0.6);
            z-index: 2;
        }
        .hero-fallback-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 0;
        }

        /* ===== VIDEO CONTROLS ===== */
        .video-controls {
            position: absolute;
            bottom: 20px;
            right: 24px;
            z-index: 4;
            display: flex;
            gap: 8px;
            opacity: 0.5;
            transition: opacity 0.3s ease;
        }
        .video-controls:hover {
            opacity: 1 !important;
        }
        .video-controls button {
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
            color: white;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
        }
        .video-controls button:hover {
            background: rgba(255,255,255,0.25);
            transform: scale(1.05);
        }

        /* ===== HERO ===== */
        .hero { 
            border-radius:32px; 
            margin:28px 0 36px; 
            padding:0;
            display:flex; 
            flex-wrap:wrap; 
            align-items:center; 
            justify-content:space-between;
            transition: background var(--transition-speed);
            border: 1px solid var(--border-color);
            min-height: 420px;
            position: relative;
            overflow: hidden;
        }
        .hero-content {
            position: relative;
            z-index: 3;
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            padding: 60px 40px;
            text-align: center;
        }
        .hero-text { flex:1 1 100%; position:relative; z-index:2; }
        .hero-text h1 { font-size:2.7rem; font-weight:800; line-height:1.2; color:white; text-shadow:0 2px 20px rgba(0,0,0,0.3); }
        .hero-text h1 i { color:#fbbf24; }
        .hero-text .sub { font-size:1.1rem; margin-top:10px; color:#e2e8f0; display:flex; align-items:center; justify-content:center; gap:8px; flex-wrap:wrap; text-shadow:0 1px 10px rgba(0,0,0,0.3); }
        .hero-text .sub i { color:#fbbf24; width:22px; }
        .hero-text .address { margin-top:10px; background:rgba(255,255,255,0.15); backdrop-filter:blur(10px); color:white; padding:8px 20px; border-radius:60px; display:inline-block; font-weight:500; border:1px solid rgba(255,255,255,0.2); text-shadow:0 1px 10px rgba(0,0,0,0.3); }
        .hero-badge {
            display: inline-block;
            background: rgba(251, 191, 36, 0.9);
            color: #0f172a;
            padding: 4px 16px;
            border-radius: 40px;
            font-weight: 700;
            font-size: 0.8rem;
            backdrop-filter: blur(10px);
            margin-bottom: 12px;
        }
        .hero-badge i { margin-right:4px; }

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

        /* ===== FILTER SECTION ===== */
        .filter-section {
            background: var(--bg-card);
            border-radius: 20px;
            padding: 24px 28px;
            border: 1px solid var(--border-color);
            margin-bottom: 24px;
            transition: all 0.3s ease;
        }
        .filter-section:hover {
            border-color: #fed7aa;
        }
        .filter-section .filter-row {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 16px;
            align-items: end;
        }
        .filter-section .filter-row .form-group {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }
        .filter-section .filter-row .form-group label {
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .filter-section .filter-row .form-group input,
        .filter-section .filter-row .form-group select {
            padding: 10px 14px;
            border: 1.5px solid var(--border-color);
            border-radius: 12px;
            font-size: 0.95rem;
            background: var(--bg-card);
            color: var(--text-primary);
            transition: all 0.3s ease;
            width: 100%;
        }
        .filter-section .filter-row .form-group input:focus,
        .filter-section .filter-row .form-group select:focus {
            outline: none;
            border-color: #b45309;
            box-shadow: 0 0 0 3px rgba(180,83,9,0.08);
        }
        .filter-section .filter-row .form-group input::placeholder {
            color: var(--text-muted);
        }
        .filter-section .filter-actions {
            display: flex;
            gap: 10px;
            align-items: center;
            margin-top: 16px;
            flex-wrap: wrap;
        }
        .filter-section .filter-actions .btn-filter {
            padding: 10px 24px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.9rem;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }
        .filter-section .filter-actions .btn-filter.apply {
            background: #b45309;
            color: white;
        }
        .filter-section .filter-actions .btn-filter.apply:hover {
            background: #92400e;
            transform: translateY(-2px);
        }
        .filter-section .filter-actions .btn-filter.reset {
            background: var(--bg-primary);
            color: var(--text-secondary);
            border: 1.5px solid var(--border-color);
        }
        .filter-section .filter-actions .btn-filter.reset:hover {
            background: var(--border-color);
            transform: translateY(-2px);
        }

        /* ===== RESULT INFO ===== */
        .result-info {
            margin-bottom: 16px;
            padding: 12px 18px;
            background: var(--bg-card);
            border-radius: 12px;
            border: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;
        }
        .result-info .text {
            color: var(--text-muted);
            font-size: 0.9rem;
        }
        .result-info .text strong {
            color: var(--text-primary);
        }
        .result-info .clear-filter {
            color: #b45309;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }
        .result-info .clear-filter:hover {
            text-decoration: underline;
        }

        /* ===== SECTION TITLE ===== */
        .section-title { font-size:2rem; font-weight:700; margin:48px 0 18px; display:flex; align-items:center; gap:12px; color:var(--text-primary); }
        .section-title i { color:#b45309; }
        .section-title small { font-size:0.9rem; font-weight:400; color:var(--text-muted); }

        /* ===== BREADCRUMB ===== */
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

        /* ===== TOMBOL DETAIL ===== */
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

        /* ===== GALERI ===== */
        .gallery-section {
            margin: 40px 0;
        }
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 16px;
            margin-top: 20px;
        }
        .gallery-item {
            border-radius: 16px;
            overflow: hidden;
            position: relative;
            cursor: pointer;
            aspect-ratio: 4/3;
            transition: all 0.3s ease;
            border: 2px solid var(--border-color);
        }
        .gallery-item:hover {
            transform: scale(1.02);
            border-color: #b45309;
            box-shadow: 0 8px 30px rgba(0,0,0,0.12);
        }
        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }
        .gallery-item:hover img {
            transform: scale(1.05);
        }
        .gallery-item .overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 30px 16px 16px;
            background: linear-gradient(transparent, rgba(0,0,0,0.6));
            color: white;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .gallery-item:hover .overlay {
            opacity: 1;
        }
        .gallery-item .overlay span {
            font-size: 0.85rem;
            font-weight: 500;
        }

        .gallery-empty {
            grid-column: 1/-1;
            text-align: center;
            padding: 40px;
            color: var(--text-muted);
            background: var(--bg-card);
            border-radius: 20px;
            border: 2px dashed var(--border-color);
        }
        .gallery-empty i {
            font-size: 2.5rem;
            display: block;
            margin-bottom: 10px;
            color: var(--text-muted);
        }

        /* ===== LIGHTBOX ===== */
        .lightbox {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.9);
            z-index: 9999;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            backdrop-filter: blur(8px);
        }
        .lightbox.show {
            display: flex;
            animation: fadeIn 0.3s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .lightbox img {
            max-width: 80%;
            max-height: 80%;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.5);
            object-fit: contain;
        }
        .lightbox .close {
            position: absolute;
            top: 30px;
            right: 40px;
            color: white;
            font-size: 2.5rem;
            cursor: pointer;
            transition: transform 0.3s ease;
            background: rgba(255,255,255,0.1);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .lightbox .close:hover {
            transform: rotate(90deg);
            background: rgba(255,255,255,0.2);
        }
        .lightbox .caption {
            position: absolute;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            font-size: 1.1rem;
            font-weight: 500;
            background: rgba(0,0,0,0.5);
            padding: 8px 24px;
            border-radius: 40px;
            backdrop-filter: blur(4px);
        }

        /* ===== TESTIMONI ===== */
        .testimoni-section {
            margin: 50px 0 30px;
        }
        .testimoni-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 24px;
            margin-top: 20px;
        }
        .testimoni-card {
            background: var(--bg-card);
            border-radius: 20px;
            padding: 24px 26px;
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
        }
        .testimoni-card:hover {
            border-color: #fed7aa;
            transform: translateY(-4px);
            box-shadow: 0 8px 24px var(--shadow-hover);
        }
        .testimoni-card .stars {
            color: #f59e0b;
            font-size: 1.1rem;
            margin-bottom: 10px;
            letter-spacing: 2px;
        }
        .testimoni-card .quote {
            font-size: 0.95rem;
            color: var(--text-secondary);
            line-height: 1.7;
            font-style: italic;
            margin-bottom: 14px;
        }
        .testimoni-card .quote i {
            color: #b45309;
            font-size: 0.9rem;
            opacity: 0.5;
        }
        .testimoni-card .profile {
            display: flex;
            align-items: center;
            gap: 14px;
        }
        .testimoni-card .profile .avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: #fef3c7;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.1rem;
            color: #b45309;
            flex-shrink: 0;
        }
        .testimoni-card .profile .avatar img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }
        .testimoni-card .profile .info .name {
            font-weight: 700;
            color: var(--text-primary);
        }
        .testimoni-card .profile .info .role {
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        /* ===== FAQ ===== */
        .faq-section {
            margin: 40px 0 30px;
        }
        .faq-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 20px;
        }
        .faq-item {
            background: var(--bg-card);
            border-radius: 16px;
            border: 1px solid var(--border-color);
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .faq-item:hover {
            border-color: #fed7aa;
        }
        .faq-item .faq-question {
            padding: 18px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            transition: background 0.2s;
            user-select: none;
        }
        .faq-item .faq-question:hover {
            background: var(--bg-primary);
        }
        .faq-item .faq-question .q {
            font-weight: 600;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .faq-item .faq-question .q .icon {
            color: #b45309;
            font-weight: 700;
        }
        .faq-item .faq-question .toggle-icon {
            color: #b45309;
            font-size: 1.2rem;
            transition: transform 0.3s ease;
        }
        .faq-item .faq-question .toggle-icon.active {
            transform: rotate(180deg);
        }
        .faq-item .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease, padding 0.3s ease;
            padding: 0 24px;
        }
        .faq-item .faq-answer.open {
            max-height: 300px;
            padding: 0 24px 18px;
        }
        .faq-item .faq-answer p {
            color: var(--text-secondary);
            line-height: 1.7;
            font-size: 0.95rem;
        }

        /* ===== BLOG SECTION ===== */
        .blog-section {
            margin: 50px 0 30px;
        }
        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 24px;
            margin-top: 20px;
        }
        .blog-card {
            background: var(--bg-card);
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid var(--border-color);
            text-decoration: none;
            color: var(--text-primary);
            transition: all 0.3s ease;
        }
        .blog-card:hover {
            transform: translateY(-4px);
            border-color: #fed7aa;
            box-shadow: 0 8px 24px rgba(0,0,0,0.06);
        }
        .blog-card .image {
            height: 160px;
            background: var(--bg-primary);
            overflow: hidden;
        }
        .blog-card .image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        .blog-card:hover .image img {
            transform: scale(1.05);
        }
        .blog-card .content {
            padding: 16px 20px 20px;
        }
        .blog-card .content .kategori {
            font-size: 0.7rem;
            color: #b45309;
            font-weight: 600;
        }
        .blog-card .content .judul {
            font-size: 1rem;
            font-weight: 700;
            margin: 4px 0 6px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .blog-card .content .deskripsi {
            font-size: 0.85rem;
            color: var(--text-muted);
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .blog-card .content .meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
            font-size: 0.75rem;
            color: var(--text-muted);
        }

        .blog-empty {
            grid-column: 1/-1;
            text-align: center;
            padding: 40px;
            color: var(--text-muted);
            background: var(--bg-card);
            border-radius: 20px;
            border: 2px dashed var(--border-color);
        }
        .blog-empty i {
            font-size: 2.5rem;
            display: block;
            margin-bottom: 10px;
            color: var(--text-muted);
        }

        .btn-blog {
            display: inline-block;
            background: #b45309;
            color: white;
            padding: 10px 28px;
            border-radius: 40px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-blog:hover {
            background: #92400e;
            transform: translateY(-2px);
            box-shadow: 0 4px 14px rgba(180,83,9,0.25);
        }

        /* ===== MAP SECTION ===== */
        .map-section {
            margin: 40px 0 30px;
        }
        .map-wrapper {
            background: var(--bg-card);
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
            box-shadow: 0 4px 16px rgba(0,0,0,0.04);
        }
        .map-wrapper:hover {
            border-color: #fed7aa;
            box-shadow: 0 8px 30px rgba(0,0,0,0.06);
        }
        .map-container {
            position: relative;
            width: 100%;
            height: 400px;
            min-height: 300px;
        }
        .map-container iframe {
            width: 100%;
            height: 100%;
            min-height: 400px;
            border: 0;
        }
        .map-overlay {
            position: absolute;
            bottom: 20px;
            left: 20px;
            background: rgba(0,0,0,0.75);
            backdrop-filter: blur(10px);
            color: white;
            padding: 14px 22px;
            border-radius: 12px;
            border: 1px solid rgba(255,255,255,0.1);
            max-width: 280px;
        }
        .map-overlay .title {
            font-weight: 700;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .map-overlay .title i { color: #fbbf24; }
        .map-overlay .address {
            font-size: 0.8rem;
            color: #cbd5e1;
            margin-top: 4px;
        }
        .map-overlay .address i { color: #fbbf24; margin-right: 4px; }

        .map-info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            padding: 20px 24px;
            background: var(--bg-primary);
            border-top: 1px solid var(--border-color);
        }
        .map-info-item {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .map-info-item .icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            flex-shrink: 0;
        }
        .map-info-item .icon.orange { background: #fef3c7; color: #b45309; }
        .map-info-item .icon.blue { background: #dbeafe; color: #2563eb; }
        .map-info-item .icon.green { background: #dcfce7; color: #16a34a; }
        .map-info-item .icon.yellow { background: #fef9c3; color: #b45309; }
        .map-info-item .info .label {
            font-size: 0.7rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .map-info-item .info .value {
            font-weight: 600;
            color: var(--text-primary);
        }

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

        /* ===== FOOTER ===== */
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

        @media (max-width: 600px) {
            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            }
            .lightbox img {
                max-width: 95%;
                max-height: 70%;
            }
            .lightbox .close {
                top: 20px;
                right: 20px;
                font-size: 1.8rem;
                width: 40px;
                height: 40px;
            }
            .lightbox .caption {
                font-size: 0.9rem;
                bottom: 20px;
                padding: 6px 16px;
            }
            .testimoni-grid {
                grid-template-columns: 1fr;
            }
            .hero-content {
                padding: 30px 20px;
            }
            .hero-text h1 {
                font-size: 2rem;
            }
            .video-controls {
                bottom: 10px;
                right: 14px;
            }
            .video-controls button {
                width: 30px;
                height: 30px;
                font-size: 0.7rem;
            }
            .map-container {
                height: 250px;
            }
            .map-container iframe {
                min-height: 250px;
            }
            .map-overlay {
                bottom: 10px;
                left: 10px;
                padding: 10px 16px;
                max-width: 200px;
            }
            .map-overlay .title { font-size: 0.85rem; }
            .map-overlay .address { font-size: 0.7rem; }
            .map-info-grid {
                grid-template-columns: 1fr 1fr;
                padding: 16px;
            }
            .filter-section .filter-row {
                grid-template-columns: 1fr 1fr;
            }
            .result-info {
                flex-direction: column;
                align-items: flex-start;
            }
            .blog-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width:500px) {
            .filter-section .filter-row {
                grid-template-columns: 1fr;
            }
            .filter-section .filter-actions {
                flex-direction: column;
                width: 100%;
            }
            .filter-section .filter-actions .btn-filter {
                width: 100%;
                justify-content: center;
            }
            .kamar-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width:700px) { 
            .navbar .container { flex-direction:column; gap:12px; } 
            .nav-links { justify-content:center; gap:16px; } 
            .hero { padding:0; flex-direction:column; } 
            .hero-content { flex-direction:column; } 
            .hero-text h1 { font-size:2.2rem; } 
            .section-title { font-size:1.6rem; } 
            .cta-section { flex-direction:column; gap:20px; text-align:center; }
        }
    </style>
</head>
<body>

    <!-- ===== LOADING SCREEN ===== -->
    <div id="loader-wrapper">
        <div class="loader"></div>
        <div class="loader-text">Memuat Kos XYZ...</div>
    </div>

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
                <a href="#galeri">Galeri</a>
                <a href="#testimoni">Testimoni</a>
                <a href="#faq">FAQ</a>
                <a href="<?php echo e(route('public.blog')); ?>">Blog</a>
                <a href="#sejarah">Sejarah</a>
                <a href="#lokasi">Lokasi</a>
<a href="<?php echo e(route('booking.create')); ?>" class="btn-wa"><i class="fas fa-calendar-check"></i> Booking Sekarang</a>
                 <a href="<?php echo e(route('booking.status.form')); ?>"><i class="fas fa-search"></i> Cek Status</a>
                 <!-- ===== DARK MODE TOGGLE ===== -->
                <button class="theme-toggle" onclick="toggleTheme()" id="themeToggle">
                    <i class="fas fa-moon"></i> <span id="themeLabel">Mode Gelap</span>
                </button>
            </div>
        </div>
    </nav>

    <div class="container">

        <!-- ===== HERO DENGAN VIDEO BACKGROUND ===== -->
        <section class="hero">

            <!-- ===== VIDEO WRAPPER ===== -->
            <div class="hero-video-wrapper">
                <!-- Video Background -->
                <video id="heroVideo" autoplay muted loop playsinline poster="<?php echo e(asset('images/hero-poster.jpg')); ?>">
                    <source src="<?php echo e(asset('videos/hero-bg.mp4')); ?>" type="video/mp4">
                    <!-- Fallback Image jika video tidak support -->
                    <img src="<?php echo e(asset('images/alexandra-gorn-JIUjvqe2ZHg-unsplash.jpg')); ?>" alt="Kos XYZ" class="hero-fallback-image">
                </video>
                <!-- Overlay -->
                <div class="overlay"></div>
            </div>

            <!-- ===== VIDEO CONTROLS ===== -->
            <div class="video-controls">
                <button onclick="toggleVideoMute()" id="muteBtn" title="Mute/Unmute">
                    <i class="fas fa-volume-up"></i>
                </button>
                <button onclick="toggleVideoPlay()" id="playBtn" title="Play/Pause">
                    <i class="fas fa-pause"></i>
                </button>
            </div>

            <!-- ===== HERO CONTENT ===== -->
            <div class="hero-content">
                <div class="hero-text">
                    <div class="hero-badge">
                        <i class="fas fa-star"></i> Kamar Unggulan
                    </div>

                    <h1>
                        <i class="fas fa-map-pin"></i> 
                        <span class="typing-text" id="typing-text"></span>
                    </h1>
                    <div class="sub">
                        <i class="fas fa-map-marker-alt"></i> Jl. Kaliurang KM 5, Sleman, Yogyakarta
                    </div>
                    <div class="address">
                        <i class="fas fa-tag"></i> Harga kamar Rp 1.000.000 / bulan
                    </div>
                    <div style="margin-top:18px; display:flex; gap:12px; flex-wrap:wrap; justify-content:center;">
                        <span style="background:rgba(255,255,255,0.15); backdrop-filter:blur(10px); padding:4px 16px; border-radius:40px; border:1px solid rgba(255,255,255,0.2); color:white; text-shadow:0 1px 10px rgba(0,0,0,0.3);">☀️ AC</span>
                        <span style="background:rgba(255,255,255,0.15); backdrop-filter:blur(10px); padding:4px 16px; border-radius:40px; border:1px solid rgba(255,255,255,0.2); color:white; text-shadow:0 1px 10px rgba(0,0,0,0.3);">🛏️ Tempat tidur</span>
                        <span style="background:rgba(255,255,255,0.15); backdrop-filter:blur(10px); padding:4px 16px; border-radius:40px; border:1px solid rgba(255,255,255,0.2); color:white; text-shadow:0 1px 10px rgba(0,0,0,0.3);">📶 WiFi 100Mbps</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===== KAMAR & HARGA ===== -->
        <div class="reveal" id="kamar">
            <!-- ===== BREADCRUMB ===== -->
            <nav class="breadcrumb">
                <a href="<?php echo e(route('home')); ?>"><i class="fas fa-home"></i> Beranda</a>
                <span>/</span>
                <span>Kamar</span>
                <?php if(request('search')): ?>
                    <span>/</span>
                    <span>Hasil pencarian: "<?php echo e(request('search')); ?>"</span>
                <?php endif; ?>
            </nav>

            <h2 class="section-title">
                <i class="fas fa-door-open"></i> Kamar & Harga 
                <small>· semua Rp 1.000.000</small>
            </h2>

            <!-- ===== FILTER & SEARCH ===== -->
            <div class="filter-section">
                <form method="GET" action="<?php echo e(route('home')); ?>" id="filterForm">
                    <div class="filter-row">
                        <!-- Search -->
                        <div class="form-group">
                            <label for="search"><i class="fas fa-search"></i> Cari Kamar</label>
                            <input type="text" id="search" name="search" placeholder="Cari nama atau fasilitas..." value="<?php echo e(request('search')); ?>">
                        </div>

                        <!-- Filter Status -->
                        <div class="form-group">
                            <label for="status"><i class="fas fa-tag"></i> Status</label>
                            <select name="status" id="status">
                                <option value="">Semua Status</option>
                                <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($status); ?>" <?php echo e(request('status') == $status ? 'selected' : ''); ?>><?php echo e($status); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <!-- Filter Harga Min -->
                        <div class="form-group">
                            <label for="harga_min"><i class="fas fa-arrow-up"></i> Harga Min</label>
                            <input type="number" id="harga_min" name="harga_min" placeholder="Minimal" value="<?php echo e(request('harga_min')); ?>">
                        </div>

                        <!-- Filter Harga Max -->
                        <div class="form-group">
                            <label for="harga_max"><i class="fas fa-arrow-down"></i> Harga Max</label>
                            <input type="number" id="harga_max" name="harga_max" placeholder="Maksimal" value="<?php echo e(request('harga_max')); ?>">
                        </div>
                    </div>

                    <div class="filter-row" style="margin-top:12px;">
                        <!-- Filter Fasilitas -->
                        <div class="form-group">
                            <label for="fasilitas"><i class="fas fa-cog"></i> Fasilitas</label>
                            <select name="fasilitas" id="fasilitas">
                                <option value="">Semua Fasilitas</option>
                                <?php $__currentLoopData = $fasilitasList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fasilitas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($fasilitas); ?>" <?php echo e(request('fasilitas') == $fasilitas ? 'selected' : ''); ?>><?php echo e($fasilitas); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <!-- Sorting -->
                        <div class="form-group">
                            <label for="sort_by"><i class="fas fa-sort"></i> Urutkan</label>
                            <select name="sort_by" id="sort_by">
                                <option value="created_at" <?php echo e(request('sort_by') == 'created_at' || !request('sort_by') ? 'selected' : ''); ?>>Terbaru</option>
                                <option value="nama" <?php echo e(request('sort_by') == 'nama' ? 'selected' : ''); ?>>Nama (A-Z)</option>
                                <option value="harga" <?php echo e(request('sort_by') == 'harga' ? 'selected' : ''); ?>>Harga (Termurah)</option>
                                <option value="status" <?php echo e(request('sort_by') == 'status' ? 'selected' : ''); ?>>Status</option>
                            </select>
                        </div>

                        <!-- Sort Order -->
                        <div class="form-group">
                            <label for="sort_order"><i class="fas fa-arrow-up-arrow-down"></i> Arah</label>
                            <select name="sort_order" id="sort_order">
                                <option value="asc" <?php echo e(request('sort_order') == 'asc' ? 'selected' : ''); ?>>Naik (A-Z)</option>
                                <option value="desc" <?php echo e(request('sort_order') == 'desc' || !request('sort_order') ? 'selected' : ''); ?>>Turun (Z-A)</option>
                            </select>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="form-group" style="justify-content: flex-end;">
                            <div class="filter-actions" style="margin-top:0;">
                                <button type="submit" class="btn-filter apply">
                                    <i class="fas fa-filter"></i> Cari
                                </button>
                                <a href="<?php echo e(route('home')); ?>" class="btn-filter reset">
                                    <i class="fas fa-undo"></i> Reset
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- ===== RESULT INFO ===== -->
            <?php if(request()->anyFilled(['search', 'status', 'harga_min', 'harga_max', 'fasilitas'])): ?>
            <div class="result-info">
                <span class="text">
                    <i class="fas fa-search"></i> Hasil pencarian:
                    <?php if(request('search')): ?> <strong>"<?php echo e(request('search')); ?>"</strong> <?php endif; ?>
                    <?php if(request('status')): ?> <span style="margin-left:8px;">| Status: <strong><?php echo e(request('status')); ?></strong></span> <?php endif; ?>
                    <?php if(request('harga_min') || request('harga_max')): ?> 
                        <span style="margin-left:8px;">| Harga: <strong>
                            <?php if(request('harga_min')): ?> Rp <?php echo e(number_format(request('harga_min'), 0, ',', '.')); ?> <?php endif; ?>
                            <?php if(request('harga_min') && request('harga_max')): ?> - <?php endif; ?>
                            <?php if(request('harga_max')): ?> Rp <?php echo e(number_format(request('harga_max'), 0, ',', '.')); ?> <?php endif; ?>
                        </strong></span>
                    <?php endif; ?>
                    <?php if(request('fasilitas')): ?> <span style="margin-left:8px;">| Fasilitas: <strong><?php echo e(request('fasilitas')); ?></strong></span> <?php endif; ?>
                    <span style="margin-left:12px; font-weight:600; color:var(--text-primary);"><?php echo e($kamars->count()); ?> kamar ditemukan</span>
                </span>
                <a href="<?php echo e(route('home')); ?>" class="clear-filter">
                    <i class="fas fa-times"></i> Hapus Filter
                </a>
            </div>
            <?php endif; ?>

            <!-- ===== KAMAR GRID ===== -->
            <div class="kamar-grid">
                <?php $__empty_1 = true; $__currentLoopData = $kamars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kamar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="kamar-card">
                    <!-- ===== GAMBAR KAMAR ===== -->
                    <div class="gambar">
                        <?php if($kamar->gambar_url !== asset('images/kamar-default.jpg')): ?>
                            <img src="<?php echo e($kamar->gambar_url); ?>" 
                                 alt="Foto <?php echo e($kamar->nama); ?>" 
                                 loading="lazy">
                        <?php else: ?>
                            <i class="fas fa-bed"></i>
                        <?php endif; ?>
                    </div>

                    <div class="nama-kamar"><?php echo e($kamar->nama); ?></div>
                    <div>
                        <span class="harga">Rp <?php echo e(number_format($kamar->harga, 0, ',', '.')); ?></span>
                        <span class="badge <?php echo e($kamar->status == 'Tersedia' ? 'badge-success' : ($kamar->status == 'Penuh' ? 'badge-danger' : 'badge-warning')); ?>">
                            <i class="fas fa-<?php echo e($kamar->status == 'Tersedia' ? 'check-circle' : ($kamar->status == 'Penuh' ? 'times-circle' : 'hammer')); ?>"></i> <?php echo e($kamar->status); ?>

                        </span>
                    </div>
                    <div class="deskripsi">
                        <i class="fas fa-quote-left" style="color:#b45309; margin-right:4px;"></i> <?php echo e($kamar->deskripsi ?? 'Kamar nyaman dengan fasilitas lengkap'); ?>

                    </div>
                    <div class="fasilitas">
                        <?php $__currentLoopData = explode(',', $kamar->fasilitas ?? ''); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span><i class="fas fa-check-circle"></i> <?php echo e(trim($fas)); ?></span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <!-- ===== TOMBOL DETAIL ===== -->
                    <a href="<?php echo e(route('public.kamar.detail', $kamar->id)); ?>" class="btn-detail">
                        Lihat Detail <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p style="color:var(--text-muted); padding:40px; text-align:center; grid-column:1/-1;">
                    <?php if(request('search')): ?>
                        Tidak ada kamar dengan nama "<?php echo e(request('search')); ?>"
                    <?php else: ?>
                        Belum ada data kamar
                    <?php endif; ?>
                </p>
                <?php endif; ?>
            </div>
        </div>

        <!-- ===== FASILITAS UMUM ===== -->
        <div class="reveal" id="fasilitas">
            <h2 class="section-title"><i class="fas fa-concierge-bell"></i> Fasilitas Umum</h2>
            <div class="fasilitas-umum">
                <div class="item"><i class="fas fa-utensils"></i> Dapur bersama</div>
                <div class="item"><i class="fas fa-wifi"></i> WiFi 100 Mbps</div>
                <div class="item"><i class="fas fa-parking"></i> Parkir luas</div>
                <div class="item"><i class="fas fa-video"></i> CCTV 24 jam</div>
                <div class="item"><i class="fas fa-tint"></i> Ruang cuci</div>
                <div class="item"><i class="fas fa-shield-alt"></i> Keamanan 24 jam</div>
            </div>
        </div>

        <!-- ===== GALERI FOTO ===== -->
        <section class="gallery-section reveal" id="galeri">
            <h2 class="section-title">
                <i class="fas fa-images" style="color:#b45309;"></i> Galeri Kos XYZ
                <small style="font-size:0.9rem; font-weight:400; color:var(--text-muted);">· Suasana nyaman & asri</small>
            </h2>

            <div class="gallery-grid">
                <?php
                    $galleryImages = [];
                    foreach($kamars as $k) {
                        if ($k->gambar_url !== asset('images/kamar-default.jpg')) {
                            $galleryImages[] = [
                                'url' => $k->gambar_url,
                                'caption' => $k->nama . ' - ' . $k->status
                            ];
                        }
                    }
                    $galleryImages = array_slice($galleryImages, 0, 6);
                ?>

                <?php $__empty_1 = true; $__currentLoopData = $galleryImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="gallery-item" onclick="openLightbox(<?php echo e($index); ?>)">
                    <img src="<?php echo e($img['url']); ?>" alt="<?php echo e($img['caption']); ?>" loading="lazy">
                    <div class="overlay">
                        <span><i class="fas fa-expand" style="margin-right:6px;"></i> <?php echo e($img['caption']); ?></span>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="gallery-empty">
                    <i class="fas fa-images"></i>
                    <p>Belum ada gambar untuk ditampilkan</p>
                    <p style="font-size:0.9rem;">Tambahkan gambar pada setiap kamar di dashboard admin</p>
                </div>
                <?php endif; ?>
            </div>

            <?php if(count($galleryImages) > 0): ?>
            <div style="text-align:center; margin-top:20px;">
                <a href="#kamar" class="btn-wa" style="background:#b45309; text-decoration:none; padding:10px 28px; border-radius:40px; color:white; font-weight:600; display:inline-flex; align-items:center; gap:8px; border:none;">
                    <i class="fas fa-images"></i> Lihat Semua Kamar
                </a>
            </div>
            <?php endif; ?>
        </section>

        <!-- ===== LIGHTBOX ===== -->
        <div class="lightbox" id="lightbox" onclick="closeLightbox(event)">
            <span class="close" onclick="closeLightbox(event)">&times;</span>
            <img id="lightboxImg" src="" alt="">
            <div class="caption" id="lightboxCaption"></div>
        </div>

        <!-- ===== TESTIMONI PENYEWA ===== -->
        <section class="testimoni-section reveal" id="testimoni">
            <h2 class="section-title">
                <i class="fas fa-comment-dots" style="color:#b45309;"></i> Testimoni Penyewa
                <small style="font-size:0.9rem; font-weight:400; color:var(--text-muted);">· Apa kata mereka</small>
            </h2>

            <div class="testimoni-grid">
                <?php $__empty_1 = true; $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="testimoni-card">
                    <div class="stars">
                        <?php for($i = 0; $i < 5; $i++): ?>
                            <i class="fas fa-star"></i>
                        <?php endfor; ?>
                    </div>
                    <div class="quote">
                        <i class="fas fa-quote-left"></i>
                        <?php echo e($testi['quote']); ?>

                        <i class="fas fa-quote-right" style="float:right;"></i>
                    </div>
                    <div class="profile">
                        <div class="avatar">
                            <?php if(isset($testi['foto']) && $testi['foto']): ?>
                                <img src="<?php echo e(asset('storage/penyewa/' . $testi['foto'])); ?>" alt="<?php echo e($testi['name']); ?>">
                            <?php else: ?>
                                <?php echo e(strtoupper(substr($testi['name'], 0, 1))); ?>

                            <?php endif; ?>
                        </div>
                        <div class="info">
                            <div class="name"><?php echo e($testi['name']); ?></div>
                            <div class="role"><?php echo e($testi['role']); ?></div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div style="grid-column:1/-1; text-align:center; padding:30px; color:var(--text-muted); background:var(--bg-card); border-radius:20px; border:2px dashed var(--border-color);">
                    <i class="fas fa-comment-slash" style="font-size:2rem; display:block; margin-bottom:10px; color:var(--text-muted);"></i>
                    <p>Belum ada testimoni</p>
                </div>
                <?php endif; ?>
            </div>
        </section>

        <!-- ===== FAQ ===== -->
        <section class="faq-section reveal" id="faq">
            <h2 class="section-title">
                <i class="fas fa-circle-question" style="color:#b45309;"></i> Pertanyaan Umum (FAQ)
                <small style="font-size:0.9rem; font-weight:400; color:var(--text-muted);">· Yang sering ditanyakan</small>
            </h2>

            <div class="faq-list">
                <?php $__empty_1 = true; $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <span class="q">
                            <span class="icon">Q.</span> <?php echo e($faq['question']); ?>

                        </span>
                        <span class="toggle-icon"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p><strong>A.</strong> <?php echo e($faq['answer']); ?></p>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div style="text-align:center; padding:30px; color:var(--text-muted); background:var(--bg-card); border-radius:16px; border:2px dashed var(--border-color);">
                    <i class="fas fa-circle-question" style="font-size:2rem; display:block; margin-bottom:10px; color:var(--text-muted);"></i>
                    <p>Belum ada FAQ</p>
                </div>
                <?php endif; ?>
            </div>
        </section>

        <!-- ===== SEJARAH ===== -->
        <div class="sejarah reveal" id="sejarah">
            <h3><i class="fas fa-landmark"></i> Sejarah Kos XYZ</h3>
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
        <div class="cta-section reveal" id="kontak">
            <div>
                <h3><i class="fas fa-phone-alt" style="margin-right:12px;"></i>Hubungi Kami</h3>
                <p>Butuh info ketersediaan, mau booking, atau sekedar tanya? Chat langsung via WhatsApp.</p>
            </div>
            <a href="<?php echo e(route('booking.create')); ?>" class="btn-wa-large"><i class="fas fa-calendar-check"></i> Booking Sekarang</a>
        </div>

        <!-- ============================================================ -->
        <!-- ===== BLOG / ARTIKEL ===== -->
        <!-- ============================================================ -->
        <section class="blog-section reveal" id="blog">
            <h2 class="section-title">
                <i class="fas fa-newspaper" style="color:#b45309;"></i> Blog & Artikel
                <small style="font-size:0.9rem; font-weight:400; color:var(--text-muted);">· Tips & info menarik</small>
            </h2>

            <div class="blog-grid">
                <?php $__empty_1 = true; $__currentLoopData = $artikels ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artikel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <a href="<?php echo e(route('public.artikel.detail', $artikel->slug)); ?>" class="blog-card">
                    <div class="image">
                        <img src="<?php echo e($artikel->gambar_url); ?>" alt="<?php echo e($artikel->judul); ?>">
                    </div>
                    <div class="content">
                        <span class="kategori"><?php echo e($artikel->kategori); ?></span>
                        <div class="judul"><?php echo e($artikel->judul); ?></div>
                        <div class="deskripsi"><?php echo e($artikel->deskripsi_singkat ?? strip_tags(substr($artikel->isi, 0, 100))); ?></div>
                        <div class="meta">
                            <span><i class="fas fa-user"></i> <?php echo e($artikel->penulis); ?></span>
                            <span><i class="far fa-calendar-alt"></i> <?php echo e($artikel->tanggal_publikasi->format('d M Y')); ?></span>
                        </div>
                    </div>
                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="blog-empty">
                    <i class="fas fa-newspaper"></i>
                    <p>Belum ada artikel</p>
                </div>
                <?php endif; ?>
            </div>

            <?php if(isset($artikels) && $artikels->count() > 0): ?>
            <div style="text-align:center; margin-top:20px;">
                <a href="<?php echo e(route('public.blog')); ?>" class="btn-blog">
                    Lihat Semua Artikel <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            <?php endif; ?>
        </section>
        <!-- ============================================================ -->

        <!-- ===== MAP LOKASI ===== -->
        <section class="map-section reveal" id="lokasi">
            <h2 class="section-title">
                <i class="fas fa-map-marked-alt" style="color:#b45309;"></i> Lokasi Kos XYZ
                <small style="font-size:0.9rem; font-weight:400; color:var(--text-muted);">· Temukan kami di sini</small>
            </h2>

            <div class="map-wrapper">
                <div class="map-container">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63234.69101507878!2d110.35147820567435!3d-7.747417226056027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5787a34c416b%3A0x7a895d957daef76a!2sYogyakarta!5e0!3m2!1sid!2sid!4v1712987654321" 
                        allowfullscreen="" 
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>

                    <div class="map-overlay">
                        <div class="title">
                            <i class="fas fa-map-pin"></i>
                            Kos XYZ
                        </div>
                        <div class="address">
                            <i class="fas fa-map-marker-alt"></i>
                            Jl. Kaliurang KM 5, Sleman, Yogyakarta
                        </div>
                    </div>
                </div>

                <div class="map-info-grid">
                    <div class="map-info-item">
                        <div class="icon orange"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="info">
                            <div class="label">Alamat</div>
                            <div class="value">Jl. Kaliurang KM 5, Sleman, Yogyakarta</div>
                        </div>
                    </div>
                    <div class="map-info-item">
                        <div class="icon blue"><i class="fas fa-phone"></i></div>
                        <div class="info">
                            <div class="label">Telepon</div>
                            <div class="value">+62 812 3456 789</div>
                        </div>
                    </div>
                    <div class="map-info-item">
                        <div class="icon green"><i class="fas fa-clock"></i></div>
                        <div class="info">
                            <div class="label">Jam Operasional</div>
                            <div class="value">24 Jam</div>
                        </div>
                    </div>
                    <div class="map-info-item">
                        <div class="icon yellow"><i class="fas fa-wifi"></i></div>
                        <div class="info">
                            <div class="label">Fasilitas</div>
                            <div class="value">WiFi 100 Mbps, CCTV 24 Jam</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- ===== FOOTER ===== -->
    <footer>
        <p>
            <i class="fas fa-home"></i> Kos XYZ · Yogyakarta &nbsp;|&nbsp; 
            <i class="far fa-clock"></i> Ketersediaan diperbarui otomatis
        </p>
        <p style="margin-top:6px; font-size:0.9rem;">
            &copy; 2026 · Sistem Informasi Manajemen Kos &nbsp;|&nbsp;
            <a href="<?php echo e(route('admin.login')); ?>" class="admin-link">
                <i class="fas fa-lock"></i> Admin
            </a>
        </p>
    </footer>

    <!-- ===== JAVASCRIPT ===== -->
    <script>
        // ============================================================
        // ===== 1. LOADING SCREEN =====
        // ============================================================
        window.addEventListener('load', function() {
            const loader = document.getElementById('loader-wrapper');
            if (loader) {
                setTimeout(function() {
                    loader.classList.add('hidden');
                }, 500);
            }
        });

        // ============================================================
        // ===== 2. DARK MODE TOGGLE =====
        // ============================================================
        function toggleTheme() {
            const html = document.documentElement;
            const currentTheme = html.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            html.setAttribute('data-theme', newTheme);
            
            localStorage.setItem('theme', newTheme);
            
            const toggleBtn = document.getElementById('themeToggle');
            const label = document.getElementById('themeLabel');
            if (newTheme === 'dark') {
                toggleBtn.innerHTML = '<i class="fas fa-sun"></i> <span id="themeLabel">Mode Terang</span>';
            } else {
                toggleBtn.innerHTML = '<i class="fas fa-moon"></i> <span id="themeLabel">Mode Gelap</span>';
            }
        }

        // ============================================================
        // ===== 3. LOAD DARK MODE PREFERENCE =====
        // ============================================================
        (function() {
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme) {
                document.documentElement.setAttribute('data-theme', savedTheme);
                const toggleBtn = document.getElementById('themeToggle');
                const label = document.getElementById('themeLabel');
                if (savedTheme === 'dark') {
                    toggleBtn.innerHTML = '<i class="fas fa-sun"></i> <span id="themeLabel">Mode Terang</span>';
                }
            }
        })();

        // ============================================================
        // ===== 4. TYPING EFFECT =====
        // ============================================================
        document.addEventListener('DOMContentLoaded', function() {
            const text = "Kos XYZ Yogyakarta";
            const typingElement = document.getElementById('typing-text');
            if (typingElement) {
                let i = 0;
                function typeWriter() {
                    if (i < text.length) {
                        typingElement.innerHTML += text.charAt(i);
                        i++;
                        setTimeout(typeWriter, 80);
                    }
                }
                setTimeout(typeWriter, 600);
            }
        });

        // ============================================================
        // ===== 5. REVEAL ON SCROLL =====
        // ============================================================
        document.addEventListener('DOMContentLoaded', function() {
            const revealElements = document.querySelectorAll('.reveal');
            
            const revealObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });
            
            revealElements.forEach(el => revealObserver.observe(el));
            
            revealElements.forEach(el => {
                const rect = el.getBoundingClientRect();
                if (rect.top < window.innerHeight) {
                    el.classList.add('visible');
                }
            });
        });

        // ============================================================
        // ===== 6. LIGHTBOX GALERI =====
        // ============================================================
        let galleryData = <?php echo json_encode($galleryImages, 15, 512) ?>;

        function openLightbox(index) {
            const lightbox = document.getElementById('lightbox');
            const img = document.getElementById('lightboxImg');
            const caption = document.getElementById('lightboxCaption');
            
            if (galleryData[index]) {
                img.src = galleryData[index].url;
                caption.textContent = galleryData[index].caption;
                lightbox.classList.add('show');
                document.body.style.overflow = 'hidden';
            }
        }

        function closeLightbox(event) {
            const lightbox = document.getElementById('lightbox');
            if (event.target === lightbox || event.target.classList.contains('close')) {
                lightbox.classList.remove('show');
                document.body.style.overflow = 'auto';
            }
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const lightbox = document.getElementById('lightbox');
                if (lightbox.classList.contains('show')) {
                    lightbox.classList.remove('show');
                    document.body.style.overflow = 'auto';
                }
            }
        });

        // ============================================================
        // ===== 7. TOGGLE FAQ =====
        // ============================================================
        function toggleFaq(element) {
            const item = element.parentElement;
            const answer = item.querySelector('.faq-answer');
            const icon = item.querySelector('.toggle-icon');
            
            document.querySelectorAll('.faq-item .faq-answer').forEach(el => {
                if (el !== answer) {
                    el.classList.remove('open');
                    el.parentElement.querySelector('.toggle-icon').classList.remove('active');
                }
            });
            
            answer.classList.toggle('open');
            icon.classList.toggle('active');
        }

        // ============================================================
        // ===== 8. VIDEO CONTROLS =====
        // ============================================================
        const video = document.getElementById('heroVideo');
        const muteBtn = document.getElementById('muteBtn');
        const playBtn = document.getElementById('playBtn');

        function toggleVideoMute() {
            if (video) {
                video.muted = !video.muted;
                muteBtn.innerHTML = video.muted ? '<i class="fas fa-volume-mute"></i>' : '<i class="fas fa-volume-up"></i>';
            }
        }

        function toggleVideoPlay() {
            if (video) {
                if (video.paused) {
                    video.play();
                    playBtn.innerHTML = '<i class="fas fa-pause"></i>';
                } else {
                    video.pause();
                    playBtn.innerHTML = '<i class="fas fa-play"></i>';
                }
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            if (video) {
                video.play().catch(function() {
                    if (playBtn) {
                        playBtn.innerHTML = '<i class="fas fa-play"></i>';
                    }
                });
            }
        });
    </script>

</body>
</html><?php /**PATH E:\Kerjaan\kos_xyz-main\kos_xyz-main\resources\views\public\index.blade.php ENDPATH**/ ?>