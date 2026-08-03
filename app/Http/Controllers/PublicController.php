<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        if ($search) {
            $kamars = Kamar::where('nama', 'like', "%{$search}%")->get();
        } else {
            $kamars = Kamar::all();
        }

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

        return view('public.index', compact('kamars', 'testimonials', 'faqs'));
    }

    public function kamar()
    {
        $kamars = Kamar::all();
        return view('public.kamar', compact('kamars'));
    }

    public function detailKamar($id)
    {
        $kamar = Kamar::findOrFail($id);
        $kamars = Kamar::all(); // Untuk rekomendasi
        return view('public.detail', compact('kamar', 'kamars'));
    }
}