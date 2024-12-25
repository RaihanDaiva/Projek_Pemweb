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
            $role = Auth::user()->role;
            if ($role === 'admin') {
                return redirect('admin'); // Arahkan ke halaman admin
            } elseif ($role === 'user') {
                return redirect('home'); // Arahkan ke halaman user
            }
        }

        

        return view('logreg/login');
    }

    /**
     * Proses login user.
     */
    public function actionlogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Periksa role pengguna
            $role = Auth::user()->role;
    
            if ($role === 'admin') {
                return redirect('admin'); // Arahkan ke halaman admin
            } elseif ($role === 'user') {
                return redirect('home'); // Arahkan ke halaman user
            }
        } else {
            // Jika login gagal
            Session::flash('error', 'Email atau Password salah');
            return redirect('/');
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

        return redirect('login');
    }
}
