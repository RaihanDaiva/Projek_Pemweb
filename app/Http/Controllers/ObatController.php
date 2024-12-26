<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException; // Untuk menangani error saat penghapusan
use App\Models\Obat;
use Illuminate\Http\Request;
use View;

class ObatController extends Controller
{
    public function index()
    {
        // Mengambil data dokter dari database
        $obat = Obat::all(); // Mengambil semua data dari tabel obat
    
        // Mengirim data ke view
        return view('obat.index', compact('obat'));
    }
    public function create()
    {
        return view('obat.create');
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nama_obat'     => 'required|max:50',
            'harga_obat'   => 'required',
        ]);

        //create post
        Obat::create([
            'nama_obat'     => $request->nama_obat,
            'harga_obat'   => $request->harga_obat
        ]);

        //redirect to index
        return redirect()->route('obat.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    public function edit(string $id)
    {
        //get post by ID
        $obat = Obat::where('id_obat', $id)->firstOrFail();


        //render view with post
        return view('obat.edit', compact('obat'));
    }

    public function update(Request $request, $id)
    {
        // Validate form
        $this->validate($request, [
            'nama_obat'     => 'required|max:50',
            'harga_obat'   => 'required'
        ]);
    
        // Get obat by ID
        $obat = Obat::where('id_obat', $id)->firstOrFail();
    
        // Update obat data
        $obat->update([
            'nama_obat'     => $request->input('nama_obat'),
            'harga_obat'   => $request->input('harga_obat')
        ]);
    
        // Redirect to index with success message
        return redirect()->route('obat.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    

    public function destroy($id)
    {
        try {
            // Mencari data obat berdasarkan id
            $obat = Obat::where('id_obat', $id)->firstOrFail();
            
            // Menghapus data obat
            $obat->delete();
    
            return redirect()->route('obat.index')->with('success', 'obat berhasil dihapus!');
        } catch (QueryException $e) {
            // Jika error karena foreign key constraint
            return redirect()->route('obat.index')->with('error', 'Data ini tidak bisa dihapus karena masih terkait dengan data lain.');
        }
    }

    
}
