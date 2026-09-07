<?php

namespace Database\Seeders;

use App\Models\Artikel;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ArtikelSeeder extends Seeder
{
    public function run(): void
    {
        $artikels = [
            [
                'judul' => '7 Tips Menjaga Kamar Kos Tetap Bersih dan Nyaman',
                'slug' => 'tips-menjaga-kamar-kos-tetap-bersih',
                'deskripsi_singkat' => 'Kamar kos yang bersih dan nyaman adalah kunci kenyamanan tinggal. Berikut 7 tips yang bisa Anda terapkan.',
                'isi' => '<p>Kamar kos yang bersih dan nyaman adalah kunci kenyamanan tinggal. Berikut 7 tips yang bisa Anda terapkan:</p>
                          <ol>
                              <li><strong>Rutin Membersihkan Kamar</strong> - Lakukan pembersihan minimal seminggu sekali.</li>
                              <li><strong>Jaga Sirkulasi Udara</strong> - Buka jendela setiap pagi untuk udara segar.</li>
                              <li><strong>Atur Barang dengan Rapi</strong> - Gunakan rak atau kotak penyimpanan.</li>
                              <li><strong>Buang Sampah Setiap Hari</strong> - Jangan biarkan sampah menumpuk.</li>
                              <li><strong>Cuci Sprei dan Sarung Bantal Rutin</strong> - Minimal 2 minggu sekali.</li>
                              <li><strong>Hindari Makan di Kamar</strong> - Bisa menarik serangga dan tikus.</li>
                              <li><strong>Gunakan Pengharum Ruangan</strong> - Buat kamar selalu wangi dan segar.</li>
                          </ol>
                          <p>Dengan menerapkan tips di atas, kamar kos Anda akan selalu nyaman dan sehat.</p>',
                'kategori' => 'Tips',
                'penulis' => 'Admin Kos XYZ',
                'tanggal_publikasi' => Carbon::now()->subDays(2),
                'is_active' => true,
            ],
            [
                'judul' => '10 Tempat Wisata Wajib di Yogyakarta',
                'slug' => '10-tempat-wisata-wajib-di-yogyakarta',
                'deskripsi_singkat' => 'Yogyakarta memiliki banyak tempat wisata menarik. Berikut 10 rekomendasi yang wajib Anda kunjungi.',
                'isi' => '<p>Yogyakarta memiliki banyak tempat wisata menarik. Berikut 10 rekomendasi yang wajib Anda kunjungi:</p>
                          <ul>
                              <li><strong>Candi Borobudur</strong> - Candi Buddha terbesar di dunia.</li>
                              <li><strong>Candi Prambanan</strong> - Candi Hindu yang megah.</li>
                              <li><strong>Malioboro</strong> - Pusat kuliner dan oleh-oleh.</li>
                              <li><strong>Taman Sari</strong> - Bekas taman kerajaan.</li>
                              <li><strong>Pantai Parangtritis</strong> - Pantai dengan pemandangan sunset.</li>
                              <li><strong>Gunung Merapi</strong> - Pendakian dan jeep adventure.</li>
                              <li><strong>Kraton Yogyakarta</strong> - Istana kerajaan yang bersejarah.</li>
                              <li><strong>Heha Sky View</strong> - Spot foto dengan pemandangan kota.</li>
                              <li><strong>Kebun Buah Mangunan</strong> - Wisata alam dan perkebunan.</li>
                              <li><strong>Desa Wisata Pentingsari</strong> - Wisata alam dan budaya.</li>
                          </ul>
                          <p>Jangan lupa mencicipi kuliner khas Yogyakarta seperti gudeg, bakpia, dan sate klathak!</p>',
                'kategori' => 'Wisata',
                'penulis' => 'Tim Kos XYZ',
                'tanggal_publikasi' => Carbon::now()->subDays(5),
                'is_active' => true,
            ],
            [
                'judul' => 'Agenda Kegiatan Kos XYZ Bulan Ini',
                'slug' => 'agenda-kegiatan-kos-xyz-bulan-ini',
                'deskripsi_singkat' => 'Berbagai kegiatan menarik akan diadakan di Kos XYZ bulan ini. Yuk ikuti!',
                'isi' => '<p>Berbagai kegiatan menarik akan diadakan di Kos XYZ bulan ini:</p>
                          <ul>
                              <li><strong>Senam Pagi Bersama</strong> - Setiap Sabtu pagi di halaman kos.</li>
                              <li><strong>Nobar Film</strong> - Setiap Minggu malam di ruang bersama.</li>
                              <li><strong>Bedah Buku</strong> - Diskusi buku setiap 2 minggu sekali.</li>
                              <li><strong>Kelas Memasak</strong> - Belajar masak masakan sederhana.</li>
                              <li><strong>Jalan Sehat</strong> - Rute Kaliurang setiap Minggu pagi.</li>
                              <li><strong>Gotong Royong</strong> - Bersih-bersih lingkungan kos.</li>
                          </ul>
                          <p>Daftarkan diri Anda ke admin untuk mengikuti kegiatan-kegiatan seru ini!</p>',
                'kategori' => 'Event',
                'penulis' => 'Admin Kos XYZ',
                'tanggal_publikasi' => Carbon::now()->subDays(1),
                'is_active' => true,
            ],
            [
                'judul' => 'Kuliner Khas Yogyakarta yang Wajib Dicoba',
                'slug' => 'kuliner-khas-yogyakarta-yang-wajib-dicoba',
                'deskripsi_singkat' => 'Yogyakarta adalah surga kuliner. Berikut 5 makanan khas yang wajib dicoba.',
                'isi' => '<p>Yogyakarta adalah surga kuliner. Berikut 5 makanan khas yang wajib dicoba:</p>
                          <ul>
                              <li><strong>Gudeg</strong> - Makanan dari nangka muda dengan kuah santan.</li>
                              <li><strong>Bakpia</strong> - Kue kering isi kacang hijau.</li>
                              <li><strong>Sate Klathak</strong> - Sate kambing dengan tusuk besi.</li>
                              <li><strong>Nasi Kucing</strong> - Nasi kecil dengan lauk sederhana.</li>
                              <li><strong>Wedang Ronde</strong> - Minuman hangat dengan bola-bola ketan.</li>
                          </ul>
                          <p>Jangan lewatkan kesempatan mencicipi kuliner khas Yogyakarta selama tinggal di Kos XYZ!</p>',
                'kategori' => 'Kuliner',
                'penulis' => 'Tim Kos XYZ',
                'tanggal_publikasi' => Carbon::now()->subDays(3),
                'is_active' => true,
            ],
        ];

        $gambar = [
            'https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?auto=format&fit=crop&w=900&q=80',
            'https://images.unsplash.com/photo-1500534623283-312a7839dbb5?auto=format&fit=crop&w=900&q=80',
            'https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=900&q=80',
            'https://images.unsplash.com/photo-1552566626-52f8b828?auto=format&fit=crop&w=900&q=80',
        ];

        foreach ($artikels as $index => $artikel) {
            $artikel['gambar'] = $gambar[$index];
            Artikel::updateOrCreate(['slug' => $artikel['slug']], $artikel);
        }
    }
}