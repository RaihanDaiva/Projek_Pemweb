<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perawat extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_perawat';
    protected $table = 'perawat';
    public $timestamps = false;
    protected $fillable = [
        'nama_perawat',
        'nomor_lisensi',
        'jadwal_kerja',
        'pengalaman',
        'kontak',
    ];

}
