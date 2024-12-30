<?php

namespace App\Http\Controllers;


use App\Models\Dokter;
use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Pembayaran;
use App\Models\RekamMedis;
use Illuminate\Http\Request;
use Auth;
use Auth;
use View;

class RekamMedisController extends Controller
{
    public function index_rekam_medis()
    {
        // Fetch the Pasien model instance where the user ID matches
        $pasien = Pasien::where('id', Auth::user()->id)->firstOrFail();  // Use firstOrFail to get a model instance or fail

        // Fetch the Pembayaran based on the id_pasien from the Pasien model
        $rekam_medis = RekamMedis::where('id_pasien', $pasien->id_pasien)->get();  // Access id_pasien here
        

        // Send data to the view
        return view('customer.rekam_medis', compact('rekam_medis'));
    }

    public function index()
    {
        // Mengambil data dokter dari database
        $rekam_medis = RekamMedis::all(); // Mengambil semua data dari tabel rekam_medis
    
        // Mengirim data ke view
        return view('rekam_medis.index', compact('rekam_medis'));
    }

    // use Carbon\Carbon; // Pastikan Anda sudah mengimport Carbon

    public function create()
    {
        $pasienList = Pasien::all(); // Ambil semua data pasien
        $dokterList = Dokter::all();   // Ambil semua data Dokter
        $obatList = Obat::all();     // Ambil semua data obat

        return view('rekam_medis.create', compact('pasienList', 'dokterList', 'obatList'));
    }

    public function store(Request $request)
    {
        // Validasi form
        $this->validate($request, [
            'diagnosa'              => 'required',
            'tanggal_kunjungan'     => 'required|date',  // Validasi tanggal
            'tindakan_medis'        => 'required',
            'id_pasien'             => 'required|',
            'id_dokter'             => 'required|',
            'id_obat'               => 'required|',
        ]);

        // Membuat rekam_medis baru
        RekamMedis::create([
            'diagnosa'              => $request->diagnosa,
            'tanggal_kunjungan'     => $request->tanggal_kunjungan,   // Menyimpan datetime yang digabung
            'tindakan_medis'        => $request->tindakan_medis,
            'id_pasien'             => $request->id_pasien,
            'id_dokter'             => $request->id_dokter,
            'id_obat'               => $request->id_obat,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('rekam_medis.index')->with(['success' => 'Data Rekam Medis Berhasil Disimpan!']);
    }

    public function edit(string $id)
    {
        //get post by ID
        $rekam_medis = RekamMedis::where('id_rekam_medis', $id)->firstOrFail();
        $pasienList = Pasien::all(); // Ambil semua data pasien
        $dokterList = Dokter::all(); // Ambil semua data Dokter
        $obatList = Obat::all(); // Ambil semua data obat

        //render view with post
        return view('rekam_medis.edit', compact('rekam_medis', 'pasienList', 'dokterList', 'obatList'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data dari form
        $this->validate($request, [
            'diagnosa'              => 'required',
            'tanggal_kunjungan'     => 'required|date',  // Validasi tanggal
            'tindakan_medis'        => 'required',
            'id_pasien'             => 'required|',
            'id_dokter'             => 'required|',
            'id_obat'               => 'required|',
        ]);

        // Ambil data rekam_medis berdasarkan ID
        $rekam_medis = RekamMedis::findOrFail($id);

        // Update data rekam_medis
        $rekam_medis->update([
            'diagnosa'              => $request->diagnosa,
            'tanggal_kunjungan'     => $request->tanggal_kunjungan,   // Menyimpan datetime yang digabung
            'tindakan_medis'        => $request->tindakan_medis,
            'id_pasien'             => $request->id_pasien,
            'id_dokter'             => $request->id_dokter,
            'id_obat'               => $request->id_obat,
        ]);

        // Redirect kembali ke index dengan pesan sukses
        return redirect()->route('rekam_medis.index')->with(['success' => 'Data Rekam Medis berhasil diubah!']);
    }

    public function destroy($id)
    {
        // Temukan rekam_medis berdasarkan ID
        $rekam_medis = RekamMedis::where('id_rekam_medis', $id)->firstOrFail();
        
        // Hapus rekam_medis
        $rekam_medis->delete();
        
        // Redirect ke halaman yang sesuai setelah penghapusan
        return redirect()->route('rekam_medis.index')->with('success', 'Data Rekam Medis berhasil dihapus.');
    }

    // public function updateStatus($id)
    // {
    //     $rekam_medis = RekamMedis::findOrFail($id);
    //     $rekam_medis->diagnosa = 'Lunas';
    //     $rekam_medis->save();

    //     return redirect()->route('rekam_medis.index')->with('success', 'Status Rekam Medis berhasil diperbarui!');
    // }
}
