<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pasien;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use View;

class UserController extends Controller
{

    public function index()
    {
        // Mengambil data dokter dari database
        $user = User::all(); // Mengambil semua data dari tabel user
    
        // Mengirim data ke view
        return view('user.index', compact('user'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        //Validasi data
        $this->validate($request, [
            'name' => 'required|string|max:255', // Pastikan kolom 'name' diisi
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required',
        ]);
        
        //buat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        // Jika role adalah 'user', buat record di tabel pasien
        if ($request->role === 'user') {
            $pasien = Pasien::create([
                'id' => $user->id, // Foreign key ke tabel users
            ]);

            if (!$pasien) {
                dd('Pasien gagal dibuat.');
            }
        }
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    public function edit(string $id)
    {
        //get post by ID
        $user = User::where('id', $id)->firstOrFail();


        //render view with post
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Debugging untuk melihat input
        // dd($request->all());
    
        // Validasi form
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id, // Abaikan email sendiri saat validasi
            'password' => 'nullable|min:8', // Password tidak wajib diisi
            'role' => 'required',
        ]);
    
        // Get user by ID
        $user = User::findOrFail($id);
    
        // Update user data
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->filled('password') ? Hash::make($request->input('password')) : $user->password,
            'role' => $request->input('role'),
        ]);
    
        // Redirect to index with success message
        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    
    public function destroy($id)
    {
        try {
            // Temukan user berdasarkan ID
            $user = user::where('id', $id)->firstOrFail();
            
            // Hapus user
            $user->delete();
            
            // Redirect ke halaman yang sesuai setelah penghapusan
            return redirect()->route('user.index')->with('success', 'Data user berhasil dihapus.');
        } catch (\Exception $e) {
            // Jika error karena foreign key constraint
            return redirect()->route('user.index')->with('error', 'Data ini tidak bisa dihapus karena masih terkait dengan data lain.');
        }
    }
}