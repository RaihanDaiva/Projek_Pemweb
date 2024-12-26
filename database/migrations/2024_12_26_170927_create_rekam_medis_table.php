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
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->id('id_rekam_medis');
            $table->string('diagnosa');
            $table->date('tanggal_kunjungan');
            $table->string('tindakan_medis');

            // Tambahkan kolom foreign key terlebih dahulu
            $table->unsignedBigInteger('id_pasien')->nullable();
            $table->unsignedBigInteger('id_dokter')->nullable();
            $table->unsignedBigInteger('id_obat')->nullable();

            // Definisikan relasi foreign key
            $table->foreign('id_pasien')
                  ->references('id_pasien')->on('pasien')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

            $table->foreign('id_dokter')
                  ->references('id_dokter')->on('dokter')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

            $table->foreign('id_obat')
                  ->references('id_obat')->on('obat')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rekam_medis', function (Blueprint $table) {
            // Hapus foreign key
            $table->dropForeign(['id_pasien']);
            $table->dropForeign(['id_dokter']);
            $table->dropForeign(['id_obat']);
        });

        // Hapus tabel
        Schema::dropIfExists('rekam_medis');
    }
};
