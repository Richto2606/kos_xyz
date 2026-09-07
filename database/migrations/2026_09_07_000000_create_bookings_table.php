<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->foreignId('kamar_id')->constrained('kamars')->restrictOnDelete();
            $table->string('nama_lengkap');
            $table->string('no_hp', 20);
            $table->string('email')->nullable();
            $table->date('tanggal_masuk');
            $table->unsignedInteger('durasi_bulan')->default(1);
            $table->enum('status', ['Menunggu', 'Dikonfirmasi', 'Ditolak', 'Selesai'])->default('Menunggu');
            $table->text('catatan')->nullable();
            $table->text('alasan_penolakan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
