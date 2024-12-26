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
        Schema::create('perawat', function (Blueprint $table) {
            $table->id('id_perawat');
            $table->string('nama_perawat', 50);
            $table->string('nomor_lisensi', 50);
            $table->string('jadwal_kerja', 50);
            $table->string('pengalaman', 50);
            $table->string('kontak', 20);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perawat');
    }
};
