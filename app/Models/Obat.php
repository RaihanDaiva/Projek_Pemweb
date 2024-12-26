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

}
