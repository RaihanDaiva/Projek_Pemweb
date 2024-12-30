<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException; // Untuk menangani error saat penghapusan
use App\Models\Pasien;
use App\Models\User;
use Illuminate\Http\Request;
use View;
use Auth;

class PasienController extends Controller
{
    public function index()
    {
        // Mengambil data pasien dari database
        $pasien = Pasien::all(); // Mengambil semua data dari tabel pasien
    
        // return view('admin/pasien');
    
        // Mengirim data ke view
        return view('pasien.index', compact('pasien'));
    }

    public function informasi_pasien()
    {
        // Mengambil data pasien dari database
        $pasien = Pasien::where('id', Auth::user()->id)->first(); // Mengambil semua data dari tabel pasien
    
        // return view('admin/pasien');
    
        // Mengirim data ke view
        return view('customer.informasi_pasien', compact('pasien'));
    }

    
    public function create()
    {
        $userList = User::all();
        return view('pasien.create', compact('userList'));
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nama_pasien'     => 'required|max:50',
            'tanggal_lahir'     => 'required|max:50',
            'jenis_kelamin'   => 'required',
            'alamat'     => 'required|max:50',
            'no_telp'     => 'required|max:20',
            'riwayat_penyakit'     => 'required|max:50',
            'riwayat_pengobatan'     => 'required|max:50',
            'id'    => 'required',
        ]);

        //create post
        Pasien::create([
            'nama_pasien'     => $request->nama_pasien,
            'tanggal_lahir'     => $request->tanggal_lahir,
            'jenis_kelamin'   => $request->jenis_kelamin,
            'alamat'   => $request->alamat,
            'no_telp'   => $request->no_telp,
            'riwayat_penyakit'   => $request->riwayat_penyakit,
            'riwayat_pengobatan'   => $request->riwayat_pengobatan,
            'id' => $request->id,
        ]);

        //redirect to index
        return redirect()->route('pasien.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    public function edit(string $id)
    {
        //get post by ID
        $pasien = Pasien::where('id_pasien', $id)->firstOrFail();
        $userList = User::all();

        //render view with post
        return view('pasien.edit', compact('pasien', 'userList'));
    }

    public function update(Request $request, $id)
    {
        // Validate form
        $this->validate($request, [
            'nama_pasien'     => 'required|max:50',
            'tanggal_lahir'   => 'required|max:50',
            'jenis_kelamin'   => 'required',
            'alamat'          => 'required|max:50',
            'no_telp'         => 'required|max:20',
            'riwayat_penyakit'=> 'required|max:50',
            'riwayat_pengobatan' => 'required|max:50',
            'id' => 'required',
        ]);
    
        // Get pasien by ID
        $pasien = Pasien::where('id_pasien', $id)->firstOrFail();
    
        // Update pasien data
        $pasien->update([
            'nama_pasien'     => $request->input('nama_pasien'),
            'tanggal_lahir'   => $request->input('tanggal_lahir'),
            'jenis_kelamin'   => $request->input('jenis_kelamin'),
            'alamat'          => $request->input('alamat'),
            'no_telp'         => $request->input('no_telp'),
            'riwayat_penyakit'=> $request->input('riwayat_penyakit'),
            'riwayat_pengobatan' => $request->input('riwayat_pengobatan'),
            'id' => $request->input('id'),
        ]);
    
        // Redirect to index with success message
        return redirect()->route('pasien.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    
    public function update_pasien(Request $request, $id)
    {
        // dd($request->all());
        // Validate form
        $this->validate($request, [
            'nama_pasien'     => 'required|max:50',
            'tanggal_lahir'   => 'required|date',
            'jenis_kelamin'   => 'required',
            'alamat'          => 'required|max:50',
            'no_telp'         => 'required|max:20',
            'riwayat_penyakit'=> 'required|max:50',
            'riwayat_pengobatan' => 'required|max:50',
        ]);
        // Get pasien by ID
        $pasien = Pasien::where('id_pasien', $id)->firstOrFail();
    
        // Update pasien data
        $pasien->update([
            'nama_pasien'     => $request->input('nama_pasien'),
            'tanggal_lahir'   => $request->input('tanggal_lahir'),
            'jenis_kelamin'   => $request->input('jenis_kelamin'),
            'alamat'          => $request->input('alamat'),
            'no_telp'         => $request->input('no_telp'),
            'riwayat_penyakit'=> $request->input('riwayat_penyakit'),
            'riwayat_pengobatan' => $request->input('riwayat_pengobatan'),
        ]);
    
        // Redirect to index with success message
        return redirect()->route('customer.informasi_pasien')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        try {
            // Mencari data pasien berdasarkan id
            $pasien = Pasien::where('id_pasien', $id)->firstOrFail();

            $user = $pasien->user;
            if ($user) {
                $user->delete();
            }
            
            // Menghapus data pasien
            $pasien->delete();
    
            return redirect()->route('pasien.index')->with('success', 'Pasien berhasil dihapus!');
        } catch (QueryException $e) {
            // Jika error karena foreign key constraint
            return redirect()->route('pasien.index')->with('error', 'Data ini tidak bisa dihapus karena masih terkait dengan data lain.');
        }
    }

}
