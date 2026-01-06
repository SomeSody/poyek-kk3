<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jenis_surat', function (Blueprint $table) {
            $table->id('jenis_id');
            $table->string('kode', 50)->unique();
            $table->string('nam_jenis', 100);
            $table->json('syarat_json')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jenis_surat');
    }
};