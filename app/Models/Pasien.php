<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pasien';
    protected $table = 'pasien';
    public $timestamps = false;
    protected $fillable = [
        'id', //foreign key
        'nama_pasien',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'no_telp',
        'riwayat_penyakit',
        'riwayat_pengobatan',
        'id',
    ];

    #relasi ke model user
    
}
