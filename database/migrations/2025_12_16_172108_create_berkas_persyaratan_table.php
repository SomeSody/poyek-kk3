<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('berkas_persyaratan', function (Blueprint $table) {
            $table->id('berkas_id');
            $table->foreignId('permohonan_id')->constrained('permohonan_surat', 'permohonan_id')->onDelete('cascade');
            $table->string('nama_berkas');
            $table->boolean('valid')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berkas_persyaratan');
    }
};