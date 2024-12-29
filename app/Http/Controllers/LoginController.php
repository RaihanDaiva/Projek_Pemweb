<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Menampilkan halaman login.
     */
    public function login()
    {
        // Jika user sudah login, redirect ke halaman sesuai role
        if (Auth::check()) {
            $role = Auth::user()->role;
            if ($role === 'admin') {
                return redirect('/admin'); // Arahkan ke halaman admin
            } elseif ($role === 'user') {
                return redirect('/customer/informasi_pasien'); // Arahkan ke halaman user
            }
        }

        return view('logreg/login'); // Tampilkan halaman login
    }

    /**
     * Proses login user.
     */
    public function actionlogin(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Proses autentikasi
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Regenerasi sesi untuk keamanan
            $role = Auth::user()->role;

            // Arahkan ke halaman berdasarkan role
            if ($role === 'admin') {
                return redirect('/admin');
            } elseif ($role === 'user') {
                return redirect('/customer/informasi_pasien');
            }
        } else {
            // Jika autentikasi gagal
            Session::flash('error', 'Email atau Password salah');
            return redirect('/login');
        }
    }

    /**
     * Logout user.
     */
    public function actionlogout(Request $request)
    {
        Auth::logout();

        // Invalidate dan regenerasi token sesi
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login'); // Redirect ke halaman login
    }
}
