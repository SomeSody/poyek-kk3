<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('riwayat', function (Blueprint $table) {
            $table->id('riwayat_id');
            $table->unsignedBigInteger('permohonan_id');
            $table->string('status');
            $table->unsignedInteger('petugas_pelanggan_id'); // Changed to match pelanggan PK type
            $table->dateTime('waktu')->useCurrent();
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('permohonan_id')
                ->references('permohonan_id') // Changed from 'id'
                ->on('permohonans')
                ->onDelete('cascade');

            $table->foreign('petugas_pelanggan_id')
                ->references('pelanggan_id')
                ->on('pelanggan')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('riwayat');
    }
};

