<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('posts', function (Blueprint $table) {
        $table->id('id_dokter'); // Primary key
        $table->string('nama_dokter', 50); // Kolom nama_dokter
        $table->string('spesialisasi', 50); // Kolom spesialisasi
        $table->string('nomor_lisensi', 50); // Kolom nomor_lisensi
        $table->text('jadwal_praktek'); // Kolom jadwal_praktek
        $table->string('kontak', 50); // Kolom kontak
        $table->binary('foto')->nullable(); // Kolom foto (longblob)
        $table->timestamps(); // Kolom created_at dan updated_at
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
