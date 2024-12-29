<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (!$request->expectsJson()) {
            // Tambahkan pesan error ke sesi
            session()->flash('error', 'Anda harus login untuk mengakses halaman ini.');
    
            // Periksa apakah pengguna telah login
            if (auth()->check()) {
                $user = auth()->user();
    
                if ($user->role === 'admin') {
                    return '/admin'; // Arahkan ke halaman admin
                }
    
                if ($user->role === 'user') {
                    return '/customer/informasi_pasien'; // Arahkan ke halaman user
                }
            }
    
            // Jika tidak login, arahkan ke halaman login
            return route('login');
        }
    
        return null;
    }    
}
