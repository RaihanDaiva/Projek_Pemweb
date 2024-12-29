<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class VerifyActiveSession
{
    public function handle($request, Closure $next)
    {
        // Periksa apakah user yang login saat ini sama dengan yang seharusnya
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Pastikan role tetap sesuai saat reload
        $role = Auth::user()->role;

        if ($role === 'admin' && !$request->is('admin*')) {
            return redirect('/admin');
        } elseif ($role === 'user' && !$request->is('customer*')) {
            return redirect('/customer/informasi_pasien');
        }

        return $next($request);
    }
}
