<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException; // Untuk menangani error saat penghapusan
use App\Models\Kasir;
use Illuminate\Http\Request;
use View;

class KasirController extends Controller
{
    public function index()
    {
        // Mengambil data dokter dari database
        $kasir = Kasir::all(); // Mengambil semua data dari tabel kasir
    
        // Mengirim data ke view
        return view('kasir.index', compact('kasir'));
    }
    public function create()
    {
        return view('kasir.create');
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nama_kasir'     => 'required|max:50',
            'jadwal_kerja'     => 'required|max:50',
            'kontak'     => 'required|max:20'
        ]);

        //create post
        Kasir::create([
            'nama_kasir'     => $request->nama_kasir,
            'jadwal_kerja'     => $request->jadwal_kerja,
            'kontak'   => $request->kontak
        ]);

        //redirect to index
        return redirect()->route('kasir.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    public function edit(string $id)
    {
        //get post by ID
        $kasir = Kasir::where('id_kasir', $id)->firstOrFail();


        //render view with post
        return view('kasir.edit', compact('kasir'));
    }

    public function update(Request $request, $id)
    {
        // Validate form
        $this->validate($request, [
            'nama_kasir'     => 'required|max:50',
            'jadwal_kerja'     => 'required|max:50',
            'kontak'     => 'required|max:20'
        ]);
    
        // Get kasir by ID
        $kasir = Kasir::where('id_kasir', $id)->firstOrFail();
    
        // Update kasir data
        $kasir->update([
            'nama_kasir'     => $request->input('nama_kasir'),
            'jadwal_kerja'   => $request->input('jadwal_kerja'),
            'kontak'         => $request->input('kontak')
        ]);
    
        // Redirect to index with success message
        return redirect()->route('kasir.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    

    public function destroy($id)
    {
        try {
            // Mencari data kasir berdasarkan id
            $kasir = Kasir::where('id_kasir', $id)->firstOrFail();
            
            // Menghapus data kasir
            $kasir->delete();
    
            return redirect()->route('kasir.index')->with('success', 'kasir berhasil dihapus!');
        } catch (QueryException $e) {
            // Jika error karena foreign key constraint
            return redirect()->route('kasir.index')->with('error', 'Data ini tidak bisa dihapus karena masih terkait dengan data lain.');
        }
    }

    
}
