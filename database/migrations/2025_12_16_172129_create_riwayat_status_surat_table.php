<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('riwayat_status_surat', function (Blueprint $table) {
            $table->id('riwayat_id');
            $table->foreignId('permohonan_id')->constrained('permohonan_surat', 'permohonan_id');
            $table->enum('status', ['draft', 'diajukan', 'diproses', 'selesai', 'ditolak']);
            $table->foreignId('petugas_warga_id')->nullable()->constrained('warga', 'warga_id');
            $table->timestamp('waktu')->useCurrent();
            $table->text('keterangan')->nullable();
            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('riwayat_status_surat');
    }
};