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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id('id_pembayaran');
            $table->dateTime('waktu_pembayaran');
            $table->enum('status_pembayaran', ['Lunas', 'Belum']);
            $table->decimal('jumlah_pembayaran', 15, 0);
            $table->enum('metode_pembayaran', ['Tunai', 'Non-Tunai']);

            // Tambahkan kolom foreign key terlebih dahulu
            $table->unsignedBigInteger('id_pasien')->nullable();
            $table->unsignedBigInteger('id_kasir')->nullable();
            $table->unsignedBigInteger('id_obat')->nullable();

            // Definisikan relasi foreign key
            $table->foreign('id_pasien')
                  ->references('id_pasien')->on('pasien')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

            $table->foreign('id_kasir')
                  ->references('id_kasir')->on('kasir')
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
        Schema::table('pembayaran', function (Blueprint $table) {
            // Hapus foreign key
            $table->dropForeign(['id_pasien']);
            $table->dropForeign(['id_kasir']);
            $table->dropForeign(['id_obat']);
        });

        // Hapus tabel
        Schema::dropIfExists('pembayaran');
    }
};
