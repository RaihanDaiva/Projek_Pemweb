<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Perawat;
use App\Models\Pembayaran;
use App\Models\RekamMedis;
use App\Models\Kasir;
use App\Models\Obat;
use App\Models\User;


class AdminController extends Controller
{
        public function index()
    {
        $totalDokter = Dokter::count(); // Menghitung total data Dokter
        $totalPerawat = Perawat::count(); // Menghitung total data Perawat
        $totalPasien = Pasien::count(); // Menghitung total data pasien
        $totalPembayaran = Pembayaran::count(); // Menghitung total data Pembayaran
        $totalRekamMedis = RekamMedis::count(); // Menghitung total data RekamMedis
        $totalKasir = Kasir::count(); // Menghitung total data Kasir
        $totalObat = Obat::count(); // Menghitung total data Obat
        $totalUser = User::count(); // Menghitung total data User
        return view('admin.index', compact('totalPasien', 'totalDokter','totalPerawat','totalPembayaran','totalRekamMedis','totalKasir','totalObat','totalUser'));
    }

}
