<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tagihans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penyewa_id')->constrained()->onDelete('cascade');
            $table->string('bulan', 20);
            $table->year('tahun');
            $table->decimal('nominal', 12, 0);
            $table->decimal('biaya_tambahan', 12, 0)->default(0);
            $table->text('keterangan_tambahan')->nullable();
            $table->enum('status', ['Unpaid', 'Pending', 'Paid'])->default('Unpaid');
            $table->date('jatuh_tempo');
            $table->date('tanggal_bayar')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tagihans');
    }
};