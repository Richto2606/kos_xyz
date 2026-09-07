<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Status Booking · Kos XYZ</title>
</head>
<body>
    <nav class="status-navbar">
        <a class="brand" href="{{ route('home') }}"><i class="fas fa-home"></i> Kos XYZ <small>Yogyakarta</small></a>
        <div class="nav-links">
            <a href="{{ route('home') }}#kamar">Kamar</a>
            <a href="{{ route('home') }}#fasilitas">Fasilitas</a>
            <a href="{{ route('public.blog') }}">Blog</a>
            <a href="{{ route('booking.create') }}">Booking</a>
            <a class="active" href="{{ route('booking.status.form') }}">Cek Status</a>
        </div>
    </nav>
    <main>
        <h1>Cek Status Booking</h1>
        <p>Masukkan kode booking dan nomor HP yang digunakan saat mendaftar.</p>
        @if(session('success'))<p class="success">{{ session('success') }}</p>@endif
        <form method="POST" action="{{ route('booking.status') }}">
            @csrf
            <input name="kode" placeholder="BK-20260907-ABCDE" required value="{{ request('kode', old('kode')) }}">
            <input name="no_hp" placeholder="Nomor HP" required value="{{ request('no_hp', old('no_hp')) }}">
            <button type="submit">Cek Status</button>
        </form>
        @if($errors->any())<p class="error">{{ $errors->first() }}</p>@endif
        @isset($booking)
            <section class="booking-result">
                <h2>Status Booking: {{ $booking->status }}</h2>
                <div class="status-steps">
                    @foreach(['Menunggu', 'Dikonfirmasi', 'Ditolak', 'Selesai'] as $status)
                        <div class="status-step {{ $booking->status === $status ? 'current ' . strtolower($status) : '' }}">
                            <span>{{ $loop->iteration }}</span>
                            <strong>{{ $status }}</strong>
                        </div>
                    @endforeach
                </div>
                <p>Kode: <strong>{{ $booking->kode }}</strong></p>
                <p>Kamar: {{ $booking->kamar->nama }}</p>
                <p>Nama: {{ $booking->nama_lengkap }}</p>
                <p>Tanggal masuk: {{ $booking->tanggal_masuk->format('d M Y') }}</p>
                @if($booking->alasan_penolakan)<p>Alasan penolakan: {{ $booking->alasan_penolakan }}</p>@endif
            </section>
        @endisset
    </main>
    <style>
        *{box-sizing:border-box}body{margin:0;font-family:Arial;background:#f1f5f9;color:#0f172a}.status-navbar{height:76px;background:#fff;display:flex;align-items:center;justify-content:space-between;padding:0 7%;box-shadow:0 2px 8px #0001}.status-navbar a{color:#334155;text-decoration:none;margin-left:22px}.status-navbar .brand{font-size:1.25rem;font-weight:700;color:#b45309;margin:0}.status-navbar .brand small{display:block;font-size:.65rem;color:#64748b;font-weight:400;margin-left:29px}.status-navbar .nav-links .active{color:#b45309;font-weight:700;border-bottom:2px solid #b45309;padding-bottom:7px}main{max-width:650px;margin:48px auto;background:#fff;padding:32px;border-radius:18px}h1{margin-top:0;font-size:2rem}input,button{display:block;width:100%;padding:13px;margin:12px 0;font-size:1rem}button{background:#b45309;color:#fff;border:0;border-radius:8px;cursor:pointer}.error{color:#b91c1c}.success{padding:12px;background:#dcfce7;color:#166534;border-radius:8px}section{margin-top:24px;padding:20px;background:#fef3c7;border-radius:12px}.status-steps{display:grid;grid-template-columns:repeat(4,1fr);gap:6px;margin:18px 0 22px}.status-step{display:flex;flex-direction:column;align-items:center;gap:5px;text-align:center;color:#94a3b8;font-size:.7rem}.status-step span{width:28px;height:28px;border-radius:50%;display:grid;place-items:center;background:#e2e8f0}.status-step.current{color:#b45309}.status-step.current span{background:#b45309;color:#fff}.status-step.ditolak{color:#b91c1c}.status-step.ditolak span{background:#ef4444;color:#fff}.status-step.selesai{color:#15803d}.status-step.selesai span{background:#22c55e;color:#fff}@media(max-width:600px){.status-navbar{height:auto;padding:16px 18px;align-items:flex-start;flex-direction:column;gap:14px}.status-navbar .nav-links{display:flex;flex-wrap:wrap;gap:12px}.status-navbar a{margin:0;font-size:.8rem}main{margin:24px 16px;padding:24px}}
    </style>
</body>
</html>
