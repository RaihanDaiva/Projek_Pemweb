<?php

namespace App\Http\Controllers;

use App\Models\Perawat;
use Illuminate\Http\Request;
use View;

class PerawatController extends Controller
{
    public function index()
    {
        // Mengambil data dokter dari database
        $perawat = Perawat::all(); // Mengambil semua data dari tabel perawat
    
        // Mengirim data ke view
        return view('perawat.index', compact('perawat'));
    }
    public function create()
    {
        return view('perawat.create');
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nama_perawat'     => 'required|max:50',
            'nomor_lisensi'   => 'required|max:20',
            'jadwal_kerja'     => 'required|max:50',
            'pengalaman'     => 'required|max:50',
            'kontak'     => 'required|max:20'
        ]);

        //create post
        Perawat::create([
            'nama_perawat'     => $request->nama_perawat,
            'nomor_lisensi'   => $request->nomor_lisensi,
            'jadwal_kerja'     => $request->jadwal_kerja,
            'pengalaman'   => $request->pengalaman,
            'kontak'   => $request->kontak
        ]);

        //redirect to index
        return redirect()->route('perawat.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    public function edit(string $id)
    {
        //get post by ID
        $perawat = Perawat::where('id_perawat', $id)->firstOrFail();


        //render view with post
        return view('perawat.edit', compact('perawat'));
    }

    public function update(Request $request, $id)
    {
        // Validate form
        $this->validate($request, [
            'nama_perawat'     => 'required|max:50',
            'nomor_lisensi'   => 'required|max:20',
            'jadwal_kerja'     => 'required|max:50',
            'pengalaman'     => 'required|max:50',
            'kontak'     => 'required|max:20'
        ]);
    
        // Get perawat by ID
        $perawat = Perawat::where('id_perawat', $id)->firstOrFail();
    
        // Update perawat data
        $perawat->update([
            'nama_perawat'     => $request->input('nama_perawat'),
            'nomor_lisensi'   => $request->input('nomor_lisensi'),
            'jadwal_kerja'   => $request->input('jadwal_kerja'),
            'pengalaman'          => $request->input('pengalaman'),
            'kontak'         => $request->input('kontak')
        ]);
    
        // Redirect to index with success message
        return redirect()->route('perawat.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    

    public function destroy($id)
    {
        // Temukan perawat berdasarkan ID
        $perawat = Perawat::where('id_perawat', $id)->firstOrFail();
        
        // Hapus perawat
        $perawat->delete();
        
        // Redirect ke halaman yang sesuai setelah penghapusan
        return redirect()->route('perawat.index')->with('success', 'Data perawat berhasil dihapus.');
    }

    
}
