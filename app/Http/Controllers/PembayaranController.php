<?php

namespace App\Http\Controllers;


use App\Models\Kasir;
use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Auth;
use View;

class PembayaranController extends Controller
{
    public function index()
    {
        // Mengambil data dokter dari database
        $pembayaran = Pembayaran::all(); // Mengambil semua data dari tabel pembayaran
    
        // Mengirim data ke view
        return view('pembayaran.index', compact('pembayaran'));
    }

    public function index_customer()
    {
        // Fetch the Pasien model instance where the user ID matches
        $pasien = Pasien::where('id', Auth::user()->id)->firstOrFail();  // Use firstOrFail to get a model instance or fail

        // Fetch the Pembayaran based on the id_pasien from the Pasien model
        $pembayaran = Pembayaran::where('id_pasien', $pasien->id_pasien)->get();  // Access id_pasien here

        // Send data to the view
        return view('customer.pembayaran', compact('pembayaran'));
    }

    // use Carbon\Carbon; // Pastikan Anda sudah mengimport Carbon

    public function create()
    {
        $pasienList = Pasien::all(); // Ambil semua data pasien
        $kasirList = Kasir::all();   // Ambil semua data kasir
        $obatList = Obat::all();     // Ambil semua data obat

        return view('pembayaran.create', compact('pasienList', 'kasirList', 'obatList'));
    }

    public function store(Request $request)
    {
        // Validasi form
        $this->validate($request, [
            'tanggal'              => 'required|date',  // Validasi tanggal
            'waktu'                => 'required|date_format:H:i:s',  // Validasi waktu
            'status_pembayaran'    => 'required',
            'jumlah_pembayaran'    => 'nullable|numeric',
            'metode_pembayaran'    => 'required',
            'id_pasien'            => 'required|',
            'id_kasir'             => 'required|',
            'id_obat'              => 'required|',
            'jumlah_obat'          => 'required',
        ]);

        // Gabungkan tanggal dan waktu menjadi format datetime
        $waktu_pembayaran = $request->tanggal . ' ' . $request->waktu;

        // Membuat pembayaran baru
        Pembayaran::create([
            'waktu_pembayaran'     => $waktu_pembayaran,   // Menyimpan datetime yang digabung
            'status_pembayaran'    => $request->status_pembayaran,
            'jumlah_pembayaran'    => $request->jumlah_pembayaran ?? 0, // Default ke 0 jika tidak diisi
            'metode_pembayaran'    => $request->metode_pembayaran,
            'id_pasien'            => $request->id_pasien,
            'id_kasir'             => $request->id_kasir,
            'id_obat'              => $request->id_obat,
            'jumlah_obat'          => $request->jumlah_obat,
            
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pembayaran.index')->with(['success' => 'Data Pembayaran Berhasil Disimpan!']);
    }



    public function edit(string $id)
    {
        //get post by ID
        $pembayaran = Pembayaran::where('id_pembayaran', $id)->firstOrFail();
        $pasienList = Pasien::all(); // Ambil semua data pasien
        $kasirList = Kasir::all(); // Ambil semua data kasir
        $obatList = Obat::all(); // Ambil semua data obat

        //render view with post
        return view('pembayaran.edit', compact('pembayaran', 'pasienList', 'kasirList', 'obatList'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data dari form
        $this->validate($request, [
            'tanggal'              => 'required|date',
            'waktu'                => 'required|date_format:H:i:s',
            'status_pembayaran'    => 'required',
            'jumlah_pembayaran'    => 'nullable|numeric',
            'metode_pembayaran'    => 'required',
            'id_pasien'            => 'required|',
            'id_kasir'             => 'required|', // Sesuaikan dengan tabel kasir
            'id_obat'              => 'required|', // Sesuaikan dengan tabel obat
            'jumlah_obat'          => 'required',
        ]);

        // Gabungkan tanggal dan waktu menjadi format datetime
        $waktu_pembayaran = $request->tanggal . ' ' . $request->waktu;

        // Ambil data pembayaran berdasarkan ID
        $pembayaran = Pembayaran::findOrFail($id);

        // Update data pembayaran
        $pembayaran->update([
            'waktu_pembayaran'     => $waktu_pembayaran,
            'status_pembayaran'    => $request->status_pembayaran,
            'jumlah_pembayaran'    => $request->jumlah_pembayaran ?? $pembayaran->jumlah_pembayaran, // Pertahankan nilai jika tidak diisi
            'metode_pembayaran'    => $request->metode_pembayaran,
            'id_pasien'            => $request->id_pasien,
            'id_kasir'             => $request->id_kasir,
            'id_obat'              => $request->id_obat,
            'jumlah_obat'          => $request->jumlah_obat,
        ]);

        // Redirect kembali ke index dengan pesan sukses
        return redirect()->route('pembayaran.index')->with(['success' => 'Data pembayaran berhasil diubah!']);
    }

    

    public function destroy($id)
    {
        // Temukan pembayaran berdasarkan ID
        $pembayaran = Pembayaran::where('id_pembayaran', $id)->firstOrFail();
        
        // Hapus pembayaran
        $pembayaran->delete();
        
        // Redirect ke halaman yang sesuai setelah penghapusan
        return redirect()->route('pembayaran.index')->with('success', 'Data pembayaran berhasil dihapus.');
    }

    public function updateStatus(Request $request, $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->status_pembayaran = $request->status;
        $pembayaran->save();

        return redirect()->route('pembayaran.index')->with('success', 'Status pembayaran berhasil diperbarui!');
    }
}
