<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;

class RegisterController extends Controller
{
    public function register()
    {
        return view('logreg/register');
    }
    
    public function actionregister(Request $request)
    {
        // Validasi data
        // $request->validate([
        // 'name' => 'required|string|max:255', // Pastikan kolom 'name' diisi
        // 'email' => 'required|email|unique:users',
        // 'password' => 'required|min:8|confirmed',
        // ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'active' => 1
        ]);

        // Set flash message sukses
        session()->flash('success', 'Registrasi berhasil!');
        return redirect()->back();   
    }
}