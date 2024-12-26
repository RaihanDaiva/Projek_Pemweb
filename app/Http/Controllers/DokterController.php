<?php

namespace App\Http\Controllers;


use Illuminate\Database\QueryException; // Untuk menangani error saat penghapusan
use App\Models\Dokter;
use Illuminate\Http\Request;
use View;

class DokterController extends Controller
{
    public function index()
    {
        // Mengambil data dokter dari database
        $dokter = Dokter::all(); // Mengambil semua data dari tabel dokter
    
        // Mengirim data ke view
        return view('dokter.index', compact('dokter'));
    }
    public function create()
    {
        return view('dokter.create');
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nama_dokter'     => 'required|max:50',
            'spesialisasi'     => 'required|max:50',
            'nomor_lisensi'   => 'required',
            'jadwal_praktek'     => 'required|max:50',
            'kontak'     => 'required|max:20'
        ]);

        //create post
        Dokter::create([
            'nama_dokter'     => $request->nama_dokter,
            'spesialisasi'     => $request->spesialisasi,
            'nomor_lisensi'   => $request->nomor_lisensi,
            'jadwal_praktek'   => $request->jadwal_praktek,
            'kontak'   => $request->kontak
        ]);

        //redirect to index
        return redirect()->route('dokter.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    public function edit(string $id)
    {
        //get post by ID
        $dokter = Dokter::where('id_dokter', $id)->firstOrFail();


        //render view with post
        return view('dokter.edit', compact('dokter'));
    }

    public function update(Request $request, $id)
    {
        // Validate form
        $this->validate($request, [
            'nama_dokter'     => 'required|max:50',
            'spesialisasi'     => 'required|max:50',
            'nomor_lisensi'   => 'required',
            'jadwal_praktek'     => 'required|max:50',
            'kontak'     => 'required|max:20'
        ]);
    
        // Get dokter by ID
        $dokter = Dokter::where('id_dokter', $id)->firstOrFail();
    
        // Update dokter data
        $dokter->update([
            'nama_dokter'     => $request->input('nama_dokter'),
            'spesialisasi'   => $request->input('spesialisasi'),
            'nomor_lisensi'   => $request->input('nomor_lisensi'),
            'jadwal_praktek'          => $request->input('jadwal_praktek'),
            'kontak'         => $request->input('kontak')
        ]);
    
        // Redirect to index with success message
        return redirect()->route('dokter.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    

    public function destroy($id)
    {
        try {
            // Mencari data dokter berdasarkan id
            $dokter = Dokter::where('id_dokter', $id)->firstOrFail();
            
            // Menghapus data dokter
            $dokter->delete();
    
            return redirect()->route('dokter.index')->with('success', 'dokter berhasil dihapus!');
        } catch (QueryException $e) {
            // Jika error karena foreign key constraint
            return redirect()->route('dokter.index')->with('error', 'Data ini tidak bisa dihapus karena masih terkait dengan data lain.');
        }
    }

    
}
