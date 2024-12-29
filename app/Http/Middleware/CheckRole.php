<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  ...$roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Periksa apakah user sedang login
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Periksa apakah role user cocok dengan salah satu role yang diizinkan
        if (!in_array(auth()->user()->role, $roles)) {
            return redirect()->route('customer.informasi_pasien')->with('error');
        }

        return $next($request);
    }
}
