<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_rekam_medis';
    protected $table = 'rekam_medis';
    public $timestamps = false;

    protected $fillable = [
        'id_pasien',
        'id_dokter',
        'diagnosa',
        'tanggal_kunjungan',
        'tindakan_medis',
        'id_obat',
    ];

    // Relasi ke model Pasien
    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id_pasien');
    }

    // Relasi ke model dokter
    public function dokter()
    {
        return $this->belongsTo(dokter::class, 'id_dokter', 'id_dokter');
    }

    // Relasi ke model Obat
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat', 'id_obat');
    }
}

