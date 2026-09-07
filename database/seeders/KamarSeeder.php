<?php

namespace Database\Seeders;

use App\Models\Kamar;
use Illuminate\Database\Seeder;

class KamarSeeder extends Seeder
{
    public function run(): void
    {
        $kamars = [
            ['nama' => 'Kamar A', 'harga' => 1000000, 'fasilitas' => 'AC, KM Dalam, Meja, Kursi, Lemari, Tempat Tidur', 'deskripsi' => 'Kamar nyaman dengan fasilitas lengkap', 'status' => 'Tersedia', 'gambar' => 'https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?auto=format&fit=crop&w=600&q=80'],
            ['nama' => 'Kamar B', 'harga' => 1000000, 'fasilitas' => 'AC, KM Dalam, Meja, Kursi, Lemari, Tempat Tidur', 'deskripsi' => 'Kamar nyaman dengan fasilitas lengkap', 'status' => 'Tersedia', 'gambar' => 'https://images.unsplash.com/photo-1505691938895-1758d7feb511?auto=format&fit=crop&w=600&q=80'],
            ['nama' => 'Kamar C', 'harga' => 1000000, 'fasilitas' => 'AC, KM Dalam, Meja, Kursi, Lemari, Tempat Tidur', 'deskripsi' => 'Kamar nyaman dengan fasilitas lengkap', 'status' => 'Tersedia', 'gambar' => 'https://images.unsplash.com/photo-1582719508461-905c673771fd?auto=format&fit=crop&w=600&q=80'],
            ['nama' => 'Kamar D', 'harga' => 1000000, 'fasilitas' => 'AC, KM Dalam, Meja, Kursi, Lemari, Tempat Tidur', 'deskripsi' => 'Kamar nyaman dengan fasilitas lengkap', 'status' => 'Penuh', 'gambar' => 'https://images.unsplash.com/photo-1598928506311-c55ded91a20c?auto=format&fit=crop&w=600&q=80'],
            ['nama' => 'Kamar E', 'harga' => 1000000, 'fasilitas' => 'AC, KM Dalam, Meja, Kursi, Lemari, Tempat Tidur', 'deskripsi' => 'Kamar nyaman dengan fasilitas lengkap', 'status' => 'Maintenance', 'gambar' => 'https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?auto=format&fit=crop&w=600&q=80'],
        ];

        foreach ($kamars as $kamar) {
            Kamar::updateOrCreate(
                ['nama' => $kamar['nama']],
                [
                    'harga' => $kamar['harga'],
                    'fasilitas' => $kamar['fasilitas'],
                    'deskripsi' => $kamar['deskripsi'],
                    'status' => $kamar['status'],
                    'gambar' => $kamar['gambar'] ?? null,
                ]
            );
        }
    }
}