<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('permohonans', function (Blueprint $table) {
            $table->id('permohonan_id'); // Added primary key
            $table->unsignedInteger('pemohon_pelanggan_id');
            $table->unsignedInteger('jenis_id');
            $table->timestamps();

            $table->foreign('pemohon_pelanggan_id')
                ->references('pelanggan_id')
                ->on('pelanggan')
                ->onDelete('cascade');

            $table->foreign('jenis_id')
                ->references('jenis_id')
                ->on('jenis_surat')
                ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permohonans');
    }
};
