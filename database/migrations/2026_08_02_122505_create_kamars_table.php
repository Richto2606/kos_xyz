<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kamars', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 20); // Kamar A, B, C, dst
            $table->decimal('harga', 12, 0)->default(1000000);
            $table->text('fasilitas')->nullable();
            $table->text('deskripsi')->nullable();
            $table->enum('status', ['Tersedia', 'Penuh', 'Maintenance'])->default('Tersedia');
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kamars');
    }
};