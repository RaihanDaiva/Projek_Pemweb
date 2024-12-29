<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pembayaran';
    protected $table = 'pembayaran';
    public $timestamps = false;

    protected $fillable = [
        'waktu_pembayaran',
        'status_pembayaran',
        'jumlah_pembayaran',
        'metode_pembayaran',
        'id_pasien',
        'id_kasir',
        'id_obat',
        'jumlah_obat', // Tambahkan jika belum ada
    ];

    // Relasi ke model Pasien
    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id_pasien');
    }

    // Relasi ke model Kasir
    public function kasir()
    {
        return $this->belongsTo(Kasir::class, 'id_kasir', 'id_kasir');
    }

    // Relasi ke model Obat
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat', 'id_obat');
    }

    // Event Eloquent
    public static function boot()
    {
        parent::boot();

        // Event before insert
        static::creating(function ($pembayaran) {
            $pembayaran->jumlah_pembayaran = self::calculateJumlahPembayaran($pembayaran->jumlah_obat, $pembayaran->id_obat);
        });

        // Event before update
        static::updating(function ($pembayaran) {
            $pembayaran->jumlah_pembayaran = self::calculateJumlahPembayaran($pembayaran->jumlah_obat, $pembayaran->id_obat);
        });
    }

    // Fungsi untuk menghitung jumlah pembayaran
    public static function calculateJumlahPembayaran($jumlah_obat, $id_obat)
    {
        // Pastikan model Obat digunakan di namespace yang sesuai
        $harga_obat = Obat::find($id_obat)->harga_obat ?? 0;
        return $jumlah_obat * $harga_obat;
    }
}
