<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Artikel;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        $query = Kamar::query();

        // ===== SEARCH =====
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('fasilitas', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        // ===== FILTER STATUS =====
        if ($request->filled('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // ===== FILTER HARGA MIN =====
        if ($request->filled('harga_min')) {
            $query->where('harga', '>=', $request->harga_min);
        }

        // ===== FILTER HARGA MAX =====
        if ($request->filled('harga_max')) {
            $query->where('harga', '<=', $request->harga_max);
        }

        // ===== FILTER FASILITAS =====
        if ($request->filled('fasilitas') && $request->fasilitas != '') {
            $query->where('fasilitas', 'like', '%' . $request->fasilitas . '%');
        }

        // ===== SORTING =====
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');
        
        $allowedSorts = ['nama', 'harga', 'status', 'created_at'];
        if (in_array($sortBy, $allowedSorts)) {
            $query->orderBy($sortBy, $sortOrder);
        }

        $kamars = $query->get();

        // ===== DATA UNTUK FILTER (Dropdown) =====
        $statuses = ['Tersedia', 'Penuh', 'Maintenance'];
        $fasilitasList = ['AC', 'KM Dalam', 'KM Luar', 'Meja', 'Kursi', 'Lemari', 'Tempat Tidur', 'TV', 'Kipas', 'WiFi'];

        // ===== DATA TESTIMONI =====
        $testimonials = [
            [
                'name' => 'Budi Santoso',
                'role' => 'Mahasiswa UGM',
                'quote' => 'Kos XYZ sangat nyaman dan dekat dengan kampus. Fasilitas lengkap, Wi-Fi cepat, dan lingkungannya asri. Sangat direkomendasikan!',
                'foto' => null
            ],
            [
                'name' => 'Siti Rahayu',
                'role' => 'Karyawan Swasta',
                'quote' => 'Sudah 2 tahun tinggal di Kos XYZ. Pelayanan ramah, kamar bersih, dan harga terjangkau. Lokasi strategis dekat pusat kota.',
                'foto' => null
            ],
            [
                'name' => 'Ahmad Fauzi',
                'role' => 'Mahasiswa UII',
                'quote' => 'Kamar nyaman dengan AC dan kamar mandi dalam. Harga sewa masuk akal dengan fasilitas yang diberikan. Recommended banget!',
                'foto' => null
            ],
        ];

        // ===== DATA FAQ =====
        $faqs = [
            [
                'question' => 'Bagaimana cara booking kamar?',
                'answer' => 'Anda bisa booking kamar melalui tombol WhatsApp di setiap kartu kamar atau halaman detail kamar. Admin akan merespon dalam waktu 1x24 jam.'
            ],
            [
                'question' => 'Apakah ada biaya tambahan selain sewa?',
                'answer' => 'Biaya sewa sudah termasuk listrik, air, dan WiFi. Untuk fasilitas tambahan seperti AC atau parkir kendaraan tambahan mungkin ada biaya ekstra.'
            ],
            [
                'question' => 'Berapa minimal masa sewa?',
                'answer' => 'Minimal masa sewa adalah 3 bulan. Untuk sewa bulanan bisa diperpanjang sesuai kesepakatan.'
            ],
            [
                'question' => 'Apakah kos ini dekat dengan kampus?',
                'answer' => 'Ya, Kos XYZ terletak di Jl. Kaliurang KM 5, dekat dengan UGM, UII, dan berbagai kampus lainnya di Yogyakarta.'
            ],
            [
                'question' => 'Bagaimana sistem pembayaran sewa?',
                'answer' => 'Pembayaran sewa dilakukan setiap bulan di tanggal yang disepakati. Kami menerima transfer bank dan cash.'
            ],
        ];

        // ===== AMBIL 3 ARTIKEL TERBARU UNTUK LANDING PAGE =====
        $artikels = Artikel::where('is_active', true)
            ->orderBy('tanggal_publikasi', 'desc')
            ->limit(3)
            ->get();

        return view('public.index', compact('kamars', 'testimonials', 'faqs', 'statuses', 'fasilitasList', 'artikels'));
    }

    public function kamar()
    {
        $kamars = Kamar::all();
        return view('public.kamar', compact('kamars'));
    }

    public function detailKamar($id)
    {
        $kamar = Kamar::findOrFail($id);
        $kamars = Kamar::all();
        return view('public.detail', compact('kamar', 'kamars'));
    }

    // ============================================================
    // ===== FITUR BLOG / ARTIKEL =====
    // ============================================================

    // ===== HALAMAN BLOG =====
    public function blog()
    {
        $artikels = Artikel::where('is_active', true)
            ->orderBy('tanggal_publikasi', 'desc')
            ->paginate(6);

        return view('public.blog', compact('artikels'));
    }

    // ===== DETAIL ARTIKEL =====
    public function detailArtikel($slug)
    {
        $artikel = Artikel::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $artikelTerbaru = Artikel::where('is_active', true)
            ->where('id', '!=', $artikel->id)
            ->orderBy('tanggal_publikasi', 'desc')
            ->limit(3)
            ->get();

        return view('public.detail-artikel', compact('artikel', 'artikelTerbaru'));
    }
}