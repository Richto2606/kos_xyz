<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penyewas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('ktp', 20)->unique();
            $table->string('no_hp', 15);
            $table->string('kontak_darurat', 15)->nullable();
            $table->string('pekerjaan')->nullable();
            $table->foreignId('kamar_id')->constrained()->onDelete('cascade');
            $table->date('tanggal_mulai_sewa');
            $table->date('tanggal_berakhir_sewa')->nullable();
            $table->enum('status', ['Aktif', 'Non-Aktif'])->default('Aktif');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penyewas');
    }
};