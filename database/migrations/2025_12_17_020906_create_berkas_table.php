<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('berkas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('permohonan_id'); // Changed from pemohon_pelanggan_id
            $table->string('nama_berkas');
            $table->boolean('valid')->default(0);
            $table->timestamps();

            $table->foreign('permohonan_id')
                ->references('permohonan_id') // Reference the PK in permohonans
                ->on('permohonans')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('berkas');
    }
};


