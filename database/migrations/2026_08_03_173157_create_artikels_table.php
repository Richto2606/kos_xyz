<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('artikels', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->text('deskripsi_singkat')->nullable();
            $table->longText('isi');
            $table->string('gambar')->nullable();
            $table->string('kategori')->default('Tips'); // Tips, Wisata, Event, Lainnya
            $table->string('penulis')->default('Admin');
            $table->date('tanggal_publikasi');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('artikels');
    }
};