<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permohonan_surat', function (Blueprint $table) {
            $table->id('permohonan_id');
            $table->string('nomor_pemohonan', 50)->unique();
            $table->foreignId('pemohon_warga_id')->constrained('warga', 'warga_id');
            $table->foreignId('jenis_id')->constrained('jenis_surat', 'jenis_id');
            $table->date('tanggal_pengajuan');
            $table->enum('status', ['draft', 'diajukan', 'diproses', 'selesai', 'ditolak'])->default('draft');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('permohonan_surat');
    }
};