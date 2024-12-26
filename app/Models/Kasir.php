<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasir extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_kasir';
    protected $table = 'kasir';
    public $timestamps = false;
    protected $fillable = [
        'nama_kasir',
        'jadwal_kerja',
        'kontak',
    ];

}
