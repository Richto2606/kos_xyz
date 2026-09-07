<?php

namespace Database\Seeders;

use App\Models\Kamar;
use App\Models\Penyewa;
use App\Models\Tagihan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DemoDataSeeder extends Seeder
{
    public function run(): void
    {
        $kamars = Kamar::all()->keyBy('nama');
        $kamarData = [
            ['nama' => 'Kamar F', 'harga' => 1250000, 'fasilitas' => 'AC, KM Dalam, Meja, Kursi, Lemari, Tempat Tidur', 'deskripsi' => 'Kamar nyaman untuk mahasiswa dan pekerja.', 'status' => 'Tersedia', 'gambar' => 'https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?auto=format&fit=crop&w=900&q=80'],
            ['nama' => 'Kamar G', 'harga' => 1100000, 'fasilitas' => 'Kipas, KM Dalam, Meja, Lemari, Tempat Tidur', 'deskripsi' => 'Kamar tenang dengan pencahayaan alami.', 'status' => 'Tersedia', 'gambar' => 'https://images.unsplash.com/photo-1505691938895-1758d7feb511?auto=format&fit=crop&w=900&q=80'],
            ['nama' => 'Kamar H', 'harga' => 1500000, 'fasilitas' => 'AC, KM Dalam, WiFi, TV, Lemari, Tempat Tidur', 'deskripsi' => 'Kamar premium dengan fasilitas lengkap.', 'status' => 'Penuh', 'gambar' => 'https://images.unsplash.com/photo-1582719508461-905c673771fd?auto=format&fit=crop&w=900&q=80'],
            ['nama' => 'Kamar I', 'harga' => 950000, 'fasilitas' => 'Kipas, KM Luar, Meja, Kursi, Tempat Tidur', 'deskripsi' => 'Pilihan hemat dengan lokasi strategis.', 'status' => 'Maintenance', 'gambar' => 'https://images.unsplash.com/photo-1598928506311-c55ded91a20c?auto=format&fit=crop&w=900&q=80'],
        ];

        foreach ($kamarData as $data) {
            Kamar::updateOrCreate(['nama' => $data['nama']], $data);
        }

        $kamars = Kamar::all()->keyBy('nama');
        $penyewaData = [
            ['nama_lengkap' => 'Andi Pratama', 'ktp' => '3471010101010001', 'no_hp' => '081234567801', 'kontak_darurat' => '081234567811', 'pekerjaan' => 'Mahasiswa', 'kamar_id' => $kamars['Kamar A']->id, 'tanggal_mulai_sewa' => '2026-01-01', 'tanggal_berakhir_sewa' => null, 'status' => 'Aktif', 'catatan' => 'Pembayaran selalu tepat waktu.'],
            ['nama_lengkap' => 'Dewi Lestari', 'ktp' => '3471010101010002', 'no_hp' => '081234567802', 'kontak_darurat' => '081234567812', 'pekerjaan' => 'Karyawan Swasta', 'kamar_id' => $kamars['Kamar B']->id, 'tanggal_mulai_sewa' => '2025-11-15', 'tanggal_berakhir_sewa' => null, 'status' => 'Aktif', 'catatan' => 'Memiliki kendaraan roda dua.'],
            ['nama_lengkap' => 'Rizky Maulana', 'ktp' => '3471010101010003', 'no_hp' => '081234567803', 'kontak_darurat' => '081234567813', 'pekerjaan' => 'Freelancer', 'kamar_id' => $kamars['Kamar C']->id, 'tanggal_mulai_sewa' => '2026-02-01', 'tanggal_berakhir_sewa' => null, 'status' => 'Aktif', 'catatan' => null],
            ['nama_lengkap' => 'Salsa Amelia', 'ktp' => '3471010101010004', 'no_hp' => '081234567804', 'kontak_darurat' => '081234567814', 'pekerjaan' => 'Mahasiswa', 'kamar_id' => $kamars['Kamar D']->id, 'tanggal_mulai_sewa' => '2025-08-01', 'tanggal_berakhir_sewa' => null, 'status' => 'Aktif', 'catatan' => 'Kontak utama melalui WhatsApp.'],
            ['nama_lengkap' => 'Bagus Saputra', 'ktp' => '3471010101010005', 'no_hp' => '081234567805', 'kontak_darurat' => '081234567815', 'pekerjaan' => 'Desainer', 'kamar_id' => $kamars['Kamar E']->id, 'tanggal_mulai_sewa' => '2025-05-01', 'tanggal_berakhir_sewa' => '2026-04-30', 'status' => 'Non-Aktif', 'catatan' => 'Kontrak selesai.'],
        ];

        foreach ($penyewaData as $data) {
            Penyewa::updateOrCreate(['ktp' => $data['ktp']], $data);
        }

        foreach (Penyewa::where('status', 'Aktif')->get() as $penyewa) {
            $bulan = now()->format('F');
            Tagihan::updateOrCreate(
                ['penyewa_id' => $penyewa->id, 'bulan' => $bulan, 'tahun' => now()->year],
                ['nominal' => $penyewa->kamar->harga, 'biaya_tambahan' => 0, 'keterangan_tambahan' => null, 'status' => $penyewa->id % 3 === 0 ? 'Pending' : 'Paid', 'jatuh_tempo' => now()->startOfMonth()->addDays(9), 'tanggal_bayar' => $penyewa->id % 3 === 0 ? null : now()->startOfMonth()->addDays(2)]
            );
        }

        $fasilitas = [
            ['nama' => 'Dapur bersama', 'icon' => 'fa-utensils', 'deskripsi' => 'Dapur bersama dengan peralatan dasar.', 'urutan' => 1],
            ['nama' => 'WiFi 100 Mbps', 'icon' => 'fa-wifi', 'deskripsi' => 'Internet cepat di area kos.', 'urutan' => 2],
            ['nama' => 'Parkir luas', 'icon' => 'fa-parking', 'deskripsi' => 'Area parkir aman untuk penghuni.', 'urutan' => 3],
            ['nama' => 'CCTV 24 jam', 'icon' => 'fa-video', 'deskripsi' => 'Pemantauan keamanan sepanjang hari.', 'urutan' => 4],
            ['nama' => 'Ruang cuci', 'icon' => 'fa-tint', 'deskripsi' => 'Area cuci bersama yang bersih.', 'urutan' => 5],
            ['nama' => 'Keamanan 24 jam', 'icon' => 'fa-shield-alt', 'deskripsi' => 'Lingkungan kos aman dan nyaman.', 'urutan' => 6],
        ];

        foreach ($fasilitas as $data) {
            DB::table('fasilitas')->updateOrInsert(['nama' => $data['nama']], $data + ['is_active' => true, 'updated_at' => now(), 'created_at' => now()]);
        }

        $pengaturan = [
            'nama_kos' => 'Kos XYZ',
            'alamat' => 'Jl. Kaliurang KM 5, Yogyakarta',
            'nomor_whatsapp' => '628123456789',
            'email' => 'admin@kosxyz.test',
            'deskripsi' => 'Kos nyaman, aman, dan strategis dekat kampus.',
        ];

        foreach ($pengaturan as $key => $value) {
            DB::table('pengaturans')->updateOrInsert(['key' => $key], ['value' => $value, 'updated_at' => now(), 'created_at' => now()]);
        }
    }
}
