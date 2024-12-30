<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Pasien;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    public function register()
    {
        return view('logreg.register');
    }
    
    public function actionregister(Request $request)
    {
    try {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email', // Email harus unik
            'password' => 'required|min:8', // Password minimal 8 karakter
            'role' => 'required',
        ]);

            // Membuat user baru
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'active' => 1,
            ]);
            
            if ($user->role == 'user'){
                $pasien = Pasien::create([
                    'id'=>$user->id
                ]);
            }

        // Set flash message sukses
        session()->flash('success', 'Registrasi berhasil! Data pasien telah ditambahkan.');
        return redirect()->back();
        } catch (ValidationException $e) {
        // Menangkap error validasi
        $errors = $e->validator->errors()->all();

        // Menyimpan pesan error ke flash session
        session()->flash('error', $errors);
        return redirect()->back()->withInput();
        }
    }

}
