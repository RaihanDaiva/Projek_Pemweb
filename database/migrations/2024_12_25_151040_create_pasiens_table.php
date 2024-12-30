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
        Schema::create('pasien', function (Blueprint $table) {
            $table->id('id_pasien');
            $table->string('nama_pasien', 50)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->string('alamat', 50)->nullable();
            $table->string('no_telp', 20)->nullable();
            $table->string('riwayat_penyakit', 50)->nullable();
            $table->string('riwayat_pengobatan', 50)->nullable();

            $table->unsignedBigInteger('id');

            $table->foreign('id')
                  ->references('id')->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pasien', function (Blueprint $table) {
            // Hapus foreign key terlebih dahulu sebelum drop tabel
            $table->dropForeign(['id']);
        });

        // Hapus tabel pasien
        Schema::dropIfExists('pasien');
    }
};
