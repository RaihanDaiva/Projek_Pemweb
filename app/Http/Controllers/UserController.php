<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
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
        //validate form
        $this->validate($request, [
            'name' => 'required|string|max:255', // Pastikan kolom 'name' diisi
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required',
        ]);
        
        //create post
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'active' => 1
        ]);

        //redirect to index
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
        // Temukan user berdasarkan ID
        $user = user::where('id', $id)->firstOrFail();
        
        // Hapus user
        $user->delete();
        
        // Redirect ke halaman yang sesuai setelah penghapusan
        return redirect()->route('user.index')->with('success', 'Data user berhasil dihapus.');
    }

    
}
