<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fasilitas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('icon')->nullable(); // Font Awesome icon class
            $table->text('deskripsi')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });

        // Insert default data
        DB::table('fasilitas')->insert([
            ['nama' => 'Dapur bersama', 'icon' => 'fa-utensils', 'urutan' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'WiFi 100 Mbps', 'icon' => 'fa-wifi', 'urutan' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Parkir luas', 'icon' => 'fa-parking', 'urutan' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'CCTV 24 jam', 'icon' => 'fa-video', 'urutan' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Ruang cuci', 'icon' => 'fa-tint', 'urutan' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Keamanan 24 jam', 'icon' => 'fa-shield-alt', 'urutan' => 6, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('fasilitas');
    }
};