<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_dokter';
    protected $table = 'dokter';
    public $timestamps = false;
    protected $fillable = [
        'nama_dokter',
        'spesialisasi',
        'nomor_lisensi',
        'jadwal_praktek',
        'kontak',
    ];
}
