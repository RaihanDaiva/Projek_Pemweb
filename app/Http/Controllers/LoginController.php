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
        // Jika user sudah login, redirect ke halaman home
        if (Auth::check()) {
            return redirect()->route('home');
        }

        return view('logreg/login');
    }

    /**
     * Proses login user.
     */
    public function actionlogin(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Coba autentikasi user dengan kredensial
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Regenerasi sesi untuk keamanan
            $request->session()->regenerate();

            return redirect()->intended('home');
        }

        // Jika login gagal, beri pesan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
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

        return redirect('login');
    }
}
