<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_obat';
    protected $table = 'obat';
    public $timestamps = false;

    protected $fillable = [
        'nama_obat',
        'harga_obat',
    ];

    /**
     * Relasi ke tabel Pembayaran
     * Satu obat dapat digunakan dalam banyak pembayaran.
     */
    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'id_obat', 'id_obat');
    }
}
